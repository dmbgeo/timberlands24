			


			$(document).ready(function (){
					$(".right_rev").bind("click",function(){
					 var count_comment=Number($('.count_comment').text());
					 var number_comment=Number($('.number_comment').text());
					 number_comment++;
					 if((number_comment)<count_comment){
					 	number=number_comment;
					 	out_comment(number);
					 }

					});
					$(".left_rev").bind("click",function(){
					 var count_comment=Number($('.count_comment').text());
					 var number_comment=Number($('.number_comment').text());
					 var number;
					 number_comment--;
					 if((number_comment)>0){
					 	number=number_comment;
					 	out_comment(number);
					 }
					});

					
					
				


					function out_comment_data(data){
						$('.rev_block1_block').remove();
						$('.rev_block2_block').remove();
						$('.number_comment').remove();
						$('.rev_publish_block').append(data);
						}

					function out_comment(number)
							{
								$.ajax({
									url:'/php/out_comment_data.php',
									method:'POST',
									data:({"number":number}),
									dataType:'html',
									success: out_comment_data
								   });
							}		

				});

			


