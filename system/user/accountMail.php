<meta http-equiv="content-type" content="text/html; charset=utf-8">
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
$mail->Username = "uncleben006@gmail.com";
$mail->Password = "a102070017";
$mail->SetFrom("uncleben006@gmail.com");
$mail->Subject = mb_encode_mimeheader('確認JOMO的帳號', "UTF-8");//email的主旨

?>