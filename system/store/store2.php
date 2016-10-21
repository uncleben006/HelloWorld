<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta charset="utf-8">
</head>
	<body id="body0">
		<?php 
			include('../../include/link.php');
			include('../../include/sessionCheck.php');
			include('../../include/storeHeader.php'); 
		?>
		<section>
			<!--最新活動跑馬燈-->
			<div class="store_marquee_div">
				<span class="store_news01">最新活動</span>
				<span class="store_span">
					<content>
						<marquee class="store_marquee">
							<div style="margin-top:4px">這裡放要跑的文字</div>
						</marquee>
					</content>
				</span>
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
			<!--猴子篩選列-->
			<div class="store_select">
				<div class="store_select_img">
					<img src="../../jomor_html/img/store2.png" alt="吉祥物圖框" title="猴子吉祥物" width="800px" height="250px">
					<div class="store_select_word">店家篩選</div>
					<div class="store_select_button0">
						<span class="store_select_button1">
							<a href="#" class="store_select_myButton">全部</a>
						</span>
						<span class="store_select_button2">
							<a class="store_select_myButton" onClick="openlocal(local)">地區</a>
							<!--地區按鈕跳出的地區選單-->
								<div id="local" style="position:absolute; visibility: hidden;">
								  <div class="local_fram">
								    <div class="local_scroll">
								      <div>
									        <div class="local_place">北部</div>
									        <div class="css-input">台北市</div>
									        <div class="css-input">新北市</div>
									        <div class="css-input">基隆市</div>
									        <div class="css-input">桃園縣</div>
									        <div class="css-input">新竹市</div>
									        <div class="css-input">新竹縣</div>
											<div class="css-input">宜蘭縣</div>
								      </div>
								      <div>
								          <div class="local_place">中部</div>
								          <div class="css-input">苗栗縣</div>
								          <div class="css-input">台中市</div>
								          <div class="css-input">彰化縣</div>
								      </div>
								      <div>
								          <div class="local_place">南部</div>
								          <div class="css-input">雲林縣</div>
								          <div class="css-input">嘉義市（縣）</div>
								          <div class="css-input">台南市</div>
								          <div class="css-input">高雄市</div>
								          <div class="css-input">屏東縣</div>
								      </div>
								      <div>
								          <div class="local_place">東部</div>
								          <div class="css-input">花蓮縣</div>
								          <div class="css-input">台東縣</div>
								      </div>
								      <div>
								          <div class="local_place">外島</div>
								          <div class="css-input">澎湖縣</div>
								          <div class="css-input">金門縣</div>
								      </div>
								    </div>
								  </div>   
								</div> 
						</span>
						<div class="store_search_div">
							<input class="store_search" type="text" name="search" size="12" style=" border-radius:2px" placeholder="關鍵字查詢">
							<input class="store_search_button" name="submit" type="image" value="search" src="../../jomor_html/img/store_search_button.png">
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="store_section2">
			<table class="store_page_name" cellpadding="7">
				<tr>
					<td>
						<div>全部</div>
					</td>
				</tr>
			</table>
			<?php
				//依照地區篩選顯示
				//依照地區篩選顯示
				//依照地區篩選顯示
				if(isset($_GET['storePlace'])){
					$selectStorePlace = "SELECT * FROM `store` WHERE `storePlace` = '".$_GET['storePlace']."'";
					mysql_query("SET NAMES'UTF8'");
					mysql_query("SET CHARACTER SET UTF8");
					mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
					$selectStorePlace = mysql_query($selectStorePlace);
					while($storePlace = mysql_fetch_assoc($selectStorePlace)){
						?>
						<div class="store_info_card-0">
							<div class="store_info_card01"><!--店家資訊卡店名與圖片部分-->
								<div class="store_name" onClick="opendiv(Store_inf)"><?php echo $storePlace['storeName']?></div>
								<div><img class="store_img" src="../../jomor_html/img/swancafe01.jpg" onClick="opendiv(Store_inf)"></div>
							</div>
							<!--店家資訊卡文字部分-->
							<div class="store_info_card02">
								<table class="store_info_card02_table">
									<tr>
										<td class="store_info_card02_td01">店家地址｜</td>
										<td class="store_info_p2">台北市羅斯福路五段170巷37號一樓</td>
									</tr>
									<tr>
										<td class="store_info_card02_td01">店家電話｜</td>
										<td class="store_info_p2">(02)2930-8983</td>
									</tr>
									<tr>
										<td class="store_info_card02_td01">營業時間｜</td>
										<td class="store_info_p2">每天10:00-22:00</td>
									</tr>
								</table>
								<div class="store_triangle" onClick="opendiv(Store_inf)"><!-- 三角形開啟按鍵 -->
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
					$selectStore = "SELECT * FROM `store` ";
					mysql_query("SET NAMES'UTF8'");
					mysql_query("SET CHARACTER SET UTF8");
					mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
					$selectStore = mysql_query($selectStore);
					while($store = mysql_fetch_assoc($selectStore)){
						?>
						<div class="store_info_card-0">
							<div class="store_info_card01"><!--店家資訊卡店名與圖片部分-->
								<div class="store_name" onClick="opendiv(Store_inf)"><?php echo $store['storeName']?></div>
								<div><img class="store_img" src="../../jomor_html/img/swancafe01.jpg" onClick="opendiv(Store_inf)"></div><!--圖片連結等有圖片了之後再補上，不然現在太醜了-->
							</div>
							<!--店家資訊卡文字部分-->
							<div class="store_info_card02">
								<table class="store_info_card02_table">
									<tr>
										<td class="store_info_card02_td01">店家地址｜</td>
										<td class="store_info_p2" title="<?php echo $store['storeAddress'];?>">
											<?php 
												$str=$store['storeAddress']; 
												echo ((mb_strlen($str,'utf8')>10) ? mb_substr($str,0,11,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
											?>													
										</td>
									</tr>
									<tr>
										<td class="store_info_card02_td01">店家電話｜</td>
										<td class="store_info_p2"><?php echo $store['storeNumber']?></td>
									</tr>
									<tr>
										<td class="store_info_card02_td01">營業時間｜</td>
										<td class="store_info_p2">
											<?php 
												$str=$store['storeTime']; 
												echo ((mb_strlen($str,'utf8')>10) ? mb_substr($str,0,11,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
											?>
										</td>
									</tr>
								</table>
								<div class="store_triangle" onClick="opendiv(Store_inf)"><!-- 三角形開啟按鍵 -->
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
				<img class="aside_store_img" src="../../jomor_html/img/swancafe01.jpg"  onClick="opendiv(Store_inf)">
			</div>
			<div class="aside_store">
				<img class="aside_store_img" src="../../jomor_html/img/witch.jpg"  onClick="opendiv(Store_inf)">
			</div>
			<div class="aside_store">
				<img class="aside_store_img" src="../../jomor_html/img/swancafe01.jpg" onClick="opendiv(Store_inf)">
			</div>
		</aside>

		<!--店家資訊跳出顯示div-->
		<!--店家資訊跳出顯示div-->
		<!--店家資訊跳出顯示div-->
		<div id="Store_inf" style="position:fixed;display:none;">
	  		<div class="div_store_card-0">
			    <section class="div_store_section">
			         <div class="div_store_card-01"><!--店家資訊卡店名與圖片部分-->
			             <span class="div_store_name">Swancafe天鵝咖啡館</span>
			                <div><img class="div_store_img" src="../../jomor_html/img/swancafe01.jpg" ></div>
			         </div>
			         <!--店家資訊卡文字部分-->
			         <div class="div_store_card-02">
			            <table class="div_store_info_card02_table">
			                <tr>
			                    <td class="div_store_info_card02_td01">店家地址｜</td>
			                    <td class="div_store_info_p2">台北市羅斯福路五段170巷37號一樓</td>
			                </tr>
			                <tr>
			                    <td class="div_store_info_card02_td01">店家電話｜</td>
			                    <td class="div_store_info_p2">(02)2930-8983</td>
			                </tr>
			                <tr>
			                    <td class="div_store_info_card02_td01">營業時間｜</td>
			                    <td class="div_store_info_p2">每天10:00-22:00</td>
			                </tr>
			                <tr>
			                    <td class="div_store_info_card02_td01">消費模式｜</td>
			                    <td class="div_store_info_p2">每人每時段低消150元<br>(早場10-14、午場14-18、晚場18-22)</td>
			                </tr>
			            </table>
			         </div>
			    </section>
			    <aside class="div_store_aside">
			        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.869828371786!2d121.5343891150057!3d25.0045387839862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a9f625cc066d%3A0xb72b462e76eaa98b!2zU3dhbiBDYWZlIOWkqem1neahjOmBiumkqA!5e0!3m2!1szh-TW!2stw!4v1474128298550" width="485" height="450" frameborder="0" style="border:0" allowfullscreen>
			        </iframe>
			        <div class="div_store_btn">
			            <a class="btn" onClick="javascript:Store_inf.style.display='none';">關閉</a>
			        </div>
			    </aside>
			</div>
	  	</div>   
	</body>
</html>