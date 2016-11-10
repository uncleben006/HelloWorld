<!DOCTYPE html>
	<html>
	<head>
		<title>jomor桌末狂歡</title>
		<link href="../style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../javascript.js"></script>
		<meta charset="utf-8">
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
					header('Location:../blockAccount.php');
				}
			}
			?>
			
		</div>
		
	</body>
</html>

