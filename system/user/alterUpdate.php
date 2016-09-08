<?php
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
session_start();
$_SESSION['no']=$no;
$_SESSION['pri']=$pri;
$_SESSION['account']=$account;
$_SESSION['name']=$name;
$_SESSION['email']=$email;
$_SESSION['introduction']=$introduction;
$_SESSION['photo']=$userpic;//等等試試看while
if(isset($_SESSION["photo"])){
	$photo = $_SESSION["photo"];
}
else{
	$photo = "fuck-you.png";
}
$successMSG = "修改成功";
$setSQL = 'UPDATE `user`SET `no`='.$no.',`pri`='.$pri.',`account`='.$account.',`name`='.$name.',`email`='.$email.',`introduction`='.$introduction.',`photo`='.$photo.'';
mysql_query($setSQL);	
}
/*if(isset($successMSG)){
	header("refresh:3;userdata.php");
}*/
?>