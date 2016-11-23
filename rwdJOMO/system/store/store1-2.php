<!DOCTYPE html>
<html>
<head>
	<title>桌遊資訊平台 - 桌末狂歡 JOMOR</title>
	<link rel="icon" href="jomor_html/img/jomorparty_logo.png" type="image/ico" />
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="../../flexslider.css" />
	<script type="text/javascript" src="../../include/redips-scroll.js"></script>
	<script type="text/javascript" src="../../javascript.js"></script>
	<link rel="icon" href="../../jomor_html/img/jomorparty_logo.png" type="image/ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
	<body id="body0">
		<?php 
			include('../../include/link.php');
			include('../../include/sessionCheck.php'); 
			include("../../include/storeHeader.php"); 
		?>
		<section>
			
		</section>
		<!--地圖切換頁籤-->
		<section class="store_section">
			<div class="mapbutton_frame">
				<a href="store2.php" class="map_myButton">店家列表</a>
				<a href="store1-2.php" class="map_myButton2">店家地圖</a>
				<?php
					if(isset($_SESSION['account'])){
						$account = $_SESSION['account'];
						$selectUserAccount = mysql_query("SELECT * FROM `user` WHERE `account` = '".$account."'");
						$userAccount = mysql_fetch_assoc($selectUserAccount);
						if($userAccount['pri']==3){
							?>
							<a href="uploadStore.php" class="map_myButton4">輸入店家資訊</a>
							<?php						
						}
					}					
				?>
			</div>
			<div class="store_yellow">
				<span class="aside_p1">推薦店家</span>
				<span class="store_push">
					<img class="aside_store_img" src="../../jomor_html/img/swancafe01.jpg" width="195px" height="195px" onclick="my_scroll('store1-2.php?no=2&storePlace=臺北市'); return false">
					<span class="store_img_hover" onclick="my_scroll('store1-2.php?no=2&storePlace=臺北市'); return false">天鵝咖啡館
					</span> 
				</span>

				<span class="store_push">
					<img class="aside_store_img" src="../../jomor_html/img/witch.jpg" width="195px" height="195px" onclick="my_scroll('store1-2.php?no=1&storePlace=臺北市'); return false">
					<span class="store_img_hover" onclick="my_scroll('store1-2.php?no=1&storePlace=臺北市'); return false">
					女巫店
					</span> 
				</span>
				<span class="store_push">
					<img class="aside_store_img" src="../../jomor_html/img/a1.jpg" width="195px" height="195px" onclick="my_scroll('store1-2.php?no=125&storePlace=臺北市'); return false">
					<span class="store_img_hover" onclick="my_scroll('store1-2.php?no=125&storePlace=臺北市'); return false">
					骰子人(景美店)
					</span>
				</span>
			</div>
			<!--google地圖-->
			<div class="map">

				<iframe class="google_map" frameborder="0" src="https://www.google.com/maps/d/embed?mid=1Dwar45Rsg339gqQKJv_vo2I0zJU"></iframe>
				<img class="mapframe" src="../../jomor_html/img/mapframe.png" alt="桌遊地圖框" title="桌遊地圖" >
			</div>
		</section >
	
		<!--側邊欄位-->
	<!--
		<aside class="aside01">
			<div class="aside_store00">
				<img src="../../jomor_html/img/store_aside.png" alt="吉祥物圖" title="猴子吉祥物" width="195px" height="210px" >
			</div>
			<div class="aside_p1">推薦店家</div>
			<div class="aside_store"><a href="#">
				<img class="aside_store_img" src="../../jomor_html/img/swancafe01.jpg" width="195px" height="195px" onclick="my_scroll('store1-2.php?no=2&storePlace=臺北市'); return false"></a>
			</div>
			<div class="aside_store"><a href="#">
				<img class="aside_store_img" src="../../jomor_html/img/witch.jpg" width="195px" height="195px" onclick="my_scroll('store1-2.php?no=1&storePlace=臺北市'); return false"></a>
			</div>
			<div class="aside_store"><a href="#">
				<img class="aside_store_img" src="../../jomor_html/img/a1.jpg" width="195px" height="195px" onclick="my_scroll('store1-2.php?no=125&storePlace=臺北市'); return false"></a>
			</div>		
		</aside>
	-->
		<div class="footer_css">
				<div class="footer_white"></div>
				<div class="index_yellow"> 
					<div class="index_yellow_pp">｜桌遊資訊平台｜桌末狂歡｜</div>
				</div>
				<div class="footer_bt_div">
					<span class="footer_span">
						<a href="https://www.facebook.com/jomor.party/?fref=nf" class="footer_a"  target=_blank>
							<span class="footer_hover">
								<img src="../../jomor_html/img/fb2.png" class="index_footer_bt">
								<img src="../../jomor_html/img/fb.png" class="index_footer_bt">
							</span>
						</a>
					</span>
					<span class="footer_span">
						<a href="mailto:ics.jomorparty@gmail.com" class="footer_a">
							<span class="footer_hover">
								<img src="../../jomor_html/img/mailus2.png" class="index_footer_bt">
								<img src="../../jomor_html/img/mailus.png" class="index_footer_bt">
							</span>
						</a>
					</span>
					<span class="footer_span">
						<a href="http://www.swanpanasia.com/" class="footer_a" target=_blank>
							<span class="footer_hover">
								<img src="../../jomor_html/img/heaven2.png" class="index_footer_bt">
								<img src="../../jomor_html/img/heaven.png" class="index_footer_bt">
							</span>
						</a>
					</span>
				</div>
		</div>

		<!--店家資訊跳出顯示div-->
		<!--店家資訊跳出顯示div-->
		<!--店家資訊跳出顯示div-->
		<?php
		if(isset($_GET['no'])){
			$no = $_GET["no"];
			$selectStoreName = 'SELECT * FROM `store` WHERE `no` = "'.$no.'"';
			mysql_query("SET NAMES'UTF8'");
			mysql_query("SET CHARACTER SET UTF8");
			mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
			$selectStoreName = mysql_query($selectStoreName);
			$store = mysql_fetch_assoc($selectStoreName);
			?>
			<div id="Store_inf" style="position:fixed;" onclick="my_scroll('store1-2.php'); return false">
		  		<div class="div_store_card-0222">
				    <section class="div_store_section">
				         <div class="div_store_card-01"><!--店家資訊卡店名與圖片部分-->
				             <span class="div_store_name"><?php echo $store['storeName']?></span>
				                <div><img class="div_store_img" src="photo/<?php echo $store['storePhoto'];?>" ></div>
				         </div>
				         <!--店家資訊卡文字部分-->
				         <div class="div_store_card-02">
				            <table class="div_store_info_card02_table">
				                <tr>
				                    <td class="div_store_info_card02_td01">店家類型｜</td>
				                    <td class="div_store_info_p2" ><?php echo $store['storeType']; ?></td>
				                </tr>
				                <tr>
				                    <td class="div_store_info_card02_td01">店家地址｜</td>
				                    <td class="div_store_info_p2"><?php echo $store['storeAddress']; ?></td>
				                </tr>
				                <tr>
				                    <td class="div_store_info_card02_td01">店家電話｜</td>
				                    <td class="div_store_info_p2"><?php echo $store['storeNumber']; ?></td>
				                </tr>
				                <tr>
				                    <td class="div_store_info_card02_td01">營業時間｜</td>
				                    <td class="div_store_info_p2"><?php echo $store['storeTime']; ?></td>
				                </tr>
				                <tr>
				                    <td class="div_store_info_card02_td01">消費模式｜</td>
				                    <td class="div_store_info_p2" ><?php echo $store['storeSpend'];?></td>
				                </tr>
				                <tr>
				                	<td>
				                		<?php
				                			if($store['fbURL']!=''){
				                				?>
				                				<a href="<?php echo $store['fbURL'];?>" class="fb_a"  target=_blank>
				                					<span class="fb_hover">
					                					<img src="../../jomor_html/img/fb2.png" class="store_fb_bt">
					                					<img src="../../jomor_html/img/fb.png" class="store_fb_bt">
					                				</span>
				                				</a>
				                				<?php
				                			}
				                		?>				                			
				                	</td>
				                	<td>
				                		<?php
				                			if($store['webURL']!=''){
				                				?>
				                				<a href="<?php echo $store['webURL'];?>" target=_blank>
													<span class="web_hover">
					                					<img src="../../jomor_html/img/webicon2.png" class="store_web_bt">
					                					<img src="../../jomor_html/img/webicon.png" class="store_web_bt">
					                				</span>
				                				</a>
				                				<?php
				                			}
				                		?>				                			
				                	</td>
				                </tr>
				            </table>
				         </div>
				    </section>
				    <aside class="div_store_aside">
				        <iframe src="<?php echo $store['googleURL']; ?>" width="485" height="450" frameborder="0" style="border:0" allowfullscreen>
				        </iframe>
			        	<div class="div_store_btn">
			        		<?php 
			        			if(isset($_GET['storePlace'])){
			        				$storePlace = $_GET['storePlace'];
			        				?>
			        				<button name="close" class="btn" onclick="my_scroll('store1-2.php?storePlace=<?php echo $storePlace; ?>'); return false">關閉</button>
			        				<?php 
			        			} 
			        			else{
			        				?>
			        				<button name="close" class="btn" onclick="my_scroll('store1-2.php'); return false">關閉</button>
			        				<?php
			        			}
			        		?>
				        </div>			        
				    </aside>
				</div>
		  	</div>   
			<?php
		}
		?>
		
	</body>
</html>