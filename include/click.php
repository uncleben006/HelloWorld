<?php
session_start();
$account = $_SESSION['account'];
$con = mysqli_connect('localhost', 'jomorcom_root', 'Jomor123','jomorcom_boardgame');
if (!$con){
 	die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con);
//一般會員看，判定為1
$sql1="UPDATE `remind` SET `click`=1 WHERE `account` = '".$account."'";
mysqli_query($con,$sql1);
//若是房主看的話就變成判定為2
$sql2 = "UPDATE `remind` SET `click`=2 WHERE `host` = '".$account."'AND `decide` = '3'";
mysqli_query($con,$sql2);

mysqli_close($con);
?> 