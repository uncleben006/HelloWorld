<?php
include('link.php');
session_start();
$no=$_GET['no'];

//要是room+num不存在，則建立資料庫
$mysql = "
CREATE TABLE IF NOT EXISTS `room".$no."`(
	`people` int(2) NOT NULL,
	`name` text NOT NULL,
	`account` varchar(20) NOT NULL,
	`photo` varchar(100) NOT NULL,
	PRIMARY KEY(`account`)
)DEFAULT CHARSET = UTF8;
";
mysql_query($mysql);

$mysql1 = "SELECT * FROM `room` WHERE `no` ='$no'";
mysql_query("SET NAMES'UTF8'");
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
$result1 = mysql_query($mysql1);
$row1 = mysql_fetch_assoc($result1);

//抓取room+num裡的列數，給num2
$mysql2 = "SELECT * FROM `room".$no."`";
$result2 = mysql_query($mysql2);
$number = mysql_num_rows($result2);

$room = $row1['room'];
$host = $row1['host'];
$store = $row1['store'];
$game = $row1['game'];
$date = $row1['date'];
$time = $row1['time'];
$people = $row1['people'];
$spend = $row1['spend'];
$remark = $row1['remark'];


if(isset($_POST['join'])){
	if(empty($_SESSION['account'])){
		header("Location:../user/block.php");
	}
	else if($number>=$people){
	//若房裡人數小於房主宣告人數，才能執行insert動作
		?>
		<script type="text/javascript">
			alert("抱歉人數已滿~~去加別房啦~");
		</script>
		<?php
	}
	else{
		$uno = $_SESSION['no'];
		$account = $_SESSION['account'];
		$name = $_SESSION['name'];
		$email = $_SESSION['email'];
		$introductio = $_SESSION['introduction'];
		$photo = $_SESSION['photo'];


		$mysql3 = 'INSERT INTO `room'.$no.'`(`people`, `name`, `account`, `photo`) VALUES ("'.$people.'","'.$name.'","'.$account.'","'.$photo.'")';
		mysql_query("SET NAMES'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
		mysql_query($mysql3);

		$addMember;
	}
	
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>showRoomData</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="group.css">
	<style type="text/css">
		

		
	</style>	
</head>
<body>
	<div class="frame">
			
		<h1>這是<?php echo $no."號房間"  ?></h1>
		<div style="float:right">
			<a href="group.php">
				<button>回揪團頁</button>
			</a>
		</div>
		<form method="post">
			<div class="room2">
					<div class="room_banner">
						<div class="room_banner1"><?php echo $row1['no'] ?></div>
						<div class="room_banner2"><?php echo $row1['room'] ?></div>
					</div>
					<div class="room_padding">
						<div class="room_content">
							<div class="room_title">
								<div class="room_title1">房主</div>
								<div class="room_title3"><?php echo $host ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">日期</div>
								<div class="room_title3"><?php echo $row1['date'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">時間</div>
								<div class="room_title3"><?php echo $row1['time'] ?></div>
							</div>
							<div class="room_title">
									<div class="room_title1">地點</div>
								<div class="room_title3"><?php echo $row1['store'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">人數</div>
								<div class="room_title3"><?php echo $row1['people'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">遊戲</div>
								<div class="room_title3"><?php echo $row1['game'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">計費方式</div>
								<div class="room_title3"><?php echo $row1['spend'] ?></div>
							</div>
							<div class="room_title">
								<div class="room_title1">備註</div>
								<div class="room_title3"><?php echo $row1['remark'] ?></div>
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
					<?php
					if($host==$row3['account']){
						echo '<div class="member_banner1">房主</div>';
					}
					
					else{			
						echo '<div class="member_banner1">帳號</div>';
					}
					?>	
						<div class="member_banner2"><?php echo $row3['account'] ?></div>
					</div>
					<div class="room_padding">
						<div class="room_content">
							<div class="member_title">
								<div class="member_title2">
									<img src="../user/photo/<?php echo $row3['photo'] ?>" width="180px" />
								</div>
							</div>
							<div class="room_title">
								<div class="room_title1">暱稱</div>
								<div class="room_title4"><?php echo $row3['name'] ?></div>
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