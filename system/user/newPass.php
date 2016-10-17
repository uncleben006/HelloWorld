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
		</section>
	</body>