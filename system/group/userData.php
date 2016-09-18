<?php
include('link.php');
$account=$_GET['account'];

$mysql = "SELECT * FROM `user` WHERE `account` ='$account'";
mysql_query("SET NAMES'UTF8'");
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
$result = mysql_query($mysql);
$row = mysql_fetch_assoc($result);

$account = $row['account'];
$name = $row['name'];
$email = ['email'];
$introduction = ['introduction'];
$photo = ['photo'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>showRoomData</title>
	<meta charset="UTF-8">
	<style type="text/css">
		.frame{
			width: 720px;
			margin-right: auto;
			margin-left: auto;
			padding-top: 20px;
		}
		input[type="text"],input[type="password"],input[type="date"],input[type="time"],input[type="number"]{
			border-color:#bdc5d0;
		}
		table{
			height: 80px;
		}
		.room{
			float: left;
			width:100%;
			margin:15px;

		}
		.room_padding{
			border-radius: 15px 15px 0px 0px;
			padding: 45px 15px 5px 15px;
			background-color: #f2e392;
		}
		.room_content{
			width: 100%;
			margin:0 auto;
		}
		.room_title{
			margin:5px 0px 5px 0px;
			width: 70%;
			margin-left: auto;

		}
		.room_title1{
			background-color: #e7bbb2;
		    text-align: center;
		    padding: 5px;
		    height: 20px;
		    border-radius: 12px;
		    width: 25%;
		    margin-right: 5px;
		    float:left;
		}
		.room_title2{
			background-color: #ffffff;
			padding: 5px;
			height: 20px;
			border-radius: 12px;
		}
		.room_title3{
			background-color: #f2e392;
			padding: 5px;
			height: 20px;
			border-radius: 12px;
		}
		.introduction{
			background-color: #ffffff;
			display: inline-block;
			height: auto;
			margin-top:10px;
			padding: 10px 10px 10px 10px;
			border-radius: 12px;
		}
		.room_footer{
			height: 30px;
			position: relative;
			top: -30px;
			width:100%;
		}
		.room_footer_redline{
			background-color: #eb6063;
			width: 100%;
			height: 7px;

		}
		.room_footer1{
			background-color: #4fbcc1;
			width: 100%;
			border-radius: 0px 0px 15px 15px ;
			padding:5px 0px 5px 0px;
			font-size: 20px;
			height: 30px;
			text-align: center;

		}
		.room_footer_bottom{
			color:black;
			border-radius: 12px;
			font-color:#4fbcc1;
			font-size: 15px;
		}
		.member{
			float: left;
			width:220px;
			margin:10px;
		}
		.member_banner{
			width: 100%;
			float: left;			
		}
		.member_banner1{
			background-color: #e7bbb2;
			width: 30%;
			border-radius: 15px 0px 0px 0px ;
			padding-top: 5px;
			float: left;
			text-align:center;
			font-size: 20px;
			height: 30px;
		}
		.member_banner2{
			background-color: #cc3e3e;
			width: 70%;
			border-radius: 0px 15px 0px 0px ;
			padding-top: 5px;
			float: left;
			text-align: center;
			font-size: 20px;
			height: 30px;
		}
		.member_title{
			margin:5px 0px 10px 0px;
		}
		.member_title2{
			background-color: #ffffff;
			padding: 5px;
			border-radius: 12px;
		}
		.member_title3{
			background-color: #ffffff;
			padding: 5px;
			border-radius: 12px;
			width: 180px;
			float: left;

		}
		.member_height{
			margin-bottom: 40px;
		}
		.backgroundColor{
			background-color: #f2e392;
			border-radius: 12px;
		}
	</style>

</head>
<body>
	<div class="frame">
		<div class="room">
			<div class="member_banner">
				<div class="member_banner1"><?php echo "帳號" ?></div>
				<div class="member_banner2"><?php echo $row['account'] ?></div>
			</div>
			<div class="room_padding">
				<div class="room_content">
					<div class="member_height">
						<div class="member_title3">
							<img src="../user/photo/<?php echo $row['photo'] ?>" height="180px"" />
						</div>
						<div class="room_title">
							<div class="room_title1">暱稱</div>
							<div class="room_title2"><?php echo $row['name'] ?></div>
						</div>
						<div class="room_title">
							<div class="room_title1">信箱</div>
							<div class="room_title2"><?php echo $row['email'] ?></div>
						</div>
						<div class="room_title">
							<div class="room_title1">自我介紹</div>
							<div class="room_title3"></div>
							<span class="introduction"><?php echo $row['introduction'] ?></span>
						</div>
						<div style="clear:both"></div>
					</div>							
				</div>				
			</div>
			<div class="room_footer">
				<div class="room_footer_redline"></div>
				<div class="room_footer1">
					<button class="room_footer_bottom" type="submit" onclick="history.go(-1)">回上一頁</button>
				</div>	
			</div>
									
		</div>
	</div>
</body>
</html>