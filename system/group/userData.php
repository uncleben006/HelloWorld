<!DOCTYPE html>
<html>
<head>
	<title>桌末狂歡 JOMOR - 桌遊資訊平台</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta charset="utf-8">
	<link rel="icon" href="jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		<?php 
		header("Content-Type:text/html; charset=utf-8");
		include('../../include/link.php');
		include('../../include/sessionCheck.php');		
		include('../../include/groupHeader.php');
		?>
		<section>
			<?php
			$account = $_GET['account'];
			$no = $_GET['no'];

			$selectUserAccount = "SELECT * FROM `user` WHERE `account` = '".$account."'";
			mysql_query("SET NAMES'UTF8'");
			mysql_query("SET CHARACTER SET UTF8");
			mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
			$selectUserAccount = mysql_query($selectUserAccount);
			$userAccount = mysql_fetch_assoc($selectUserAccount);
			?>
			<div class="individual_bg">

				<div class="edit_bt_div">
					<a href="jo.php?no=<?php echo $no;?>" class="edit_bt">返回</a>
				</div>

				<!--左邊欄位的頭像白框-->
				<div class="aside_l">
					<div class="individual_head_ph_div">
						<span class="individual_head_ph_img_span">
							<?php
								if($userAccount['pri']==2){
									?>
									<img src="<?php echo $userAccount['photo'] ?>" class="individual_head_ph_img">
									<?php
								}
								else{
									?>
									<img src="../user/photo/<?php echo $userAccount['photo'] ?>" class="individual_head_ph_img">
									<?php
								}
							?>
							
						</span>
					</div>
					<div class="individual_score">
						<p><?php echo $userAccount['account'] ?></p>
					</div>
					<hr color="#4EBABF" size="5" width="95%">
					<div class="aboutme">
						<p class="aboutme_p">關於我</p>
						<p class="aboutme_introduce"><?php echo $userAccount['introduction']; ?></p>
					</div>
					<div style="text-align: center;">
						<div class="aboutme" style="display: inline-block;">
							<p class="aboutme_p">評分:<?php echo $userAccount['grade'] ?>　</p>
						</div>
						<div class="aboutme" style="display: inline-block;">
							<p class="aboutme_p">被評次數:<?php echo $userAccount['number'] ?></p>
						</div>
					</div>
					<p class="aboutme_introduce">註:以零分為起始基準</p>
				</div>
				<!--右邊欄位的第一行-->
				<div class="aside_r01">
					<div>
						<p class="my_info">個人資料</p>
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
			
			<!--下方白區塊-->
			<footer class="footer_css_userdata">
				<div class="footer_white"></div>
				<div class="index_yellow"> 
					<div class="index_yellow_pp">｜桌遊資訊平台｜桌末狂歡｜</div>
				</div>
				<div class="footer_bt_div">
					<span class="footer_span">
						<a href="https://www.facebook.com/jomor.party/?fref=nf" class="footer_a"  target=_blank>
							<span class="footer_hover">
								<img src="../../jomor_html/img/fb2.png" class="index_footer_bt">
								<img src="../../jomor_html/img/fb.png" class="index_footer_bt">
							</span>
						</a>
					</span>
					<span class="footer_span">
						<a href="mailto:ics.jomorparty@gmail.com" class="footer_a">
							<span class="footer_hover">
								<img src="../../jomor_html/img/mailus2.png" class="index_footer_bt">
								<img src="../../jomor_html/img/mailus.png" class="index_footer_bt">
							</span>
						</a>
					</span>
					<span class="footer_span">
						<a href="http://www.swanpanasia.com/" class="footer_a" target=_blank>
							<span class="footer_hover">
								<img src="../../jomor_html/img/heaven2.png" class="index_footer_bt">
								<img src="../../jomor_html/img/heaven.png" class="index_footer_bt">
							</span>
						</a>
					</span>
				</div>
			</footer>				
		</section>
	</body>