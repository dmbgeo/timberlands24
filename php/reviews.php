<?php 
 require_once 'top.php';
$result=$bd->output_bot_comment();	
 ?>
<div class="reviews_block">
	<div class="rev_publish_block">
	<img src="/img/left.png" alt="" class="left_rev">
	<img src="/img/right.png" alt="" class="right_rev">
	<p class="rev_caption_block">ОТЗЫВЫ НАШИХ КЛИЕНТОВ:</p>
	<?php 
			$s=0;
			for($i=0;$i<$result->num_rows;$i++){
				$block=$result->fetch_assoc();
				$name=$block["name"];
				$comment=$block["comment"];
				$s++;	
				if($s===1){
					echo'<div class="rev_block1_block">
						 <p class="rev_name_block">';
						 echo $name;
						 echo'</p>';
						 echo'<p class="rev_comment_block">';
						 echo $comment;
						 echo'</p>
						 	</div>';
				}
				if($s===2){
					echo'<div class="rev_block2_block">
						 <p class="rev_name_block">';
						 echo $name;
						 echo'</p>';
						 echo'<p class="rev_comment_block">';
						 echo $comment;
						 echo'</p>
						 	</div>';
				}
				 
			}
			echo '<span class="count_comment" style="display:none;">'.$result->num_rows.'</span>';
			echo '<span class="number_comment" style="display:none;">1</span>';
	 ?>

	</div>	
</div>