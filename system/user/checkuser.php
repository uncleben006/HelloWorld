<?php
// 1 是代表user，例如setSQL1、result1
// 2 是代表admin，例如setSQL2、result2

include('../../include/link.php');
include('../../include/sessionCheck.php');
mysql_query("SET NAMES'UTF8'");
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");

//上面三行mysql_query是為了資料存入SQL時轉UTF8

$account = $_POST["account"];
$pass = $_POST["password"];

//這支程式要嘛搜尋到 user 要嘛搜尋到 admin 然後產生 session

$setSQL1 = "SELECT * FROM `user` WHERE `account` = '".$account."'";
$result1 = mysql_query($setSQL1);
$row1 = mysql_fetch_assoc($result1);

$setSQL2 = "SELECT * FROM `admin` WHERE `account` = '".$account."'";
$result2 = mysql_query($setSQL2);
$row2 = mysql_fetch_assoc($result2);
if (isset($row1["account"])){
	session_set_cookie_params(600);
	//session_start();
	$_SESSION["no"] = $row1["no"];
	$_SESSION["pri"] = $row1["pri"];
	$_SESSION["account"] = $row1["account"];
	$_SESSION["password"] = $row1["password"];
	$_SESSION["name"] = $row1["name"];
	$_SESSION["email"] = $row1["email"];
	$_SESSION["photo"] = $row1["photo"];
	$_SESSION["introduction"] = $row1["introduction"];
	session_write_close();
	header("Location:../../index.php");
}
else if(isset($row2["account"])){
	session_set_cookie_params(600);
	//session_start();
	$_SESSION["no"] = $row2["no"];
	$_SESSION["pri"] = $row2["pri"];
	$_SESSION["account"] = $row2["account"];
	$_SESSION["password"] = $row2["password"];
	$_SESSION["name"] = $row2["name"];
	$_SESSION["email"] = $row2["email"];
	$_SESSION["photo"] = $row2["photo"];
	$_SESSION["introduction"] = $row2["introduction"];
	session_write_close();
	header("Location:../../index.php");
} 
else{
	header("Location:../../include/block.php?situation=2");
}
/*
$url = "../../index.php";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>"; 
*/

?>
