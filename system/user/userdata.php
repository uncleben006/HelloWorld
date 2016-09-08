<!DOCTYPE html>
<html>
<head>
	<title>UserData</title>

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
		th{
			width:100px;
			text-align: left;
		}
		th,td{
			border: 1px solid lightgrey;
		}
		
	</style>

</head>
<body>
	<div class="frame">
		<h1>會員基本資料</h1>
		
		<?php
		header("Content-Type:text/html; charset=utf-8");
		include('link.php');

		session_start();
		$no = $_SESSION["no"];
		$pri = $_SESSION["pri"];
		$account = $_SESSION["account"];
		$name = $_SESSION["name"];
		$email = $_SESSION["email"];
		$introduction = $_SESSION["introduction"];
		if(isset($_SESSION["photo"])){
			$photo = $_SESSION["photo"];
		}
		else{
			$photo = "fuck-you.png";
			echo '<br><font color="red">您尚未放上照片</font>';
		}
		?>
		<div>
			<img src="photo/<?php echo $photo ?>" style="height:180px;" />
		</div>
		<table>
			<tr>
				<th>會員代號</th>
				<td><?php echo $no; ?></td>
			</tr>
			<tr>
				<th>會員權限</th>
				<td><?php echo $pri; ?></td>
			</tr>
			<tr>
				<th>會員帳號</th>
				<td><?php echo $account; ?></td>
			</tr>
			<tr>
				<th>暱稱</th>
				<td><?php echo $name; ?></td>
			</tr>
			<tr>
				<th>信箱</th>
				<td>
				<?php
				 if($pri==0){
				 	echo $email.'<br><font color="red">您尚未註冊信箱</font>';
				 }
				 else 
				 	echo $email;
				?>
				</td>
			</tr>
			<tr>
				<th>簡介</th>
				<td><?php echo $introduction; ?></td>
			</tr>
			<tr>
				<td colspan="2">
				<?php
				 if($pri==0){
				 	echo $name.'你好，歡迎使用桌末狂歡';
				 }
				 else if($pri==1){
				 	echo $name.'你好，歡迎使用桌末狂歡';
				 }else{
				 	echo $name.'管理員大大你好';
				 }
				?>					
				</td>
			</tr>
		</table>
		<div>
			<a href="alter.php"><button>修改會員資料</button></a>
			<a href="http://localhost:8080/JOMO/index6.php"><button>回首頁</button></a>
		</div>
			
	</div>
	
</body>
</html>