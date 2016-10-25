<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<script src="jquery.min.js"></script>	
	<meta charset="utf-8">
	<link rel="icon" href="jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		<?php include('../../include/userHeader.php'); ?>
		<section><!--註冊框-->
			<div class="register_div">
				<div class="register_bg"><!--註冊黃色框-->
					<div class="register_white"><!--註冊白色框-->
						<div class="register_p_div">
							<h1 class="register_p">歡迎來到桌末狂歡！</h1>
						</div>
						<form action="signupCheck.php" name="form0" id="form0" method="post" enctype="multipart/form-data">
						<!--預先取得wrong變數，做註冊錯誤時的判斷-->
							<?php
								if(isset($_GET['wrong'])){
									$wrong = $_GET['wrong'];
								}
								else{
									$wrong = 0;
								}
							?>	


							<div class="headph_div"><!--頭像部分-->
								<span class="headph_span">
									<img id="img0" src="../../jomor_html/img/headph.png" class="headphoto">
								</span>
								<span style="display:inline-block">
									<!--圖片錯誤時跳出紅字警告-->
									<?php
										if($wrong==4){
										?>
										<div class="alert" >
											<font color="red"><?php echo $_SESSION['errMSG'] ?></font>
										</div>
										<?php
									}
									?>
									<div class="upload" onmouseover="pic1()" onmouseout="pic2()" id="pic">
										<input type="file" class="upload1" name="pic" id="pic0" accept="image/*" value="瀏覽檔案" >
									</div>
								</span>
								
							</div><!--頭像部分-->

							<hr color="#A0920D" size="3" width="95%">
							<!--填寫資訊欄-->
							<table class="register_table">


								<tr><!--第一行標題文字-->
									<td class="register_td1">帳號</td>
									<td class="register_td2">
										<?php
											if($wrong==0){
												?>
												<div><font color="red"><?php echo "*必填" ?></font></div>
												<?php
											} 
											else if($wrong==3){
												?>
												<div><font color="red"><?php echo "帳號重複，請重新輸入" ?></font></div>
												</td>
												<?php
											}
											else{
												?>
												<div><font color="red"><?php echo "*必填" ?></font></div>
												<?php
											}
										?>						
									</td>
									<td class="register_td3">&nbsp;</td>
									<td class="register_td1">暱稱</td>
									<td class="register_td2">
										<?php
											if($wrong==0){
												?>
												<div><font color="red"><?php echo "*最多五個字" ?></font></div>
												<?php
											} 
											else if($wrong==5){
												?>
												<div><font color="red"><?php echo "超過五個字，請刪減字數" ?></font></div>
												<?php
											}
											else if($wrong==6){
												?>
												<div><font color="red"><?php echo "暱稱重複了，請換一個" ?></font></div>
												<?php
											}
											else{
												?>
												<div><font color="red"><?php echo "*最多五個字" ?></font></div>
												<?php
											}
										?>
									</td>
								</tr><!--第一行標題文字-->


								<tr class="register_tr"><!--第二行input-->
									<td colspan="2" class="register_td4">
										<?php
											if(isset($_GET['wrong'])){
												?>
												<div class="register_text_div"><!--帳號填的框-->
													<input type="text" name="account" class="register_text" value="<?php if(isset($_SESSION['account'])){echo $_SESSION['account']; } ?>">
												</div>
												<?php
											}
											else{
												?>
												<div class="register_text_div"><!--帳號填的框-->
													<input type="text" name="account" class="register_text">
												</div>
												<?php
											}
										?>
									</td>
									<td>&nbsp;</td><!--製造中間的空位-->
									<td colspan="2" class="register_td4">
										<?php
											if(isset($_GET['wrong'])){
												?>
												<div class="register_text_div"><!--暱稱填的框-->
													<input type="text" name="name" class="register_text" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name']; } ?>">
												</div>
												<?php
											}
											else{
												?>
												<div class="register_text_div"><!--暱稱填的框-->
													<input type="text" name="name" class="register_text">
												</div>
												<?php
											}
										?>
									</td>
								</tr><!--第二行input-->


								<tr><!--第三行標題文字-->
									<td class="register_td1">密碼</td>
									<td class="register_td2">*必填</td>
									<td class="register_td3">&nbsp;</td>
									<td class="register_td1">信箱</td>
									<td class="register_td2">
										<?php
											if($wrong==0){
												?>
												<div><font color="red"><?php echo "*必填" ?></font></div>
												<?php
											} 
											else if($wrong==2){
												?>
												<div><font color="red"><?php echo "請填入正確的信箱" ?></font></div>
												</td>
												<?php
											}
											else{
												?>
												<div><font color="red"><?php echo "*必填" ?></font></div>
												<?php
											}
										?>
									</td>
								</tr><!--第三行標題文字-->


								<tr class="register_tr"><!--第四行input-->
									<td colspan="2" class="register_td4">
										<?php
											if(isset($_GET['wrong'])){
												?>
												<div class="register_text_div"><!--密碼填的框-->
													<input type="password" name="pass" class="register_text" value="<?php if(isset($_SESSION['pass'])){echo $_SESSION['pass']; } ?>">
												</div>
												<?php
											}
											else{
												?>
												<div class="register_text_div"><!--密碼填的框-->
													<input type="password" name="pass" class="register_text">
												</div>
												<?php
											}
										?>
									</td>
									<td>&nbsp;</td>
									<td colspan="2" class="register_td4">
										<?php
											if(isset($_GET['wrong'])){
												?>
												<div class="register_text_div"><!--信箱填的框-->
													<input type="text" name="email" class="register_text" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email']; } ?>">
												</div>
												<?php
											}
											else{
												?>
												<div class="register_text_div"><!--信箱填的框-->
													<input type="text" name="email" class="register_text">
												</div>
												<?php
											}
										?>
									</td>
								</tr><!--第四行input-->


								<tr><!--第五行標題文字-->
									<td class="register_td1">確認密碼</td>
									<td class="register_td2">
										<?php
											if($wrong==0){
												?>
												<div><font color="red"><?php echo "*必填" ?></font></div>
												<?php
											} 
											else if($wrong==1){
												?>
												<div><font color="red"><?php echo "請再確認一次密碼" ?></font></div>
												</td>
												<?php
											}
											else{
												?>
												<div><font color="red"><?php echo "*必填" ?></font></div>
												<?php
											}
										?>
									</td>
									<td class="register_td3">&nbsp;</td>
									<td colspan="2" class="register_td1">簡單介紹(20字內）</td>
								</tr><!--第五行標題文字-->


								<tr class="register_tr"><!--第六行input-->
									<td colspan="2" class="register_td4">
										<?php
											if(isset($_GET['wrong'])){
												?>
												<div class="register_text_div"><!--確認密碼填的框-->
													<input type="password" name="repass" class="register_text" value="<?php if(isset($_SESSION['repass'])){echo $_SESSION['repass']; } ?>">
												</div>
												<?php
											}
											else{
												?>
												<div class="register_text_div"><!--確認密碼填的框-->
													<input type="password" name="repass" class="register_text">
												</div>
												<?php
											}
										?>
									</td>
									<td>&nbsp;</td>
									<td colspan="2" class="register_td4">
										<?php
											if(isset($_GET['wrong'])){
												?>
												<div class="register_text_div02"><!--簡單介紹填的框-->
													<textarea class="register_text2" name="introduction" wrap="physical" onKeypress="if (this.value.length >= 20) {return false;}"><?php if(isset($_SESSION['introduction'])){echo $_SESSION['introduction']; } ?></textarea>
												</div>
												<?php
											}
											else{
												?>
												<div class="register_text_div02"><!--簡單介紹填的框-->
													<textarea class="register_text2" name="introduction" wrap="physical" onKeypress="if (this.value.length >= 20) {return false;}"></textarea>
												</div>
												<?php
											}
										?>
										<!--onkeypress限制字數不得超過20但防不了用複製貼上的-->
									</td>
								</tr><!--第六行input-->


								<tr class="register_tr2">
									<td colspan="5">
										<button type="submit" class="register_bt" >註冊</button>						
									</td>
								</tr>


								<tr class="register_tr">
									<td colspan="5" class="alreadyhave">有會員了？<a href="login.php" class="login_a">登入帳號</a></td>
								</tr>


							</table>
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
<script>  
/**
 * 使用HTML5 File API, 來即時預覽image
 */
$("#pic0").change(function(){
    var objUrl = getObjectURL(this.files[0]) ;
    console.log("objUrl = "+objUrl) ;
    if (objUrl) {
        $("#img0").attr("src", objUrl) ;
    }
}) ;
 
/**
 * 建立一個可存取到該file的url
 * PS: 瀏覽器必須支援HTML5 File API
 */
function getObjectURL(file) {
    var url = null ; 
    if (window.createObjectURL!=undefined) { // basic
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}
</script>