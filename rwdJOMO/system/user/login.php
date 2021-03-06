<!DOCTYPE html>
<html>
<head>
	<title>桌遊資訊平台 - 桌末狂歡 JOMOR</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../../jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		 <script>
	        // initialize and setup facebook js sdk
	        window.fbAsyncInit = function() {
	            FB.init({
	              appId      : '1776470922608272',
	              xfbml      : true,
	              version    : 'v2.8'
	            });

	            FB.getLoginStatus(function(response) {
	            	/*這段其實不需要
	                if (response.status === 'connected') {

	                } else if (response.status === 'not_authorized') {
	                    document.getElementById('status').innerHTML = 'We are not logged in.'
	                } else {
	                    document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
	                }
	                */
	            });
	        };

	        (function(d, s, id){
	            var js, fjs = d.getElementsByTagName(s)[0];
	            if (d.getElementById(id)) {return;}
	            js = d.createElement(s); js.id = id;
	            js.src = "//connect.facebook.net/en_US/sdk.js";
	            fjs.parentNode.insertBefore(js, fjs);
	        }(document, 'script', 'facebook-jssdk'));
	        
	        // login with facebook with extra permissions
	        function login() {
	            FB.login(function(response) {
	                if (response.status === 'connected') {
	                	FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email,picture.width(150).height(150)'}, function(response){
	                		window.location.href="signFB.php?name="+response.name+"&email="+response.email+"&id="+response.id+"&picture="+response.picture.data.url;
	                    });
	                    
	                } else if (response.status === 'not_authorized') {
	                    document.getElementById('status').innerHTML = 'We are not logged in.'
	                } else {
	                    document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
	                }
	            }, {scope: 'email'});
	        }	        
	    </script>
		<?php 
			include('../../include/link.php');
			//include('../../include/sessionCheck.php');
			if(isset($_POST['login'])){
				$account = $_POST["account"];
				$pass = $_POST["password"];
				if($account==''){
					$errMsg = "請填入帳號";
				}
				else if($pass==''){
					$errMsg = "請填入密碼";
				}	
				else{
					$selectUserAccount = "SELECT * FROM `user` WHERE `account` = '".$account."'";
					mysql_query("SET NAMES'UTF8'");
					mysql_query("SET CHARACTER SET UTF8");
					mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
					$selectUserAccount = mysql_query($selectUserAccount);
					$userAccount = mysql_fetch_assoc($selectUserAccount);	
					if($pass==$userAccount['password']){
						session_set_cookie_params(600);
						session_start();
						$_SESSION["no"] = $userAccount["no"];
						$_SESSION["pri"] = $userAccount["pri"];
						$_SESSION["account"] = $userAccount["account"];
						$_SESSION["password"] = $userAccount["password"];
						$_SESSION["name"] = $userAccount["name"];
						$_SESSION["email"] = $userAccount["email"];
						$_SESSION["photo"] = $userAccount["photo"];
						$_SESSION["introduction"] = $userAccount["introduction"];
						session_write_close();
						header("Location:../../index.php");
					}
					else{
						$errMsg = "帳號或密碼有誤";
					}
				}		
			}
			
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
			<footer class="footer_css_login">
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
</html>