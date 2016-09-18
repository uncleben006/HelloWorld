<?php

include('link.php');

session_start();
$no = $_SESSION["no"];
$name = $_SESSION["name"];
$account = $_SESSION["account"];
$pri = $_SESSION["pri"];

if($pri!=2){
	$url = "../../index.php";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>"; 
}
else{
	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = 'ken0426';
	$DB_NAME = 'boardgame';
	$DB_TYPE = 'mysql';
	
	try{
		$DB = new PDO($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME,$DB_USER,$DB_PASS);
		$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}


?>