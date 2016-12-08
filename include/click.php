<?php
session_start();
$account = $_SESSION['account'];
$con = mysqli_connect('localhost', 'jomorcom_root', 'Jomor123','jomorcom_boardgame');
if (!$con){
 	die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con);

$sql="UPDATE `remind` SET `click`=1 WHERE `account` = '".$account."'";
$result = mysqli_query($con,$sql);

mysqli_close($con);
?> 