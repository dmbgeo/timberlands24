$(document).ready(function(){
$(window).scroll(function () {
	 if ($(this).scrollTop() > 0) {
		 $('#scroller').fadeIn();
		 $('#clbh_phone_div').fadeIn();
	 } else {
		 $('#scroller').fadeOut();
		 $('#clbh_phone_div').fadeOut();
	 }});

$('#scroller').click(function () {$('body,html').animate({scrollTop: 0}, 400); return false;});
   
	$(window).scroll(function(){
		if($(this).scrollTop()>370){         
			$(".scrollup").fadeIn();
			$("b.scrollup_title").fadeIn()
		}else{      
			$(".scrollup").fadeOut();
			$("b.scrollup_title").fadeOut()
		}});
			$(".scrollup, b.scrollup_title").click(function(){
				$("html, body").animate({scrollTop:0},600);
				return false
			})
});
