<?php 
if(isset($_COOKIE['products'])){
	$products=unserialize($_COOKIE['products']); 
}
$n=count($products);
 ?>
			<?php 
			if($n<1){
				$basket_page='<h1 data-count_product="'.($n).'">Корзина пуста</h1>';
			}
			else{
				$basket_page='<h1 data-count_product="'.($n).'">Ващ заказ</h1>';
				$basket_page.='<table border="1px">';
					$basket_page.='<tr>';
						$basket_page.='<th >№</th>';
						$basket_page.='<th>Название товара</th>';
						$basket_page.='<th>Категория</th>';
						$basket_page.='<th>Материал</th>';
						$basket_page.='<th>Сезон</th>';
						$basket_page.='<th>Размер</th>';
						$basket_page.='<th>Цвет</th>';
						$basket_page.='<th>Цена(руб)</th>';
					$basket_page.='</tr>';
					$sum=0;
				for($i=0;$i<$n;$i++){
					$result=$bd->output_bot_product($products[$i]["id"]);
					$block=$result->fetch_assoc();
					$name=$block['name'].'(tb-'.$block['article'].')';
					$basket_page.='<tr>';
						$basket_page.='<td>'.($i+1).'</td>';
						$basket_page.='<td><a href="/product.php?id='.$block["id"].'">'.$name.'</a></td>';
						$category=intval($block["category"]);
						if($category===1)
							$basket_page.='<td>Мужские</td>';
						else	
							$basket_page.='<td>Женские</td>';
						$basket_page.='<td>'.$block["material"].'</td>';
						$season=intval($block["season"]);
						if($season===1)
							$basket_page.='<td>Зимние</td>';
						else	
							$basket_page.='<td>Демисезонные</td>';
						$basket_page.='<td>'.$products[$i]["size"].'</td>';
						$basket_page.='<td>'.$block["color"].'</td>';
						$basket_page.='<td>'.$block["price"].'</td>';
					$basket_page.='</tr>';
					$sum+=$block["price"];
				}
				$basket_page.='</table>';
				$basket_page.='<div class="basket_result">Итоги:<span>'.$sum.'руб</span></div>';
			}
			 ?>