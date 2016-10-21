<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../../flexslider.css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta charset="utf-8">
</head>
	<body id="body0">
		<?php 
			include('../../include/link.php');
			include('../../include/sessionCheck.php'); 
			include("../../include/storeHeader.php"); 
		?>
		<section>
			<!--最新活動跑馬燈-->
			<div class="store_marquee_div">
				<span class="store_news01">最新活動</span>
				<span class="store_span">
					<content>
						<marquee style="height:30px" class="store_marquee">
							<div style="margin-top:4px">這裡放要跑的文字</div>
						</marquee>
					</content>
				</span>
			</div>
		</section>
		<!--地圖切換頁籤-->
		<section class="store_section">
			<div class="mapbutton_frame">
				<a href="store1-2.php" class="map_myButton">店家地圖</a>
				<a href="store2.php" class="map_myButton">店家列表</a>
				<?php
					if(isset($_SESSION['account'])){
						$account = $_SESSION['account'];
						$selectUserAccount = mysql_query("SELECT * FROM `user` WHERE `account` = '".$account."'");
						$userAccount = mysql_fetch_assoc($selectUserAccount);
						if($userAccount['pri']==2){
							?>
							<a href="uploadStore.php" class="map_myButton">輸入店家資訊</a>
							<?php						
						}
					}					
				?>
			</div>
			<!--google地圖-->
			<div class="map">

				<iframe class="google_map" frameborder="0" src="https://www.google.com/maps/d/embed?mid=1Dwar45Rsg339gqQKJv_vo2I0zJU" width="792px" height="555px"></iframe>
				<img class="mapframe" src="../../jomor_html/img/mapframe.png" alt="桌遊地圖框" title="桌遊地圖" width="900px" height="880px">
			</div>
		</section >
	
		<!--側邊欄位-->
		<aside class="aside01">
			<div class="aside_store00">
				<img src="../../jomor_html/img/store_aside.png" alt="吉祥物圖" title="猴子吉祥物" width="195px" height="210px">
			</div>
			<div class="aside_p1">附近店家</div>
			<div class="aside_store"><a href="#">
				<img class="aside_store_img" src="../../jomor_html/img/swancafe01.jpg" width="195px" height="195px"></a>
			</div>
			<div class="aside_store"><a href="#">
				<img class="aside_store_img" src="../../jomor_html/img/witch.jpg" width="195px" height="195px"></a>
			</div>
			<div class="aside_store"><a href="#">
				<img class="aside_store_img" src="../../jomor_html/img/swancafe01.jpg" width="195px" height="195px"></a>
			</div>		
		</aside>
	</body>
</html>