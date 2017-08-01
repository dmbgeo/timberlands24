
$(document).ready(function (){
$(document).scroll(function () {
  // var s_top = $("html,body").scrollTop();
  var s_top = $(window).scrollTop();
  var catalog= $(".content").offset().top;
  var reason=$(".reason");
  var content=$(".content");
  var heightReason=reason.css("height");
  heightReason=Number(heightReason.substr(0,heightReason.length-2));
  var heightContent=content.css("height");
  heightContent=Number(heightContent.substr(0,heightContent.length-2));

    if(s_top>catalog){
         $(".reason").css("position","relative");
         $(".reason").css("top",(s_top-catalog)+"px");
         $(".reason").css("right","0px");
    	}
   if(s_top<catalog){
         $(".reason").css("position","relative");
         $(".reason").css("top","0px");
         $(".reason").css("right","0px");
    	}
    if((s_top+heightReason)>$(".end").offset().top){
         $(".reason").css("position","relative");
         $(".reason").css("top",heightContent-heightReason+"px");
         $(".reason").css("right","0px");
    	}
 
  
    	
	});

});

