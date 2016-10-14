<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="javascript.js"></script>
	<meta charset="utf-8">
</head>
	<body id="body0">
		<?php include('include/sessionCheck.php') ?>
		<?php include('include/header.php') ?>
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
		</div>
		<!--猴子篩選列-->
		<div class="store_select">
			<div class="store_select_img">
				<img src="jomor_html/img/store2.png" alt="吉祥物圖框" title="猴子吉祥物" width="800px" height="250px">
				<div class="store_select_word">店家篩選</div>
				<div class="store_select_button0">
					<span class="store_select_button1"><a href="#" class="store_select_myButton">全部</a></span>
					<span class="store_select_button2"><a href="#" class="store_select_myButton">地區</a></span>
					<div class="store_search_div">
						<input class="store_search" type="text" name="search" size="12" style=" border-radius:2px" placeholder="關鍵字查詢">
						<input class="store_search_button" name="submit" type="image" value="search" src="jomor_html/img/store_search_button.png">
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
			<div class="store_card" >
	<!--第一行div表格-->
				<div class="div_table"><!--div_table-->
				 	<div class="row"><!-- tr --> 
				         <div class="cell1"><!-- td -->  
				         	<!--店家資訊卡1-->
				            <div class="store_info_card-0">
								<div class="store_info_card01"><!--店家資訊卡店名與圖片部分-->
									<div class="store_name" onClick="opendiv(Store_inf)">Swancafe天鵝咖啡館</div>
									<div><img class="store_img" src="jomor_html/img/swancafe01.jpg" onClick="opendiv(Store_inf)"></div>
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
									<div class="store_triangle"><!-- 三角形開啟按鍵 -->
                  						<a onmouseover="store_mouseOver1()" onmouseout="store_mouseOut1()" onClick="opendiv(Store_inf)">
                    						<img id="store_triangle_id01" src="jomor_html/img/store_triangle.png" height="20px" width="23px">
                  						</a>
                 					 </div>
								</div>
							</div>    
				         </div> 
				         <div class="cell2"> <!-- td -->
				         	<!--店家資訊卡2-->
				             <div class="store_info_card-0">
								<div class="store_info_card01"><!--店家資訊卡店名與圖片部分-->
									<div class="store_name" onClick="opendiv(Store_inf)">女巫店</div>
									<div><img class="store_img" src="jomor_html/img/witch.jpg" onClick="opendiv(Store_inf)"></div>
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
									<div class="store_triangle">
									<a onmouseover="store_mouseOver2()" onmouseout="store_mouseOut2()" onClick="opendiv(Store_inf)">
										<img id="store_triangle_id02" src="jomor_html/img/store_triangle.png" height="20px" width="23px">
									</a>
									</div>
								</div>
							</div>    
				         </div> 
				         <div class="cell3"> <!-- td -->
				             <!--店家資訊卡3-->
				             <div class="store_info_card-0">
								<div class="store_info_card01"><!--店家資訊卡店名與圖片部分-->
									<div class="store_name" onClick="opendiv(Store_inf)">Swancafe天鵝咖啡館</div>
									<div><img class="store_img" src="jomor_html/img/swancafe01.jpg" onClick="opendiv(Store_inf)"></div>
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
									<div class="store_triangle"><!-- 三角形開啟按鍵 -->
                  						<a onmouseover="store_mouseOver1()" onmouseout="store_mouseOut1()" onClick="opendiv(Store_inf)">
                    						<img id="store_triangle_id01" src="jomor_html/img/store_triangle.png" height="20px" width="23px">
                  						</a>
                 					 </div>
								</div>
							</div>   
				         </div> <!-- td -->
				    </div> <!--tr-->  
				 </div> <!--div_table-->
		<!--第二行div表格-->
				<div class="div_table"><!--div_table-->
				 	<div class="row"><!-- tr --> 
				         <div class="cell1"><!-- td -->  
				         	<!--店家資訊卡1-->
				            <div class="store_info_card-0">
								<div class="store_info_card01"><!--店家資訊卡店名與圖片部分-->
									<div class="store_name" onClick="opendiv(Store_inf)">Swancafe天鵝咖啡館</div>
									<div><img class="store_img" src="jomor_html/img/swancafe01.jpg" onClick="opendiv(Store_inf)"></div>
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
									<div class="store_triangle"><!-- 三角形開啟按鍵 -->
                  						<a onmouseover="store_mouseOver1()" onmouseout="store_mouseOut1()" onClick="opendiv(Store_inf)">
                    						<img id="store_triangle_id01" src="jomor_html/img/store_triangle.png" height="20px" width="23px">
                  						</a>
                 					 </div>
								</div>
							</div>    
				         </div> 
				         <div class="cell2"> <!-- td -->
				         	<!--店家資訊卡2-->
				             <div class="store_info_card-0">
								<div class="store_info_card01"><!--店家資訊卡店名與圖片部分-->
									<div class="store_name" onClick="opendiv(Store_inf)">女巫店</div>
									<div><img class="store_img" src="jomor_html/img/witch.jpg" onClick="opendiv(Store_inf)"></div>
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
									<div class="store_triangle">
									<a onmouseover="store_mouseOver2()" onmouseout="store_mouseOut2()" onClick="opendiv(Store_inf)">
										<img id="store_triangle_id02" src="jomor_html/img/store_triangle.png" height="20px" width="23px">
									</a>
									</div>
								</div>
							</div>    
				         </div> 
				         <div class="cell3"> <!-- td -->
				             <!--店家資訊卡3-->
				             <div class="store_info_card-0">
								<div class="store_info_card01"><!--店家資訊卡店名與圖片部分-->
									<div class="store_name" onClick="opendiv(Store_inf)">Swancafe天鵝咖啡館</div>
									<div><img class="store_img" src="jomor_html/img/swancafe01.jpg" onClick="opendiv(Store_inf)"></div>
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
									<div class="store_triangle"><!-- 三角形開啟按鍵 -->
                  						<a onmouseover="store_mouseOver1()" onmouseout="store_mouseOut1()" onClick="opendiv(Store_inf)">
                    						<img id="store_triangle_id01" src="jomor_html/img/store_triangle.png" height="20px" width="23px">
                  						</a>
                 					 </div>
								</div>
							</div>   
				         </div> <!-- td -->
				    </div> <!--tr-->  
				 </div> <!--div_table-->
			</div><!--class="store_card"-->
		</section>
		<!--側邊欄位-->
	<aside class="aside02">
		<div class="aside_p1">推薦</br>店家</div>
		<div class="aside_store">
			<img class="aside_store_img" src="jomor_html/img/swancafe01.jpg" width="180px" height="180px" onClick="opendiv(Store_inf)">
		</div>
		<div class="aside_store">
			<img class="aside_store_img" src="jomor_html/img/witch.jpg" width="180px" height="180px" onClick="opendiv(Store_inf)">
		</div>
		<div class="aside_store">
			<img class="aside_store_img" src="jomor_html/img/swancafe01.jpg" width="180px" height="180px" onClick="opendiv(Store_inf)">
		</div>
	</aside>
	<!--店家資訊跳出顯示div-->
	<div id="Store_inf" style="position:fixed;display:none;">
  		<div class="div_store_card-0">
		    <section class="div_store_section">
		         <div class="div_store_card-01"><!--店家資訊卡店名與圖片部分-->
		             <span class="div_love_img">
		                <img class="div_love_img" src="jomor_html/img/love.png">
		             </span>
		             <span class="div_store_name">Swancafe天鵝咖啡館</span>
		                <div><img class="div_store_img" src="jomor_html/img/swancafe01.jpg" ></div>
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