<?php
include('link.php');
session_start();
if(empty($_SESSION['account'])){
	header("Location:http://localhost:8080/JOMO/system/user/block.php");
}
?>
