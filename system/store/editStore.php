<!DOCTYPE html>
<html>
<head>
	<title>後台-編輯</title>
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
			
			//阻擋未登入用戶
			if(empty($_SESSION['account'])){
				header("Location:http://www.jomorparty.com");
			}
			//阻擋一般用戶，只有pri=3才能使用
			if(isset($_SESSION['account'])){
				$account = $_SESSION['account'];
				$selectUserAccount = mysql_query("SELECT * FROM `user` WHERE `account` = '".$account."'");
				$userAccount = mysql_fetch_assoc($selectUserAccount);
				if($userAccount['pri']!=3){
					header("Location:http://www.jomorparty.com");
				}	
			}

			//管理店家
			if(isset($_POST['showStore'])){
				header('Location:showStore.php');
			}

			//回到前台
			if(isset($_POST['store2'])){
				header('Location:store2.php');
			}

			//上傳頁面
			if(isset($_POST['uploadStore'])){
				header('Location:uploadStore.php');
			}

			//確定修改
			if(isset($_POST['confirm'])){
				$updateStoreNumber = 'UPDATE `store` SET 
				`storePlace`= "'.$_POST['storePlace'].'",
				`storeNo` = "'.$_POST['storeNo'].'",
				`storeName`= "'.$_POST['storeName'].'",
				`storeType`= "'.$_POST['storeType'].'",
				`storeArea` = "'.$_POST['storeArea'].'",
				`storeAddress`= "'.$_POST['storeAddress'].'",
				`storeNumber`= "'.$_POST['storeNumber'].'",
				`storeSpend`= "'.$_POST['storeSpend'].'",
				`storeTime`= "'.$_POST['storeTime'].'",
				`storeHoliday`= "'.$_POST['storeHoliday'].'",
				`webURL`= "'.$_POST['webURL'].'",
				`fbURL`= "'.$_POST['fbURL'].'",
				`googleURL`= "'.$_POST['googleURL'].'",
				`storePhoto`= "'.$_POST['storePhoto'].'" 
				WHERE `no` = "'.$_POST['no'].'"';
				echo $updateStoreNumber;
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$updateStoreNumber = mysql_query($updateStoreNumber);
				//header('Location:showStore.php');
			}

			//取消(回到管理店家)	
			if(isset($_POST['back'])){
				header("Location:showStore.php");
			}		
			include('../../include/storeHeader.php'); 
		?>
		<section><!--註冊框-->		
			<form method="post">	
				<div class="register_div">
					<div class="upload_yellow"><!--註冊黃色框-->
						<div class="upload_manage_div">
							<button type="submit" name="showStore" class="upload_manage">管理<br>店家</button>
							<button type="submit" name="uploadStore" class="upload_manage">上傳<br>頁面</button>
							<button type="submit" name="store2" class="upload_manage">回到<br>前台</button>							
						</div>
						<div class="manage_white"><!--註冊白色框-->
							<div class="register_p_div">
								<h1 class="register_p">管理員編輯資料頁面</h1>
							</div>
							<hr color="#A0920D" size="3" width="95%">

							<!--編輯頁面的呈現區塊-->	
							<!--編輯頁面的呈現區塊-->	
							<!--編輯頁面的呈現區塊-->		
							<table class="manage_table" border=1>
								<?php
									$no = $_GET['storeNumber'];
									$selectStoreNumber = "SELECT * FROM `store` WHERE `no` = '".$no."'";
									mysql_query("SET NAMES'UTF8'");
									mysql_query("SET CHARACTER SET UTF8");
									mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
									$selectStoreNumber = mysql_query($selectStoreNumber);
									$storeNumber = mysql_fetch_assoc($selectStoreNumber);
								?>
									<tr>
										<td>流水號</td>
										<td class="edit_td"><input type="text" name="no" value="<?php echo $storeNumber['no'] ?>" class="manage_input" readonly></td>
									</tr>
									<tr>
										<td>店家編碼</td>
										<td class="edit_td"><input type="text" name="storeNo" value="<?php echo $storeNumber['storeNo'] ?>" class="manage_input"></td>
									</tr>
									<tr>
										<td>縣市</td>
										<td class="edit_td"><input type="text" name="storePlace" value="<?php echo $storeNumber['storePlace'] ?>" class="manage_input"></td>
									</tr>
									<tr>
										<td>店家名稱</td>
										<td><input type="text" name="storeName" value="<?php echo $storeNumber['storeName'] ?>" class="manage_input"></td>	
									</tr>
									<tr>
										<td>店家型態</td>
										<td><input type="text" name="storeType" value="<?php echo $storeNumber['storeType'] ?>" class="manage_input"></td>	
									</tr>
									<tr>
										<td>地區</td>
										<td><input type="text" name="storeArea" value="<?php echo $storeNumber['storeArea'] ?>" class="manage_input"></td>	
									</tr>
									<tr>
										<td>地址</td>
										<td><input type="text" name="storeAddress" value="<?php echo $storeNumber['storeAddress'] ?>" class="manage_input"></td>	
									</tr>
									<tr>
										<td>電話</td>
										<td><input type="text" name="storeNumber" value="<?php echo $storeNumber['storeNumber'] ?>" class="manage_input"></td>	
									</tr>
									<tr>
										<td>消費方式</td>
										<td><input type="text" name="storeSpend" value="<?php echo $storeNumber['storeSpend'] ?>" class="manage_input"></td>
									</tr>
									<tr>
										<td>營業時間</td>
										<td><input type="text" name="storeTime" value="<?php echo $storeNumber['storeTime'] ?>" class="manage_input"></td>	
									</tr>
									<tr>
										<td>公休日</td>
										<td><input type="text" name="storeHoliday" value="<?php echo $storeNumber['storeHoliday'] ?>" class="manage_input"></td>
									</tr>									
									<tr>	
										<td>網頁連結</td>
										<td><input type="text" name="webURL" value="<?php echo $storeNumber['webURL'] ?>" class="manage_input"></td>	
									</tr>
									<tr>
										<td>臉書連結</td>
										<td><input type="text" name="fbURL" value="<?php echo $storeNumber['fbURL'] ?>" class="manage_input"></td>
									</tr>
									<tr>
										<td>google地圖連結</td>
										<td><input type="text" name="googleURL" value="<?php echo $storeNumber['googleURL'] ?>" class="manage_input"></td>
									</tr>									
									<tr>	
										<td>圖片</td>
										<td><input type="text" name="storePhoto" value="<?php echo $storeNumber['storePhoto'] ?>" class="manage_input"></td>
									</tr>
									<tr>
										<td><button name="back" type="submit" class="manage_button">取消</button></td>
										<td><button name="confirm" type="submit" class="manage_button">確定修改</button></td>
									</tr>						
							</table>													
						</div>
					</div>
				</div>	
			</form>		
		</section>
	</body>
</html>