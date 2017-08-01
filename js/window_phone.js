$(document).ready(function (){
  $('#phone_user input').mask("+7 (999) 999-99-99");
  $(".exit_block_phone").bind("click",function(){
		 window_phone_stop();
  });   
	 
	 $(".cbh-ph-img-circle").bind("click",function(){
	 	$(".window_phone").css("display","block");
	 	$("#clbh_phone_div").css("display","none");
	 	$("body").css("overflow-y","hidden");
			document.onmousewheel = function (e) {
  		e.preventDefault();
		}
	 });

	 $("#user_start").bind("click",function(){
	 				var nameUser=$('#name_user input');
					var phoneUser=$('#phone_user input');
					var nameUserVal=nameUser.val();
					var phoneUserVal=phoneUser.val();

					if(nameUserVal==="")
						$("#name_user .error").text("Заполните поле");
					else{
						$("#name_user .error").empty();
						if(phoneUserVal==="")
							$("#phone_user .error").text("Заполните поле");
						else{
							$("#phone_user .error").empty();
							 add_order_phone(nameUserVal,phoneUserVal);
						}

					}
	 });
});

function add_order_phone_out(data){
						$(".window_phone_bagraund").css("display","none");
						$("#window_phone_order").css("display","block");
						$("#window_phone_order").text(data);
						setTimeout(function() {
							$(".window_phone_bagraund").css("display","block");
							$("#window_phone_order").empty();
							$("#window_phone_order").css("display","none");
							$('#name_user input').val("");
							$('#phone_user input').val("");
							window_phone_stop();
							if (document.location.href==="https://timberlands24.ru/basket.php")
								document.location.href = "/";
						}, 5000);
						}

	function add_order_phone(user,phone)
							{
								$.ajax({
									url:'/php/add_order_phone.php',
									method:'POST',
									data:({"user":user,"phone":phone}),
									dataType:'html',
									success: add_order_phone_out
								   });
							}		

function window_phone_stop(){
	$(".window_phone").css("display","none");
	 	$("#clbh_phone_div").css("display","block");
	 	$("body").css("overflow-y","auto");
			document.onmousewheel = function (e) {
  		e.returnValue = true;
		}
}