<?php require_once 'php/setting_bd/bib_timberland.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Таблица с командами</title>
</head>
<body>

	<?php 
	if(isset($_GET['id']))
	$bd=new timberland();
	if($result=$bd->delete_club($_GET['id']))
		echo 'Команда удалена';
	else
		echo 'Ошибка удаления';
	 ?>
<a href="index.php">Перейти на главную</a>
	
</body>
</html>