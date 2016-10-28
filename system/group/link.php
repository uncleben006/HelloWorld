<?php
$user = 'jomorcom_root';
$pass = 'Jomor123';
$host = 'localhost';

$link = mysql_connect($host, $user, $pass);

if(!$link)
{
	die('can not connect to MySQL' . mysql_errno());	
}

$database = "jomorcom_boardgame";
$db_select = mysql_select_db($database);

if(!$db_select)
{
	die('can not connect to ' . $database . ' ' . mysql_errno());	
}
?>