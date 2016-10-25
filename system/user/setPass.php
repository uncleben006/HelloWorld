<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta charset="utf-8">
	<link rel="icon" href="jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		<?php
			include('../../include/link.php');
			include('../../include/sessionCheck.php');
			header("refresh:2;login.php");
			include('../../include/userHeader.php');
		?>
		<section>
			<form method="post">
				<div class="forget_div">
					<div class="forget_bg">
						<div class="forget_white">
							<div class="forget_p_div">
								<h1 class="forget_p">您已經完成修改密碼</h1>
							</div>						
							<hr color="#A0920D" size="3" width="95%">
							<div class="new_pass_div">
								<h2>畫面將在3秒後轉跳至登入畫面</h2>
								<img class="new_pass_img" src="../../jomor_html/img/selfph.png">									
							</div>	
						</div>
					</div>
				</div>
			</form>	
		</section>
	</body>