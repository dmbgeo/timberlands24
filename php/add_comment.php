<?php 
require_once 'top.php'; 
$ip=$_SERVER["REMOTE_ADDR"];
$avtor=$_POST["avtor"];
$comment=$_POST["comment"];
if($bd->add_comment($avtor,$comment,$ip))
	echo "Спасибо за ваш коментарии!";
?>