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
$pri = '0';

$imgFile = $_FILES['pic']['name'];//取得FILE名稱
$tmp_dir = $_FILES['pic']['tmp_name'];//把FILE路徑暫存入一個tmp檔
$imgSize = $_FILES['pic']['size'];//取得FILE大小

if(empty($imgFile)!=TRUE){//這裡不知道為什麼用isset不行
	$upload_dir = 'photo/'; // upload directory
	
	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension，回傳圖片的檔案型態(.jpg/.png)(extension:延伸部分)
		
	// valid image extensions(有效圖片型態)
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); //宣告有效的檔案型態
		
	//重新命名上傳的圖片
	$userpic = rand(1000,1000000).".".$imgExt; //產生文件名稱並指定給$userpic
				
	// allow valid image file formats
	if(in_array($imgExt, $valid_extensions)){ //若在$imgExt裡有$valid_extensions的檔案型態的話，就執行			
		// Check file size '5MB' 
		if($imgSize < 5000000){
			move_uploaded_file($tmp_dir,$upload_dir.$userpic); //把tmp暫存檔存入指定位置($upload_dir+$userpic)(位置加檔名)
		}
		else{
			$errMSG = "呀啊啊啊~太大了啦~人家受不了啦~我是指檔案";
		}
	}
	else{
		$errMSG = "抱歉...我只喜歡附檔名是JPG, JPEG, PNG或GIF";		
	}
}
else if(empty($imgFile)){
	$userpic = "fuck-you.png";
}

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
for($i=0;$i<2;$i++)//產生亂碼no
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
$_SESSION["photo"] = $userpic;//把產生的亂數圖片檔名做成session，好之後傳入資料庫。
$_SESSION["errMSG"] = $errMSG;

$sql = "SELECT * FROM `user` WHERE `account`='".$account."'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);


//value1=除了密碼之外其他都顯示
//value2=除了密碼信箱之外其他都顯示
//wrong1,2,3分別顯示:密碼未重複,email未正確填寫,帳號已有人填過
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
else if(isset($errMSG)){
	$url = "signup.php?value=1&wrong=4";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
}
else{
	$url = 'http://localhost:8080/JOMO/system/user/confirm.php?no='.$no;
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
