<?php
include('link.php');
$judge = $_POST['judge'];
$account = $_POST['account'];
session_start();
$sql = "INSERT INTO `judge`(`judger`, `be judged`, `time`) VALUES ('".$_SESSION['account']."','".$account."','".."')"


?>