			


			$(document).ready(function (){
					$("#button").bind("click",function(){
					var avtor=$('.add_comment_name input');
					var comment=$('.add_comment_text textarea');
					var avtorVal=avtor.val();
					var commentVal=comment.val();

					if(avtorVal==="")
						$(".add_comment_name .error").text("Заполните поле");
					else{
						$(".add_comment_name .error").empty();
						if(commentVal==="")
							$(".add_comment_text .error").text("Форма комментария пуста");
						else{
							$(".add_comment_text .error").empty();
							add_comment(avtorVal,commentVal);
						}

					}
					});

					
					
				


					function add_comment_out(data){
						$('#msg').html(data);
						var avtor=$('.add_comment_name input').val("");
						var comment=$('.add_comment_text textarea').val("");
						}

					function add_comment(avtor,comment)
							{
								$.ajax({
									url:'/php/add_comment.php',
									method:'POST',
									data:({"avtor":avtor,"comment":comment}),
									dataType:'html',
									success: add_comment_out
								   });
							}		

				});

			


