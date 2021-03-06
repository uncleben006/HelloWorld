<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../../flexslider.css" />
	<link rel="stylesheet" type="text/css" href="group.css">
	<!--大富翁按鍵的圖片的javascript-->
	<script type="text/javascript" src="../../javascript.js"></script>
	<script type="text/javascript">
		$(function() {
		    $(".flexslider").flexslider({
				slideshowSpeed: 2000, //展示时间间隔ms
				animationSpeed: 400, //滚动时间ms
				touch: true //是否支持触屏滑动
			});
		});
	</script>
<meta charset="utf-8">
</head>
	<body id="body0" style="margin: 0 auto;">
		<header class="header_bg">
			<!--頂部圖案-->
			<div class="top">
				<table border="0">
				<tr>
				 	<td rowspan="2" class="table-bg" width="175px" align="center" valign="center">
							<a href="../../index.php">
								<img src="../../jomor_html/img/00.png" alt="logo" title="logo" width="90x" height="85x">
							</a>	
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
							<a href="../../system/group/group.php">
								<img src="../../jomor_html/img/01.png" alt="吉祥物圖一" title="揪團" width="120px" height="85px">
							</a>
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
							<a href="../../store1-2.php">
								<img src="../../jomor_html/img/02.png" alt="吉祥物圖二" title="店家地圖" width="114px" height="85px">
							</a>
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
							<a href="#">
								<img src="../../jomor_html/img/03.png" alt="吉祥物圖三" title="討論區" width="114px" height="85px">
							</a>
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
							<a href="../../blog.php">
								<img src="../../jomor_html/img/04.png" alt="吉祥物圖四" title="桌遊專欄" width="124px" height="85px">
							</a>
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
							<a href="../../aboutus.php">
								<img src="../../jomor_html/img/05.png" alt="吉祥物圖五" title="聯絡我們" width="114px" height="85px">
							</a>
					</td>
					<?php
						include('link.php');
						include('../user/sessionCheck.php');
						if(isset($_SESSION['pri'])){
							?>
							<?php
							$pri = $_SESSION['pri'];
							if($pri==0){//會員註冊但尚未驗證
								?>
								<td class="input0" width="50px" align="center" valign="center">
									<a href="../user/userdata.php" class="lognin">會員</a>
								</td>
								<td class="input0" width="50px" align="left" valign="center">
									<a href="../user/logout.php" class="lognin">登出</a>
								</td>
								<?php
							}
							else if($pri==1){//正式會員
								?>
								<td class="input0" width="50px" align="center" valign="center">
									<a href="../user/userdata.php" class="lognin">會員</a>
								</td>
								<td class="input0" width="50px" align="left" valign="center">
									<a href="../user/logout.php" class="lognin">登出</a>
								</td>
								<?php
							}
							else{//管理員
								?>
								<td class="input0" width="50px" align="center" valign="center">
									<a href="../user/userdata.php" class="lognin">管理</a>
								</td>
								<td class="input0" width="50px" align="left" valign="center">
									<a href="../user/logout.php" class="lognin">登出</a>
								</td>
								<?php
							}
						}
						else{
							?>
							<td class="input0" width="100px" align="center" valign="center">
								<a href="../user/login.html" class="lognin">登入</a>
							</td>
							<td class="input0" width="100px" align="left" valign="center">
								<a href="../user/signup.php" class="lognin">註冊</a>
							</td>
							<?php
						}
					?>
				</tr>
				<!--搜尋列-->
				<tr>
					<td class="table-bg1" align="center" valign="center">
						<input class="index_search" type="text" name="search" size="15">
					</td>
					<td class="table-bg1" valign="center">
							<input class="button" name="submit" type="image" value="search" src="../../jomor_html/img/button.png">
					</td>
				</tr>
				</table>
			</div>
			<!--導覽列-->
			<nav class="navdiv">
				<div>
				    <ul>
				        <li class="nav0"><a href="group.php">揪 團</a></li>
				        <li class="nav1"><a href="../../store1-2.php">店家地圖</a></li>
				        <li class="nav1"><a href="#">討 論 區</a></li>
				        <li class="nav2"><a href="../../blog.php">遊戲專欄</a></li>
				        <li class="nav2"><a href="../../aboutus.php">聯絡我們</a></li>
				    </ul>
				  </div>
			</nav>
			<div class="whiteBar"></div>
			<div class="blueBar">
				<div style="margin-right:140px">
					<a href="addnew.php"><button class="yellowButton">創建房間</button></a>
					<button class="yellowButton">如何揪團</button>
				</div>				
   			</div>
		</header>
		<div style="height:220px;background-color:#fff;">
		</div>
		<div class="frame">
			<?php
			include('link.php');
			$setSQL = 'SELECT * FROM `room` ORDER BY `no`';
			mysql_query("SET NAMES'UTF8'");
			mysql_query("SET CHARACTER SET UTF8");
			mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
			$result = mysql_query($setSQL);
			$number = mysql_num_rows($result);//取得所選SQL的列數，取代count(*);

			//指定台北時區
			date_default_timezone_set('Asia/Taipei');
			$now = date("Y-m-d-H:i:s");

			//$row = mysql_fetch_assoc($result)一定得放在while裡，表示每跑一次迴圈fetch一次陣列
			if($number>0){
				while($row = mysql_fetch_assoc($result) ){

					$no = $row['no'];
					$room = $row['room'];
					$date = $row['date'];
					$time = $row['time'];
					$store = $row['store'];
					$people = $row['people'];
					$game = $row['game'];									
					$startTime = date("Y-m-d-H:i:s", strtotime($date.$time."5 hours"));

					$selectRoomNo = mysql_query("SELECT * FROM `room".$no."`");
					$num = mysql_num_rows($selectRoomNo);
					
					if($now>$startTime){
						//開始時間再加5小時，時間一到，刪除TABLE room 跟 DB room 還有 chat 裡面 'no'房 的
						$setSQL1 = "DELETE FROM `room` WHERE `no`=".$no."";
						mysql_query($setSQL1);
						$setSQL2 = "DROP TABLE room".$no."";
						mysql_query($setSQL2);
						$setSQL3 = "DELETE FROM `chat` WHERE `no`=".$no."";
						mysql_query($setSQL3);
						header("Location:group.php");
					}					
					
				

					?>
					<div class="room">
							<div class="room_banner">
								<div class="room_banner1"><?php echo $no ?></div>
								<div class="room_banner2"><?php echo $room ?></div>
							</div>
							<div class="room_padding">
								<div class="room_content">
									<div class="room_title">
										<div class="room_title1">日期</div>										
										<div class="room_title2"><?php echo $date ?></div>										
									</div>
									<div class="room_title">
										<div class="room_title1">時間</div>										
										<div class="room_title2"><?php echo $time ?></div>										
									</div>
									<div class="room_title">
										<div class="room_title1">地點</div>										
										<div class="room_title2"><?php echo $store ?></div>										
									</div>
									<div class="room_title">
										<div class="room_title1">人數</div>
										<div class="room_title2"><?php echo $num."/".$people ?></div>										
									</div>
									<div class="room_title">
										<div class="room_title1">遊戲</div>
										<div class="room_title2"><?php echo $game ?></div>										
									</div>
									<div style="clear:both"></div>
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
		
   		
   		
   		<!--
   		<div class="footer_bg">
   			<img src="../../jomor_html/img/footerbg.png" width="1280">
	   		<footer>
	   			<div class="footer_nav">
				    <ul>
				        <li class="fnav0"><a href="#.html">合作廠商</a></li>
				        <li class="fnav1">│</li>
				        <li class="fnav0"><a href="#">粉絲專頁</a></li>
				        <li class="fnav1">│</li>
				        <li class="fnav0"><a href="#">連絡我們</a></li>
				        <li class="fnav1">│</li>
				        <li class="fnav0">解析度建議1280*760</li>
				    </ul>
				</div>
	   		</footer>
	   	</div>
	   	-->
		
</body>
</html>