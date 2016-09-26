<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="flexslider.css" />
	<!--輪播圖的javascript-->
	<!--<script src="http://libs.useso.com/js/jquery/1.7.2/jquery.min.js"></script>-->
	<script type="text/javascript" src="jquery.flexslider-min.js"></script>
	<!--大富翁按鍵的圖片的javascript-->
	<script type="text/javascript" src="javascript.js"></script>
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
							<a href="index.html">
								<img src="jomor_html/img/00.png" alt="logo" title="logo" width="90x" height="85x">
							</a>	
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
							<a href="system/group/group.php">
								<img src="jomor_html/img/01.png" alt="吉祥物圖一" title="揪團" width="120px" height="85px">
							</a>
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
							<a href="store1-2.html">
								<img src="jomor_html/img/02.png" alt="吉祥物圖二" title="店家地圖" width="114px" height="85px">
							</a>
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
							<a href="">
								<img src="jomor_html/img/03.png" alt="吉祥物圖三" title="討論區" width="114px" height="85px">
							</a>
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
							<a href="system/game/game.php">
								<img src="jomor_html/img/04.png" alt="吉祥物圖四" title="桌遊專欄" width="124px" height="85px">
							</a>
					</td>
					<td rowspan="2" class="table-bg" width="165px" align="center" valign="center">
							<a href="#.html">
								<img src="jomor_html/img/05.png" alt="吉祥物圖五" title="聯絡我們" width="114px" height="85px">
							</a>
					</td>
					<?php
						include('system/user/link.php');
						session_start();
						if(isset($_SESSION['pri'])){
							?>
							<?php
							$pri = $_SESSION['pri'];
							if($pri==0){//會員註冊但尚未驗證
								?>
								<td class="input0" width="50px" align="center" valign="center">
									<a href="system/user/userdata.php" class="lognin">會員</a>
								</td>
								<td class="input0" width="50px" align="left" valign="center">
									<a href="system/user/logout.php" class="lognin">登出</a>
								</td>
								<?php
							}
							else if($pri==1){//正式會員
								?>
								<td class="input0" width="50px" align="center" valign="center">
									<a href="system/user/userdata.php" class="lognin">會員</a>
								</td>
								<td class="input0" width="50px" align="left" valign="center">
									<a href="system/user/logout.php" class="lognin">登出</a>
								</td>
								<?php
							}
							else{//管理員
								?>
								<td class="input0" width="50px" align="center" valign="center">
									<a href="system/user/userdata.php" class="lognin">管理</a>
								</td>
								<td class="input0" width="50px" align="left" valign="center">
									<a href="system/user/logout.php" class="lognin">登出</a>
								</td>
								<?php
							}
						}
						else{
							?>
							<td class="input0" width="100px" align="center" valign="center">
								<a href="system/user/login.html" class="lognin">登入</a>
							</td>
							<td class="input0" width="100px" align="left" valign="center">
								<a href="system/user/signup.php" class="lognin">註冊</a>
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
							<input class="button" name="submit" type="image" value="search" src="jomor_html/img/button.png">
					</td>
				</tr>
				</table>
			</div>
			<!--導覽列-->
			<nav class="navdiv">
				<div>
				    <ul>
				        <li class="nav0"><a href="jo.html">揪 團</a></li>
				        <li class="nav1"><a href="store1-2.html">店家地圖</a></li>
				        <li class="nav1"><a href="#">討 論 區</a></li>
				        <li class="nav2"><a href="#">遊戲專欄</a></li>
				        <li class="nav2"><a href="#">聯絡我們</a></li>
				    </ul>
				  </div>
			</nav>
		</header>		
			<!--大富翁-->
			<div class="Monopoly">
				<div class="Monopoly_frame">
					<img src="jomor_html/img/11.png" class="img-monopoly">
					<div class="monopoly_button01"><!--按鈕連結-->
						<a href="store1-2.html" onmouseover="mouseOver1()" onmouseout="mouseOut1()"><img src="jomor_html/img/button01.png" width="170" height="150" id="a1"></a>
					</div>
					<div class="monopoly_button02"><!--按鈕連結-->
						<a href="store1-2.html" onmouseover="mouseOver2()" onmouseout="mouseOut2()"><img src="jomor_html/img/button02.png" width="176" height="152" id="a2"></a>
					</div>
					<div class="monopoly_button03"><!--按鈕連結-->
						<a href="store1-2.html" onmouseover="mouseOver3()" onmouseout="mouseOut3()"><img src="jomor_html/img/button04.png" width="170" height="150" id="a3"></a>
					</div>
					<div class="monopoly_button04"><!--按鈕連結-->
						<a href="store1-2.html" onmouseover="mouseOver4()" onmouseout="mouseOut4()"><img src="jomor_html/img/button06.png" width="176" height="152" id="a4"></a>
					</div>
				</div>
			</div>
			<!--輪播圖-->
			<div>
				<div class="flexslider">
			  		<ul class="slides">
			        	<li><img src="jomor_html/img/s1.jpg" /></li>
			        	<li><img src="jomor_html/img/s2.jpg" /></li>
			            <li><img src="jomor_html/img/s3.jpg" /></li>
			            <li><img src="jomor_html/img/s4.jpg" /></li>
			  		</ul>
		   		</div>
		   		<img src="jomor_html/img/12.png" class="img_flexslider">
		   	</div>
   		<!--公告區-->
   		<div class="news">
   			<table>
   				<tr>
   					<td class="border_bottom"><img class="triangle_css"src="jomor_html/img/triangle.png" /></td>
   					<td width="800px" class="border_bottom">最新公告</td>
   					<td class="border_bottom"><a href="#" class="myButton">MORE</a></td>
   					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   					<td><img class="triangle_css"src="jomor_html/img/triangle.png" /></td>
   					<td width="800px" class="border_bottom">討論版</td>
   					<td><a href="#" class="myButton2">MORE</a></td>
   				</tr>
   				<tr>
   					<td class="date_bg">2016/7/28</td>
   					<td colspan="2" class="rows">好康大放送11111111111111111</td>
   					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   					<td class="date_bg_2">2016/7/28</td>
   					<td colspan="2" class="rows">好康大放送11111111111111111-2</td>
   				</tr>
   				<tr>
   					<td class="date_bg">2016/7/29</td>
   					<td colspan="2" class="rows">好康大放送2222222222222222</td>
   					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   					<td class="date_bg_2">2016/7/28</td>
   					<td colspan="2" class="rows">好康大放送222222222222222-2</td>
   				</tr>
   				<tr>
   					<td class="date_bg">2016/8/08</td>
   					<td colspan="2" class="rows">好康大放送33333333333333333</td>
   					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   					<td class="date_bg_2">2016/7/28</td>
   					<td colspan="2" class="rows">好康大放送333333333333333-2</td>
   				</tr>
   				<tr>
   					<td class="date_bg">2016/8/08</td>
   					<td colspan="2" class="rows">好康大放送44444444444444</td>
   					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   					<td class="date_bg_2">2016/7/28</td>
   					<td colspan="2" class="rows">好康大放送444444444444444-2</td>
   				</tr>
   			</table>
   		</div>
   		<!--底圖-->
   		<div class="footer_bg">
   			<img src="jomor_html/img/footerbg.png" width="1280">
   		<!--底下導覽列-->
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
</body>
</html>