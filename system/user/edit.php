<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<script src="jquery.min.js"></script>
	<meta charset="utf-8">
</head>
	<body id="body0">
		<?php
		include('link.php');
		include('../../include/sessionCheck.php');		
		$account = $_SESSION["account"];
		$selectUserAccount = "SELECT * FROM `user` WHERE `account` = '".$account."'";
		mysql_query("SET NAMES'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
		$selectUserAccount = mysql_query($selectUserAccount);
		$userAccount = mysql_fetch_assoc($selectUserAccount);
		if(isset($_POST['edit'])){
			if($_POST['oldPass']==""){
				$errMsg = "你沒有填寫舊密碼";
			}
			else if($_POST['oldPass']!=$userAccount['password']){
				$errMsg = "你填入的舊密碼有誤";
			}
			else if($_POST['pass']!=$_POST['repass']){
				$errMsg = "「確認密碼」有誤，請再確認一次";
			}
			else{
				if(empty($_POST['photo'])){
					$photo = $_SESSION['photo'];
				}
				else{
					$photo = $_POST['photo'];					
				}
				$name = $_POST['name'];
				$favorite = $_POST['favorite'];
				$goodAt = $_POST['goodAt'];
				$pass = $_POST['pass'];
				$introduction = $_POST['introduction'];


				$updateUserAccount = 'UPDATE `user` SET `password`="'.$pass.'",`name`="'.$name.'",`introduction`="'.$introduction.'",`photo`="'.$photo.'",`favorite`="'.$favorite.'",`goodAt`="'.$goodAt.'" WHERE `account` = "'.$account.'"';
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				mysql_query($updateUserAccount);
				header('Location:edit.php');
			}
		}
		include('../../include/userHeader.php');
		?>
		<section>
			<div class="edit_bg"><!--藍底-->
				<form name="form0" id="form0" method="post" enctype="multipart/form-data">
					<div class="edit_white">
						<div class="edit_headph_frame">
							<div class="edit_headph">
								<span class="edit_img_span"><!--大頭照-->
										<img id="img" src="../../jomor_html/img/headphoto.png" class="edit_ph_img">
								</span>
								<div class="edit_upload_span">
									<span>瀏覽檔案</span>
									<input id="pic" type="file" name="photo" class="edit_upload_btn">
								</div>
							</div>
						</div>
						<hr color="#4EBABF" size="5" width="95%">
						<!--修改資料欄位-->
						<table class="edit_table">
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td0">暱稱</td>
								<td class="edit_td1"></td><!--表格中間空格-->
								<td class="edit_td0">我最喜歡的桌遊</td>
							</tr>
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td2">
									<div class="edit_text_div">
										<input type="text" name="name" class="edit_text" value="<?php if($userAccount['name']!=""){echo $userAccount['name']; } ?>" > 
									</div>
								</td>
								<td class="edit_td1"></td><!--表格中間空格-->
								<td class="edit_td2">
									<div class="edit_text_div">
										<input type="text" name="favorite" class="edit_text" value="<?php if($userAccount['favorite']!=""){echo $userAccount['favorite']; } ?>" >
									</div>
								</td>
							</tr>
							<!--第二行-->
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td0">請輸入舊密碼</td>
								<td class="edit_td1"></td><!--表格中間空格-->
								<td class="edit_td0">我最擅長的桌遊</td>
							</tr>
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td2">
									<div class="edit_text_div">
										<input type="password" name="oldPass" class="edit_text">
									</div>
								</td>
								<td class="edit_td1"></td><!--表格中間空格-->
								<td class="edit_td2">
									<div class="edit_text_div">
										<input type="text" name="goodAt" class="edit_text" value="<?php if($userAccount['goodAt']!=""){echo $userAccount['goodAt']; } ?>" >
									</div>
								</td>
							</tr>
							<!--第三行-->
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td0">請輸入新密碼</td>
								<td class="edit_td1"></td><!--表格中間空格-->
								<td class="edit_td0">關於我</td>
							</tr>
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td2">
									<div class="edit_text_div">
										<input type="password" name="pass" class="edit_text">
									</div>
								</td>
								<td class="edit_td1"></td><!--表格中間空格-->
								<td class="edit_td2" rowspan="3">
									<div class="edit_text_div0">
										<textarea class="edit_text0" name="introduction" wrap="physical" onKeypress="if (this.value.length >= 20) {return false;}" ><?php if($userAccount['introduction']!=""){echo $userAccount['introduction']; } ?></textarea>
									</div>
								</td>
							</tr>
							<!--第四行-->
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td0">確認新密碼</td>
								<td class="edit_td1"></td><!--表格中間空格-->
							</tr>
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td2">
									<div class="edit_text_div">
										<input type="password" name="repass" class="edit_text">
									</div>
								</td>
								<td class="edit_td1"></td><!--表格中間空格-->
							</tr>
							<tr class="edit_tr2">
								<td class="edit_td3" colspan="3">
									<button type="submit" name="edit" class="edit_bt">確定</button>
									<div><?php if(isset($errMsg)){echo $errMsg;} ?></div>
								</td>
							</tr>
						</table>
					</div>
				</form>
			</div>				
		</section>
	</body>
</html>
<script>  
/**
 * 使用HTML5 File API, 來即時預覽image
 */
$("#pic").change(function(){
    var objUrl = getObjectURL(this.files[0]) ;
    console.log("objUrl = "+objUrl) ;
    if (objUrl) {
        $("#img").attr("src", objUrl) ;
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