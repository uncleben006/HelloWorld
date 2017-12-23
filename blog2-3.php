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
		<section class="essay_section">
			<div class="essay_path_div"> <!--路徑-->
				<span class="circle"></span><!--粉紅色圓圈圈-->
				<span><a class="path_p" href="blog.php">桌遊專欄</a></span>
				<span class="path_mark">></span>
				<span><a class="path_p" href="blog2-3.php">特色店家-笨太郎去哪兒？</a></span>
			</div>
			<div class="topic_div" ><!--主題文章欄-->
				<div class="topic_white2"><!--單一主題文章欄-->
					<div class="topic_img_div">
						<img class="topic_img" src="jomor_html/img/blogimg/blogdm3.jpg">
						
					</div>
					<div class="topic_title_div"><!--文章欄的標題與簡短內文部分-->
						<div class="topic_title">
							<p class="topic_title_p1">笨太郎去哪兒？</p>
							<p class="topic_title_p2">特色店家介紹</p>
						</div>
						<div class="topic_title_p3">
							<p>喜歡玩捉迷藏的笨太郎，這次提高了遊玩難度，他只告訴團員們捉迷藏的範圍在這幾間桌遊店，幸運地找到笨太郎後就順便一起打桌遊吧！</p>
							<!--<p>&nbsp;</p>
							<p>(如需更詳盡的桌遊介紹請洽桌遊店家)</p>-->
						</div>
						
					</div>
				</div>
			</div>
			<!--小篇文章方塊列表-->
			<div class="essay_block_div">
				<div class="essay_block">
					<img src="system/store/photo/taipei27.jpg" style="width:100%;position: relative;top: 24px;">
					<div class="cover_bg">
						<p class="cover_name">骰子人(景美店)</p>
					</div>
					<a href="blog_more3-1.php"><div class="eassay_cover_hover"></div></a>
				</div>
				<div class="essay_block">
					<img src="system/store/photo/taipei42.jpg" style="width:100%;position: relative;top: 24px;">
					<div class="cover_bg">
						<p class="cover_name">骰子人(中和店)</p>
					</div>
					<a href="blog_more3-2.php"><div class="eassay_cover_hover"></div></a>
				</div>
				<div class="essay_block">
					<img src="system/store/photo/taipei01.jpg" style="width:100%;position: relative;top: 24px;">
					<div class="cover_bg">
						<p class="cover_name">女巫店</p>
					</div>
					<a href="blog_more3-3.php"><div class="eassay_cover_hover"></div></a>
				</div>
				<div class="essay_block2" style="top: -79px">
					<img src="system/store/photo/taipei02.jpg" style="width:100%;position: relative;top: 24px;">
					<div class="cover_bg">
						<p class="cover_name">swan caf'e 天鵝桌遊館</p>
					</div>
					<a href="blog_more3-4.php"><div class="eassay_cover_hover"></div></a>
				</div>
				<!--分享區塊-->
				<div class="eassay_share_block">
					<div class="share_block">
						<img class="shareicon" src="jomor_html/img/shareicon.png">
						<span class="share_p">share!</span>
						<div class="share_bt_div">
							<!--fb分享按鈕-->
							<a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent('http://www.jomorparty.com/blog2-3.php'))));">
								<img src="jomor_html/img/login_fb.png" class="share_fb_bt">
							</a>
							<div class="line-it-button" style="display: none;" data-type="share-d" data-lang="zh-Hant" ></div>
							<script src="//scdn.line-apps.com/n/line_it/thirdparty/loader.min.js" async="async" defer="defer" ></script>
						</div>

					</div>
					<div class="fb_block">
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.8";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						
						<!--臉書外掛（106/5/1更新）-->
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fjomor.party%2F%3Fref%3Dts%26fref%3Dts&tabs=timeline&width=320&height=280&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="320" height="280" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
				</div>
			</div>

			
		</section>
		<!--top按鈕-->
			<a href="#" id="goTop"><img src="../../jomor_html/img/top.png" class="gotop_img"></a>

		<footer class="footer_css_12">
				<div class="index_yellow"> 
					<div class="index_yellow_pp">｜桌遊資訊平台｜桌末狂歡版權所有｜</div>
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