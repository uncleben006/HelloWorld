<!DOCTYPE html>
<html>
<head>
	<title>桌末狂歡 JOMOR - 桌遊資訊平台</title>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<script type="text/javascript" src="../../include/redips-scroll.js"></script>
	<meta charset="utf-8">
	<!--top按鈕的jquery-->
	<script type="text/javascript" src="../../jquery/top_jq/jquery-1.6.min.js"></script>
	<script type="text/javascript" src="../../jquery/top_jq/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="../../jquery/top_jq/001.js"></script>
	<link rel="icon" href="../../jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		<?php 
			include('../../include/link.php');
			include('../../include/sessionCheck.php');	

			//關閉後返回原搜尋頁面
			//關閉後返回原搜尋頁面
			//關閉後返回原搜尋頁面
			if(isset($_POST['close'])){
				if(isset($_GET['storePlace'])){
					$storePlace = $_GET['storePlace'];
					header('location:store2.php?storePlace=$storePlace');
				}
				if(isset($_GET['storeType'])){
					$storeType = $_GET['storeType'];
					header('location:store2.php?storeType=$storeType');
				}
				else{
					header('location:store2.php');
				}
			}
			include('../../include/storeHeader.php'); 
		?>		
		<section>
			<!--最新活動跑馬燈-->
			<div class="store_marquee_div">
				<div class="marquee_bg">
					<span class="store_news01">最新活動 |</span>
					<span class="store_span">
						<content>
							<marquee class="store_marquee">
								<div >桌末狂歡上線囉～～快來一起玩桌遊！</div>
							</marquee>
						</content>
					</span>
				</div>
			</div>
		</section>
			<!--地圖切換頁籤-->
		<section>
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

			<!--top按鈕-->
			<a href="#" id="goTop"><img src="../../jomor_html/img/top.png" class="gotop_img"></a>
			<!--猴子篩選列-->
			<div class="store_select">
				<div class="store_select_img">
					<img src="../../jomor_html/img/store2.png" alt="吉祥物圖框" title="猴子吉祥物" width="800px" height="250px">
					<div class="store_select_word">店家篩選</div>
					<div class="store_select_button0">
						<span class="store_select_button1">
							<a href="store2.php" class="store_select_myButton">全部</a>
						</span>
						<span class="store_select_button2">
							<a class="store_select_myButton" onClick="openlocal(local)">縣市</a>
							<!--地區按鈕跳出的地區選單-->
								<div id="local" style="position:absolute; visibility: hidden;">
								  <div class="local_fram">
								    <div class="local_scroll">
								      <div>
									        <div class="local_place">北部</div>
									        <button onclick="window.location.href='store2.php?storePlace=臺北市'" class="css-input">臺北市</button>
									        <div onclick="window.location.href='store2.php?storePlace=新北市'" class="css-input">新北市</div>
									        <div onclick="window.location.href='store2.php?storePlace=基隆市'" class="css-input">基隆市</div>
									        <div onclick="window.location.href='store2.php?storePlace=桃園市'" class="css-input">桃園市</div>
									        <div onclick="window.location.href='store2.php?storePlace=新竹市'" class="css-input">新竹市</div>
									        <div onclick="window.location.href='store2.php?storePlace=新竹縣'" class="css-input">新竹縣</div>
											<div onclick="window.location.href='store2.php?storePlace=宜蘭縣'" class="css-input">宜蘭縣</div>
								      </div>
								      <div>
								          <div class="local_place">中部</div>
								          <div onclick="window.location.href='store2.php?storePlace=苗栗縣'" class="css-input">苗栗縣</div>
								          <div onclick="window.location.href='store2.php?storePlace=臺中市'" class="css-input">臺中市</div>
								          <div onclick="window.location.href='store2.php?storePlace=彰化縣'" class="css-input">彰化縣</div>
								      </div>
								      <div>
								          <div class="local_place">南部</div>
								          <div onclick="window.location.href='store2.php?storePlace=雲林縣'" class="css-input">雲林縣</div>
								          <div onclick="window.location.href='store2.php?storePlace=嘉義市'" class="css-input">嘉義市（縣）</div>
								          <div onclick="window.location.href='store2.php?storePlace=臺南市'" class="css-input">臺南市</div>
								          <div onclick="window.location.href='store2.php?storePlace=高雄市'" class="css-input">高雄市</div>
								          <div onclick="window.location.href='store2.php?storePlace=屏東縣'" class="css-input">屏東縣</div>
								      </div>
								      <div>
								          <div class="local_place">東部</div>
								          <div onclick="window.location.href='store2.php?storePlace=花蓮縣'" class="css-input">花蓮縣</div>
								          <div onclick="window.location.href='store2.php?storePlace=臺東縣'" class="css-input">臺東縣</div>
								      </div>
								      <div>
								          <div class="local_place">外島</div>
								          <div onclick="window.location.href='store2.php?storePlace=澎湖縣'" class="css-input">澎湖縣</div>
								          <div onclick="window.location.href='store2.php?storePlace=金門縣'" class="css-input">金門縣</div>
								      </div>
								    </div>
								  </div>   
								</div> 
						</span>
						<span class="store_select_button2">
							<a class="store_select_myButton2" onClick="openstype(stype)">店家<br>類型</a>
							<!--地區按鈕跳出的類型選單-->
							<div id="stype" style="position:absolute; visibility: hidden;">
							  <div class="stype_fram">
							    <div class="stype_scroll">
							      <div>
								        <div onclick="window.location.href='store2.php?storeType=桌遊專門店'" class="css-input">桌遊專門店</div>
								        <div onclick="window.location.href='store2.php?storeType=複合式餐飲桌遊店'" class="css-input">複合式餐飲店</div>
								        <div onclick="window.location.href='store2.php?storeType=桌遊販賣店'" class="css-input">桌遊販賣店</div>
								        <div onclick="window.location.href='store2.php?storeType=其他'" class="css-input">其他</div>
							      </div>
							    </div>
							  </div>   
							</div> 
						</span>
						<form>
							<div class="store_search_div">
								<input class="store_search" type="text" name="storeWord" size="12" style=" border-radius:2px" placeholder="關鍵字查詢">
								<button class="store_search_button" value="search" type="submit">
									<img src="../../jomor_html/img/store_search_button.png" height="35">
								</button>
							</div>
						</form>						
					</div>
				</div>
			</div>
		</section>
		<section class="store_section2">
			<!--右上角藍字 → 依照選取的縣市顯示-->
			<table class="store_page_name" cellpadding="7">
				<tr>
					<td>
						<?php
							if(isset($_GET['storePlace'])){
								?>
								<div><?php echo $_GET['storePlace']?></div>
								<?php
							}
							if(isset($_GET['storeType'])){
								if($_GET['storeType']=='複合式餐飲桌遊店'){
									?>
									<div>複合式餐飲店</div>
									<?php
								}
								else{
									?>
									<div><?php echo $_GET['storeType']?></div>
									<?php
								}								
							}
							if(empty($_GET['storePlace'])&&empty($_GET['storeType'])){
								?>
								<div>全部</div>
								<?php
							}
						?>						
					</td>
				</tr>
			</table>
			<?php
				//依照地區或類型篩選顯示
				//依照地區或類型篩選顯示
				//依照地區或類型篩選顯示
				if(isset($_GET['storePlace'])||isset($_GET['storeType'])||isset($_GET['storeWord'])){
					if(isset($_GET['storePlace'])){
						$selectStorePlace = "SELECT * FROM `store` WHERE `storePlace` = '".$_GET['storePlace']."'";
					}
					else if(isset($_GET['storeType'])){
						$selectStorePlace = "SELECT * FROM `store` WHERE `storeType` = '".$_GET['storeType']."'";
					}
					else if(isset($_GET['storeWord'])){
						$storeWord = $_GET['storeWord'];
						$selectStorePlace = "SELECT * FROM `store` WHERE `storePlace` LIKE '%$storeWord%' OR `storeType` LIKE '%$storeWord%' OR `storeName` LIKE '%$storeWord%' OR `storeHoliday` LIKE '%$storeWord%' OR `storeNumber` LIKE '%$storeWord%'";

					}					
					mysql_query("SET NAMES'UTF8'");
					mysql_query("SET CHARACTER SET UTF8");
					mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
					$selectStorePlace = mysql_query($selectStorePlace);
					while($storePlace = mysql_fetch_assoc($selectStorePlace)){
						?>
						<div class="store_info_card-0">
							<div class="store_info_card01"><!--店家資訊卡店名與圖片部分-->
								<div class="store_name" onclick="my_scroll('store2.php?no=<?php echo $storePlace['no']; ?>&storePlace=<?php echo $storePlace['storePlace']; ?>'); return false"><?php echo $storePlace['storeName']?></div>
								<div><img class="store_img" src="photo/<?php echo $storePlace['storePhoto'];?>" onclick="my_scroll('store2.php?no=<?php echo $storePlace['no']; ?>&storePlace=<?php echo $storePlace['storePlace']; ?>'); return false"></div><!--圖片連結等有圖片了之後再補上，不然現在太醜了-->
							</div>
							<!--店家資訊卡文字部分-->
							<div class="store_info_card02">
								<table class="store_info_card02_table">
									<tr>
										<td class="store_info_card02_td01">店家類型｜</td>
										<td class="store_info_p2" title="<?php echo $storePlace['storeType'];?>">
											<?php 
												$str=$storePlace['storeType']; 
												echo ((mb_strlen($str,'utf8')>10) ? mb_substr($str,0,11,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
											?>													
										</td>
									</tr>
									<tr>
										<td class="store_info_card02_td01">店家地區｜</td>
										<td class="store_info_p2"><?php echo $storePlace['storeArea']?></td>
									</tr>
									<tr>
										<td class="store_info_card02_td01">店家電話｜</td>
										<td class="store_info_p2" title="<?php echo $storePlace['storeNumber'];?>">
											<?php 
												$str=$storePlace['storeNumber']; 
												echo ((mb_strlen($str,'utf8')>16) ? mb_substr($str,0,16,'utf8') : $str).' '.((mb_strlen($str,'utf8')>16) ? " ..." : "");
											?>		
										</td>
									</tr>
									<tr>
										<td class="store_info_card02_td01">公休日｜</td>
										<td class="store_info_p2" title="<?php echo $storePlace['storeHoliday'];?>">
											<?php 
												$str=$storePlace['storeHoliday']; 
												echo ((mb_strlen($str,'utf8')>9) ? mb_substr($str,0,9,'utf8') : $str).' '.((mb_strlen($str,'utf8')>9) ? " ..." : "");
											?>
										</td>
									</tr>
								</table>
								<!-- 三角形開啟按鍵 -->
								<!--my_scroll方法會回復上一頁position-->
								<div class="store_triangle" onclick="my_scroll('store2.php?no=<?php echo $storePlace['no']; ?>&storePlace=<?php echo $storePlace['storePlace']; ?>'); return false">
             					</div>
							</div>
						</div> 
						<?php
					}
				}				
				//顯示全部
				//顯示全部
				//顯示全部
				else{
					$selectStore = "SELECT * FROM `store` ORDER BY `placeNo`, `storeType`";
					mysql_query("SET NAMES'UTF8'");
					mysql_query("SET CHARACTER SET UTF8");
					mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
					$selectStore = mysql_query($selectStore);
					while($store = mysql_fetch_assoc($selectStore)){
						?>
						<div class="store_info_card-0">
							<div class="store_info_card01"><!--店家資訊卡店名與圖片部分-->
								<div title="<?php echo $store['storeName']?>" class="store_name" onclick="my_scroll('store2.php?no=<?php echo $store['no']; ?>'); return false"><?php echo $store['storeName']?></div>
								<div><img class="store_img" src="photo/<?php echo $store['storePhoto'];?>" onclick="my_scroll('store2.php?no=<?php echo $store['no']; ?>'); return false"></div><!--圖片連結等有圖片了之後再補上，不然現在太醜了-->
							</div>
							<!--店家資訊卡文字部分-->
							<div class="store_info_card02">
								<table class="store_info_card02_table">
									<tr>
										<td class="store_info_card02_td01">店家類型｜</td>
										<td class="store_info_p2" title="<?php echo $store['storeType'];?>">
											<?php 
												$str=$store['storeType']; 
												echo ((mb_strlen($str,'utf8')>10) ? mb_substr($str,0,11,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
											?>													
										</td>
									</tr>
									<tr>
										<td class="store_info_card02_td01">店家地區｜</td>
										<td class="store_info_p2"><?php echo $store['storeArea']?></td>
									</tr>
									<tr>
										<td class="store_info_card02_td01">店家電話｜</td>
										<td class="store_info_p2" title="<?php echo $store['storeNumber'];?>">
											<?php 
												$str=$store['storeNumber']; 
												echo ((mb_strlen($str,'utf8')>16) ? mb_substr($str,0,16,'utf8') : $str).' '.((mb_strlen($str,'utf8')>16) ? " ..." : "");
											?>		
										</td>
									</tr>
									<tr>
										<td class="store_info_card02_td01">公休日｜</td>
										<td class="store_info_p2" title="<?php echo $store['storeHoliday']?>">
											<?php 
												$str=$store['storeHoliday']; 
												echo ((mb_strlen($str,'utf8')>9) ? mb_substr($str,0,9,'utf8') : $str).' '.((mb_strlen($str,'utf8')>9) ? " ..." : "");
											?>
										</td>
									</tr>
								</table>
								<!-- 三角形開啟按鍵 -->
								<!--my_scroll方法會回復上一頁position-->								
								<div class="store_triangle" onclick="my_scroll('store2.php?no=<?php echo $store['no']; ?>'); return false"></div>
             					</div>
							</div>
						</div> 
						<?php
					}
				}				
			?>
							
		</section>

		<!--側邊欄位-->
		<!--側邊欄位-->
		<!--側邊欄位-->
		<aside class="aside02">
			<div class="aside_p1">推薦</br>店家</div>
			<div class="aside_store">
				<img class="aside_store_img" src="../../jomor_html/img/swancafe01.jpg"  onclick="my_scroll('store2.php?no=2&storePlace=臺北市'); return false">
			</div>
			<div class="aside_store">
				<img class="aside_store_img" src="../../jomor_html/img/witch.jpg"  onclick="my_scroll('store2.php?no=1&storePlace=臺北市'); return false">
			</div>
			<div class="aside_store">
				<img class="aside_store_img" src="../../jomor_html/img/a1.jpg" onclick="my_scroll('store2.php?no=125&storePlace=臺北市'); return false">
			</div>
		</aside>

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
			<div id="Store_inf" style="position:fixed;" onclick="my_scroll('store2.php'); return false">
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
				                	<td colspan="2">
				                		<span class="span_aa">
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
				                		</span>	
				                		<span class="span_aa">	                			
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
				                		</span>				                			
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
			        				<button name="close" class="btn" onclick="my_scroll('store2.php?storePlace=<?php echo $storePlace; ?>'); return false">關閉</button>
			        				<?php 
			        			} 
			        			else{
			        				?>
			        				<button name="close" class="btn" onclick="my_scroll('store2.php'); return false">關閉</button>
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