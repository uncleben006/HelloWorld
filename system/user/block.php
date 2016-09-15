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
			<h1>你尚未登入唷~~</h1>
			<h2>三秒後會轉跳至登入頁面</h2>
		</div>
		
	</body>
</html>

<?php
	header("refresh:3;http://localhost:8080/JOMO/system/user/login.html");
?>