<?php 
require_once 'top.php';
if(isset($_COOKIE['products'])){
	$products=unserialize($_COOKIE['products']); 
}
$n=count($products);
 ?>
			<?php 
			if($n<1){
				echo'<h1 data-count_product="'.($n).'">Корзина пуста</h1>';
			}
			else{
				echo'<h1 data-count_product="'.($n).'">Корзина</h1>';
				echo'<table>';
					echo'<tr>';
						echo'<th>№</th>';
						echo'<th>id</th>';
						echo'<th>Товар</th>';
						echo'<th>Название товара</th>';
						echo'<th>Категория</th>';
						echo'<th>Материал</th>';
						echo'<th>Сезон</th>';
						echo'<th>Размер</th>';
						echo'<th>Цвет</th>';
						echo'<th>Цена(руб)</th>';
						
						echo'<th class="delete_tovar"><img  src="/img/basket/exit.png" alt="Удалить все элементы=-1" title="Очистить таблицу"></th>';
					echo'</tr>';
					$sum=0;
				for($i=0;$i<$n;$i++){
					$result=$bd->output_bot_product($products[$i]["id"]);
					$block=$result->fetch_assoc();
					$name=$block['name'].'(tb-'.$block['article'].')';
					echo'<tr>';
						echo'<td>'.($i+1).'</td>';
						echo'<td>'.$block["id"].'</td>';
						echo'<td><img class="basket_img_tovar" src="/date/tovar/bot'.$block["id"].'/1.jpg" alt=""></td>';
						echo'<td><a href="/product.php?id='.$block["id"].'">'.$name.'</a></td>';
						$category=intval($block["category"]);
						if($category===1)
							echo'<td>Мужские</td>';
						else	
							echo'<td>Женские</td>';
						echo'<td>'.$block["material"].'</td>';
						$season=intval($block["season"]);
						if($season===1)
							echo'<td>Зимние</td>';
						else	
							echo'<td>Демисезонные</td>';
						echo'<td>'.$products[$i]["size"].'</td>';
						echo'<td>'.$block["color"].'</td>';
						echo'<td>'.$block["price"].'</td>';
						echo'<td class="delete_tovar"><img  src="/img/basket/exit.png" alt="Удалить index='.$i.'" title="Удалить"></td>';
					echo'</tr>';
					$sum+=$block["price"];
				}
				echo'</table>';
				echo'<div class="basket_result">Итоги:<span>'.$sum.'руб</span></div>';
				echo '<input type="button" id="order_start" value="Оформить заказ">';
			}
			 ?>