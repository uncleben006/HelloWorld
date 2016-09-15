<!DOCTYPE html>
<html>
<head>
	<title>Group</title>

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
		table{
			height: 80px;
		}
		
		.room{
			float: left;
			width:200px;
			margin:15px;
		}
		.room_padding{
			background-color: #f2e392;
			border-radius: 15px 15px 0px 0px;
			padding: 50px 15px 15px 15px;
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
			background-color: #ea6262;
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
			top: -30px;
			width:100%;
		}
		.room_footer_redline{
			background-color: #ea6262;
			width: 100%;
			height: 7px;

		}
		.room_footer1{
			background-color: #56959a;
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
	</style>

</head>
<body>
	<div class="frame">
		<h1>去揪個團打桌遊啦!肥宅別宅在家哭哭</h1>
		<div>
			<a href="addnew.php"><button>新增揪團房間</button></a>
		</div>
		<?php
		include('link.php');
		$setSQL = 'SELECT * FROM `room` ORDER BY `no`';
		mysql_query("SET NAMES'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
		$result = mysql_query($setSQL);
		$number = mysql_num_rows($result);//取得所選SQL的列數
		

		if($number>0){
			while($row = mysql_fetch_assoc($result) ){

			//$row = mysql_fetch_assoc($result)一定得放在while裡，表示每跑一次迴圈fetch一次陣列
				$no = $row['no'];
				?>
				<div class="room">
						<div class="room_banner">
							<div class="room_banner1"><?php echo $row['no'] ?></div>
							<div class="room_banner2"><?php echo $row['room'] ?></div>
						</div>
						<div class="room_padding">
							<div class="room_content">
								<div class="room_title">
									<div class="room_title1">日期</div>
									<div class="room_title2"><div><?php echo $row['date'] ?></div></div>
								</div>
								<div class="room_title">
									<div class="room_title1">時間</div>
									<div class="room_title2"><?php echo $row['time'] ?></div>
								</div>
								<div class="room_title">
									<div class="room_title1">地點</div>
									<div class="room_title2"><?php echo $row['store'] ?></div>
								</div>
								<div class="room_title">
									<div class="room_title1">人數</div>
									<div class="room_title2"><?php echo $row['people'] ?></div>
								</div>
								<div class="room_title">
									<div class="room_title1">遊戲</div>
									<div class="room_title2"><?php echo $row['game'] ?></div>
								</div>
							</div>	
							</div class="room_footer">
								<div class="room_footer_redline"></div>
								<div class="room_footer1">
									<a href="showRoomData.php?no=<?php echo $no ?>">
										<button class="room_footer_bottom">瀏覽房間</button>
									</a>
								</div>
								
							<div>						
						</div>						
				</div>
				<?php
			}
		}
		else{
			echo "目前沒有人揪團唷~";
		}
		?>
		
	</div>
	
</body>
</html>