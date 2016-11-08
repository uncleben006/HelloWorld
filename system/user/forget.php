<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
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
			if(isset($_POST['sent'])){
				$email = $_POST['email'];
				header("Content-Type:text/html; charset=utf-8");
				require '../../include/PHPMailer/PHPMailerAutoload.php';

				$mail = new PHPMailer(); // create a new object
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = false; // authentication enabled
				$mail->SMTPSecure = false; // secure transfer enabled REQUIRED for Gmail
				$mail->Host = 'localhost';
				$mail->Port = 25; // 465 or 587
				$mail->IsHTML(true);
				$mail->Username = "ics.jomorparty@gmail.com";
				$mail->Password = "Jomorparty";
				$mail->SetFrom("ics.jomorparty@gmail.com");
				$mail->Subject = mb_encode_mimeheader('A message from JOMO', "UTF-8");

				/*依填入的email，從user table抓取用戶代碼，不能是用戶帳號會有安全性問題*/
				$selectUserEmail = "SELECT * FROM `user` WHERE `email` = '".$email."'";
				echo $selectUserEmail;
				$selectUserEmail = mysql_query($selectUserEmail);
				$userEmail = mysql_fetch_assoc($selectUserEmail);

				$url = 'www.jomorparty.com/system/user/newPass.php?no='.$userEmail['no'];
				$ahref = '<a href= '. $url . '>' . $url . '</a>';
				$htmlurl = 
				"
				<!DOCTYPE html>
				<html>
				<head>
					<title>email</title>
				</head>
				<body>
					<div style=\"width:60%;margin:0 auto;background-color:#cee6f5;padding:10px;\">
						<div>".$userEmail['account']."您好</div>
						<div>請點選這個網址前往修改密碼</div>
						<div>".$ahref."</div>
					</div>
				</body>
				</html>
				";


				$mail->Body = $htmlurl;
				$mail->AddAddress($email);

				if(!$mail->Send()) {
				    echo "Mailer Error: " . $mail->ErrorInfo;
				} 
				else{
					echo "Message has been sent";
					$url = "../../index.php";
					echo "<script type='text/javascript'>";
					echo "window.location.href='$url'";
					echo "</script>";
				}
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