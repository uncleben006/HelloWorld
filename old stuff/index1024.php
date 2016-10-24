<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<!--輪播圖-->
		<!-- Demo CSS -->
		<link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />
		<link rel="icon" href="jomor_html/img/jomorparty_logo.png" type="image/ico" />
	<!-- jQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">			
		</script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')
		</script>
  <!-- FlexSlider -->
  <script defer src="jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
	<!--css-->
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

		<?php 
		include('include/link.php');
		include('include/sessionCheck.php');
		include('include/header.php') 
		?>		
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
		<!--輪播圖-->
			<div id="container" class="cf">
				<div id="main" role="main">
			      <section class="slider">
			        <div class="flexslider">
			          <ul class="slides">
			            <li>
			  	    	    <img src="jomor_html/img/f1.png" />
			  	    		</li>
			  	    		<li>
			  	    	    <img src="jomor_html/img/kitchen_adventurer_lemon.jpg" />
			  	    		</li>
			  	    		<li>
			  	    	    <img src="jomor_html/img/kitchen_adventurer_donut.jpg" />
			  	    		</li>
			  	    		<li>
			  	    	    <img src="jomor_html/img/kitchen_adventurer_caramel.jpg" />
			  	    		</li>
			          </ul>
			        </div>
			      </section>
			    </div>
			    			<!--輪播圖右下方圖片-->
	   		<div>
	   			<img src="jomor_html/img/12.png" class="img_flexslider">
	   		</div>
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
				        <li class="fnav0"><a href="http://www.swanpanasia.com/">合作廠商</a></li>
				        <li class="fnav1">│</li>
				        <li class="fnav0"><a href="https://www.facebook.com/jomor.party/?fref=nf">粉絲專頁</a></li>
				        <li class="fnav1">│</li>
				        <li class="fnav0"><a href="aboutus.html">聯絡我們</a></li>
				    </ul>
				</div>
	   		</footer>
	   	</div>
	</body>
</html>