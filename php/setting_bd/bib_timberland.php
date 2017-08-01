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



	function output_visitor_user()	
	{$query="SELECT * FROM `visitors` ORDER BY `date` DESC";
	if ($results=$this->mysqli->query($query))
		return $results;
	else
		{
		$this->erorr=$this->mysqli->errno;
		return false;
		}
	}


	function output_bot_blcok()
	{$query="SELECT * FROM `product` ORDER BY `id`";
	if ($results=$this->mysqli->query($query))
		return $results;
	else
		{
		$this->erorr=$this->mysqli->errno;
		return false;
		}
	}

	function output_bot_product_article($article)	
		{$query="SELECT * FROM `product` WHERE `article`='$article'";
		if ($results=$this->mysqli->query($query))
			return $results;
		else
			{
			$this->erorr=$this->mysqli->errno;
			return false;
			}
		}

	function output_bot_product($id)	
	{$query="SELECT * FROM `product` WHERE `id`='$id'";
	if ($results=$this->mysqli->query($query))
		return $results;
	else
		{
		$this->erorr=$this->mysqli->errno;
		return false;
		}
	}

	function output_bot_comment()	
	{$query="SELECT * FROM `comments` ORDER BY `date` DESC";
	if ($results=$this->mysqli->query($query)){
		return $results;
	}
	else
		{
		$this->erorr=$this->mysqli->errno;
		return false;
		}
	}

	function add_comment($avtor,$comment,$ip)
	{$avtor=preg_replace('/[\s]{2,}/', ' ',(trim(strip_tags(stripcslashes(htmlspecialchars($avtor))))));
	 $comment=preg_replace('/[\s]{2,}/', ' ',(trim(strip_tags(stripcslashes(htmlspecialchars($comment))))));
			if($result=$this->mysqli->query("INSERT INTO `comments` (`name`, `comment`,`date`, `ip`) VALUES ('$avtor','$comment','".time()."','$ip')"))
				return $result;
			var_dump($result);
	}

function regVisitor($ip){
		$m=0;
	$id=ip2long($ip);
	if($id<0){
		$id=abs($id);
		$m=1;
		}
		$t=time();
		$result=$this->InspectionIp($id,"visitors");
		if($result->num_rows!=0){
			$this->mysqli->query("UPDATE `visitors` SET `score`=`score`+1 WHERE `ip`='$id'");
			$this->mysqli->query("UPDATE `visitors` SET `date`= '$t' WHERE `ip`='$id'");
			}
		else{
			$this->mysqli->query("INSERT INTO `visitors` (`ip`,`minus`,`ip_txt`,`score`,`date`) VALUES ('$id','$m','$ip',1,'$t')");
				}
	
	}

	function InspectionIp($ip,$table)
	{
	if ($results=$this->mysqli->query("SELECT * FROM `$table` WHERE `ip` = '$ip'"))
		return $results;
	else
		{
		$this->erorr=$this->mysqli->errno;
		return false;
		}	
	}


	function __destruct()
	{
		$this->mysqli->close();
	}

};

?>