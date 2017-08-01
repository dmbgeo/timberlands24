<?php require_once 'php/setting_bd/bib_timberland.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Таблица с командами</title>
</head>
<body>
<table>
	<tr>
		<th>Место</th>
		<th>Команда</th>
		<th>Игр</th>
		<th>Побед</th>
		<th>Ничьи</th>
		<th>Порожении</th>
		<th>Забито</th>
		<th>прорущенно</th>
		<th>Очков</th>
		<th></th>
		<th></th>
	</tr>
	<?php 
	$bd=new timberland();
	$result=$bd->output_table_club();
	for($i=0;$i<$result->num_rows;$i++){
		$block=$result->fetch_assoc();	
		echo'<tr>
	<td>'.$block['place'].'</td>
	<td>'.$block['name'].'</td>
	<td>'.$block['games'].'</td>
	<td>'.$block['win'].'</td>
	<td>'.$block['lose'].'</td>
	<td>'.$block['draw'].'</td>
	<td>'.$block['goals_sc'].'</td>
	<td>'.$block['goals_ag'].'</td>
	<td>'.$block['points'].'</td>
	<td><a href="reg.php?id='.$block['id'].'">Редактировать</a></td>
	<td><a href="del.php?id='.$block['id'].'">Удалить</a></td>
</tr>';

	}
	
	 ?>
</table>
<a href="add.php">Добавить клуб</a>
	
</body>
</html>