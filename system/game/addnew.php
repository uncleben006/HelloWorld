<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'linkdb.php';

	if(isset($_POST['btnsave']))
	{
		$game = $_POST['game'];//桌遊名稱
		$type = $_POST['type'];//桌遊類型
		$participant = $_POST['participant'];//參與人數
		$difficulty = $_POST['difficulty'];//難度
		$content = $_POST['content'];//內容物
		$detail = $_POST['detail'];//規則說明
		$age = $_POST['age'];//適合年齡
		$agent = $_POST['agent'];//代理商
		
		$imgFile = $_FILES['pic']['name'];//取得FILE名稱
		$tmp_dir = $_FILES['pic']['tmp_name'];//把FILE路徑暫存入一個tmp檔
		$imgSize = $_FILES['pic']['size'];//取得FILE大小
		
		if(empty($game)){
			$errMSG = "請輸入桌遊名稱";
		}
		else if(empty($type)){
			$errMSG = "請輸入桌遊類型";
		}
		else if(empty($detail)){
			$errMSG = "請輸入規則說明";
		}
		else if(empty($imgFile)){
			$errMSG = "請輸入桌遊照片";
		}
		else
		{
			$upload_dir = 'images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension，回傳圖片的檔案型態(.jpg/.png)(extension:延伸部分)
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions，宣告有效的檔案型態
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt; //產生文件名稱($userpic)
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){ //若在$imgExt裡有$valid_extensions的檔案型態的話，就執行			
				// Check file size '5MB' 
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic); //把tmp暫存檔存入指定位置($upload_dir+$userpic)(位置加檔名)
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB->prepare('INSERT INTO game(game,type,participant,difficulty,content,detail,age,agent,pic) VALUES(:game, :type, :participant, :difficulty, :content, :detail, :age, :agent, :pic)');
			$stmt->bindParam(':game',$game);
			$stmt->bindParam(':type',$type);
			$stmt->bindParam(':participant',$participant);
			$stmt->bindParam(':difficulty',$difficulty);
			$stmt->bindParam(':content',$content);
			$stmt->bindParam(':detail',$detail);
			$stmt->bindParam(':age',$age);
			$stmt->bindParam(':agent',$agent);
			$stmt->bindParam(':pic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;game.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

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

		<div>
	    	<h1>Add New Board Game &nbsp;<a href="game.php"><button>view all </button></a></h1>
	    </div>

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
		<!--
		enctype:讓form編碼還未傳送的數據，
		默認是全部編碼成URLencode，(中文會變亂碼那種)
		enctype="multipart/form-data"(意思是不進行編碼)
		-->
	    
			<table>
			
		    <tr>
		    	<td><label>桌遊名稱</label></td>
		        <td><input type="text" name="game" placeholder="桌遊名稱" value="<?php echo $game; ?>" /></td>
		    </tr>
		    
		    <tr>
		    	<td><label>桌遊類型</label></td>
		        <td><input type="text" name="type" placeholder="桌遊類型" value="<?php echo $type; ?>" /></td>
		    </tr>

		    <tr>
		    	<td><label>參與人數</label></td>
		        <td><input type="text" name="participant" placeholder="參與人數" value="<?php echo $participant; ?>" /></td>
		    </tr>

		    <tr>
		    	<td><label>難度</label></td>
		        <td><input type="text" name="difficulty" placeholder="難度" value="<?php echo $difficulty; ?>" /></td>
		    </tr>

		    <tr>
		    	<td><label>內容物</label></td>
		        <td><input type="text" name="content" placeholder="內容物" value="<?php echo $content; ?>" /></td>
		    </tr>

		    <tr>
		    	<td><label>規則說明</label></td>
		        <td><input type="text" name="detail" placeholder="規則說明" value="<?php echo $detail; ?>" /></td>
		    </tr>

		    <tr>
		    	<td><label>適當年齡</label></td>
		        <td><input type="text" name="age" placeholder="適當年齡" value="<?php echo $age; ?>" /></td>
		    </tr>

		    <tr>
		    	<td><label>代理商</label></td>
		        <td><input type="text" name="agent" placeholder="代理商" value="<?php echo $agent; ?>" /></td>
		    </tr>
		    
		    <tr>
		    	<td><label>桌遊圖片</label></td>
		        <td><input type="file" name="pic" accept="image/*" /></td>
		        <!--這裡的accept語法:只接受圖片檔案-->
		    </tr>
		    
		    <tr>
		        <td colspan="2">
		        	<button type="submit" name="btnsave">save</button>
		        </td>
		    </tr>
		    
		    </table>
		    
		</form>

	</div>
</body>
</html>