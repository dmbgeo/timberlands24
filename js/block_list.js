$(document).ready(function(){
	 $(".left").bind("click",function(){
	 	var tovarSrc=$(this).siblings("a");
	 	var	count_photo=Number($(this).siblings(".count_photo").text());
	 	 tovarSrc=tovarSrc.eq(0).find("img");
	 	 tovar=tovarSrc.attr("src");
		 tovar=tovar.substr(0,tovar.length-4);
		 var i=Number(tovar[tovar.length-1]);
		 if(i>1)
		 	i--;
		 else
		 if(i===1)
		 	i=count_photo;
		 tovar=tovar.substr(0,tovar.length-1);
		 tovar+=i;
		 tovarSrc.attr("src",tovar+".jpg");
		 

	 });	
	 $(".right").bind("click",function(){
	 	var tovarSrc=$(this).siblings("a");
	 	var	count_photo=Number($(this).siblings(".count_photo").text());
	 	 tovarSrc=tovarSrc.eq(0).find("img");
	 	 tovar=tovarSrc.attr("src");
		 tovar=tovar.substr(0,tovar.length-4);
		 var i=Number(tovar[tovar.length-1]);
		 if(i<count_photo)
		 	i++;
		 else
		 if(i===count_photo)
		 	i=1;
		 tovar=tovar.substr(0,tovar.length-1);
		 tovar+=i;
		 tovarSrc.attr("src",tovar+".jpg");
		 

	 });
});
