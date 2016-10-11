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
					header("refresh:3;login.php");				
				}
				else if($situation==2){
					?>
					<h1>你登入失敗了唷~~</h1>
					<h2>三秒後會轉跳至登入頁面</h2>
					<?php
					header("refresh:3;login.php");
				}
			}
			?>
			
		</div>
		
	</body>
</html>

