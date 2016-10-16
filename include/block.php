<!DOCTYPE html>
	<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<style type="text/css">
			.frame{
				width: 720px;
				margin-right: auto;
				margin-left: auto;
				padding-top: 20px;
			}
		</style>

	</head>
	<body>
		<div class="frame">
			<?php
			if(isset($_GET['situation'])){
				$situation = $_GET['situation'];
				if($situation==1){
					?>
					<h1>你尚未登入唷~~</h1>
					<h2>三秒後會轉跳至登入頁面</h2>
					<?php
					header("refresh:2;../system/user/login.php");				
				}
				else if($situation==2){
					?>
					<h1>你的帳號或密碼有誤</h1>
					<h2>三秒後會轉跳至登入頁面</h2>
					<?php
					header("refresh:2;../system/user/login.php");
				}
				else if ($situation==3) {
					?>
					<h1>你過了太長時間未動，系統幫你自動登出了</h1>
					<h2>三秒後會轉跳至登入頁面</h2>
					<?php
					header("refresh:2;../system/user/login.php");
				}
			}
			?>
			
		</div>
		
	</body>
</html>

