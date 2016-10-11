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
		<?php include('header.php') ?>
		<section>
			<div class="login_div">
				<div class="login_bg">
					<div class="login_white">
						<div class="login_p_div">
							<h1 class="login_p">歡迎回來桌末狂歡！</h1>
						</div>
						<div class="login_fb_div">
							<!--連結臉書-->
							<a href="https://www.facebook.com" onmouseover="login_fb_Over()" onmouseout="login_fb_Out()">
								<img id="fb_img01" src="../../jomor_html/img/login_fb.png" class="login_fb_img">
							</a>
							<div class="login_p2">使用Facebook登入</div>
						</div>
						<hr color="#A0920D" size="3" width="95%">
						<div class="login_p3">或使用桌末狂歡登入</div>

						<form action="checkuser.php" method="post">
							<div class="login_text_div"><!--帳號填的框-->
								<input type="text" name="account" placeholder="帳號" class="login_text">
							</div>
							<div class="login_text_div"><!--帳號填的框-->
								<input type="password" name="password" placeholder="密碼" class="login_text">
							</div>
							<div class="login_bt_div">
								<button type="submit" class="login_bt" >登入</button>
							</div>
						</form>

						<div class="login_forget">
							<span>
								<a href="signup.php" class="login_register">註冊帳號</a>
							</span>
							<span>|</span>
							<span>
								<a href="#" class="login_register">忘記密碼</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>