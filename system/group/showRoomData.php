<?php
include('link.php');
session_start();
$no=$_GET['no'];

$mysql2 = "
CREATE TABLE IF NOT EXISTS `room".$no."`(
	`people` int(2) NOT NULL,
	`name` text NOT NULL,
	`account` varchar(20) NOT NULL,
	`photo` varchar(100) NOT NULL,
	PRIMARY KEY(`account`)
)DEFAULT CHARSET = UTF8;
";
mysql_query($mysql2);

$mysql1 = "SELECT * FROM `room` WHERE `no` ='$no'";
mysql_query("SET NAMES'UTF8'");
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
$result1 = mysql_query($mysql1);
$row1 = mysql_fetch_assoc($result1);

$room = $row1['room'];
$store = $row1['store'];
$game = $row1['game'];
$date = $row1['date'];
$time = $row1['time'];
$people = $row1['people'];
$spend = $row1['spend'];
$remark = $row1['remark'];

if(isset($_POST['join'])){
	if(empty($_SESSION['account'])){
		header("Location:http://localhost:8080/JOMO/system/user/block.php");
	}
	else{
		$uno = $_SESSION['no'];
		$account = $_SESSION['account'];
		$name = $_SESSION['name'];
		$email = $_SESSION['email'];
		$introductio = $_SESSION['introduction'];
		$photo = $_SESSION['photo'];


		$mysql2 = 'INSERT INTO `room'.$no.'`(`people`, `name`, `account`, `photo`) VALUES ("'.$people.'","'.$name.'","'.$account.'","'.$photo.'")';
		mysql_query("SET NAMES'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
		mysql_query($mysql2);

		$addMember;
	}
	
}

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
			background-color: #f2e392;
			border-radius: 15px 15px 0px 0px;
			padding: 45px 15px 5px 15px;
		}
		.room_content{
			width: 100%;
			margin:0 auto;
		}
		.room_banner{
			width: 100%;
			float: left;
		}

		.room_banner1{
			background-color: #e7bbb2;
			width: 15%;
			border-radius: 15px 0px 0px 0px ;
			padding-top: 5px;
			float: left;
			text-align:center;
			font-size: 20px;
			height: 30px;
		}
		.room_banner2{
			background-color: #cc3e3e;
			width: 85%;
			border-radius: 0px 15px 0px 0px ;
			padding-top: 5px;
			float: left;
			text-align: center;
			font-size: 20px;
			height: 30px;
		}
		.room_title{
			margin:5px 0px 5px 0px;
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
		.room_footer{
			height: 30px;
			position: relative;
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
			float: left;
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
	</style>

</head>
<body>
	<div class="frame">

		<form method="post">
			<h1>這是<?php echo $no."號房間"  ?></h1>
			<div class="room">
					<div class="room_banner">
						<div class="room_banner1"><?php echo $row1['no'] ?></div>
						<div class="room_banner2"><?php echo $row1['room'] ?></div>
					</div>
					<div class="room_padding">
						<div class="room_content">
							<div class="room_title">
								<div class="room_title1">日期</div>
								<div class="room_title2"><div><?php echo $row1['date'] ?></div></div>
							</div>
							<div class="room_title">
								<div class="room_title1">時間</div>
								<div class="room_title2"><?php echo $row1['time'] ?></div>
							</div>
							<div class="room_title">
									<div class="room_title1">地點</div>
								<div class="room_title2"><?php echo $row1['store'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">人數</div>
								<div class="room_title2"><?php echo $row1['people'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">遊戲</div>
								<div class="room_title2"><?php echo $row1['game'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">遊戲</div>
								<div class="room_title2"><?php echo $row1['spend'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">遊戲</div>
								<div class="room_title2"><?php echo $row1['remark'] ?></div>
							</div>
						</div>
					</div>	
					<div class="room_footer">
						<div class="room_footer_redline"></div>
						<div class="room_footer1">
							<button class="room_footer_bottom" type="submit" name="join">加入房間</button>
						</div>
					</div>						
			</div>
		</form>
		<div>
			<h2>成員</h2>
		</div>
		<?php
			$mysql3 = "SELECT * FROM `room".$no."`";
			$result3 = mysql_query($mysql3);

			while ($row3 = mysql_fetch_assoc($result3)) {
				?>
				<div class="member">
					<div class="room_banner">
						<div class="member_banner1"><?php echo "帳號" ?></div>
						<div class="member_banner2"><?php echo $row3['account'] ?></div>
					</div>
					<div class="room_padding">
						<div class="room_content">
							<div class="member_title">
								<div class="member_title2">
									<img src="http://localhost:8080/JOMO/system/user/photo/<?php echo $row3['photo'] ?>" width="180px" />
								</div>
							</div>
							<div class="room_title">
								<div class="room_title1">暱稱</div>
								<div class="room_title2"><?php echo $row3['name'] ?></div>
							</div>
						</div>
					</div>	
					<div class="room_footer">
						<div class="room_footer_redline"></div>
						<div class="room_footer1">
							<a href="userData.php?account=<?php echo $row3['account']?>">
								<button class="room_footer_bottom" type="submit" name="see">看看此人~</button>
							</a>								
						</div>
							
					</div>				
				</div>
				<?php
			}
			?>
	</div>
	
</body>
</html>