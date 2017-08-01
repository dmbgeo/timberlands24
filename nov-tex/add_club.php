<?php require_once 'php/setting_bd/bib_timberland.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавить команду</title>
</head>
<body>

<?php 
	$bd=new timberland();
	$result=$bd->add_club($_GET['place'],$_GET['name'],$_GET['games'],$_GET['win'],$_GET['sole'],$_GET['draw'],$_GET['goals_sc'],$_GET['goals_ag'],$_GET['points']);
	if($result)
		echo 'Команда добавлена';
	else
		echo 'Ошибка добавления';
 ?>
<a href="index.php">Перейти на главную</a>
	
</body>
</html>