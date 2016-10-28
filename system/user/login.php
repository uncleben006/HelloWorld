<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<link rel="icon" href="jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		<?php 
			include('../../include/link.php');
			//include('../../include/sessionCheck.php');
			if(isset($_POST['login'])){
				$account = $_POST["account"];
				$pass = $_POST["password"];
				$setSQL1 = "SELECT * FROM `user` WHERE `account` = '".$account."'";
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$result1 = mysql_query($setSQL1);
				$row1 = mysql_fetch_assoc($result1);
				echo $row1['password'];

				$setSQL2 = "SELECT * FROM `admin` WHERE `account` = '".$account."'";
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$result2 = mysql_query($setSQL2);
				$row2 = mysql_fetch_assoc($result2);

				
				if($pass==$row1['password']){
					session_set_cookie_params(600);
					session_start();
					$_SESSION["no"] = $row1["no"];
					$_SESSION["pri"] = $row1["pri"];
					$_SESSION["account"] = $row1["account"];
					$_SESSION["password"] = $row1["password"];
					$_SESSION["name"] = $row1["name"];
					$_SESSION["email"] = $row1["email"];
					$_SESSION["photo"] = $row1["photo"];
					$_SESSION["introduction"] = $row1["introduction"];
					session_write_close();
					header("Location:../../index.php");
				}
				else if($pass==$row2['password']){
					session_set_cookie_params(600);
					session_start();
					$_SESSION["no"] = $row2["no"];
					$_SESSION["pri"] = $row2["pri"];
					$_SESSION["account"] = $row2["account"];
					$_SESSION["password"] = $row2["password"];
					$_SESSION["name"] = $row2["name"];
					$_SESSION["email"] = $row2["email"];
					$_SESSION["photo"] = $row2["photo"];
					$_SESSION["introduction"] = $row2["introduction"];
					session_write_close();						
					header("Location:../../index.php");
				}
				else{
					$errMsg = "帳號或密碼有誤";
				}
			}
			/*if(isset($_GET['fb'])){
				$fb = new phpSDK\src\Facebook\Facebook\Facebook([
				    'app_id' => '1776470922608272',
				    'app_secret' => '717ff345aa85c2610170f79ac6a5c841',
				    'default_graph_version' => 'v2.8',
				]);
				
				$helper = $fb->getRedirectLoginHelper();
				$permissions = ['email', 'user_likes']; // optional
				$loginUrl = $helper->getLoginUrl('http://{your-website}/login-callback.php', $permissions);

				echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
			}
			*/
			
			include('../../include/userHeader.php'); 
		?>
		<section>
			<div class="login_div">
				<div class="login_bg">
					<div class="login_white">
						<div class="login_p_div">
							<h1 class="login_p">歡迎回來桌末狂歡！</h1>
						</div>
						<div class="login_fb_div">
							<!--連結臉書-->
							<div onclick="login()" onmouseover="login_fb_Over()" onmouseout="login_fb_Out()">
								<img id="fb_img01" src="../../jomor_html/img/login_fb.png" class="login_fb_img">
							</div>
							<div class="login_p2">使用Facebook登入</div>
						</div>
						<hr color="#A0920D" size="3" width="95%">
						<div class="login_p3">或使用桌末狂歡登入</div>

						<form method="post">
							<div class="login_text_div"><!--帳號填的框-->
								<input type="text" name="account" placeholder="帳號" class="login_text">
							</div>
							<div class="login_text_div"><!--帳號填的框-->
								<input type="password" name="password" placeholder="密碼" class="login_text">
							</div>
							<div class="login_bt_div">
								<div class="login_bt_err"><?php if(isset($errMsg)){echo $errMsg;} ?></div>
								<button type="submit" name="login" class="login_bt" >登入</button>
							</div>
						</form>

						<div class="login_forget">
							<span>
								<a href="signup.php" class="login_register">註冊帳號</a>
							</span>
							<span>|</span>
							<span>
								<a href="forget.php" class="login_register">忘記密碼</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</section>

	</body>
</html>