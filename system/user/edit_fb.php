<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<script src="jquery.min.js"></script>
	<meta charset="utf-8">
	<link rel="icon" href="../../jomor_html/img/jomorparty_logo.png" type="image/ico" />
</head>
	<body id="body0">
		<?php
		include('../../include/link.php');
		include('../../include/sessionCheck.php');	
		$account = $_SESSION["account"];
		if(empty($account)){
			header('Location:../../include/block.php?situation=3');
		}		
		$selectUserAccount = "SELECT * FROM `user` WHERE `account` = '".$account."'";
		mysql_query("SET NAMES'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
		$selectUserAccount = mysql_query($selectUserAccount);
		$userAccount = mysql_fetch_assoc($selectUserAccount);
		if(isset($_POST['edit'])){
			if(isset($_FILES['photo']['name'])){
				$imgFile = $_FILES['photo']['name'];//取得FILE名稱
				$tmp_dir = $_FILES['photo']['tmp_name'];//把FILE路徑暫存入一個tmp檔
				$imgSize = $_FILES['photo']['size'];//取得FILE大小
				$upload_dir = 'photo/'; // upload directory	
				$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); //宣告有效的檔案型態
				$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); //回傳圖片的檔案型態(.jpg/.png)(extension:延伸部分)
				$photo = rand(1000,1000000).".".$imgExt; //重新命名上傳的圖片，產生文件名稱並指定給$photo
				if(in_array($imgExt, $valid_extensions)){ //若在$imgExt裡有$valid_extensions的檔案型態的話，就執行
					if($imgSize < 5000000){
						move_uploaded_file($tmp_dir , $upload_dir.$photo); //把tmp暫存檔存入指定位置($upload_dir+$photo)(位置加檔名)
					}
					else{
						$errMSG = "呀啊啊啊~太大了啦~人家受不了啦~我是指檔案";
					}
				}
				else{
					$errMSG = "抱歉...我只喜歡附檔名是JPG, JPEG, PNG或GIF";		
				}
			}
			if(empty($_FILES['photo']['name'])){
				$photo = $userAccount['photo'];
			}				
			$name = $_POST['name'];
			$favorite = $_POST['favorite'];
			$goodAt = $_POST['goodAt'];
			$gender = $_POST['gender'];
			$pass = $_POST['pass'];
			$introduction = $_POST['introduction'];

			//update user table
			$updateUserAccount = 'UPDATE `user` SET `name`="'.$name.'",`introduction`="'.$introduction.'",`photo`="'.$photo.'",`gender`="'.$gender.'",`favorite`="'.$favorite.'",`goodAt`="'.$goodAt.'" WHERE `account` = "'.$account.'"';
			echo $updateUserAccount;
			mysql_query("SET NAMES'UTF8'");
			mysql_query("SET CHARACTER SET UTF8");
			mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
			mysql_query($updateUserAccount);

			//update member table
			$updateMemberAccount = 'UPDATE `member` SET `name`="'.$name.'",`photo`="'.$photo.'" WHERE `account` = "'.$account.'"';
			mysql_query("SET NAMES'UTF8'");
			mysql_query("SET CHARACTER SET UTF8");
			mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
			mysql_query($updateMemberAccount);

			//update chat table
			$updateChatAccount = 'UPDATE `chat` SET `name`="'.$name.'" WHERE `account` = "'.$account.'"';
			mysql_query("SET NAMES'UTF8'");
			mysql_query("SET CHARACTER SET UTF8");
			mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
			mysql_query($updateChatAccount);

			header('Location:userdata.php');			
		}
		include('../../include/userHeader.php');
		?>
		<section>
			<div class="edit_bg"><!--藍底-->
				<form method="post" enctype="multipart/form-data">
					<div class="edit_white2">
						<div class="edit_headph_frame">
							<div class="edit_headph">
								<span class="edit_img_span"><!--大頭照-->
									<img id="img" src="<?php echo $userAccount['photo'];?>" class="edit_ph_img">
								</span>
							</div>
						</div>
						<hr color="#4EBABF" size="5" width="95%">
						<!--修改資料欄位-->
						<table class="edit_table2">
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td0">暱稱</td>
								<td class="edit_td1"></td><!--表格中間空格-->
								<td class="edit_td0">性別</td>
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
										<select name="gender" class="edit_text">
											<option value="<?php if($userAccount['gender']!=""){echo $userAccount['gender']; } ?>"><?php if($userAccount['gender']!=""){echo $userAccount['gender']; } ?></option>
											<option value="男">男</option>
											<option value="女">女</option>
											<option value="其他">其他</option>
										</select>
									</div>

								</td>
							</tr>
							<!--第二行-->
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td0">我最喜歡的桌遊</td>
								<td class="edit_td1"></td><!--表格中間空格-->
								<td class="edit_td0">我最擅長的桌遊</td>
							</tr>
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td2">
									<div class="edit_text_div">
										<input type="text" name="favorite" class="edit_text" value="<?php if($userAccount['favorite']!=""){echo $userAccount['favorite']; } ?>" >
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
								<td class="edit_td0">關於我</td>
								<td class="edit_td1"></td><!--表格中間空格-->
								<td class="edit_td0"></td>
							</tr>
							<tr class="edit_tr"><!--tr-->
								<td class="edit_td2" colspan="3">
									<div class="edit_text_div0">
										<textarea class="edit_text0" name="introduction" wrap="physical" onKeypress="if (this.value.length >= 20) {return false;}" ><?php if($userAccount['introduction']!=""){echo $userAccount['introduction']; } ?></textarea>
									</div>
								</td>
								
							</tr>
		
							<tr>
								<td colspan="3">
									<hr color="#4EBABF" size="5" width="93%" align="left">
								</td>
							</tr>
							<!--第五行-->
							
							<tr class="edit_tr2">
								<td colspan="3">
									<button type="submit" name="edit" class="edit_bt1">確定</button>
									<div style="position: relative; top:105px"><?php if(isset($errMsg)){echo $errMsg;} ?>
									</div>
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