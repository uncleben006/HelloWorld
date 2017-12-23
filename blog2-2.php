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
				<span><a class="path_p" href="blog2-2.php">波爸的南極之旅</a></span>
			</div>
			<div class="topic_div" ><!--主題文章欄-->
				<div class="topic_white2"><!--單一主題文章欄-->
					<div class="topic_img_div">
						<img class="topic_img" src="jomor_html/img/blogimg/blogdm2-1.jpg">
						
					</div>
					<div class="topic_title_div"><!--文章欄的標題與簡短內文部分-->
						<div class="topic_title">
							<p class="topic_title_p1">波爸的南極之旅</p>
							<p class="topic_title_p2">企鵝類桌遊介紹</p>
						</div>
						<div class="topic_title_p3">
							<p>波爸為了躲避炎熱的夏天，這次來到南極旅遊啦!在旅遊的途中認識了好客的企鵝們，熱情的介紹他們所玩的遊戲，快來看看企鵝們推薦哪幾種遊戲給波爸吧!</p>
							<!--<p>&nbsp;</p>
							<p>(如需更詳盡的桌遊介紹請洽桌遊店家)</p>-->
						</div>
						
					</div>
				</div>
			</div>
			<!--小篇文章方塊列表-->
			<div class="essay_block_div">
				<div class="essay_block">
					<img src="jomor_html/img/blogimg/blog_cover/game2-1.png" style="height: 60%;position: relative;top: 45px;">
					<div class="cover_bg">
						<p class="cover_name">冰酷企鵝</p>
					</div>
					<a href="blog_more2-1.php"><div class="eassay_cover_hover"></div></a>
				</div>
				<div class="essay_block">
					<img src="jomor_html/img/blogimg/blog_cover/game2-2.png" style="height: 60%;position: relative;top: 45px;">
					<div class="cover_bg">
						<p class="cover_name">冰山疊企鵝</p>
					</div>
					<a href="blog_more2-2.php"><div class="eassay_cover_hover"></div></a>
				</div>
				<div class="essay_block">
					<img src="jomor_html/img/blogimg/blog_cover/game2-3.png" style="height: 60%;position: relative;top: 45px;">
					<div class="cover_bg">
						<p class="cover_name">嘿！我的魚！</p>
					</div>
					<a href="blog_more2-3.php"><div class="eassay_cover_hover"></div></a>
				</div>
				<!--分享區塊-->
				<div class="eassay_share_block">
					<div class="share_block">
						<img class="shareicon" src="jomor_html/img/shareicon.png">
						<span class="share_p">share!</span>
						<div class="share_bt_div">
							<!--fb分享按鈕-->
							<a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent('http://www.jomorparty.com/blog2.php'))));">
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

						<!--舊的臉書外掛（106/5/1更新）
						<div class="fb-page1">
							<div class="fb-page" data-href="https://www.facebook.com/jomor.party/" data-tabs="timeline" data-width="320" data-height="280" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/jomor.party/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jomor.party/">桌末狂歡 Jomor - 桌遊資訊平台</a></blockquote></div>
						</div>
						<div class="fb-page2">
							<div class="fb-page" data-href="https://www.facebook.com/jomor.party/" data-tabs="timeline" data-width="500" data-height="390" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/jomor.party/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jomor.party/">桌末狂歡 Jomor - 桌遊資訊平台</a></blockquote></div>
						</div>
						<div class="fb-page3">
							<div class="fb-page" data-href="https://www.facebook.com/jomor.party/" data-tabs="timeline" data-width="320" data-height="390" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/jomor.party/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jomor.party/">桌末狂歡 Jomor - 桌遊資訊平台</a></blockquote></div>
						</div>
						<div class="fb-page4">
							<div class="fb-page" data-href="https://www.facebook.com/jomor.party/" data-tabs="timeline" data-width="270" data-height="350" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/jomor.party/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jomor.party/">桌末狂歡 Jomor - 桌遊資訊平台</a></blockquote></div>
						</div>-->
					</div>
						<!--fb大螢幕顯示長度
						<div class="fb_iframe" class="fb-page fb_iframe_widget"  data-href="https://www.facebook.com/womany.net/" data-tabs="timeline" data-width="350" data-height="275" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false" data-hide-cta="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=false&amp;app_id=226870747360988&amp;container_width=350&amp;height=275&amp;hide_cover=false&amp;hide_cta=true&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwomany.net%2F&amp;locale=zh_TW&amp;sdk=joey&amp;show_facepile=false&amp;small_header=true&amp;tabs=timeline&amp;width=350"><span style="vertical-align: bottom; width: 100%; height: 345px;"><iframe name="fb80a7f2dad92c" width="100%" height="275px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.3/plugins/page.php?adapt_container_width=false&amp;app_id=226870747360988&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FfTmIQU3LxvB.js%3Fversion%3D42%23cb%3Df19bebfb3ec5cdc%26domain%3Dwomany.net%26origin%3Dhttps%253A%252F%252Fwomany.net%252Ff1a1534a2ac7594%26relation%3Dparent.parent&amp;container_width=350&amp;height=275&amp;hide_cover=false&amp;hide_cta=true&amp;href=https://www.facebook.com/jomor.party/?fref=tsF&amp;locale=zh_TW&amp;sdk=joey&amp;show_facepile=false&amp;small_header=true&amp;tabs=timeline&amp;width=350" ></iframe></span></div>
						// fb767螢幕顯示長度
						<div class="fb_iframe2" class="fb-page fb_iframe_widget"  data-href="https://www.facebook.com/womany.net/" data-tabs="timeline" data-width="568" data-height="345" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false" data-hide-cta="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=false&amp;app_id=226870747360988&amp;container_width=568&amp;height=345&amp;hide_cover=false&amp;hide_cta=true&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwomany.net%2F&amp;locale=zh_TW&amp;sdk=joey&amp;show_facepile=false&amp;small_header=true&amp;tabs=timeline&amp;width=350"><span style="vertical-align: bottom; width: 100%; height: 345px;"><iframe name="fb80a7f2dad92c" width="100%" height="345px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.3/plugins/page.php?adapt_container_width=false&amp;app_id=226870747360988&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FfTmIQU3LxvB.js%3Fversion%3D42%23cb%3Df19bebfb3ec5cdc%26domain%3Dwomany.net%26origin%3Dhttps%253A%252F%252Fwomany.net%252Ff1a1534a2ac7594%26relation%3Dparent.parent&amp;container_width=568&amp;height=345&amp;hide_cover=false&amp;hide_cta=true&amp;href=https://www.facebook.com/jomor.party/?fref=tsF&amp;locale=zh_TW&amp;sdk=joey&amp;show_facepile=false&amp;small_header=true&amp;tabs=timeline&amp;width=568" ></iframe></span></div>
						//fb小螢幕顯示長度
						<div class="fb_iframe2" class="fb-page fb_iframe_widget"  data-href="https://www.facebook.com/womany.net/" data-tabs="timeline" data-width="350" data-height="345" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false" data-hide-cta="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=false&amp;app_id=226870747360988&amp;container_width=350&amp;height=345&amp;hide_cover=false&amp;hide_cta=true&amp;href=https%3A%2F%2Fwww.facebook.com%2Fwomany.net%2F&amp;locale=zh_TW&amp;sdk=joey&amp;show_facepile=false&amp;small_header=true&amp;tabs=timeline&amp;width=350"><span style="vertical-align: bottom; width: 100%; height: 345px;"><iframe name="fb80a7f2dad92c" width="100%" height="345px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.3/plugins/page.php?adapt_container_width=false&amp;app_id=226870747360988&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FfTmIQU3LxvB.js%3Fversion%3D42%23cb%3Df19bebfb3ec5cdc%26domain%3Dwomany.net%26origin%3Dhttps%253A%252F%252Fwomany.net%252Ff1a1534a2ac7594%26relation%3Dparent.parent&amp;container_width=350&amp;height=345&amp;hide_cover=false&amp;hide_cta=true&amp;href=https://www.facebook.com/jomor.party/?fref=tsF&amp;locale=zh_TW&amp;sdk=joey&amp;show_facepile=false&amp;small_header=true&amp;tabs=timeline&amp;width=350" ></iframe></span></div>
						-->
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