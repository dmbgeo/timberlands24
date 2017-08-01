<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавить команду</title>
</head>
<body>
<form action="add_club.php" method="GET">
<table>
	<tr>
		<td>Место:</td>
		<td><input type="number" name="place"></td>
	</tr>
	<tr>	
		<td>Команда:</td>
		<td><input type="text" name="name"></td>
	</tr>
	<tr>	
		<td>Игр:</td>
		<td><input type="number" name="games"></td>
	</tr>	
	<tr>	
		<td>Побед:</td>
		<td><input type="number" name="win"></td>
	</tr>	
	<tr>	
		<td>Ничьи:</td>
		<td><input type="number" name="sole"></td>
	</tr>	
	<tr>	
		<td>Порожении:</td>
		<td><input type="number" name="draw"></td>
	</tr>	
	<tr>	
		<td>Забито:</td>
		<td><input type="number" name="goals_sc"></td>
	</tr>	
	<tr>	
		<td>прорущенно:</td>
		<td><input type="number" name="goals_ag"></td>
	</tr>	
	<tr>	
		<td>Очков:</td>
		<td><input type="number" name="points"></td>
	</tr>
</table>
<input type="submit" value="Добавить">
</form>	
<a href="index.php">Перейти на главную</a>
</body>
</html>