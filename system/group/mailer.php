<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
include('link.php');
$no=$_GET['no'];

header("Content-Type:text/html; charset=utf-8");
require './PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465; // 465 or 587
$mail->IsHTML(true);
$mail->Username = "uncleben006@gmail.com";
$mail->Password = "a102070017";
$mail->SetFrom("uncleben006@gmail.com");
$mail->Subject = '您有新揪團';//email的主旨


$url = 'http://localhost:8080/JOMO/system/group/showRoomData.php?no='.$no;
$ahref = '<a href= '. $url . '>' . $url . '</a>';
/*
$htmlurl = '<table><tr><td>welcome and please link the following url</td><td>' . $ahref . '</td></tr></table>';
*/
$selectRemind = "SELECT * FROM `remind` WHERE `no` = ".$no."";
echo $selectRemind;
$selectRemind = mysql_query($selectRemind);
while($remind = mysql_fetch_assoc($selectRemind)){
	$email = $remind['email'];
	$htmlurl = $remind['account']."您好<br>您參加了一次揪團，<br>時間是".$remind['time']."&nbsp 地點是".$remind['store']."<br>更多詳細資訊請看".$ahref;
	$mail->Body = $htmlurl;
	$mail->AddAddress($email);
	
	if(!$mail->Send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} 
	else{
		echo "Message has been sent";
		$url = "showRoomData.php?no=$no";
		echo "<script type='text/javascript'>";
		echo "window.location.href='$url'";
		echo "</script>";
	}
}
//header("Location:showRoomData.php?no=".$no);

?>