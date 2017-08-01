<div class="leftCol">
				<div class="slider">
					<table>
						<tr>
							<td class="slid">
								<img src="/date/tovar/bot<?=$id?>/1.jpg" alt="">
							</td>
							<td>
							<table class="block_img">
							<?php 
								for($i=1;$i<=$count_photo;$i++){
								echo'<tr >';
									echo'<td>';
										if($i===1)
										echo'<img src="/date/tovar/bot'.$id.'/'.$i.'.jpg" alt="" style="border: 1px solid red">';
										else
											echo'<img src="/date/tovar/bot'.$id.'/'.$i.'.jpg" alt="" style="border: 1px solid black">';
									echo'</td>';
								echo'</tr>';	
								}
							 ?>
								</table>	
							</td>
						</tr>

						</table>
					</div>
					<div class="prod_info">
						<div class="prod_options clearfix">
							<div class="prod_prices">
								<div class="prod_OldPrice" style="color: red; padding-right: 20px; font-weight: bold;position: relative"> <i style="border: 1px red solid; position: absolute; width: 80%; top:11px;"></i>
									<span style=" color: #686868;"><?=$price100?> .-</span>
								</div>

								<div class="prod_Price"><?=$price?> .-</div>
								<span class="orange_percent">- <?=$discount?>%</span>
							</div>

							<div class="prod_SizeSelect">
								Размер:&nbsp;&nbsp;
								<select>
								<?php 
									$size=explode("-",$size);
									$n=count($size);
									for($i=0;$i<$n;$i++)
										echo'<option value="'.$size[$i].'">'.$size[$i].'</option>';

								 ?>
								</select>
							</div>

						</div>

						
						<div class="date_product">
						<br>
						<div class="prod_buttons" style="float:right;">

							<a class="zakaz fancybox" style="cursor: pointer;" title="" onclick="addBasket(<?=$id?>);">Добавить в корзину</a>

						</div>
							<table>
								<tbody>
									<tr>
										<td> <b>Материал:</b>
										</td>
										<td><?=$material?></td>
									</tr>
									<tr>
										<td>
											<b>Категория:</b>
										</td>
										<td><?=$stringCategory?></td>
									</tr>
									<tr>
										<td> <b>Цвет:</b>
										</td>
										<td><?=$color?></td>
									</tr>
									<tr>
										<td>
											<b>Сезон:</b>
										</td>
										<td><?=$stringSeason?></td>
									</tr>
									
								</tbody>
							</table>
						</div>
						<div class="prod_descr">
							<br>
							<br>
							<?php 
								if($description!==""){
									echo'	<div class="catalogItemDetailTextTitle">Описание:</div>
							<div class="catalogItemDetailText">
								Темно-коричневая вариация ботинок Timberlake&nbsp;&nbsp;подойдет для женщин, желающих совместить комфорт с изяществом скромного «охотничьего» стиля. Не смотря на свою обыденность на первый взгляд, этот стиль весьма агрессивен, подобно притаившейся в зарослях пантере.
								<br>
								<br>
								Этот цвет обладает свойством скрытой привлекательности, а фасон ботинок дополняет общий эффект. Женственность слегка устранена общим «рабочим» стилем «тимберлейков», но при этом, как не парадоксально, ботинки всё же более женственные, чем любые подобные. Это просто гениальный вариант для всех, кто желает подчеркнуть свою изящность, не привлекая чрезмерного внимания.
							</div>';

								}
							 ?>
						</div>
					
					</div>
				</div>