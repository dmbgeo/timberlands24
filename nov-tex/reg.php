<?php require_once 'php/setting_bd/bib_timberland.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавить команду</title>
</head>
<body>
<form action="reg_club.php" method="GET">
<table>
	<tr><th>id:</th>
		<th>Место:</th>
		<th>Команда:</th>
		<th>Игр:</th>
		<th>Побед:</th>
		<th>Ничьи:</th>
		<th>Порожении:</th>
		<th>Забито:</th>
		<th>прорущенно:</th>
		<th>Очков:</th>
	</tr>
	<tr>
	<?php if(isset($_GET['id'])){
	$bd=new timberland();
	$result=$bd->out_club($_GET['id']);
	$block=$result->fetch_assoc();
	echo'<td><input type="number" value="'.$block['id'].'" name="id"></td>
		<td><input type="number" value="'.$block['place'].'" name="place"></td>
		<td><input type="text" value="'.$block['name'].'" name="name"></td>
		<td><input type="number" value="'.$block['games'].'" name="games"></td>
		<td><input type="number" value="'.$block['win'].'" name="win"></td>
		<td><input type="number" value="'.$block['sole'].'" name="sole"></td>
		<td><input type="number" value="'.$block['draw'].'" name="draw"></td>
		<td><input type="number" value="'.$block['goals_sc'].'" name="goals_sc"></td>
		<td><input type="number" value="'.$block['goals_ag'].'" name="goals_ag"></td>
		<td><input type="number" value="'.$block['points'].'" name="points"></td>';
	} ?>
	</tr>
</table>
<input type="submit" value="изменить">
</form>	
<a href="index.php">Перейти на главную</a>
</body>
</html>