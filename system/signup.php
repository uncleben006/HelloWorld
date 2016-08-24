<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<style type="text/css">
		.frame{
			width: 720px;
			margin-right: auto;
			margin-left: auto;
			padding-top: 20px;
		}
		input[type="text"],input[type="password"],input[type="file"]{
			border-color:#bdc5d0;
		}
		div{
			margin: 0px 0px 5px 3px;

		}
		table{
			height: 150px;
		}
		td,tr{
			height:0px;
		}

		
	</style>
</head>
<body>
	<div class="frame">
		<h1>這是註冊頁面!!~</h1>
		<form action="signupCheck.php" method="post">
			<table>
				<tr>
					<td>帳號(Account)</td>
					<?php 
					session_start();
					if(isset($_GET["value"])==TRUE){
						$value = $_GET["value"];
					}
					else{
						$value = 0;
					}

					if($value==1){
						echo '<td><input type="text" name="account" value='.$_SESSION["account"].' required></td>';
					}
					else{
						echo '<td><input type="text" name="account" required></td>';
					}
					?>
				</tr>
				<tr>
					<td>密碼(password)</td>
					<td><input type="password" name="pass" required></td>
					<td>確認密碼(confirm)</td>
					<td><input type="password" name="repass" required></td>
				</tr>
				<tr>
					<td>
					<?php 
					if(isset($_GET["wrong"])==TRUE && $_GET["wrong"]==1){
							echo '<font color="red">請再次確認密碼</font>'; 
							$wrong=0; 
					}
					?>
					</td>
				</tr>
				<tr>
					<td>暱稱(name)</td>
					<?php 
					if($value==1){
						echo '<td><input type="text" name="name" value='.$_SESSION["name"].' required></td>';
					}
					else{
						echo '<td><input type="text" required="" name="name" required></td>';
					}
					?>
				</tr>
				<tr>
					<td>信箱(email)</td>
					<?php 
					if($value==1){
						echo '<td><input type="text" name="email" value='.$_SESSION["email"].' required></td>';
					}
					else{
						echo '<td><input type="text" name="email" required></td>';
					}
					?>
				</tr>
				<tr>
					<td>簡介(introduction)</td>
					<?php 
					if($value==1){
						echo '<td><input type="text" name="introduction" value='.$_SESSION["introduction"].' required></td>';
					}
					else{
						echo '<td><input type="text" name="introduction"></td>'; 
					} 
					?>
					
				</tr>
			</table>
			<div>
				<td>頭像(self)</td>
				<td><input type="file" name="pic"></td>
			</div>
			<div><button type="submit">註冊</button></div>
		</form>
	</div>
</body>
</html>