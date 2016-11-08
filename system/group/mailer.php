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



$selectRemind = "SELECT * FROM `remind` WHERE `no` = ".$no." AND `decide` = '0'";
$selectRemind = mysql_query($selectRemind);
while($remind = mysql_fetch_assoc($selectRemind)){

	$url = 'http://www.jomorparty.com/system/group/jo.php?no='.$no;
	$ahref = '<a href= '. $url . '>' . $url . '</a>';	
	$email = $remind['email'];	
	$date = date("m/d",strtotime($remind['date']));
	$time = date("H:i",strtotime($remind['time']));
	$htmlurl = 
	"
		<!DOCTYPE html>
		<html>
		<head>
			<title>email</title>
		</head>
		<body>
			<div style=\"width:60%;margin:0 auto;background-color:#cee6f5;padding:10px;\">
				<div>".$remind['account']."您好</div>
				<div>您參加了一次揪團</div>
				<div>時間是".$date." ".$time."</div>
				<div>地點是".$remind['store']."</div>
				<div>共多詳細資訊請看".$ahref."</div>
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
		$url = "jo.php?no=$no";
		echo "<script type='text/javascript'>";
		echo "window.location.href='$url'";
		echo "</script>";
		//clearAddresses才不會有重複寄信的問題
		$mail->clearAddresses($email);
	}		
}


?>