<?php
header("Content-Type:text/html; charset=utf-8");
require '../../include/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = false; // authentication enabled
$mail->SMTPSecure = false; // secure transfer enabled REQUIRED for Gmail
$mail->Host = 'localhost';
$mail->Port = 25; // 465 or 587
$mail->IsHTML(true);
$mail->Username = "ics.jomorparty@gmail.com";
$mail->Password = "Jomorparty";
$mail->SetFrom("ics.jomorparty@gmail.com");
$mail->Subject = mb_encode_mimeheader('A message from JOMO', "UTF-8");

//先insert進remind，再用while迴圈從remind table提取各個資料出來
$selectRemind = "SELECT * FROM `remind` WHERE `no` = ".$no." AND `decide` = '2'";
$selectRemind = mysql_query($selectRemind);
while($remind = mysql_fetch_assoc($selectRemind)){
	$email = $remind['email'];
	$date = date("m/d",strtotime($remind['date']));
	$time = date("H/i",strtotime($remind['time']));

	$selectUserAccount = "SELECT * FROM `user` WHERE `account` = '".$remind['account']."'";
	mysql_query("SET NAMES'UTF8'");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
	$selectUserAccount = mysql_query($selectUserAccount);
	$userAccount = mysql_fetch_assoc($selectUserAccount);

	$htmlurl = 
	"
	<!DOCTYPE html>
	<html>
	<head>
		<title>email</title>
	</head>
	<body>
		<div style=\"width:60%;margin:0 auto;background-color:#cee6f5;padding:10px;\">
			<div>".$userAccount['name']."您好</div>
			<div>您參加的房間已經被房主「".$remind['host']."」刪除</div>
			<div>時間是".$date." ".$time."</div>
			<div>地點是".$remind['store']."</div>
			<div>不要再跑過去囉~</div>
		</div>
	</body>
	</html>
	";
	$mail->Body = $htmlurl;
	$mail->AddAddress($email);

	if(!$mail->Send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else{
		echo "Message has been sent";
		$url = "jo.php?";
		echo "<script type='text/javascript'>";
		echo "window.location.href='$url'";
		echo "</script>";
		//clearAddresses才不會有重複寄信的問題
		$mail->clearAddresses($email);
	}
}

?>