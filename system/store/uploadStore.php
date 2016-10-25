<!DOCTYPE html>
<html>
<head>
	<title>後台-上傳</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<script src="jquery.min.js"></script>	
	<meta charset="utf-8">
	<link rel="icon" href="jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		<?php 
			include('../../include/link.php');
			include('../../include/sessionCheck.php'); 
			if(isset($_POST['upload'])){
				$storePlace = $_POST['storePlace'];
				$storeName = $_POST['storeName'];
				$storeType = $_POST['storeType'];
				$storeAddress = $_POST['storeAddress'];
				$storeNumber = $_POST['storeNumber'];
				$storeSpend = $_POST['storeSpend'];
				$storeTime = $_POST['storeTime'];
				$storeHoliday = $_POST['storeHoliday'];
				$storeTraffic = $_POST['storeTraffic'];
				$webURL = $_POST['webURL'];
				$fbURL = $_POST['fbURL'];
				$googleURL = $_POST['googleURL'];
				$x = $_POST['x'];
				$y = $_POST['y'];
				$storePhoto = $_POST['storePhoto'];

				$insertStore = 'INSERT INTO `store`(`storePlace`,`storeName`,`storeType`,`storeAddress`,`storeNumber`,`storeSpend`,`storeTime`,`storeHoliday`,`storeTraffic`,`webURL`,`fbURL`,`googleURL`,`x`,`y`,`storePhoto`) VALUES ("'.$storePlace.'","'.$storeName.'","'.$storeType.'","'.$storeAddress.'","'.$storeNumber.'","'.$storeSpend.'","'.$storeTime.'","'.$storeHoliday.'","'.$storeTraffic.'","'.$webURL.'","'.$fbURL.'","'.$googleURL.'","'.$x.'","'.$y.'","'.$storePhoto.'")';
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				mysql_query($insertStore);
			}
			if(isset($_POST['showStore'])){
				header('Location:showStore.php');
			}
			if(isset($_POST['store2'])){
				header('Location:store2.php');
			}
			if(isset($_POST['uploadStore'])){
				header('Location:uploadStore.php');
			}
			include('../../include/storeHeader.php'); 
		?>
		<section><!--註冊框-->		
			<form method="post">	
				<div class="register_div">
					<div class="upload_yellow"><!--註冊黃色框-->
						<div class="upload_manage_div">
							<button type="submit" name="showStore" class="upload_manage">管理<br>店家</button>
							<button type="submit" name="uploadStore" class="upload_manage">上傳<br>頁面</button>
							<button type="submit" name="store2" class="upload_manage">回到<br>前台</button>							
						</div>
						<div class="upload_white"><!--註冊白色框-->
							<div class="register_p_div">
								<h1 class="register_p">管理員資料上傳頁面</h1>
							</div>
							<hr color="#A0920D" size="3" width="95%">						
							<div class="upload_frame_left">
								<div class="upload_div">
									<div>地區</div>
									<input type="text" name="storePlace" class="upload_text">
								</div>
								<div class="upload_div">
									<div>店家名稱</div>
									<input type="text" name="storeName" class="upload_text">
								</div>
								<div class="upload_div">
									<div>店家類型</div>
									<input type="text" name="storeType" class="upload_text">
								</div>
								<div class="upload_div">
									<div>店家地址</div>
									<input type="text" name="storeAddress" class="upload_text">
								</div>
								<div class="upload_div">
									<div>店家電話</div>
									<input type="text" name="storeNumber" class="upload_text">
								</div>
								<div class="upload_div">
									<div>消費方式</div>
									<input type="text" name="storeSpend" class="upload_text">
								</div>
								<div class="upload_div">
									<div>營業時間</div>
									<input type="text" name="storeTime" class="upload_text">
								</div>
								<div class="upload_div">
									<div>公休日</div>
									<input type="text" name="storeHoliday" class="upload_text">
								</div>										
							</div>
							<div class="upload_frame_right">
								<div class="upload_div">
									<div>交通方式</div>
									<input type="text" name="storeTraffic" class="upload_text">
								</div>	
								<div class="upload_div">
									<div>網站連結</div>
									<input type="text" name="webURL" class="upload_text">
								</div>
								<div class="upload_div">
									<div>臉書連結</div>
									<input type="text" name="fbURL" class="upload_text">
								</div>
								<div class="upload_div">
									<div>google地圖連結</div>
									<input type="text" name="googleURL" class="upload_text">
								</div>
								<div class="upload_div">
									<div>經度(x)</div>
									<input type="text" name="x" class="upload_text">
								</div>
								<div class="upload_div">
									<div>緯度(y)</div>
									<input type="text" name="y" class="upload_text">
								</div>
								<div class="upload_div">
									<div>圖片</div>
									<input type="text" name="storePhoto" class="upload_text">
								</div>	
								<button name="upload" type="submit" class="upload_submit">確認上傳</button>
							</div>						
						</div>
					</div>
				</div>	
			</form>		
		</section>
	</body>
</html>