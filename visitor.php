<?php 
header("Content-Type: text/html; charset=utf-8");
mb_internal_encoding("UTF-8");
require_once 'php/setting_bd/bib_timberland.php';
require_once 'tabgeo_country_v4/tabgeo_country_v4.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Визиты</title>
	<style>
		table{
			margin:0 auto;
			border:1px solid black;
		}
		td,th {
			border:1px solid black;
			text-align: center; 
		}
	</style>
</head>
<body>
<form action="/visitor.php" method="POST">
	<p>Логин:<input type="text" name="log"></p>
	<p>Пароль:<input type="password" name="pas"></p>
	<input type="submit" value="отправить" name="exit_visitor">
	<?php 
	if(isset($_POST['exit_visitor'])&&isset($_POST['log'])&&isset($_POST['pas'])){
		$log=(string)$_POST['log'];
		$pas=(string)$_POST['pas'];
		if($log==="dmbgeo"&&$pas==="ddadda331"){	
		echo'<table>';
		echo'<tr>';
		echo'<th>IP</th>';
		echo'<th>SCORE</th>';
		echo'<th>DATE</th>';
		echo'<th>CANTRY</th>';
		echo'</tr>';
		$bd=new timberland();
		$result=$bd->output_visitor_user();
			for($i=0;$i<$result->num_rows;$i++){
				$block=$result->fetch_assoc();
				$ip=$block["ip_txt"];
				$score=$block["score"];
				$date=date('r',$block["date"]);
				$cantry=tabgeo_country_v4($ip);
				echo'<tr>';
				echo'<td>'.$ip.'</td>';
				echo'<td>'.$score.'</td>';
				echo'<td>'.$date.'</td>';
				echo'<td>'.$cantry.'</td>';
				echo'</tr>';
			}
			echo'</table>';
		}
	} 

	?>
</form>
</body>
</html>