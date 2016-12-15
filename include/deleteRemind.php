<?php
include('link.php');
session_start();
$account = $_SESSION['account'];
//若按xx，傳提醒的號碼過來並刪除
if(isset($_GET['num'])){
	$num = $_GET['num'];
	$sql="DELETE FROM `remind` WHERE `num` = '".$num."'";
	mysql_query($sql);
}
//若按清除全部停醒
if(isset($_GET['all'])){
	$sql="DELETE FROM `remind` WHERE `account` = '".$account."' OR (`host` = '".$account."' AND `decide` = '3') ";
	mysql_query($sql);
}
?> 
<script type="text/javascript">
	window.history.back()
</script>