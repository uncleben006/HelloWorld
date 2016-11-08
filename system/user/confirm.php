<!DOCTYPE html>
<html>
<head>
	<title>Confirm</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta charset="utf-8"></head>
	<link rel="icon" href="../../jomor_html/img/jomorparty_logo.png" type="image/ico" />
<body id="body0">
	<?php		
		include('../../include/link.php');
		header("Content-Type:text/html; charset=utf-8");
		$no = $_GET["no"];
		$setSQL = "UPDATE `user` SET `pri`='1' WHERE `no`='".$no."'";
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
		include('../../include/userHeader.php');
	?>
	<section>
		<div class="receive_div">
			<div class="receive_bg">
				<div class="receive_white">
					<div class="receive_p_div">
						<h1 class="receive_p">快完成了！</h1>
					</div>
					<hr color="#A0920D" size="3" width="95%">
					<div class="receive_p3">
						<p>您已完成第二階段的註冊，</p>
						<p>可以使用<font style="color: #EA6363">揪團系統</font>等更多功能</p>
					</div>
					<div class="receive_text_img"><!--注意圖-->
						<img src="../../jomor_html/img/attention.png" class="attention_img">
					</div>
					<div class="receive_p3">
						<p>現在的帳號是一個權力完整的帳號。</p>
						<p>同一個信箱只能用來註冊一次，帳號不能重複註冊，亦不能刪除</p>
						<p>所以請使用者對自己的帳號負起行為和語言責任</p>
					</div>
					<div class="receive_bt_div">
						<a href="../../index.php" class="receive_bt">確認</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>