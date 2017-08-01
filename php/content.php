<?php 
$catalog=0;
if(isset($_GET["catalog"]))
	$catalog=intval ($_GET["catalog"]);
$result=$bd->output_bot_blcok();
 ?>
<div class="content">
	<div class="catalog">
		<ul class="caption_catalog">
			<?php 
			if($catalog===0)
				echo '<li><a id="catalog_action" href="/catalog.php?catalog=0">КАТАЛОГ</a></li>';
			else
				echo '<li><a href="/catalog.php?catalog=0">КАТАЛОГ</a></li>';
			if($catalog===1)
				echo '<li><a id="catalog_action" href="/catalog.php?catalog=1">МУЖСКАЯ ОБУВЬ</a></li>';
			else
				echo '<li><a href="/catalog.php?catalog=1">МУЖСКАЯ ОБУВЬ</a></li>';
			if($catalog===2)
				echo '<li><a id="catalog_action" href="/catalog.php?catalog=2">ЖЕНСКАЯ ОБУВЬ</a></li>';
			else
				echo '<li><a href="/catalog.php?catalog=2">ЖЕНСКАЯ ОБУВЬ</a></li>';
			 ?>
		</ul>
		<?php 	
		for($i=0;$i<$result->num_rows;$i++){
			$block=$result->fetch_assoc();	
			$id=$block['id'];
			$name=$block['name'].'(tb-'.$block['article'].')';
			$category=intval($block['сategory']);
			if($catalog===$category||$catalog===0){
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
			$count_photo=$block['count_photo'];
			$discount=$block['discount'];
			$price100=(ceil((($price/(100-$discount))*100)));
			echo'<div class="catalog_block">';
			echo'<a class="tovar" href="/product.php?id='.$id.'">';
			echo'<img src="/date/tovar/bot'.$id.'/1.jpg" alt="" >';
			echo'</a>';
			echo'<img src="/img/left.png" alt="" class="left">';
			echo'<img src="/img/right.png" alt="" class="right">';
			echo'<div class="count_photo" style="display:none">'.$count_photo.'</div>';
			echo'<a href="/product.php?id='.$id.'">';
			echo'<p class="name_tovar">'.$name.'</p>';
			echo'<p class="description_tovar">'.$stringCategory.' '.$stringSeason.' Timberland</p>';
			echo'</a>';
			echo'<p class="cena">';
			echo'<span class="str1">'.$price.' .-</span>';
			echo'<span class="str2">'.$price100.'.-</span>';
			echo'<span class="str3">- '.$discount.'%</span>';
			echo'</p>';
			echo'</div>';
			
			}
		}

		 ?>
			

	</div>	
<?php require_once 'php/left_block.php';?>
<div class="end"></div>
</div>

