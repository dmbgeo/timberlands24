<?php 
require_once 'top.php';
require_once'mailshablon/basket.php';
require_once"phpmail/PHPMailerAutoload.php";
	
	$typeDel=intval($_POST["typeDel"]);
	$paymentMethod=intval($_POST["paymentMethod"]);
		if($typeDel===1)
			$typeDel="Доставка по Москве";
		else
			$typeDel="Доставка по МО";
	if($paymentMethod===1)
		$paymentMethod="Оплата наличными курьеру";
	else
		$paymentMethod="Денежный перевод";
$operator_msg='<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Заказ на timberlands24</title>

</head>
<body>
	<p style="font-size:18px;color:red;text-align:center;display:block;">
	Данные заказа:
	<br>
	почта:'.$_POST['email'].'
	<br>
	Имя:'.$_POST['name'].'
	<br>
	Фамилия:'.$_POST['surname'].'
	<br>
	Адрес:'.$_POST['address'].'
	<br>
	Дополнительный адрес:'.$_POST['addressAdd'].'
	<br>
	Город:'.$_POST['city'].'
	<br>
	Телефон:'.$_POST['phone'].'
	<br>
	Тип доставки:'.$typeDel.'
	<br>
	Способ оплаты:'.$paymentMethod.'
	<br>
	Комментарии к заказу:
	<br>
	'.$_POST['commentOrder'].'
	</p>
	<div class="basket">
	'.$basket_page.'<br>
	</div>
</body>
</html>'; 
	$client_msg='<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Заказ на timberlands24</title>
</head>
<body>
	<p style="font-size:18px;color:red;text-align:center;display:block;">
	'.$_POST['name'].' '.$_POST['surname'].' здравствуйте, вы оформили заказ на сайте <a href="https://timberlands24.ru">timberlands24.ru</a><br> 
	в ближайшее время с вами свяжется оператор для подтверждения заказа.<br>
	Спасибо за ваш заказ.<br> 
	это письмо сформированна автоматически.<br>
	По всем вопросам пишите на почту timberlands24@mail.ru.</p>
	<div class="basket">
	'.$basket_page.'<br>
	</div>
</body>
</html>'; 
$mail = new PHPMailer();
$mail->setFrom('ifno@timberlands24.ru', 'First Last');
$mail->AddAddress($_POST['email']);  // кому
$mail->CharSet = 'UTF-8'; // понятно кодировка
// $mail->AddAttachment("file_adress", 'file_name'); // Присоединить файл если нужно
$mail->IsHTML(true); // установка флага что это HTML
$mail->Subject = 'Заказ в интернет магазине timberlands24.ru';
$mail->Body =  $client_msg;
//отправить
if(!$mail->Send())
	echo "Ошибка отправки сообшения Проверте введенные данные: " . $mailer->ErrorInfo;
else
	echo "Ваш заказ принят в обработку, в ближайшее время с вами свяжется оператор для потверждения заказа!";
	

$mail_admin = new PHPMailer();
$mail_admin->setFrom('ifno@timberlands24.ru', 'First Last');
$mail_admin->AddAddress('timberlands24@mail.ru');  // кому
$mail_admin->CharSet = 'UTF-8'; // понятно кодировка
// $mail->AddAttachment("file_adress", 'file_name'); // Присоединить файл если нужно
$mail_admin->IsHTML(true); // установка флага что это HTML
$mail_admin->Subject = 'Заказ в интернет магазине timberlands24.ru';
$mail_admin->Body =  $operator_msg;
//отправить

// if(!$mail->Send())
// 	echo "Ошибка отправки сообшения Проверте введенные данные: " . $mailer->ErrorInfo;
// else
// 	echo "Ваш заказ принят в обработку, в ближайшее время с вами свяжется оператор для потверждения заказа!";
	

?> 
