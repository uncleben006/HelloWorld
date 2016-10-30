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
		<?php 
			include('../../include/link.php');
			include('accountMail.php');
			if(isset($_POST['submit'])){
				$account = $_POST["account"];
				$pass = $_POST["pass"];
				$repass = $_POST["repass"];
				$name = $_POST["name"];
				$email = $_POST["email"];
				$introduction = $_POST["introduction"];
				$pri = '0';

				$imgFile = $_FILES['pic']['name'];//取得FILE名稱
				$tmp_dir = $_FILES['pic']['tmp_name'];//把FILE路徑暫存入一個tmp檔
				$imgSize = $_FILES['pic']['size'];//取得FILE大小

				if(empty($imgFile)!=TRUE){//這裡不知道為什麼用isset不行
					$upload_dir = 'photo/'; // upload directory
					
					$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension，回傳圖片的檔案型態(.jpg/.png)(extension:延伸部分)
						
					// valid image extensions(有效圖片型態)
					$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); //宣告有效的檔案型態
						
					//重新命名上傳的圖片
					$userpic = rand(1000,1000000).".".$imgExt; //產生文件名稱並指定給$userpic
								
					// allow valid image file formats
					if(in_array($imgExt, $valid_extensions)){ //若在$imgExt裡有$valid_extensions的檔案型態的話，就執行			
						// Check file size '5MB' 
						if($imgSize < 5000000){
							move_uploaded_file($tmp_dir,$upload_dir.$userpic); //把tmp暫存檔存入指定位置($upload_dir+$userpic)(位置加檔名)
						}
						else{
							$errMSG = "呀啊啊啊~太大了啦~人家受不了啦~我是指檔案";
						}
					}
					else{
						$errMSG = "抱歉...我只喜歡附檔名是JPG, JPEG, PNG或GIF";		
					}
				}
				else if(empty($imgFile)){
					$userpic = "default.jpg";
				}

				$getAllrowsSQL="SELECT COUNT(*) FROM user";
				$runSQL=mysql_query($getAllrowsSQL);
				$Allrows=mysql_fetch_assoc($runSQL);
				$nowRow=$Allrows["COUNT(*)"]+1;
				if(strlen($nowRow)==1)
					$no = '00' . $nowRow;
				else if(strlen($nowRow)==2)
					$no = '0' . $nowRow;
				else
					$no = $nowRow;
				for($i=0;$i<2;$i++)//產生亂碼no
				{
					$j = rand(1,26);
					switch($j)
					{
						case 1:
							$j = 'A';
							break;
						case 2:
							$j = 'B';
							break;
						case 3:
							$j = 'C';
							break;
						case 4:
							$j = 'D';
							break;
						case 5:
							$j = 'E';
							break;
						case 6:
							$j = 'F';
							break;
						case 7:
							$j = 'G';
							break;
						case 8:
							$j = 'H';
							break;
						case 9:
							$j = 'I';
							break;
						case 10:
							$j = 'J';
							break;
						case 11:
							$j = 'K';
							break;
						case 12:
							$j = 'L';
							break;
						case 13:
							$j = 'M';
							break;
						case 14:
							$j = 'N';
							break;
						case 15:
							$j = 'O';
							break;
						case 16:
							$j = 'P';
							break;
						case 17:
							$j = 'Q';
							break;
						case 18:
							$j = 'R';
							break;
						case 19:
							$j = 'S';
							break;
						case 20:
							$j = 'T';
							break;
						case 21:
							$j = 'U';
							break;
						case 22:
							$j = 'V';
							break;
						case 23:
							$j = 'W';
							break;
						case 24:
							$j = 'X';
							break;
						case 25:
							$j = 'Y';
							break;
						case 26:
							$j = 'Z';
							break;
					}
					$no.=$j;
				}

				session_set_cookie_params(600);
				session_start();
				$_SESSION["no"] = $no;
				$_SESSION["pri"] = $pri;
				$_SESSION["account"] = $account;
				$_SESSION["pass"] = $pass;
				$_SESSION["repass"] = $repass;
				$_SESSION["name"] = $name;
				$_SESSION["email"] = $email;
				$_SESSION["introduction"] = $introduction;
				$_SESSION["photo"] = $userpic;//把產生的亂數圖片檔名做成session，好之後傳入資料庫。
				if(isset($errMSG)){
					$_SESSION["errMSG"] = $errMSG;
				}			

				$sql = "SELECT * FROM `user` WHERE `account`='".$account."'";
				$result = mysql_query($sql);
				$row = mysql_fetch_assoc($result);


				//value1=除了密碼之外其他都顯示
				//value2=除了密碼信箱之外其他都顯示
				//wrong1,2,3分別顯示:密碼未重複,email未正確填寫,帳號已有人填過
				if($pass!=$repass){
					$url = "signup.php?wrong=1";
					echo "<script type='text/javascript'>";
					echo "window.location.href='$url'";
					echo "</script>";
				}
				else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){//判斷有沒有email欄位@
				  	$url = "signup.php?wrong=2";
					echo "<script type='text/javascript'>";
					echo "window.location.href='$url'";
					echo "</script>";
				}
				else if(isset($row["account"])){//判斷帳號重複
					$url = "signup.php?wrong=3";
					echo "<script type='text/javascript'>";
					echo "window.location.href='$url'";
					echo "</script>";
				}
				else if(isset($errMSG)){
					$url = "signup.php?wrong=4";
					echo "<script type='text/javascript'>";
					echo "window.location.href='$url'";
					echo "</script>";
				}
				else if(strlen($name)>10){
					$url = "signup.php?wrong=5";
					echo "<script type='text/javascript'>";
					echo "window.location.href='$url'";
					echo "</script>";
				}
				else if(isset($row['name'])){
					$url = "signup.php?wrong=6";
					echo "<script type='text/javascript'>";
					echo "window.location.href='$url'";
					echo "</script>";
				}
				else{
					$url = 'http://localhost:8080/JOMO/system/user/confirm.php?no='.$no;
					$ahref = '<a href= '. $url . '>' . $url . '</a>';
					/*
					$htmlurl = '<table><tr><td>welcome and please link the following url</td><td>' . $ahref . '</td></tr></table>';
					*/
					$htmlurl = 
					"
					<!DOCTYPE html>
					<html>
					<head>
						<title>email</title>
					</head>
					<body>
						<div style=\"width:60%;margin:0 auto;background-color:#cee6f5;padding:10px;\">
							<div>".$name."您好</div>
							<div>歡迎註冊桌末狂歡</div>
							<div>請點入此連結以驗證您的會員資格</div>
							<div>Welcome to JOMOR. Please link the following url to confirm your account.</div>
							<div>".$ahref."</div>
						</div>
					</body>
					</html>
					";
					$mail->Body = $htmlurl;
					$mail->AddAddress($email);

					 if(!$mail->Send()) {
					    echo "Mailer Error: " . $mail->ErrorInfo;
					 } else {
					    echo "Message has been sent";
					    $url = "userUpdate.php";
						echo "<script type='text/javascript'>";
						echo "window.location.href='$url'";
						echo "</script>";
					 }
				}

				echo "<h1>顯示了這個畫面表示系統並未成功寄出認證信。</h1>";
			}
			include('../../include/userHeader.php'); 
			

		?>		
		<section><!--註冊框-->
			<div class="register_div">
				<div class="register_bg"><!--註冊黃色框-->
					<div class="register_white"><!--註冊白色框-->
						<div class="register_p_div">
							<h1 class="register_p">歡迎來到桌末狂歡！</h1>
						</div>
						<form name="form0" id="form0" method="post" enctype="multipart/form-data">
						<!--預先取得wrong變數，做註冊錯誤時的判斷-->
							<?php
								if(isset($_GET['wrong'])){
									$wrong = $_GET['wrong'];
								}
								else{
									$wrong = 0;
								}
							?>	

							<!--頭像部分-->
							<!--頭像部分-->
							<!--頭像部分-->
							<div class="headph_div">
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
							<!--填寫資訊欄-->
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
										<button name="submit" type="submit" class="register_bt" >註冊</button>						
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