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
			include('../../include/link.php');
			include('../../include/sessionCheck.php');
			if(isset($_POST['sent'])){
				include('passwordMail.php');
			}
			include('../../include/userHeader.php');
		?>
		<section>
			<div class="forget_div">
				<div class="forget_bg">
					<div class="forget_white">
						<div class="forget_p_div">
							<h1 class="forget_p">忘記密碼嗎？</h1>
						</div>
						<hr color="#A0920D" size="3" width="95%">
						<div class="forget_p3">填寫信箱後前往信箱收件</div>
						<form method="post">
							<div class="forget_text_div"><!--信箱填的框-->
								<input type="email" name="email" placeholder="信箱" class="forget_text">
							</div>
							<div class="forget_bt_div">
								<button type="submit" name="sent" class="forget_bt">確認</button>
							</div>
						</form>						
						<div class="login_forget">
							<span>
								<a href="signup.php" class="login_register">註冊帳號</a>
							</span>
							<span>|</span>
							<span>
								<a href="login.php" class="login_register">登入會員</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</section>		
	</body>
</html>