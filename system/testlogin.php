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
		input[type="text"],input[type="password"]{
			border-color:#bdc5d0;
		}
		div{
			margin-top: 5px;
		}
		table{
			height: 80px;
		}
		
	</style>

</head>
<body>
	<div class="frame">
		<h1>會員基本資料</h1>
		
		<?php

		include('link.php');

		session_start();
		$no = $_SESSION["no"];
		$pri = $_SESSION["pri"];
		$account = $_SESSION["account"];
		$name = $_SESSION["name"];
		$email = $_SESSION["email"];
		$introduction = $_SESSION["introduction"];


		if($pri==0){
			echo '<table>
					<tr>
						<th>會員代號</th>
						<td>'.$no.'</td>
					</tr>
					<tr>
						<th>會員權限</th>
						<td>'.$pri.'</td>
					</tr>
					<tr>
						<th>會員帳號</th>
						<td>'.$account.'</td>
					</tr>
					<tr>
						<th>暱稱</th>
						<td>'.$name.'</td>
					</tr>
					<tr>
						<th>信箱</th>
						<td>'.$email.'</td>
						<div style="font-color:red">信箱未註冊請快點~~</div>
					</tr>
					<tr>
						<th>簡介</th>
						<td>'.$introduction.'</td>
					</tr>
				</table>';
		}
		else if($pri==1){
			echo '<table>
					<tr>
						<th>會員代號</th>
						<td>'.$no.'</td>
					</tr>
					<tr>
						<th>會員權限</th>
						<td>'.$pri.'</td>
					</tr>
					<tr>
						<th>會員帳號</th>
						<td>'.$account.'</td>
					</tr>
					<tr>
						<th>暱稱</th>
						<td>'.$name.'</td>
					</tr>
					<tr>
						<th>信箱</th>
						<td>'.$email.'</td>
					</tr>
					<tr>
						<th>簡介</th>
						<td>'.$introduction.'</td>
					</tr>
				</table>';
		}

		?>
		
		<table>
			<tr>
				<th>會員代號</th>
				<td>001GA</td>
			</tr>
			<tr>
				<th>會員權限</th>
				<td>1</td>
			</tr>
			<tr>
				<th>會員帳號</th>
				<td>123456</td>
			</tr>
			<tr>
				<th>暱稱</th>
				<td>元元</td>
			</tr>
			<tr>
				<th>信箱</th>
				<td>jlsjd@gmail.com</td>
			</tr>
			<tr>
				<th>簡介</th>
				<td>去你媽的</td>
			</tr>
		</table>
	</div>
	
</body>
</html>