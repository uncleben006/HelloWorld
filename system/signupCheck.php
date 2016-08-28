<?php
header("Content-Type:text/html; charset=utf-8");
//建立session並製作no亂碼

include('link.php');
include('mailer.php');

$account = $_POST["account"];
$pass = $_POST["pass"];
$repass = $_POST["repass"];
$name = $_POST["name"];
$email = $_POST["email"];
$introduction = $_POST["introduction"];
$pic = $_POST["pic"];
$pri = 0;

$getAllrowsSQL="SELECT COUNT(*) FROM user";
$runSQL=mysql_query($getAllrowsSQL);
$Allrows=mysql_fetch_assoc($runSQL);
$nowRow=$Allrows["COUNT(*)"]+1;
if(strlen($nowRow)==1)
	$no = '00' . $nowRow;
else if(strlen($nowRow)==2)
	$no = '0' . $nowRow;
else
	$no = $nowRow;
for($i=0;$i<2;$i++)
{
	$j = rand(1,26);
	switch($j)
	{
		case 1:
			$j = 'A';
			break;
		case 2:
			$j = 'B';
			break;
		case 3:
			$j = 'C';
			break;
		case 4:
			$j = 'D';
			break;
		case 5:
			$j = 'E';
			break;
		case 6:
			$j = 'F';
			break;
		case 7:
			$j = 'G';
			break;
		case 8:
			$j = 'H';
			break;
		case 9:
			$j = 'I';
			break;
		case 10:
			$j = 'J';
			break;
		case 11:
			$j = 'K';
			break;
		case 12:
			$j = 'L';
			break;
		case 13:
			$j = 'M';
			break;
		case 14:
			$j = 'N';
			break;
		case 15:
			$j = 'O';
			break;
		case 16:
			$j = 'P';
			break;
		case 17:
			$j = 'Q';
			break;
		case 18:
			$j = 'R';
			break;
		case 19:
			$j = 'S';
			break;
		case 20:
			$j = 'T';
			break;
		case 21:
			$j = 'U';
			break;
		case 22:
			$j = 'V';
			break;
		case 23:
			$j = 'W';
			break;
		case 24:
			$j = 'X';
			break;
		case 25:
			$j = 'Y';
			break;
		case 26:
			$j = 'Z';
			break;
	}
	$no.=$j;
}

session_set_cookie_params(600);
session_start();
$_SESSION["no"] = $no;
$_SESSION["pri"] = $pri;
$_SESSION["account"] = $account;
$_SESSION["pass"] = $pass;
$_SESSION["repass"] = $repass;
$_SESSION["name"] = $name;
$_SESSION["email"] = $email;
$_SESSION["introduction"] = $introduction;
$_SESSION["pic"] = $pic;

$sql = "SELECT * FROM `user` WHERE `account`='".$account."'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

if($pass!=$repass){
	$url = "signup.php?value=1&wrong=1";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
}
else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){//判斷有沒有email欄位@
  	$url = "signup.php?value=2&wrong=2";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
}
else if(isset($row["account"])){//判斷帳號重複
	$url = "signup.php?value=1&wrong=3";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
}
else{
	$url = 'http://localhost:8080/JOMO/system/confirm.php?no='.$no;
	$ahref = '<a href= '. $url . '>' . $url . '</a>';
	/*
	$htmlurl = '<table><tr><td>welcome and please link the following url</td><td>' . $ahref . '</td></tr></table>';
	*/
	$htmlurl = $name.'您好:<br>歡迎註冊桌末狂歡，請點入此連結以驗證您的會員資格<br>Welcome to JOMOR. Please link the following url to confirm your account.<br>'.$ahref;
	$mail->Body = $htmlurl;
	$mail->AddAddress($email);

	 if(!$mail->Send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	 } else {
	    echo "Message has been sent";
	    $url = "userUpdate.php";
		echo "<script type='text/javascript'>";
		echo "window.location.href='$url'";
		echo "</script>";
	 }
}
?>
<!--<a href="logout.php"><button>清除session回首頁</button></a>-->
<h1>顯示了這個畫面表示系統並未成功寄出認證信。</h1>
