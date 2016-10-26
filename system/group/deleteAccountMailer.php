<?php
header("Content-Type:text/html; charset=utf-8");
require '../../include/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465; // 465 or 587
$mail->IsHTML(true);
$mail->Username = "ics.jomorparty@gmail.com";
$mail->Password = "Jomorparty";
$mail->SetFrom("ics.jomorparty@gmail.com");
$mail->Subject = mb_encode_mimeheader('您有新揪團 from JOMO', "UTF-8");


$url = 'http://localhost:8080/JOMO/system/group/jo.php?no='.$no;
$ahref = '<a href= '. $url . '>' . $url . '</a>';

$selectRemind = "SELECT * FROM `remind` WHERE `account` = '".$account."' AND `decide` = 1";
mysql_query("SET NAMES'UTF8'");
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
echo $selectRemind;
$selectRemind = mysql_query($selectRemind);
$remind = mysql_fetch_assoc($selectRemind);
$date = date("m/d",strtotime($remind['date']));
$time = date("H/i",strtotime($remind['time']));

$selectUserAccount = "SELECT * FROM `user` WHERE `account` = '".$remind['account']."'";
mysql_query("SET NAMES'UTF8'");
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
echo $selectUserAccount;
$selectUserAccount = mysql_query($selectUserAccount);
$userAccount = mysql_fetch_assoc($selectUserAccount);
$email = $userAccount['email'];

$htmlurl = 
"
<!DOCTYPE html>
<html>
<head>
	<title>email</title>
</head>
<body>
	<div style=\"width:60%;margin:0 auto;background-color:#cee6f5;padding:10px;\">
		<div>".$userAccount['name']." 您好</div>
		<div>您剛剛被「".$remind['host']."」踢出了房間</div>
		<span>房名是「".$remind['room']."」</span>
		<div>房間開始時間是".$date." ".$time."</div>
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
}

?>