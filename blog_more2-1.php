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
				<span class="path_mark">></span>
				<span><a class="path_p" href="blog_more2-1.php">冰酷企鵝介紹</a></span>
			</div>
			<div class="essay_more_white"><!--文章白底區塊-->
				<div class="essay_green_line"><!--文章綠線-->
					<div><!--文章上半部標題日期等資訊-->
						<span class="essay_kind">桌遊</span><!--文章類別-->
						<span class="essay_title_span"><!--文章標題與時間-->
							<div class="essay_title_p">波爸的南極之旅</div>
							<div class="essay_title_p2">2017.05.14 | 企鵝類桌遊介紹 | 冰酷企鵝</div>
						</span>
						<!--分享區塊-->
						<span class="essay_more_share_span">
							<img class="essay_more_shareicon" src="jomor_html/img/shareicon.png">
							<span class="essay_more_share_p">share!</span>
							<div class="essay_more_share_bt_div">
								<!--fb分享按鈕-->
								<a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent('http://www.jomorparty.com/blog_more2-1.php'))));">
									<img src="jomor_html/img/login_fb.png" class="essay_more_share_fb_bt">
								</a>
								<div class="line-it-button" style="display: none;" data-type="share-c" data-lang="zh-Hant" ></div>
								<script src="//scdn.line-apps.com/n/line_it/thirdparty/loader.min.js" async="async" defer="defer" ></script>
							</div>
						</span>
					</div>
					<!--分隔線-->
					<hr color="#96BDD2" width="100%" size="5">
					<!--文章內文-->
					<div class="essay_more_words">
						<span>
							<img src="jomor_html/img/blogimg/blog2/game2-1.png" style=" width: 300px;margin: 50px 30px 30px 30px;">
						</span>
						<span class="essay_more_gname_block">
							<div class="essay_more_gname">冰酷企鵝</div>
						<hr color="#96BDD2" width="85%" size="5" align="left">
							<div class="essay_more_gp">冰酷企鵝是一款彈彈樂類型的趣味遊戲，依靠玩家的彈指神功，讓企鵝在校園內優美地滑行和跳躍！</div>
						</span>
						<span class="essay_more_grule_block">
							<div class="essay_more_gname">遊戲目標</div>
						<hr color="#96BDD2" width="120px" size="5" align="left">
							<div class="essay_more_gp">
								<p>每回合會有一隻企鵝要當訓導主任負責抓另外三隻逃跑出去吃魚的學生。每一回合若有任何一隻學生將魚抓完，或是訓導主任抓到所有學生，這回合即結束。當每個人都當過一次訓導主任後，統計誰獲得的魚數最多即獲勝。</p>
							</div>
						</span>
						<span class="essay_more_artical_block">
							<div class="essay_more_gname">遊戲內容物</div>
						<hr color="#96BDD2" width="140px" size="5" align="left">
							<div class="essay_more_gp">
								<p>企鵝4隻、紙板盒5個（校園空間）、肥魚16條（紅、黃、籃、綠各三條、白色4條）、魚卡45張（標示分數1、2、3）、顏色提醒卡4張、企鵝學生證4張</p>
							</div>
						</span>
						<!--圖片改檔名"game1-1"的部分-->
						<span class="blogimg_span">
							<img src="jomor_html/img/blogimg/blog2/game2-1-1.jpg" style="height: auto;width: 50%">
						</span>
						<span class="essay_more_artical_block">
							<div class="essay_more_gname">遊戲規則</div>
						<hr color="#96BDD2" width="30%" size="5" align="left">
							<div class="essay_more_gp">
								<p>每回合會有一人擔任訓導主任，另外三人擔任學生，當一回合結束後再換一人擔任主任，直到每個玩家都當過一次訓導主任後，遊戲即結束。
擔任學生的玩家在該回合的任務就是要想盡辦法將自己的企鵝彈過所有有魚的門，而訓導主任的任務就是要想盡辦法碰到所有的學生。被主任碰到的學生就要交出自己的學生證給主任。如果該回合有任何一隻企鵝吃到三隻魚（通過魚門），或是訓導主任碰到所有學生，這回合就結束。每人依據手中的學生證數量去抽取卡牌中的魚卡。接著換一位玩家擔任主任並拿回各自的學生證以及將肥魚放回門上後，開始新的一回合。直到每人都當過一次訓導主任後，遊戲即結束，每位玩家統計手上的魚卡分數，分數最高者獲勝。
</p>
							</div>
						</span>
						<!--圖片改檔名"game1-2"的部分-->
						<span class="blogimg_span">
							<img src="jomor_html/img/blogimg/blog2/game2-1-2.jpg" style="height: auto;width: 50%">
						</span>
						<span class="essay_more_artical_block">
							<div class="essay_more_gp">
								<p>此款遊戲在美術設計上相當用心，每個教室都有許多小細節耐人尋味。加上特殊的不倒翁企鵝設計，讓玩家可以鑽研彈法，讓企鵝能夠做出旋轉、跳躍等的高難度技巧。
								</p>
							</div>
						</span>
					</div>
					<!--分隔線-->
					<hr color="#96BDD2" width="100%" size="5">
					<!--遊戲的基本資訊介紹-->
					<div class="game_introduction">
						<span class="game_introduction_span">
							<div class="essay_more_gname">適合年齡</div>
							<hr color="#5D5D5D" width="66%" size="4">
							<div class="essay_more_gp">6歲以上</div>
						</span>
						<span class="game_introduction_span">
							<div class="essay_more_gname">遊玩人數</div>
							<hr color="#5D5D5D" width="66%" size="4">
							<div class="essay_more_gp">2-4人</div>
						</span>
						<span class="game_introduction_span">
							<div class="essay_more_gname">遊玩時間</div>
							<hr color="#5D5D5D" width="66%" size="4">
							<div class="essay_more_gp">30分鐘</div>
						</span>
					</div>
					<div><!--遊戲介紹列表圖片-->
						<img src="jomor_html/img/game_introduc.png" class="game_introduc_img">
					</div>
					<div class="game_intro_table_bg"><!--遊戲介紹列表淺藍色區塊-->
						<div class="game_intro_table">
							<span><a href="blog_more2-1.php" class="game_intro_bt">冰酷企鵝</a></span>
							<span><a href="blog_more2-2.php" class="game_intro_bt">冰山疊企鵝</a></span>
							<span><a href="blog_more2-3.php" class="game_intro_bt">嘿！我的魚！</a></span>
						</div>
					</div>
				</div>
				<!--返回列表-->
				<a href="blog2-2.php"><div class="essay_back">返回列表</div></a>
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