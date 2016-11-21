<?php
	header("Content-Type:text/html; charset=utf-8");

	include('../../include/link.php');
	$name = $_GET["name"];
	$email = $_GET["email"];
	$no = $_GET['id'];
	/*
	$photo = http_build_query($_GET);
	$photo = substr($photo, strlen("name='".$name."'"));
	$photo = substr($photo, strlen("&email='".$email."'"));
	$photo = substr($photo, strlen("&id='".$_GET['id']."'"));
	$photo = substr($photo, strlen("&picture="));
	*/
	$picture = $_GET['picture'];
	$oe = $_GET['oe'];
	$photo = $picture."&oe=".$oe;
	echo $photo;
	$selectUserNo = "SELECT * FROM `user` WHERE `no` = '".$no."'";
	$selectUserNo = mysql_query($selectUserNo);
	$userNo = mysql_fetch_assoc($selectUserNo);
	//若沒有用FB註冊過，則把資料匯入資料庫，並產生session
	if(empty($userNo['no'])){
		$getAllrowsSQL="SELECT COUNT(*) FROM user";
		$runSQL=mysql_query($getAllrowsSQL);
		$Allrows=mysql_fetch_assoc($runSQL);
		$nowRow=$Allrows["COUNT(*)"]+1;
		//產生亂數帳號
		$account = 'fbuser' . $nowRow;
		for($i=0;$i<2;$i++){
			$j = rand(1,26);
			switch($j){
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
			$account.=$j;
		}
		//產生亂數密碼
		$pass  = 'pass';
		for($i=0;$i<2;$i++){
			$j = rand(1,26);
			switch($j){
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
			$pass.=$j;
		}
		$pri = '2';
		$introduction = "這是一個FB用戶";
		$setSQL = 'INSERT INTO `user`(`no`, `pri`, `account`, `password`, `name`, `email`, `introduction`,`photo`) VALUES ("'.$no.'","'.$pri.'","'.$account.'","'.$pass.'","'.$name.'","'.$email.'","'.$introduction.'","'.$photo.'")';
		mysql_query("SET NAMES'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
		mysql_query($setSQL);
		session_set_cookie_params(600);
		session_start();
		$_SESSION["no"] = $no;
		$_SESSION["pri"] = $pri;
		$_SESSION["account"] = $account;
		$_SESSION["pass"] = $pass;
		$_SESSION["name"] = $name;
		$_SESSION["email"] = $email;
		$_SESSION["introduction"] = $introduction;
		$_SESSION["photo"] = $photo;
		header('Location:../../index.php');
	}
	//若有，則從資料庫以name抓取產生session
	else{
		session_set_cookie_params(600);
		session_start();
		$_SESSION["no"] = $userNo['no'];
		$_SESSION["pri"] = $userNo['pri'];
		$_SESSION["account"] = $userNo['account'];
		$_SESSION["pass"] = $userNo['pass'];
		$_SESSION["name"] = $userNo['name'];
		$_SESSION["email"] = $userNo['email'];
		$_SESSION["introduction"] = $userNo['introduction'];
		$_SESSION["photo"] = $userNo['photo'];
		header('Location:../../index.php');
	}
?>
	