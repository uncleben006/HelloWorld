<!DOCTYPE html>
<html>
<head>
	<title>桌遊資訊平台 - 桌末狂歡 JOMOR</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="javascript.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		<?php 
			include('include/link.php');
			include('include/sessionCheck.php');
			include('include/header.php'); 
		?>
<!--刪除大象藍底區塊
		<section class="blue_section">	//藍底大象
			<div class="blue_bg">
				<img class="blog_img" src="jomor_html/img/blogimg.png" height="240px" width="690px">
			</div>
		</section>
-->
		<!--
		<section>
			<div class="blogbutton_frame">	//頁籤按鈕
				<a href="#" class="blog_myButton">熱門文章</a>
				<a href="#" class="blog_myButton">最新文章</a>
			</div>
		</section>-->
		<!--文章區塊-->
		<section class="essay_section">
				<div class="essay_fram"><!--div表格法(第一篇的藍底區塊）-->
					<div class="eassy_row">
						<div class="eassy_pink"><!--粉紅日期區塊-->
							<div class="eassy_date">2016/11/07</div>
						</div>
						<div class="eassy_green"><!--綠色標題區塊-->
							<div class="eassy_title">新天鵝堡十大派對桌遊排行(下)</div>
						</div>
					</div>
					<div class="eassy_row"><!--圖片區塊-->
						<div class="eassy_img_div">
							<a href="blog_more.php" class="blog_imghover">
								<img class="eassy_img" src="jomor_html/img/blogimg/blogdm2.jpg">
							</a>
						</div>
						<div class="eassy_artical_div"><!--文章部分內文區塊-->
							<div class="eassy_artical">矮人礦坑是一款規則簡單、容易上手的派對陣營遊戲，很適合剛入門的新手玩。遊戲目標：好矮人- 挖取金礦；壞矮人- 阻止好矮人挖礦。</div>
							<div><a href="blog_more2.php" class="read_eassy_Button">閱讀全文</a></div>
						</div>
					</div>
				</div>
				<div class="essay_fram"><!--div表格法(第二篇的藍底區塊）-->
				<div class="eassy_row">
					<div class="eassy_pink"><!--粉紅日期區塊-->
						<div class="eassy_date">2016/11/06</div>
					</div>
					<div class="eassy_green"><!--綠色標題區塊-->
						<div class="eassy_title">新天鵝堡十大派對桌遊排行(上)</div>
					</div>
				</div>
				<div class="eassy_row"><!--圖片區塊-->
					<div class="eassy_img_div">
						<a href="blog_more.php" class="blog_imghover">
								<img class="eassy_img" src="jomor_html/img/blogimg/blogdm1.jpg">
						</a>
					</div>
					<div class="eassy_artical_div"><!--文章部分內文區塊-->
						<div class="eassy_artical">透過粉絲專頁「桌末狂歡 Jomor - 桌遊資訊平台」所舉辦為期八天的活動「搶救皮皮君：森林派對の危機」之中(10/8-10/15)，從二十款新天鵝堡派對桌遊中票選出前十名，將分為上下篇，提供讀者在派對遊戲中有更多的選擇。</div>
						<div><a href="blog_more.php" class="read_eassy_Button">閱讀全文</a></div>
					</div>
				</div>
			</div>
		</section>
		<footer class="footer_css_11">
				<div class="footer_white"></div>
				<div class="index_yellow"> 
					<div class="index_yellow_pp">｜桌遊資訊平台｜桌末狂歡｜</div>
				</div>
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
		</footer>
</body>
</html>