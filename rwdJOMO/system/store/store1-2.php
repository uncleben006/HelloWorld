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
				<span class="store_push">
					<img class="aside_store_img" src="photo/taipei26.jpg" width="195px" height="195px" onclick="my_scroll('store1-2.php?no=124&storePlace=臺北市'); return false">
					<span class="store_img_hover" onclick="my_scroll('store1-2.php?no=124&storePlace=臺北市'); return false">
					 卡卡城(萬芳店)
					</span>
				</span>
				<span class="store_push">
					<img class="aside_store_img" src="photo/taipei24.jpg" width="195px" height="195px" onclick="my_scroll('store1-2.php?no=122&storePlace=臺北市'); return false">
					<span class="store_img_hover" onclick="my_scroll('store1-2.php?no=122&storePlace=臺北市'); return false">
					 樂氣球(公館店)
					</span>
				</span>
				<span class="store_push">
					<img class="aside_store_img" src="photo/taipei23.PNG" width="195px" height="195px" onclick="my_scroll('store1-2.php?no=121&storePlace=臺北市'); return false">
					<span class="store_img_hover" onclick="my_scroll('store1-2.php?no=121&storePlace=臺北市'); return false">
					 卡牌屋(台北店)
					</span>
				</span>
			</div>

			<!--rwd後的推薦店家-->
			<div class="store_orange_rwd">
				<span class="aside_p2">推薦店家</span>
				<div class="push_rwd_div">
					<span class="push_store_p" onclick="my_scroll('store1-2.php?no=2&storePlace=臺北市'); return false">天鵝咖啡館</span>
					<span class="push_store_p" onclick="my_scroll('store1-2.php?no=1&storePlace=臺北市'); return false">女巫店</span>
					<span class="push_store_p" onclick="my_scroll('store1-2.php?no=125&storePlace=臺北市'); return false">骰子人(景美店)</span>
					<span class="push_store_p" onclick="my_scroll('store1-2.php?no=124&storePlace=臺北市'); return false">卡卡城(萬芳店)</span>
					<span class="push_store_p" onclick="my_scroll('store1-2.php?no=122&storePlace=臺北市'); return false">樂氣球(公館店)</span>
					<span class="push_store_p" onclick="my_scroll('store1-2.php?no=121&storePlace=臺北市'); return false">卡牌屋(台北店)</span>
				</div>
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
			<div id="Store_inf">
				<div style="position: fixed;width: 100%;height: 100%;" onclick="my_scroll('store1-2.php'); return false"></div>
		  		<div class="div_store_card-0">
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
				                 <!--店家資訊卡內臉書與網站的icon-->
				                <tr>
				                	<td colspan="2" style="height: 40px">				     
				                		<span class="span_aa">	                			
				                		<?php
				                			if($store['webURL']!=''){
				                				?>
												<span class="web_hover">
				                					<img src="../../jomor_html/img/webicon2.png" class="store_web_bt" onclick="window.open('<?php echo $store['webURL'];?>', '_blank');">
				                					<img src="../../jomor_html/img/webicon.png" class="store_web_bt" onclick="window.open('<?php echo $store['webURL'];?>', '_blank');">
				                				</span>
				                				<?php
				                			}
				                		?>	
				                		</span>	
				                		<span class="span_aa">
				                		<?php
				                			if($store['fbURL']!=''){
				                				?>
			                					<span class="fb_hover">
				                					<img src="../../jomor_html/img/fb2.png" class="store_fb_bt" onclick="window.open('<?php echo $store['fbURL'];?>', '_blank');">
				                					<img src="../../jomor_html/img/fb.png" class="store_fb_bt" onclick="window.open('<?php echo $store['fbURL'];?>', '_blank');">
				                				</span>
				                				<?php
				                			}
				                		?>	
				                		</span>				                			
				                	</td>
				                </tr>
				            </table>
				            <div class="rwd_googlemap">
				            <aside class="div_store_aside">
						        <iframe class="rwdmap_iframe" src="<?php echo $store['googleURL']; ?>" frameborder="0" style="border:0" allowfullscreen>
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
				    </section>
				   	  <div class="or_googlemap">
							<aside class="div_store_aside">
						        <iframe class="rwdmap_iframe" src="<?php echo $store['googleURL']; ?>" frameborder="0" style="border:0" allowfullscreen>
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
		  	</div>   
			<?php
		}
		?>
		
	</body>
</html>