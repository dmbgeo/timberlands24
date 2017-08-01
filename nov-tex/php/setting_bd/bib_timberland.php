<? require_once'setting.php';
class timberland
{ var $mysqli; 
  var $erorr;
	function __construct()
	{$this->mysqli=@new mysqli($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'],$GLOBALS['bd']);
	if($this->mysqli->connect_errno)
		{printf("Failed to connect: %s\n", $this->mysqli->connect_error);
    	exit();
		}
	if (!$this->mysqli->set_charset("utf8"))
		echo 'encoding installation error';
	if(!$this->mysqli->query("SET NAMES UTF8"))
		echo 'encoding installation error';
	}




	function output_table_club()
	{$query="SELECT * FROM `england` ORDER BY `id`";
	if ($results=$this->mysqli->query($query))
		return $results;
	else
		{
		$this->erorr=$this->mysqli->errno;
		return false;
		}
	}

	function out_club($id)
	{$query="SELECT * FROM `england` WHERE `id`=$id";
	if ($results=$this->mysqli->query($query))
		return $results;
	else
		{
		$this->erorr=$this->mysqli->errno;
		return false;
		}
	}

	function delete_club($id)
	{$query="DELETE FROM `england` WHERE `id`=$id";
	if ($results=$this->mysqli->query($query))
		return $results;
	else
		{
		$this->erorr=$this->mysqli->errno;
		return false;
		}
	}
	
function reg_club($id,$place,$name,$games,$win,$lose,$draw,$goals_sc,$goals_ag,$points)
	{
			if($result=$this->mysqli->query("UPDATE `england` SET `place`='$place' WHERE `id`='$id'"))
				$i++;
			if($result=$this->mysqli->query("UPDATE `england` SET `name`='$name' WHERE `id`='$id'"))
				$i++;
			if($result=$this->mysqli->query("UPDATE `england` SET `games`='$games' WHERE `id`='$id'"))
				$i++;
			if($result=$this->mysqli->query("UPDATE `england` SET `win`='$win' WHERE `id`='$id'"))
				$i++;
			if($result=$this->mysqli->query("UPDATE `england` SET `lose`='$lose' WHERE `id`='$id'"))
				$i++;
			if($result=$this->mysqli->query("UPDATE `england` SET `draw`='$draw' WHERE `id`='$id'"))
				$i++;
			if($result=$this->mysqli->query("UPDATE `england` SET `goals_sc`='$goals_sc' WHERE `id`='$id'"))
				$i++;
			if($result=$this->mysqli->query("UPDATE `england` SET `goals_ag`='$goals_ag' WHERE `id`='$id'"))
				$i++;
			if($result=$this->mysqli->query("UPDATE `england` SET `points`='$points' WHERE `id`='$id'"))
				$i++;
		return $i;
	}


function add_club($place,$name,$games,$win,$lose,$draw,$goals_sc,$goals_ag,$points)
	{
			if($result=$this->mysqli->query("INSERT INTO `england` (`place`,`name`,`games`,`win`,`lose`,`draw`,`goals_sc`,`goals_ag`,`points`) VALUES ('$place','$name','$games','$win','$lose','$draw','$goals_sc','$goals_ag','$points')"))
				return $result;
	}


	function __destruct()
	{
		$this->mysqli->close();
	}

};

?>