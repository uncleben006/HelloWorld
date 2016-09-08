<?php
session_start();
if(isset($_POST['alter'])){
include('link.php');
$no = $_POST['no'];
$pri = $_POST['pri'];
$account = $_POST['account'];
$name = $_POST['name'];
$email = $_POST['email'];
$introduction = $_POST['introduction'];

$imgFile = $_FILES['photo']['name'];
$tmp_dir = $_FILES['photo']['tmp_name'];
$imgSize = $_FILES['photo']['size'];
if(empty($imgFile)==FALSE){//若有放圖片(這裡不知道為什麼用isset不行)
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
session_set_cookie_params(600);
$_SESSION['no']=$no;
$_SESSION['pri']=$pri;
$_SESSION['account']=$account;
$_SESSION['name']=$name;
$_SESSION['email']=$email;
$_SESSION['introduction']=$introduction;
if(isset($userpic)){
	$_SESSION['photo'] = $userpic;
	$photo = $_SESSION["photo"];
}
else{
	$photo = "fuck-you.png";
}
$successMSG = "修改成功，將在3秒後轉跳回會員資料頁(userdata)";
$setSQL = "UPDATE `user`SET `no`='".$no."',`pri`='".$pri."',`account`='".$account."',`name`='".$name."',`email`='".$email."',`introduction`='".$introduction."',`photo`='".$photo."' WHERE `account`='".$account."'";
echo $setSQL;
mysql_query($setSQL);	
if(isset($successMSG)){
	header("refresh:3;userdata.php");
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>UserData</title>
 
	<style type="text/css">
		.frame{
			width: 720px;
			margin-right: auto;
			margin-left: auto;
			padding-top: 20px;
		}
		input[type="text"],input[type="password"]{
			border-color:#bdc5d0;
		}
		div{
			margin-top: 5px;
		}
		table{
			height: 80px;
		}
	</style>

</head>
<body>
	<div class="frame">
		<h1>修改資料頁面</h1>

		<?php
		header("Content-Type:text/html; charset=utf-8");
		include('link.php');
		$no = $_SESSION["no"];
		$pri = $_SESSION["pri"];
		$account = $_SESSION["account"];
		$name = $_SESSION["name"];
		$email = $_SESSION["email"];
		$introduction = $_SESSION["introduction"];
		if(isset($_SESSION["photo"])){
			$photo = $_SESSION["photo"];
		}
		else{
			$photo = "fuck-you.png";
		}
		?>
		<div><img src="photo/<?php echo $photo ?>" style="height:180px;" /></div>

		<?php
		if(isset($errMSG)){
				?>
	            <div>
	            	<strong><?php echo $errMSG; ?></strong>
	            </div>
	            <?php
		}
		else if(isset($successMSG)){
			?>
	        <div>
	              <strong><?php echo $successMSG; ?></strong>
	        </div>
	        <?php
		}
		?>		
		<form method="post" enctype="multipart/form-data"> 
			<table>
				<div><input type="file" name="photo"/></div>
				<tr>
					<th>會員代號</th>
					<td><input type="text" value='<?php echo $no; ?>' disabled></td>
					<div style="display:none"><input type="text" name="no" value='<?php echo $no; ?>'></div>
				</tr>
				<tr>
					<th>會員權限</th>
					<td><input type="text" name="pri" value="<?php echo $pri; ?>" disabled></td>
					<div style="display:none"><input type="text" name="pri" value="<?php echo $pri; ?>"></div>
				</tr>
				<tr>
					<th>會員帳號</th>
					<td><input type="text" name="account" value="<?php echo $account; ?>" disabled></td>
					<div style="display:none"><input type="text" name="account" value="<?php echo $account; ?>"></div>
				</tr>
				<tr>
					<th>暱稱</th>
					<td><input type="text" name="name" placeholder='<?php echo $name; ?>'></td>
				</tr>
				<tr>
					<th>信箱</th>
					<td><input type="text" name="email" value="<?php echo $email; ?>" disabled></td>
					<div style="display:none"><input type="text" name="email" value="<?php echo $email; ?>"></div>
				</tr>
				<tr>
					<th>簡介</th>
					<td><input type="text" name="introduction" placeholder='<?php echo $introduction; ?>'></td>
				</tr>
			</table>
			<div><button type="submit" name="alter">確定修改</button></div>
		</form>
	</div>
	
</body>
</html>