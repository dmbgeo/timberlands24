<?php require_once 'php/top.php';?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<?php require_once 'php/header.php'; ?>
	<link rel="stylesheet" href="/css/basket.css">
	<title>Козина</title>
</head>
<body>
	<div class="main">
		<?php require_once 'php/head.php';?>
		<div class="basket">
		</div>
		<div class="orders_basket">
			<h2>Заполните поля для оформления заказа</h2>
			<h3>
				Внимание поля отмеченные <span>*</span> обязательные!
			</h3>
			<table>		
				<tr>
					<td>
						<span>*</span>Email:
					</td>
					<td>
						<input type="text" placeholder="example@example.com"><span class="error"></span></td>
				</tr>
				<tr>
					<td>
						<span>*</span>Имя:
					</td>
					<td>
						<input type="text" placeholder="Иван"><span class="error"></span></td>
				</tr>
				<tr>
					<td>
						<span>*</span>Фамилия:
					</td>
					<td>
						<input type="text" placeholder="Иванов"><span class="error"></span></td>
				</tr>
				<tr>
					<td>
						<span>*</span>Адрес:
					</td>
					<td>
						<input type="text" placeholder="Ул* дом* кв*"><span class="error"></span></td>
				</tr>
				<tr>
					<td>
						Адрес (дополнительно):
					</td>
					<td>
						<input type="text" placeholder="Ул* дом* кв*"><span class="error"></span></td>
				</tr>
				<tr>
					<td>
						<span>*</span>Город:
					</td>
					<td>
						<input type="text" placeholder="Москва"><span class="error"></span></td>
				</tr>
				
				<tr>
					<td>
						<span>*</span>Телефон:
					</td>
					<td>

						<input  type="tel" placeholder="+7(123)456-78-90"><span class="error"></span></td>
				</tr>
				<tr>
					<td>
						<span>*</span>Тип доставки:
					</td>
					<td>
						<select>
							<option value="1">Доставка по Москве</option>
							<option value="2">Доставка по МО</option>		
						</select>
					<span class="error"></span>
					</td>
				</tr>	
				<tr>
					<td>
						<span>*</span>Способ оплаты:
					</td>
					<td>
						<select>
							<option value="1">Оплата наличными курьеру</option>
							<!-- <option value="2">Денежный перево</option>		 -->
						</select>
						<span class="error"></span>
					</td>
				</tr>
			</table>
			<div class="order_comment">
			<h3>Комментарии к заказу:</h3>
				<textarea>
				</textarea>
			</div>
			<input type="button" id="continued_execution" value="Расчитать заказ">
		</div>
		<div class="order_basket">

		</div>
		<?php require_once 'php/footer.php'; ?></div>
</body>
</html>