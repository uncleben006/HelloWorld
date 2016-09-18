<?php
include('link.php');
session_start();
if(empty($_SESSION['account'])){
	header("Location:../user/block.php");
}
?>
