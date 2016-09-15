<!DOCTYPE html>
<html>
<head>
	<title>Confirm</title>
	<meta charset="utf-8">

	<style type="text/css">
		.frame{
			width: 720px;
			margin-right: auto;
			margin-left: auto;
			padding-top: 20px;
		}
		input[type="text"],input[type="password"]{
			border-color:#bdc5d0;
		}
		div{
			margin-top: 5px;
		}
		table{
			height: 80px;
		}
		
	</style>

</head>
<body>
	<div class="frame">
		<?php
		header("Content-Type:text/html; charset=utf-8");
		include('link.php');

		$no = $_GET["no"];
		$setSQL = "UPDATE `user` SET `pri`='1' WHERE `no`='".$no."'";
		echo $setSQL;
		mysql_query("SET NAMES'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
		mysql_query($setSQL);


		//功能:從資料庫抓取該用戶的資料並產生session
		//目的:避免用戶因為隔太久未驗證導致session消失的狀況，確保index.php的linkdb.php一定能取得session
		$setSQL1 = "SELECT * FROM `user` WHERE `no` = '".$no."'";
		$result1 = mysql_query($setSQL1);
		$row1 = mysql_fetch_assoc($result1);

		session_set_cookie_params(600);
		session_start();
		$_SESSION["no"] = $row1["no"];
		$_SESSION["pri"] = $row1["pri"];
		$_SESSION["account"] = $row1["account"];
		$_SESSION["password"] = $row1["password"];
		$_SESSION["name"] = $row1["name"];
		$_SESSION["email"] = $row1["email"];
		$_SESSION["introduction"] = $row1["introduction"];
		session_write_close();
		echo '<h1>驗證完成</h1><br>';
		echo '你已經信箱驗證並開通了你的帳號，現在你帳號擁有更多的權限<br>';
		echo '<a href="http://localhost:8080/JOMO/index6.php"><button>好的非常感謝</button></a>';
		?>
	</div>
	
</body>
</html>