<?php require_once'top.php';
$user=$_POST['user'];
$phone=$_POST['phone'];
	if(mail("timberlands24@mail.ru", "Заказ звонка", "Имя=$user\nНомер телефона=$phone"))
		echo"Ваша просьба принята, в ближайшее время с вами свяжется наш сотрудник!";
	else
		echo"Ошибка отправления. Проверте правильность заполнения полей!";

 ?>