<?php 
require_once 'php/top.php';
$result=$bd->output_bot_comment();	
 ?>
	<!DOCTYPE html>
	<html lang="ru">	
	<head>
		<?php require_once 'php/header.php'; ?>
		<link rel="stylesheet" href="/css/content.css">
		<link rel="stylesheet" href="/css/reviews.css">
		<script type="text/javascript" src="js/add_comment.js"></script>

		<title>Отзывы клиентов интернет магазина timberlands24.ru</title>
	</head>
	<body>
	<div class="main">
	<?php require_once 'php/head.php';?>
	<div class="reviews">
		<div class="rev_publish">
		<p class="rev_caption">ОТЗЫВЫ НАШИХ КЛИЕНТОВ:</p>
			
	 		<?php 
			$s=0;
			for($i=0;$i<$result->num_rows;$i++){
				$block=$result->fetch_assoc();
				$name=$block["name"];
				$comment=$block["comment"];
				$s++;	
				if($s===1){
				echo' <div class="rev_block1">';
				echo'<p class="rev_name">';
				echo $name;
				echo'</p>';
				echo'<p class="rev_comment">';
				echo $comment;
					echo'</p>';
				echo'</div>';
				}
				else{
				echo' <div class="rev_block2">';
				echo'<p class="rev_name">';
				echo $name;
				echo'</p>';
				echo'<p class="rev_comment">';
				echo $comment;
					echo'</p>';
				echo'</div>';
				}
			}
			 ?>
			
		</div>
	</div>	
	<div class="add_comment">
		<p class="add_comment_name">Автор:<br><input type="text"><span class="error"></span></p>
		<p class="add_comment_text">Комментарии:<span class="error"></span><br>
		<textarea></textarea>
		</p>
		<input type="button" value="Добавить" id="button">
		<p id="msg"></p>

	</div>
			 <?php require_once 'php/footer.php'; ?>

		</div>
	</body>
	</html> 