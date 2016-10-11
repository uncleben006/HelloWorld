<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<!--輪播-->
	<script src="//code.jquery.com/jquery-latest.min.js"></script>
	<script src="//unslider.com/unslider.js"></script>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<!--大富翁按鍵的圖片的javascript-->
	<script type="text/javascript">
		$(function() {
    		$('.banner').unslider();
	});
	</script>
	<script type="text/javascript" src="javascript.js"></script>
<meta charset="utf-8">
</head>
	<body id="body0">
		<?php include('header.php') ?>
			<!--大富翁-->
			<div class="Monopoly">
				<div class="Monopoly_frame">
					<img src="jomor_html/img/11.png" class="img-monopoly">
					<div class="monopoly_button01"><!--店家地圖按鈕連結-->
						<a href="store1-2.html" onmouseover="mouseOver1()" onmouseout="mouseOut1()"><img src="jomor_html/img/button01.png" width="170" height="150" id="a1"></a>
					</div>
					<div class="monopoly_button02"><!--我要揪團按鈕連結-->
						<a href="jo.html" onmouseover="mouseOver2()" onmouseout="mouseOut2()"><img src="jomor_html/img/button02.png" width="176" height="152" id="a2"></a>
					</div>
					<div class="monopoly_button03"><!--桌遊專欄按鈕連結-->
						<a href="blog.html" onmouseover="mouseOver3()" onmouseout="mouseOut3()"><img src="jomor_html/img/button04.png" width="170" height="150" id="a3"></a>
					</div>
					<div class="monopoly_button04"><!--我要討論按鈕連結-->
						<a href="#.html" onmouseover="mouseOver4()" onmouseout="mouseOut4()"><img src="jomor_html/img/button06.png" width="176" height="152" id="a4"></a>
					</div>
				</div>
			</div>
			<div class="banner">
			    <ul>
			        <li style="background-image:url(jomor_html/img/s1.jpg);">This is a slide.</li>
			        <li style="background-image:url(jomor_html/img/s2.jpg);">This is another slide.</li>
			        <li style="background-image:url(jomor_html/img/s3.jpg);">This is a final slide.</li>
			    </ul>
			</div>
			<!--輪播圖-->
		<!--<div>
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
		-->
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