<!DOCTYPE html>
<html>
<head>
	<title>桌遊資訊平台 - 桌末狂歡 JOMOR</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta charset="utf-8">
	<link rel="icon" href="../../jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		<?php
			include('../../include/link.php');
			include('../../include/sessionCheck.php');
			$no = $_GET['no'];//取得用戶代碼
			if(isset($_POST['change'])){
				$pass = $_POST['pass'];
				$repass = $_POST['repass'];
				if($pass!=$repass){
					$errMsg = "「確認密碼」有誤，請再檢查一遍";
				}
				else{
					$updateUserNo = "UPDATE `user` SET `password`='".$pass."' WHERE `no` = '".$no."'";
					mysql_query($updateUserNo);
					header('Location:setPass.php');
				}
			}
			include('../../include/userHeader.php');
		?>
		<section>
			<form method="post">
				<div class="forget_div">
					<div class="forget_bg">
						<div class="forget_white">
							<div class="forget_p_div">
								<h1 class="forget_p">填寫您的新密碼</h1>
							</div>						
							<hr color="#A0920D" size="3" width="95%">
							<div class="forget_new_text_div"><!--密碼填的框-->
								<input type="password" name="pass" placeholder="新密碼" class="forget_text">
							</div>
							<div class="forget_new_text_div"><!--確認密碼填的框-->
								<input type="password" name="repass" placeholder="確認密碼" class="forget_text">
							</div>							
							<div class="forget_new_bt_div">								
								<button type="submit" name="change" class="forget_bt">確認</button>		
								<div><?php if(isset($errMsg)){ echo $errMsg; } ?></div>						
							</div>					

						</div>
					</div>
				</div>
			</form>	
			<footer class="footer_css_foget">
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