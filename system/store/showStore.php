<!DOCTYPE html>
<html>
<head>
	<title>後台-編輯</title>
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
			include('../../include/sessionCheck.php'); 

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

			//編輯店家資料
			if(isset($_POST['edit'])){
				header('Location:editStore.php?storeNumber='.$_POST['edit']);
			}

			//刪除店家資料		
			if(isset($_POST['delete'])){
				$no = $_POST['delete'];
				$deleteStoreNumber = "DELETE FROM `store` WHERE `no` = '".$no."'";
				$deleteStoreNumber = mysql_query($deleteStoreNumber);
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
								<div class="manage_title_div">
									<h1 class="manage_title">管理員管理店家後台</h1>
								</div>

								<!--選擇地區-->
								<!--選擇地區-->	
								<!--選擇地區-->									
								<div class="manage_select_div">
									<div class="manage_title">選擇地區</div>
									<select name="place" class="manage_select"><!--onchange="window.open(this.options[this.selectedIndex].value)"可以讓select直接打開的語法-->
										<option value="*" >全部列出</option>
										<optgroup selected="true" label="北部"> 
										<option value="臺北市" >臺北市</option>
										<option value="新北市" >新北市</option>
										<option value="基隆市" >基隆市</option>
										<option value="桃園縣" >桃園縣</option>
										<option value="新竹市" >新竹市</option>
										<option value="新竹縣" >新竹縣</option>
										<option value="宜蘭縣" >宜蘭縣</option>
										<optgroup selected="true" label="中部"> 
										<option value="苗栗縣" >苗栗縣</option>
										<option value="台中市" >台中市</option>
										<option value="彰化縣" >彰化縣</option>
										<optgroup selected="true" label="南部"> 
										<option value="雲林縣" >雲林縣</option>
										<option value="嘉義市" >嘉義市(縣)</option>
										<option value="台南市" >台南市</option>
										<option value="高雄市" >高雄市</option>
										<option value="屏東縣" >屏東縣</option>
										<optgroup selected="true" label="東部"> 
										<option value="花蓮縣" >花蓮縣</option>
										<option value="台東縣" >台東縣</option>
										<optgroup selected="true" label="外島"> 
										<option value="澎湖縣" >澎湖縣</option>
										<option value="金門縣" >金門縣</option>
									</select>
									<button name="OK" type="submit" class="manage_submit">確定</button>
								</div>
							</div>
							<hr color="#A0920D" size="3" width="95%">	
							<table class="manage_table" border=1>
								<tr>	
									<th>編碼</th>
									<th>縣市</th>
									<th>店家名稱</th>
									<th>店家型態</th>
									<th>地區</th>
									<th>地址</th>
									<th>電話</th>
									<th>消費模式</th>
									<th>營業時間</th>
									<th>公休日</th>
									<th>網頁連結</th>
									<th>臉書連結</th>
									<th>google地圖連結</th>
									<th>圖片</th>
									<th></th>
									<th></th>
								</tr>
								<?php
									//選擇地區後的篩選顯示
									//選擇地區後的篩選顯示
									//選擇地區後的篩選顯示
									if(isset($_POST['OK'])){
										$place = $_POST['place'];
										if($place=="*"){
											$selectStorePlace = "SELECT * FROM `store`";
										}
										else{
											$selectStorePlace = "SELECT * FROM `store` WHERE `storePlace` = '".$place."'";
										}										
										mysql_query("SET NAMES'UTF8'");
										mysql_query("SET CHARACTER SET UTF8");
										mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
										$selectStorePlace = mysql_query($selectStorePlace);
										while($storePlace = mysql_fetch_assoc($selectStorePlace)){
											?>
											<tr>
												<td><?php echo $storePlace['no']; ?></td>
												<td><?php echo $storePlace['storePlace']; ?></td>
												<td><?php echo $storePlace['storeName']; ?></td>
												<td><?php echo $storePlace['storeType']; ?></td>
												<td><?php echo $storePlace['storeArea']; ?></td>
												<td><?php echo $storePlace['storeAddress']; ?></td>
												<td><?php echo $storePlace['storeNumber']; ?></td>
												<td class="break_word" title="<?php echo $storePlace['storeSpend'];?>">
													<?php
														$str = $storePlace['storeSpend'];
														echo ((mb_strlen($str,'utf8')>20) ? mb_substr($str,0,20,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
													?>
												</td>
												<td><?php echo $storePlace['storeTime']; ?></td>
												<td><?php echo $storePlace['storeHoliday']; ?></td>
												<td class="break_word" title="<?php echo $storePlace['webURL'];?>">
													<?php
														$str = $storePlace['webURL'];
														echo ((mb_strlen($str,'utf8')>10) ? mb_substr($str,8,20,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
													?>
												</td>
												<td class="break_word" title="<?php echo $storePlace['fbURL'];?>">
													<?php
														$str = $storePlace['fbURL'];
														echo ((mb_strlen($str,'utf8')>10) ? mb_substr($str,8,20,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
													?>													
												</td>
												<td class="break_word" title="<?php echo $storePlace['googleURL'];?>">
													<?php
														$str = $storePlace['googleURL'];
														echo ((mb_strlen($str,'utf8')>10) ? mb_substr($str,8,20,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
													?>														
												</td>
												<td><?php echo $storePlace['storePhoto']; ?></td>
												<td><button name="edit" type="submit" class="manage_button" value="<?php echo $storePlace['no']; ?>">修改</button></td>
												<td><button name="delete" type="submit" class="manage_button" value="<?php echo $storePlace['no']; ?>">刪除</button></td>
											</tr>
											<?php
										}
									}
									//沒有選擇地區，全部顯示
									//沒有選擇地區，全部顯示
									//沒有選擇地區，全部顯示									
									else{
										$selectStore = "SELECT * FROM `store` ";
										mysql_query("SET NAMES'UTF8'");
										mysql_query("SET CHARACTER SET UTF8");
										mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
										$selectStore = mysql_query($selectStore);
										while($store = mysql_fetch_assoc($selectStore)){
											?>
											<tr>
												<td class="break_word"><?php echo $store['no']; ?></td>
												<td class="break_word"><?php echo $store['storePlace']; ?></td>
												<td class="break_word"><?php echo $store['storeName']; ?></td>
												<td class="break_word"><?php echo $store['storeType']; ?></td>
												<td class="break_word"><?php echo $store['storeArea']; ?></td>
												<td class="break_word"><?php echo $store['storeAddress']; ?></td>
												<td><?php echo $store['storeNumber']; ?></td>
												<td class="break_word" title="<?php echo $store['storeSpend'];?>">
													<?php
														$str = $store['storeSpend'];
														echo ((mb_strlen($str,'utf8')>20) ? mb_substr($str,0,20,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
													?>	
												</td>
												<td class="break_word_200"><?php echo $store['storeTime']; ?></td>
												<td class="break_word"><?php echo $store['storeHoliday']; ?></td>												
												<td class="break_word" title="<?php echo $store['webURL'];?>">
													<?php
														$str = $store['webURL'];
														echo ((mb_strlen($str,'utf8')>10) ? mb_substr($str,8,20,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
													?>	
												</td>
												<td class="break_word" title="<?php echo $store['fbURL'];?>">
													<?php
														$str = $store['fbURL'];
														echo ((mb_strlen($str,'utf8')>10) ? mb_substr($str,8,20,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
													?>	
												</td>
												<td class="break_word" title="<?php echo $store['googleURL'];?>">
													<?php
														$str = $store['googleURL'];
														echo ((mb_strlen($str,'utf8')>10) ? mb_substr($str,8,20,'utf8') : $str).' '.((mb_strlen($str,'utf8')>10) ? " ..." : "");
													?>														
												</td>
												<td><?php echo $store['storePhoto']; ?></td>
												<td><button name="edit" type="submit" class="manage_button" value="<?php echo $store['no']; ?>">修改</button></td>
												<td><button name="delete" type="submit" class="manage_button" value="<?php echo $store['no']; ?>">刪除</button></td>
											</tr>
											<?php
										}
									}
								?>							
							</table>													
						</div>
					</div>
				</div>	
			</form>		
		</section>
	</body>
</html>