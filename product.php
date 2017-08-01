<?php require_once 'php/top.php';
if(isset($_GET['article'])){
	$article=$_GET['article'];
	$result=$bd->output_bot_product_article($article);
}
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$result=$bd->output_bot_product($id);
}


if($result->num_rows!==1){
	$name='Товар не найден';
}
else{
$description="";
$block=$result->fetch_assoc();	
			$id=$block['id'];
			$name=$block['name'].'(tb-'.$block['article'].')';
			$category=intval($block['сategory']);
			if($category===2)
				$stringCategory="Женские";
			if($category===1)
				$stringCategory="Мужские";
			$season=intval($block['season']);

			if($season===2)
				$stringSeason="Демисезонные";
			if($season===1)
				$stringSeason="Зимние";
			$price=$block['price'];
			$material=$block['material'];
			$size=$block['size'];
			$color=$block['color'];
			$count_photo=$block['count_photo'];
			$discount=$block['discount'];

			$price100=(ceil((($price/(100-$discount))*100)));
}
 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<?php require_once 'php/header.php'; ?>
	<link rel="stylesheet" href="/css/product.css">
	<link rel="stylesheet" href="/css/reviews.css">
	<script type="text/javascript" src="/js/slider.js"></script>
	<script type="text/javascript" src="/js/out_comment_data.js"></script>
	<title>Ботинки <?=$name?></title>
</head>
<body>	
	<div class="main">
		<?php require_once 'php/head.php';?>
		<?php echo'<h1 class="name_product">'.$name.'</h1>'; ?>
		<div class="product">
		<?php
			if($result->num_rows===1){
				require_once 'php/block_product.php';
			}
		?>
				<?php require_once 'php/left_block.php';?>
				<div class="end"></div>
			</div>
				<?php require_once 'php/reviews.php'; ?>
			<?php require_once 'php/footer.php'; ?>
		</div>
</body>
	</html>