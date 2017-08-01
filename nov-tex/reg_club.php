<?php require_once 'php/setting_bd/bib_timberland.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>изменить команду</title>
</head>
<body>

<?php 
	$bd=new timberland();
	$result=$bd->reg_club($_GET['id'],$_GET['place'],$_GET['name'],$_GET['games'],$_GET['win'],$_GET['sole'],$_GET['draw'],$_GET['goals_sc'],$_GET['goals_ag'],$_GET['points']);
	if($result===9)
		echo 'Команда изменена';
	else
		echo 'Ошибка изменения';
 ?>
<a href="index.php">Перейти на главную</a>
	
</body>
</html>