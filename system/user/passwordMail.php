<meta http-equiv="content-type" content="text/html; charset=utf-8">
<?php
$email = $_POST['email'];


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
$mail->Subject = mb_encode_mimeheader('更換您的JOMO密碼', "UTF-8");

/*依填入的email，從user table抓取用戶代碼，不能是用戶帳號會有安全性問題*/
$selectUserEmail = "SELECT * FROM `user` WHERE `email` = '".$email."'";
echo $selectUserEmail;
$selectUserEmail = mysql_query($selectUserEmail);
$userEmail = mysql_fetch_assoc($selectUserEmail);

$url = 'http://localhost:8080/JOMO6/system/user/newPass.php?no='.$userEmail['no'];
$ahref = '<a href= '. $url . '>' . $url . '</a>';
$htmlurl = 
"
<!DOCTYPE html>
<html>
<head>
	<title>email</title>
</head>
<body>
	<div style=\"width:60%;margin:0 auto;background-color:#cee6f5;padding:10px;\">
		<div>".$userEmail['account']."您好</div>
		<div>請點選這個網址前往修改密碼</div>
		<div>".$ahref."</div>
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
	$url = "../../index.php";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
}

?>