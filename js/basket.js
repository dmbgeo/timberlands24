var orderProcessing=false;

function windowMsg(data){
	$(".window_phone").css("display","block");
	 	$("#clbh_phone_div").css("display","none");
	 	$("body").css("overflow-y","hidden");
			document.onmousewheel = function (e) {
  		e.preventDefault();
  		}
  		$(".window_phone_bagraund").css("display","none");
						$("#window_phone_order").css("display","block");
						$("#window_phone_order").text(data);
						setTimeout(function() {
							$(".window_phone_bagraund").css("display","block");
							$("#window_phone_order").empty();
							$("#window_phone_order").css("display","none");
							$('#name_user input').val("");
							$('#phone_user input').val("");
							windowMsgStop();
								// document.location.href = "/";
						}, 8000);

  		
		}

function windowMsgStop(){
	$(".window_phone").css("display","none");
	 	$("#clbh_phone_div").css("display","block");
	 	$("body").css("overflow-y","auto");
			document.onmousewheel = function (e) {
  		e.returnValue = true;
  	}
}


function addBasketProduct(data){
		updateProduct();
}

function addBasket(id){
	 var audio = new Audio(); // Создаём новый элемент Audio
  	audio.src = '/date/add_product.mp3'; // Указываем путь к звуку "клика"
  	audio.autoplay = true; // Автоматически запускаем
	var size=$("select").val();
	$.ajax({
		url:'/php/add_product.php',
		method:'POST',
		data:({"id":id,"size":size}),
		dataType:'html',
		success: addBasketProduct
	});
}
function updateProduct(){
		$.ajax({
			url:'/php/add_product.php',
			method:'POST',
			data:({"update_basket":"1"}),
			dataType:'html',
			success: updateCountProduct
		});
}

function updateCountProduct(data){ 
	countProduct=Number(data);
	if(countProduct>0){
		$(".count_add_product").text(countProduct);
		$(".count_add_product").css("display","block");
	}
	else{
		$(".count_add_product").empty();
		$(".count_add_product").css("display","none");
	}

}

function deleteProduct(){
	updateProduct();
	outBasketData()
}

function outBasketData(){
		$.ajax({
			url:'/php/basket_table_out.php',
			method:'POST',
			dataType:'html',
			success: outBasketDataUpdate
		});
}

 
function outBasketDataUpdate(data){
	$(".basket").empty();
	$(".basket").html(data);
	if($(".order_basket").css("display")==="block")
		orderBasketUpdate();
}


function validOrderBasket(shablon,str){
	var reg= new RegExp(shablon);
	return reg.test(str);
}

function orderBasketUpdate(){
	var tableTr=$(".orders_basket table tr");
	typeDel=tableTr.eq(7).find("select").val();
	var sum=$(".basket_result span").html();
	sum=sum.substr(0,sum.length-3);
	sum=Number(sum);
	var strmsg='<h2>Итоги:<p></p></h2><table><tr><td>Сумма покупок:</td><td>'+sum+'руб</td></tr><tr><td>Доставка:</td><td>';
	
	if(Number(typeDel)===1){
		sum+=350;
		strmsg+='350руб</td></tr><tr><td>Счет на оплату:</td><td>';
	}
	else{
		strmsg+='По договору</td></tr><tr><td>Счет на оплату:</td><td>';	
	}
	// strmsg+=sum+'руб</td></tr><tr><td>Счет на оплату:</td><td>';
	strmsg+=sum+'руб</td></tr></table><input type="button" id="done_order" value="Завершить оформление заказа">';
	$(".order_basket").html(strmsg);
	$(".order_basket").css("display","block");
}

function orderBasket(){
	var sum,basket_table,email,name,surname,address,addressAdd,city,phone,typeDel,paymentMethod,commentOrder
	var done=$(".orders_basket")
	done=done.eq(1).html();
	var tableTr=$(".orders_basket table tr");
	email=tableTr.eq(0).find("input").val();
	name=tableTr.eq(1).find("input").val();
	surname=tableTr.eq(2).find("input").val();
	address=tableTr.eq(3).find("input").val();
	addressAdd=tableTr.eq(4).find("input").val();
	city=tableTr.eq(5).find("input").val();
	phone=tableTr.eq(6).find("input").val();
	typeDel=tableTr.eq(7).find("select").val();
	paymentMethod=tableTr.eq(8).find("select").val();
	commentOrder=$(".order_comment textarea").val();
	$.ajax({
		url:'/php/order_basket.php',
		method:'POST',
		data:({"sum":sum,"done":done,"email":email,"name":name,"surname":surname,"address":address,"addressAdd":addressAdd,"city":city,"phone":phone,"typeDel":typeDel,"paymentMethod":paymentMethod,"commentOrder":commentOrder}),
		dataType:'html',
		success: orderBasketDone
	});
}

function orderBasketDone(data){
	$.ajax({
	url:'/php/add_product.php',
	method:'POST',
	data:({"del":"-1"}),
	dataType:'html',
	success: deleteProduct
	});
	windowMsg(data);

}



$(document).ready(function(){
	updateProduct();
	if (document.location.href==="https://timberlands24.ru/basket.php"){
		 outBasketData();
		setInterval(function(){
			if(orderProcessing===false)
					updateProduct();
					outBasketData();
		},5000);

		$('body').on('click',"#order_start",function(){
			$(".orders_basket").css("display","block");
			jQuery(function($){
				$(".orders_basket table tr").eq(6).find("input").mask("+7 (999) 999-99-99");
			});
		});

		$('body').on('click',"#continued_execution",function(){
			$(".error").empty();
			var error=false;
			var tableTr=$(".orders_basket table tr");
			var rab;
			var reg;
			rab=tableTr.eq(0).find("input").val();
			if(rab===""){
				tableTr.eq(0).find(".error").text("Заполните поле!");
			}
			else{
				reg="^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$";
				if(!validOrderBasket(reg,rab)){
					tableTr.eq(0).find(".error").text("Заполните поле правильно");
					error=true;
				}
			}
			rab=tableTr.eq(1).find("input").val();
			if(rab===""){
				error=true;
				tableTr.eq(1).find(".error").text("Заполните поле!");
			}
			rab=tableTr.eq(2).find("input").val();
			if(rab===""){
				error=true;
				tableTr.eq(2).find(".error").text("Заполните поле!");
			}
			rab=tableTr.eq(3).find("input").val();
			if(rab===""){
				error=true;
				tableTr.eq(3).find(".error").text("Заполните поле!");
			}
			rab=tableTr.eq(4).find("input").val();
			addressAdd=rab;
			rab=tableTr.eq(5).find("input").val();
			if(rab===""){
				error=true;
				tableTr.eq(5).find(".error").text("Заполните поле!");
			}
			
			rab=tableTr.eq(6).find("input").val();
			if(rab===""){
				error=true;
				tableTr.eq(6).find(".error").text("Заполните поле!");
			}	
			

		if(error===false){
			orderBasketUpdate();	
		}
			
				
	
		});


		$('body').on('click',"#done_order",function(){
			orderBasket();
		});


		$('body').on('click',".delete_tovar",function(event){
			var del=$(event.target).attr("alt");
			del=del.split("=");
			del=del[1];
			$.ajax({
				url:'/php/add_product.php',
				method:'POST',
				data:({"del":del}),
				dataType:'html',
				success: deleteProduct
			});
		});
	}
});



				