<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta charset="utf-8">
</head>
	<body id="body0">
		<?php 
		header("Content-Type:text/html; charset=utf-8");
		include('link.php');
		include('../../include/sessionCheck.php');
		$account = $_GET['account'];

		$selectUserAccount = "SELECT * FROM `user` WHERE `account` = '".$account."'";
		mysql_query("SET NAMES'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
		$selectUserAccount = mysql_query($selectUserAccount);
		$userAccount = mysql_fetch_assoc($selectUserAccount);
		include('../../include/groupHeader.php');
		?>
		<section>
			<div class="individual_bg">
			<!--左邊欄位的頭像白框-->
				<div class="aside_l">
					<div class="individual_head_ph_div">
						<span class="individual_head_ph_img_span">
							<img src="../user/photo/<?php echo $userAccount['photo'] ?>" class="individual_head_ph_img">
						</span>
					</div>
					<div class="individual_score">
						<p>zxcvb1234</p>
						<p>評價：5分</p>
					</div>
					<hr color="#4EBABF" size="5" width="95%">
					<div class="aboutme">
						<p class="aboutme_p">關於我</p>
						<p class="aboutme_introduce"><?php echo $userAccount['introduction'] ?></p>
					</div>
				</div>
			<!--右邊欄位的第一行-->
				<div class="aside_r01">
					<div>
						<p class="my_info">個人資料修改</p>
					</div>
					<hr color="#4EBABF" size="5" width="95%">
					<div class="my_info_div">
						<div><!--暱稱-->
							<p class="my_info1">暱稱</p>
							<p class="my_info2"><?php echo $userAccount['name'] ?></p>
						</div>
						<div><!--密碼-->
							<p class="my_info1">性別</p>
							<p class="my_info2">
								<?php if($userAccount['gender']!=""){
									echo $userAccount['gender'];
								} 
								else{
									echo "尚未填寫";
								}
								?>
							</p>
						</div>
					</div>
				</div>
				<div class="aside_r02">
					<div>
						<p class="my_info">自我介紹</p>
					</div>
					<hr color="#4EBABF" size="5" width="95%">
					<div class="my_info_div">
						<div>
							<p class="my_info1">我最喜歡的桌遊</p>
							<p class="my_info2">
								<?php if($userAccount['favorite']!=""){
									echo $userAccount['favorite'];
								} 
								else{
									echo "尚未填寫";
								}
								?>
							</p>
						</div>
						<div>
							<p class="my_info1">我最擅長的桌遊</p>
							<p class="my_info2">
								<?php if($userAccount['goodAt']!=""){
									echo $userAccount['goodAt'];
								} 
								else{
									echo "尚未填寫";
								}
								?>
							</p>
						</div>
					</div>
				</div>
			</div>				
		</section>
	</body>