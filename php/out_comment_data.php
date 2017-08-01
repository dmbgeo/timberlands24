<?php 
require_once 'top.php';
$results=$bd->output_bot_comment();
$number=intval($_POST["number"]);
$s=0;	
for($i=0;$i<$results->num_rows;$i++){
	$block1=$results->fetch_assoc();
	$name=$block1["name"];
	if($number!==$j)
		$j++;
	$comment=$block1["comment"];
	if($number===$j){
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

}
echo '<span class="number_comment" style="display:none;">'.$number.'</span>';
 ?>