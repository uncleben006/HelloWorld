<?php
include('link.php');
session_start();
$no = $_SESSION["no"];	
$pri = $_SESSION["pri"];
$account = $_SESSION["account"];
$pass = $_SESSION["pass"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$introduction = $_SESSION["introduction"];

$setSQL = 'INSERT INTO `user`(`no`, `pri`, `account`, `password`, `name`, `email`, `introduction`) VALUES ("'.$no.'","'.$pri.'","'.$account.'","'.$pass.'","'.$name.'","'.$email.'","'.$introduction.'")';
echo $setSQL;
mysql_query("SET NAMES'UTF8'");
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
//上面三行mysql_query是為了資料存入SQL時轉UTF8
mysql_query($setSQL);

$url = "inform.php?situation=1";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
?>