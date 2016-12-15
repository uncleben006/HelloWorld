<?php 
	include('link.php');
	include('../../include/sessionCheck.php');		
	$no = $_GET['no'];
	$sql = "SELECT * FROM `remind` WHERE `decide` = '0' AND `no` = '".$no."'";
	mysql_query("SET NAMES'UTF8'");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
	$sql = mysql_query($sql);
	
	//如果按了XX，就grade、number不變
	if(isset($_GET['xo'])){
		//把目前登入的帳號 與 帳號所在的房間 裡的判定填過(decideGrade)設成1
		$updateUser = "UPDATE `remind` SET `decideGrade` = '2' WHERE `no` = '".$no."' AND `account` = '".$_SESSION['account']."' AND `decide` = '0'";
		echo $updateUser;
		mysql_query($updateUser);
		header('location:jo.php');
	}
	while($result = mysql_fetch_assoc($sql1)){
		$account = $result['account'];
		//取得原始評價
		$selectUserAccount = mysql_query("SELECT * FROM `user` WHERE `account` = '".$account."'");
		$userAccount = mysql_fetch_assoc($selectUserAccount);
		//取得評價系統的評價
		$judge = (int)$_GET[$account];
		//兩者相加再update
		$grade = $judge+(int)$userAccount['grade'];
		$number = (int)$userAccount['number']+1;

		echo "grade:".$grade.",";
		echo "number:".$number."<br>";
		
		$updateUser = mysql_query("UPDATE `user` SET `grade`='".$grade."',`number`='".$number."' WHERE `account` = '".$account."'");
	}	
	//把目前登入的帳號 與 帳號所在的房間 裡的判定填過(decideGrade)設成1
	$updateRemind = mysql_query("UPDATE `remind` SET `decideGrade` = '2' WHERE `no` = '".$no."' AND `account` = '".$_SESSION['account']."' AND `decide` = '0'");
	header('location:jo.php');
?>