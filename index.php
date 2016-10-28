<!DOCTYPE html>
<html>
	<head>
		<title>jomor桌末狂歡</title>
		<!--輪播圖-->
		<!-- Demo CSS -->
		<link rel="stylesheet" href="flexslider.css" type="text/css" media="screen" />
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
		<link rel="icon" href="jomor_html/img/jomorparty_logo.png" type="image/ico" />
	</head>
	<body id="body0">
		<?php 
			include('include/link.php');
			include('include/sessionCheck.php');
			include('include/header.php') 
		?>		
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
			  	    	    <img src="jomor_html/img/f2.png" />
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
			</div><!--輪播圖結束-->

				<!--跳出皮皮君介紹-->
					    <div id="aboutmascot01">
					    <div class="aboutmascot_position">
					        <div class="aboutmascot_fram01">
					            <span class="aboutmascot_title">皮皮君簡介</span>
					            <!--關掉的xx-->
					            <span class="aboutmascot_close" onClick="javascript:window.location.href='index.php';">
					            <img src="jomor_html/img/close.png" class="sure_close_img">
					            </span>
					        </div> 
					            <div class="aboutmascot_fram02">
					               <img src="jomor_html/img/aboutmascot1.png" class="aboutmascot_img">
					            </div>
					    </div> 
					    </div><!--跳出熊哥介紹結束-->
						<!--跳出熊哥介紹-->
					    <div id="aboutmascot02">
					    <div class="aboutmascot_position">
					        <div class="aboutmascot_fram01">
					            <span class="aboutmascot_title">熊哥簡介</span>
					            <!--關掉的xx-->
					            <span class="aboutmascot_close" onClick="javascript:window.location.href='index.php';">
					            <img src="jomor_html/img/close.png" class="sure_close_img">
					            </span>
					        </div> 
					            <div class="aboutmascot_fram02">
					               <img src="jomor_html/img/aboutmascot2.png" class="aboutmascot_img">
					            </div>
					    </div> 
					    </div><!--跳出熊哥介紹結束-->
					    <!--跳出笨太郎介紹-->
					    <div id="aboutmascot03">
					    <div class="aboutmascot_position">
					        <div class="aboutmascot_fram01">
					            <span class="aboutmascot_title">笨太郎簡介</span>
					            <!--關掉的xx-->
					            <span class="aboutmascot_close" onClick="javascript:window.location.href='index.php';">
					            <img src="jomor_html/img/close.png" class="sure_close_img">
					            </span>
					        </div> 
					            <div class="aboutmascot_fram02">
					               <img src="jomor_html/img/aboutmascot3.png" class="aboutmascot_img">
					            </div>
					    </div> 
					    </div><!--跳出笨太郎介紹結束-->
					    <!--跳出波爸介紹-->
					    <div id="aboutmascot04">
					    <div class="aboutmascot_position">
					        <div class="aboutmascot_fram01">
					            <span class="aboutmascot_title">波爸簡介</span>
					            <!--關掉的xx-->
					            <span class="aboutmascot_close" onClick="javascript:window.location.href='index.php';">
					            <img src="jomor_html/img/close.png" class="sure_close_img">
					            </span>
					        </div> 
					            <div class="aboutmascot_fram02">
					               <img src="jomor_html/img/aboutmascot4.png" class="aboutmascot_img">
					            </div>
					    </div> 
					    </div><!--跳出波爸介紹結束-->					    
				<!--吉祥物區塊-->
				<div class="mascot_fram">
					<a href="#">
						<span class="mascot_span">
							<img src="jomor_html/img/mascot01-2.png" class="mascot_img00">
							<img src="jomor_html/img/mascot01.png" class="mascot_img00" onClick="op_aboutmascot01(aboutmascot01)">
						</span>
						<span class="mascot_span">
							<img src="jomor_html/img/mascot02-2.png" class="mascot_img01">
							<img src="jomor_html/img/mascot02.png" class="mascot_img01" onClick="op_aboutmascot01(aboutmascot02)">
						</span>
						<span class="mascot_span">
							<img src="jomor_html/img/mascot03-2.png" class="mascot_img00">
							<img src="jomor_html/img/mascot03.png" class="mascot_img00" onClick="op_aboutmascot01(aboutmascot03)">
						</span>
						<span class="mascot_span">
							<img src="jomor_html/img/mascot04-2.png" class="mascot_img00">
							<img src="jomor_html/img/mascot04.png" class="mascot_img00" onClick="op_aboutmascot01(aboutmascot04)">
						</span>
					</a>
					
				</div>
				<div class="index_red"></div>
				<div class="index_yellow"></div>
				<div class="footer_bt_div">
					<span class="footer_span">
						<a href="https://www.facebook.com/jomor.party/?fref=nf" class="footer_a"  target=_blank>
							<span class="footer_hover">
								<img src="jomor_html/img/fb2.png" class="index_footer_bt">
								<img src="jomor_html/img/fb.png" class="index_footer_bt">
							</span>
						</a>
					</span>
					<span class="footer_span">
						<a href="mailto:ics.jomorparty@gmail.com" class="footer_a">
							<span class="footer_hover">
								<img src="jomor_html/img/mailus2.png" class="index_footer_bt">
								<img src="jomor_html/img/mailus.png" class="index_footer_bt">
							</span>
						</a>
					</span>
					<span class="footer_span">
						<a href="http://www.swanpanasia.com/" class="footer_a" target=_blank>
							<span class="footer_hover">
								<img src="jomor_html/img/heaven2.png" class="index_footer_bt">
								<img src="jomor_html/img/heaven.png" class="index_footer_bt">
							</span>
						</a>
					</span>
				</div>
	</body>
</html>






