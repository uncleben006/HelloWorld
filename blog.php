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
	<body id="body0" style="
    background: #548E93  center center fixed no-repeat;
    -moz-background-size: cover;
    background-size: cover;"><!--背景符合螢幕高度填滿-->
		<?php 
			include('include/link.php');
			include('include/sessionCheck.php');
			include('include/header.php'); 
		?>
		<section class="essay_section">
			<div class="essaybt_div"> <!--頁籤-->
				<a href="#" class="essay_myButton">全部</a>
				<!--
				<a href="#" class="essay_myButton">桌遊</a>
				<a href="#" class="essay_myButton">店家</a>
				-->
			</div>

			<div class="topic_div" ><!--主題文章欄-->
				<a href="blog2.php"><!--單一主題文章欄-->
				<div class="topic_white">
					<div class="topic_img_div">
						<img class="topic_img" src="jomor_html/img/blogimg/blogdm3.jpg">
						<a href="blog2-3.php"><div class="topic_img_hover_div"></div></a><!--滑鼠移過去的變色區塊-->
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
						<a href="blog2-3.php"><div class="topic_title_hover_div"></div></a>
					</div>
				</div>
				</a>
			</div>

			<div class="topic_div" ><!--主題文章欄-->
				<a href="blog2.php"><!--單一主題文章欄-->
				<div class="topic_white">
					<div class="topic_img_div">
						<img class="topic_img" src="jomor_html/img/blogimg/blogdm2-1.jpg">
						<a href="blog2-2.php"><div class="topic_img_hover_div"></div></a><!--滑鼠移過去的變色區塊-->
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
						<a href="blog2-2.php"><div class="topic_title_hover_div"></div></a>
					</div>
				</div>
				</a>
			</div>

			<div class="topic_div" ><!--主題文章欄-->
				<a href="blog2.php"><!--單一主題文章欄-->
				<div class="topic_white">
					<div class="topic_img_div">
						<img class="topic_img" src="jomor_html/img/blogimg/blogdm2.jpg">
						<a href="blog2.php"><div class="topic_img_hover_div"></div></a><!--滑鼠移過去的變色區塊-->
					</div>
					<div class="topic_title_div"><!--文章欄的標題與簡短內文部分-->
						<div class="topic_title">
							<p class="topic_title_p1">搶救皮皮君：森林派對の危機</p>
							<p class="topic_title_p2">十大派對桌遊介紹</p>
						</div>
						<div class="topic_title_p3">
							<p>皮皮君想找猴子夥伴們一起玩桌遊，卻不曉得哪些派對桌遊比較好玩。神秘人物寄了一份清單給皮皮，不過清單上面太多選擇了，請大家幫幫皮皮君挑選遊戲吧！</p>
							<!--<p>&nbsp;</p>
							<p>(如需更詳盡的桌遊介紹請洽桌遊店家)</p>-->
						</div>
						<a href="blog2.php"><div class="topic_title_hover_div"></div></a>
					</div>
				</div>
				</a>
			</div>

		</section>
		<!--
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
		-->
</body>
</html>