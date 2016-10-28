<?php

include('link.php');

session_start();
$no = $_SESSION["no"];
$name = $_SESSION["name"];
$account = $_SESSION["account"];
$pri = $_SESSION["pri"];

if(empty($account)){
	$url = "../../index.php";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>"; 
}

else {
	$user = 'jomorcom_root';
	$pass = 'Jomor123';
	$host = 'localhost';

	$link = mysql_connect($host, $user, $pass);

	if(!$link){
		die('can not connect to MySQL' . mysql_errno());	
	}

	$database = "boardgame";
	$db_select = mysql_select_db($database);

	if(!$db_select){
		die('can not connect to ' . $database . ' ' . mysql_errno());	
	}
}
?>