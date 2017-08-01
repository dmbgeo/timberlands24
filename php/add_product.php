<?php
if(isset($_POST['update_basket'])){
	if(isset($_COOKIE['products'])){
		$products=unserialize($_COOKIE['products']);
	 	$n=count($products);
	 	echo $n;
	 }
	 else
	 	echo "0";
}

if(isset($_POST['id'])&&isset($_POST['size'])){
$id=intval($_POST['id']);
$size=intval($_POST['size']);
	if(!isset($_COOKIE['products'])){
		$products = array();
		$products[0]["id"]=$id;
		$products[0]["size"]=$size;
		setcookie("products",serialize($products),0,"/");
	}
	else{
	 	$products=unserialize($_COOKIE['products']);
	 	$n=count($products);
	 	$products[$n]["id"]=$id;
	 	$products[$n]["size"]=$size;
	 	setcookie("products","",time()-36000,"/");
	 	setcookie("products",serialize($products),0,"/");
	}
	echo $n;
}
if(isset($_POST['del'])){
	$del=intval($_POST['del']);
	if($del>=0){
	 	$products=unserialize($_COOKIE['products']);
	 	$n=count($products);
	 	unset($products[$del]);
	 	sort($products);
	 	setcookie("products","",time()-36000,"/");
	 	setcookie("products",serialize($products),0,"/");
	 }
	 else{	 		
	 	$products=unserialize($_COOKIE['products']);
	 	$n=count($products);
	 	unset($products);
	 	// sort($products);
	 	$n=count($products);
	 	setcookie("products","",time()-36000,"/");
	 	setcookie("products",serialize($products),0,"/");
	 }
}

	

 ?>