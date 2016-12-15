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
				<span><a class="path_p" href="blog2.php">搶救皮皮君：森林派對の危機</a></span>
				<span class="path_mark">></span>
				<span><a class="path_p" href="blog_more1-7.php">Bang!砰!介紹</a></span>
			</div>
			<div class="essay_more_white"><!--文章白底區塊-->
				<div class="essay_green_line"><!--文章綠線-->
					<div><!--文章上半部標題日期等資訊-->
						<span class="essay_kind">桌遊</span><!--文章類別-->
						<span class="essay_title_span"><!--文章標題與時間-->
							<div class="essay_title_p">搶救皮皮君：森林派對の危機</div>
							<div class="essay_title_p2">2016.10.20 | 十大派對桌遊介紹 | Bang!砰!</div>
						</span>
						<!--分享區塊-->
						<span class="essay_more_share_span">
							<img class="essay_more_shareicon" src="jomor_html/img/shareicon.png">
							<span class="essay_more_share_p">share!</span>
							<div class="essay_more_share_bt_div">
								<!--fb分享按鈕-->
								<a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent('http://www.jomorparty.com/blog_more1-7.php'))));">
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
							<img src="jomor_html/img/blogimg/blog1/game7.png">
						</span>
						<span class="essay_more_gname_block">
							<div class="essay_more_gname">第七名：Bang!砰!</div>
						<hr color="#96BDD2" width="85%" size="5" align="left">
							<div class="essay_more_gp">看過無間道的朋友們，在玩這款遊戲時會特別有共鳴。Bang!是以警長與歹徒對決為背景的經典桌遊。</div>
						</span>
						<span class="essay_more_grule_block">
							<div class="essay_more_gname">遊戲目標</div>
						<hr color="#96BDD2" width="120px" size="5" align="left">
							<div class="essay_more_gp">
								<p>警長被殺時，若場上只剩叛徒一人，則叛徒獲勝；反之為歹徒們獲勝。 另一結果:所有的歹徒和叛徒都被消滅，則警長和副警長們皆獲勝。</p>
							</div>
						</span>
						<span class="essay_more_artical_block">
							<div class="essay_more_gname">遊戲內容物</div>
						<hr color="#96BDD2" width="140px" size="5" align="left">
							<div class="essay_more_gp">
								<p>80張遊戲牌、16張角色牌、7張身份牌、7張玩家紙板、7張圖示說明卡</p>
							</div>
						</span>
						<!--圖片改檔名"game1-1"的部分-->
						<span class="blogimg_span">
							<img src="jomor_html/img/blogimg/blog1/game7-1.jpg" style="height: auto;width: 70%">
						</span>
						<span class="essay_more_artical_block">
							<div class="essay_more_gname">遊戲規則</div>
						<hr color="#96BDD2" width="30%" size="5" align="left">
							<div class="essay_more_gp">
								<p>遊戲主要分成四個角色：警長、副警長、歹徒以及叛徒，由扮演警長的玩家開始，每回合分成三個階段：
									<br>→抽牌階段：從牌堆上抽2張牌堆
									<br>→出牌階段：可以出任意張牌
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.每回合僅能使用1張「Bang!」攻擊(除非有其它能力)。 
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.擺在玩家面前的牌（藍色牌）每一種只能有一張。 
									<br>→棄牌階段：手牌必須小於自己的血量，多餘的皆需棄牌。以下任意一種情況發生時：
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.警長被殺時，若場上只剩叛徒一人，則叛徒獲勝；除此之外為歹徒們獲勝。 
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.所有的歹徒和叛徒都被消滅。警長和副警長們都獲勝。
								</p>
							</div>
						</span>
						<span class="essay_more_artical_block">
							<div class="essay_more_gp">
								<p>遊戲一開始，除了警長的身分需公開之外，其餘玩家皆需隱藏身分。副警長需在暗中保護警長並協助消滅其它玩家，在這勾心鬥角的遊戲當中，是否能正確判斷自己的同盟並獲得最終勝利，就需各憑真本事了。
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
							<div class="essay_more_gp">8歲以上</div>
						</span>
						<span class="game_introduction_span">
							<div class="essay_more_gname">遊玩人數</div>
							<hr color="#5D5D5D" width="66%" size="4">
							<div class="essay_more_gp">4-7人</div>
						</span>
						<span class="game_introduction_span">
							<div class="essay_more_gname">遊玩時間</div>
							<hr color="#5D5D5D" width="66%" size="4">
							<div class="essay_more_gp">20-40分鐘</div>
						</span>
					</div>
					<div><!--遊戲介紹列表圖片-->
						<img src="jomor_html/img/game_introduc.png" class="game_introduc_img">
					</div>
					<div class="game_intro_table_bg"><!--遊戲介紹列表淺藍色區塊-->
						<div class="game_intro_table">
							<span><a href="blog_more1-1.php" class="game_intro_bt">德國心臟病</a></span>
							<span><a href="blog_more1-2.php" class="game_intro_bt">妙語說書人</a></span>
							<span><a href="blog_more1-3.php" class="game_intro_bt">閃靈快手</a></span>
							<span><a href="blog_more1-4.php" class="game_intro_bt">誰是牛頭王</a></span>
							<span><a href="blog_more1-5.php" class="game_intro_bt">矮人礦坑</a></span>
							<span><a href="blog_more1-6.php" class="game_intro_bt">從前從前</a></span>
							<span><a href="blog_more1-7.php" class="game_intro_bt">Bang!砰!</a></span>
							<span><a href="blog_more1-8.php" class="game_intro_bt">印加寶藏</a></span>
							<span><a href="blog_more1-9.php" class="game_intro_bt">化裝舞會</a></span>
							<span><a href="blog_more1-10.php" class="game_intro_bt">凶煞迴廊</a></span>
						</div>
					</div>
				</div>
				<!--返回列表-->
				<a href="blog2.php"><div class="essay_back">返回列表</div></a>
			</div>

			
		</section>

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