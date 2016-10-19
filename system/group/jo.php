<!DOCTYPE html>
<html>
<head>
	<title>jomor桌末狂歡</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<meta charset="utf-8">
</head>
	<body id="body0">

		<!--系統與判定-->
		<!--系統與判定-->
		<!--系統與判定-->
		<?php 
		 	include('link.php');
			include('../../include/sessionCheck.php');		
		 	//輸入訊息
		 	//輸入訊息
		 	//輸入訊息
		 	//如果按輸入，則把session名字、房號、留言、時間，記錄至 chat table ，之後再抓取出來做成聊天室。
			if (isset($_POST['OK'])){ 						
				error_reporting(0); 
				date_default_timezone_set('Asia/Taipei');
				$no = $_GET['no'];
				$account = $_SESSION['account'];

				//name要從資料庫抓取，這樣當edit.php修改了名稱，聊天室顯示的名稱才會跟著變
				$selectUserAccount = "SELECT * FROM `user` WHERE `account` = '".$account."'";
			    mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$selectUserAccount = mysql_query($selectUserAccount);
				$userAccount = mysql_fetch_assoc($selectUserAccount);
				$name = $userAccount['name'];		

				$now = date("H:i:s");
			    $chat = $_POST['chat'];     
			    $sql = "INSERT INTO `chat`(`no`, `account` ,`name`,`now`,`chat`)values('$no', '$account' ,'$name','$now','$chat')";
			    mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
			    mysql_query($sql);
			    header("Location:jo.php?no=".$no);//避免重新整理時，重複傳送表單`,故需導回原畫面。
			}

			//加入房間
			//加入房間
			//加入房間
			//如果按加入，則把session資料輸入進 member table 裡
			if(isset($_POST['join'])){
				$no = $_GET['no'];
				//取得房間上限人數
				$selectRoomNo = mysql_query("SELECT * FROM `room` WHERE `no` = '".$no."'");
				$roomNo = mysql_fetch_assoc($selectRoomNo);
				$people = $roomNo['people'];
				//取得目前房間人數
				$selectMemberNo = mysql_query("SELECT * FROM `member` WHERE `no` = '".$no."'");
				$num = mysql_num_rows($selectMemberNo);
				$selectMemberSession = "SELECT * FROM `member` WHERE `no` = '".$no."' AND `account` = '".$_SESSION['account']."'";
				$selectMemberSession = mysql_query($selectMemberSession);
				$memberSession = mysql_num_rows($selectMemberSession);
				
				
				if(empty($_SESSION['account'])){//判斷若未登入則阻擋
					?> 
					<script type="text/javascript">
						var signIn = confirm("你尚未登入唷~請登入後才轉跳");
						if(signIn){
							window.location.href='../user/login.php';
						}
						//未加else導向則返回原頁
					</script>
					<?php
				}
				else if($memberSession != 0){//再判斷若已經加入則阻擋
					?>
					<script type="text/javascript">
						alert("你已經加入了這個房間，按確定後繼續揪團~");
					</script>
					<?php
				}
				else if($num>=$people){//再判斷若房間人數已滿則阻擋
					?> 
					<script type="text/javascript">
						alert("抱歉人數已滿~~去加別房啦~");
					</script>
					<?php
					header("Location:jo.php");
				}
				else{
					header("Location:jo.php?no=".$no."&confirm=".$no);			
				}			
			}

			//跳出確認提示，按確認則輸入訊息
			if(isset($_POST['yes'])){
				$no = $_GET['no'];
				//把session資料insert進 member table
				$uno = $_SESSION['no'];
				$account = $_SESSION['account'];
				$name = $_SESSION['name'];
				$email = $_SESSION['email'];
				$photo = $_SESSION['photo'];
				$mysql3 = 'INSERT INTO `member`(`no`,`people`, `name`, `account`,`email`, `photo`) VALUES ("'.$no.'","'.$people.'","'.$name.'","'.$account.'","'.$email.'","'.$photo.'")';
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				mysql_query($mysql3);
				header("Location:jo.php?no=".$no."&success=".$no);//避免重新整理時，重複傳送表單，故需導回原畫面。
			}
			//跳出確認提示，按取消則轉跳回原頁
			if(isset($_POST['no'])){
				$no = $_GET['no'];
				header("Location:jo.php?no=".$no);
			}

			//創建房間
			//創建房間
			//創建房間
		 	if(isset($_POST['create'])){//若按了「創建」則創建房間
		 		if(empty($_SESSION['account'])){//若沒有登入則阻擋「創建」
		 			?> 
					<script type="text/javascript">
						var signIn = confirm("你尚未登入唷~請登入後才轉跳");
						if(signIn){
							window.location.href='../user/login.php';
						}
						else{
							window.location.href='jo.php';
						}
					</script>
					<?php
				}
				else if(empty($_POST['room'])){
					?> 
					<script type="text/javascript">
						var signIn = confirm("你沒填房名喔!!");
						window.location.href='jo.php';
					</script>
					<?php
				}
				else if(empty($_POST['people'])){
					?> 
					<script type="text/javascript">
						var signIn = confirm("你沒填會員人數喔!!");
						window.location.href='jo.php';
					</script>
					<?php
				}
				else if(empty($_POST['date'])){
					?> 
					<script type="text/javascript">
						var signIn = confirm("請填日期~");
						window.location.href='jo.php';
					</script>
					<?php
				}
				else if(empty($_POST['time'])){
					?> 
					<script type="text/javascript">
						var signIn = confirm("請填時間~");
						window.location.href='jo.php';
					</script>
					<?php
				}
				else{
					if(empty($_POST['game'])){
		 				$game = "無";
		 			}
		 			else{
		 				$game = $_POST['game'];
		 			}
		 			if(empty($_POST['spend'])){
		 				$spend = "無";
		 			}
		 			else{
		 				$spend = $_POST['spend'];
		 			}
		 			if(empty($_POST['remark'])){
		 				$remark = "無";
		 			}
		 			else{
		 				$remark = $_POST['remark'];
		 			}
		 			$account = $_SESSION['account'];
		 			$room = $_POST['room'];
					//依照房間名稱來指定經緯度
					$store = $_POST['store'];
			 		if($store=="swan caf'e"){
						$x = 25.088419;
						$y = 121.463863;	
					}				
					$date = $_POST['date'];
					$time = $_POST['time'];
					$time2 = $_POST['time2'];
					$people = $_POST['people'];	
					
					$setSQL = 'INSERT INTO `room`(`host`,`room`,`store`,`x`,`y`,`game`,`date`,`time`,`time2`,`people`,`spend`,`remark`) VALUES ("'.$account.'","'.$room.'","'.$store.'","'.$x.'","'.$y.'","'.$game.'","'.$date.'","'.$time.'","'.$time2.'","'.$people.'","'.$spend.'","'.$remark.'")';
					echo $setSQL;
					mysql_query("SET NAMES'UTF8'");
					mysql_query("SET CHARACTER SET UTF8");
					mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
					mysql_query($setSQL);

					$selectRoomHost = "SELECT * FROM `room` WHERE `host` = '".$account."' AND `date` = '".$date."' AND `time` = '".$time."' AND `room` = '".$room."' ";
					//選出主揪人是現在session的資料，要取得room 裡的 no
					$selectRoomHost = mysql_query($selectRoomHost);
					$roomHost = mysql_fetch_assoc($selectRoomHost);

					$selectUser = "SELECT * FROM `user` WHERE `account` = '".$account."'";
					//選出 user table 裡account是現在session的資料，要取的user email 和 photo
					$selectUser = mysql_query($selectUser);
					$user = mysql_fetch_assoc($selectUser);

					$setSQL1 = 'INSERT INTO `member`(`no`,`people`,`name`,`account`,`email`,`photo`)VALUES("'.$roomHost['no'].'","'.$people.'","'.$user['name'].'","'.$account.'","'.$user['email'].'","'.$user['photo'].'")';
					mysql_query($setSQL1);
					header("Location:jo.php");
				}			
	 		}	 		
				
		 	//刪除成員
		 	//刪除成員
		 	//刪除成員
			if(isset($_POST['deletePerson'])){
				$no = $_GET['no'];
				$account = $_POST['deletePerson'];
				$deletePerson = "DELETE FROM `member` WHERE `no`='".$no."' AND `account`='".$account."'";
				mysql_query($deletePerson);
				header("Location:jo.php?no=".$no);
			}

			//刪除房間
			//刪除房間
			//刪除房間
			if(isset($_POST['deleteRoom'])){
				$no = $_GET['no'];
				$deleteRoom = "DELETE FROM `room` WHERE `no` = '".$no."'";
				$deleteRoomMember = "DELETE FROM `member` WHERE `no` = '".$no."'";
				mysql_query($deleteRoom);
				mysql_query($deleteRoomMember);
				header("Location:jo.php");
			}

			//鎖定房間
			//鎖定房間
			//鎖定房間
			if(isset($_POST['lockRoom'])){
				$no = $_GET['no'];

				$updateRoomNo = 'UPDATE `room` SET `decide`=1 WHERE `no` = "'.$no.'"';
				mysql_query($updateRoomNo);

				$selectRoomNo = "SELECT * FROM `room` WHERE `no` = '".$no."'";
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$selectRoomNo = mysql_query($selectRoomNo);
				$roomNo = mysql_fetch_assoc($selectRoomNo);
				
				$selectMemberNo = "SELECT * FROM `member` WHERE `no`= '".$no."' ";
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$selectMemberNo = mysql_query($selectMemberNo);
				while($memberNo = mysql_fetch_assoc($selectMemberNo)){
					$insertMemberRemind = 'INSERT INTO `remind`(`no`, `account`, `email`, `host`, `room`, `date`, `time`, `store`) VALUES ("'.$no.'","'.$memberNo['account'].'","'.$memberNo['email'].'","'.$roomNo['host'].'","'.$roomNo['room'].'","'.$roomNo['date'].'","'.$roomNo['time'].'","'.$roomNo['store'].'")';
					mysql_query("SET NAMES'UTF8'");
					mysql_query("SET CHARACTER SET UTF8");
					mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
					mysql_query($insertMemberRemind);				

				}
				include('mailer.php');
			}
			include("../../include/groupHeader.php"); 
		?>
			  
		<section class="jobg_section"><!--導覽列以下的區塊-->
			<section class="jo_blue_section">
				<div class="jo_blue"><!--藍底區塊-->
					<span class="jo_blue_word">揪團系統</span>
					<span><a href="#" class="jo_btn">如何揪團</a></span>
					<span><a class="jo_btn" onClick="openroom(op)">創建房間</a></span>
				</div>
			</section>
			<section><!--揪團房間區塊-->
				<div class="jo_card" >
				<!--第一行div表格-->
					<div class="jo_div_table"><!--div_table-->
					 	<div class="jo_row"><!-- 大表格tr -->
					 	
					 	<?php

					 	$setSQL = 'SELECT * FROM `room` ORDER BY `no`';
						mysql_query("SET NAMES'UTF8'");
						mysql_query("SET CHARACTER SET UTF8");
						mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
						$result = mysql_query($setSQL);
						$number = mysql_num_rows($result);//取得所選SQL的列數，取代count(*);

						//指定台北時區
						date_default_timezone_set('Asia/Taipei');
						$now = date("Y-m-d-H:i:s");

						//顯示房間	配合html
						//顯示房間	配合html
						//顯示房間	配合html
					 	//若資料庫裡 room table 的列數大於0，則取出資料並配合html顯示
						if($number>0){
							while($row = mysql_fetch_assoc($result) ){
								$no = $row['no'];
								$room = $row['room'];
								$date = $row['date'];
								$time = date("H:i",strtotime($row['time']));//格式化時間(只顯示小時跟分鐘)
								$time2 = date("H:i",strtotime($row['time2']));
								$store = $row['store'];
								$people = $row['people'];
								$game = $row['game'];									
								$startTime = date("Y-m-d-H:i:s", strtotime($date.$time."5 hours"));

								//抓取當前"no"的房間之人數
								$selectMemberNo = mysql_query("SELECT * FROM `member` WHERE `no` = '".$no."'");
								$num = mysql_num_rows($selectMemberNo);


								if($now>$startTime){
									//開始時間再加5小時，時間一到，刪除TABLE room 跟 DB room 還有 chat 裡面 'no'房 的
									$setSQL1 = "DELETE FROM `room` WHERE `no`=".$no."";
									mysql_query($setSQL1);
									$setSQL2 = "DELETE FROM `member` WHERE `no` =".$no."";
									mysql_query($setSQL2);
									$setSQL3 = "DELETE FROM `chat` WHERE `no`=".$no."";
									mysql_query($setSQL3);
									//header("Location:jo.php");//為了避免刪除以後頁面仍顯示房間，導回原頁面做重新整理
								}
							?>
							
					        <div class="jo_cell1"><!-- 大表格td -->  
					        	<form method="get"> 
						         	<!--揪團房間1-->
						            <div class="jo_info_card-0"><!-- 一張揪團卡內的上半部table --> 
										<div class="jo_title"><!--一張揪團卡內的上半部title區塊（tr)-->
											<div class="jo_number_div"><!--一張揪團卡內的房間編碼（td)-->
												<div class="jo_number"><?php echo $no ?></div>
												<input type="hidden" name="no" value="<?php echo $no ?>" >
											</div>
											<div class="jo_room_name_div"><!--一張揪團卡內的房間名稱（td)-->
												<div class="jo_room_name" title="<?php echo $room ?>" ><?php echo $room ?></div>											
											</div>
										</div>
									</div>
									<div class="jo_info"><!--一張揪團卡內的詳細資訊區塊（黃底）-->
										<div class="jo_info_table"><!--一張揪團卡內的詳細資訊表格-->
											<div class="jo_info_tr"><!--詳細資訊區塊日期tr-->
												<div class="jo_info_bg"><!--詳細資訊白底區塊-->
													<div class="jo_info_td01">
														<div class="jo_info_td01-2">日期</div>
													</div>
													<div class="jo_info_td02">
														<div class="jo_info_td02-2"><?php echo $date ?></div>
													</div>
												</div>
											</div>
											<div class="jo_info_tr"><!--詳細資訊區塊時間tr-->
												<div class="jo_info_bg"><!--詳細資訊白底區塊-->
													<div class="jo_info_td01">
														<div class="jo_info_td01-2">時間</div>
													</div>
													<div class="jo_info_td02">
														<div class="jo_info_td02-2"><?php echo $time."-".$time2 ?></div>
													</div>
												</div>
											</div>
											<div class="jo_info_tr"><!--詳細資訊地點區塊tr-->
												<div class="jo_info_bg"><!--詳細資訊白底區塊-->
													<div class="jo_info_td01">
														<div class="jo_info_td01-2">地點</div>
													</div>
													<div class="jo_info_td02">
														<div class="jo_info_td02-2"><?php echo $store ?></div>
													</div>
												</div>
											</div>
											<div class="jo_info_tr"><!--詳細資訊人數區塊tr-->
												<div class="jo_info_bg"><!--詳細資訊白底區塊-->
													<div class="jo_info_td01">
														<div class="jo_info_td01-2">人數</div>
													</div>
													<div class="jo_info_td02">
														<div class="jo_info_td02-2"><?php echo $num."/".$people ?></div>
													</div>
												</div>
											</div>
											<div class="jo_info_tr"><!--詳細資訊人數區塊tr-->
												<div class="jo_info_bg"><!--詳細資訊白底區塊-->
													<div class="jo_info_td01">
														<div class="jo_info_td01-2">遊戲</div>
													</div>
													<div class="jo_info_td02">
														<div class="jo_info_td02-2"><?php echo $game ?></div>
													</div>
												</div>
											</div>
										</div>
									</div> 
									<div class="redline"></div> <!--紅線-->  
									<div class="greenbottom"> <!--綠底-->
										<table class="goroom_table">
											<tr>
												<td class="go_room_td">
													<div class="white1"></div> <!--白球-->
												</td>
												<td class="go_room_td2">
													<?php
														$selectRoomNo = "SELECT * FROM `room` WHERE `no` = '".$no."'";
												 		$selectRoomNo = mysql_query($selectRoomNo);
												 		$roomNo = mysql_fetch_assoc($selectRoomNo);
														if($roomNo['decide']==0){
															?>
															<button type="submit" class="goroom_btn" onClick="openviewroom(view_room)">瀏覽房間</button>
															<?php
														}
														else{
															?>
															<button type="submit" class="goroom_btn" onClick="openviewroom(view_room)">已經鎖定</button>
															<?php
														}
													?>
												</td>
												<td class="go_room_td">
													<div class="white2"></div> <!--白球-->
												</td>
											</tr>
										</table>
									</div><!--綠底-->
								</form>
					        </div> <!-- 大表格td -->
						    
					        <?php
					    	}
					    }
					    else{//若資料庫裡 room table 的列數小於0，則顯示目前沒人揪團
					    	echo "目前沒有人揪團唷~";
					    }
					    ?>
					    </div> <!--tr--> 
					 </div> <!--div_table-->
				</div><!--class="store_card"-->
			</section>  

			<!--跳出的創建房間資訊div-->
			<!--跳出的創建房間資訊div-->
			<!--跳出的創建房間資訊div-->
			<div id="op">
				<div class="op_fixed">
					<div class="openroom_fram01">
					    <table class="openroom_fram01_table">
					      <tr>
					        <td class="openroom_title">創建房間</td>
					        <td class="openroom_close" onClick="javascript:op.style.display='none';">X</td>
					      </tr>
					    </table>
					</div> 
				  	<div class="openroom_fram02">
					    <table class="openroom_fram02_table">
					    	<form method="post">
							    <tr class="openroom_info_tr">
							        <td class="openroom_info_td">房名</td>
							        <td class="openroom_info_input_td"><input type="text" name="room" class="jo_text01">&nbsp;&nbsp;*必填</td>
							        <td rowspan="9">
										<!--創建房間裡的店家資訊卡-->
										<div class="jo_build_store_info_card-0">
											<div class="jo_build_store_info_card01"><!--店家資訊卡店名與圖片部分-->
												<span class="jo_build_span_love_img">
													<img class="jo_build_love_img" src="../../jomor_html/img/love.png">
												</span>
												<span class="jo_build_store_name" onClick="opendiv(Store_inf)">Swancafe天鵝咖啡館</span>
												<div><img class="jo_build_store_img" src="../../jomor_html/img/swancafe01.jpg" onClick="opendiv(Store_inf)"></div>
											</div> 
											<!--店家資訊卡文字部分-->
											<div class="jo_build_store_info_card02">
												<table class="jo_build_store_info_card02_table">
													<tr>
														<td class="jo_build_store_info_card02_td01">店家地址｜</td>
														<td class="jo_build_store_info_p2">台北市羅斯福路五段170巷37號一樓</td>
													</tr>
													<tr>
														<td class="jo_build_store_info_card02_td01">店家電話｜</td>
														<td class="jo_build_store_info_p2">(02)2930-8983</td>
													</tr>
													<tr>
														<td class="jo_build_store_info_card02_td01">營業時間｜</td>
														<td class="jo_build_store_info_p2">每天10:00-22:00</td>
													</tr>
												</table>
											</div>
										</div> 
							        </td>
							    </tr>
							    <!--加上form，資料回傳到此頁最頂。-->				    
							    <tr class="openroom_info_tr">
							        <td class="openroom_info_td">日期</td>
							        <td class="openroom_info_input_td"><input type="date" name="date" class="jo_text01">&nbsp;&nbsp;*必填</td>
							    </tr>
							    <tr class="openroom_info_tr">
							        <td class="openroom_info_td">時間</td>
							        <td class="openroom_info_input_td"><input type="time" name="time" class="jo_text02">
							        <span style="color: #5C5D5D;">至</span>
							        <input type="time" name="time2" class="jo_text02">&nbsp;&nbsp;*必填</td>
							    </tr>
							    <tr class="openroom_info_tr">
							        <td class="openroom_info_td">人數</td>
							        <td class="openroom_info_input_td"><input type="number" name="people" min="1" max="50" class="jo_text03">&nbsp;&nbsp;*必填</td>
							    </tr>
								<tr class="openroom_info_tr">
									<td class="openroom_info_td">地點</td>
									<td class="openroom_info_input_td">
									<select name="store" class="jo_text04">
										<option value="#" >無</option>
										<option value="swan caf'e">swancafe天鵝咖啡館</option>
										<option value="#">女巫店</option>
										<option value="#">卡卡城</option>
									</select>
								</tr>
								<tr class="openroom_info_tr">
									<td class="openroom_info_td">遊玩遊戲</td>
									<td class="openroom_info_input_td" style="position:relative;top:5px;" ><input type="text" name="game" class="jo_text01">
									<span style="color: #5C5D5D;"><br>（請填寫主要遊玩遊戲，至多兩個）</span>*必填</td>
								</tr>
								<tr class="openroom_info_tr">
									<td class="openroom_info_td">消費模式</td>
							        <td class="openroom_info_input_td"><input type="text" name="spend" class="jo_text01">&nbsp;&nbsp;*必填</td>
							        <td rowspan="9">							
								</tr>
							    <tr class="openroom_info_tr">
							        <td class="openroom_info_td">備註</td>
							        <td class="openroom_info_input_td">
							          <textarea name="remark"  rows=5 cols=50 wrap=physical class="jo_text06"></textarea>
							        </td>
							        <td><button type="submit" name="create" class="jo_btn02" >創建</button></td>
							    </tr>
						    </form>
					    </table>
				  	</div>
				</div> 
			</div>

			<!--瀏覽房間按鈕所跳出的房間資訊div-->
			<!--瀏覽房間按鈕所跳出的房間資訊div-->
			<!--瀏覽房間按鈕所跳出的房間資訊div-->
			<?php
				if(isset($_GET['no'])){
			 		$no = $_GET['no'];
			 		$selectRoomNo = "SELECT * FROM `room` WHERE `no` = '".$no."'";
			 		$selectRoomNo = mysql_query($selectRoomNo);
			 		$roomNo = mysql_fetch_assoc($selectRoomNo);
			 		$time = date("H:i",strtotime($roomNo['time']));//格式化時間(只顯示小時跟分鐘)
					$time2 = date("H:i",strtotime($roomNo['time2']));

			 		$selectMemberNo = mysql_query("SELECT * FROM `member` WHERE `no` = '".$no."'");
					$num = mysql_num_rows($selectMemberNo);
					?>
				    <div id="view_room"><!--瀏覽房間-->
					    <div class="view_room_center">
					        <div class="view_room_fram01">
					          	<table class="view_room_fram01_table">
					            	<tr>
						            	<td class="view_room_title"><?php echo $no ?>號房-就是要揪團~</td>
						              	<td class="view_room_close" onClick="javascript:window.location.href='jo.php';">X</td>
					            	</tr>
					          	</table>
					        </div> 
					      	<div class="viewroom_fram02"><!--揪團的資訊欄位-->
						        <table class="view_room_fram02_table"><!--切三列的表格-->
						          	<tr>
							            <td class="view_room_fram02_table_td">
							              	<div class="view_info_table"><!--詳細資訊表格-->
							                  	<div class="view_info_tr"><!--詳細資訊區塊日期tr-->
							                        <div class="view_info_bg"><!--詳細資訊黃底區塊-->
							                          	<div class="view_info_td01">
							                            	<div class="view_info_td01-2">日期</div>
							                         	</div>
							                          	<div class="view_info_td02">
							                            	<div class="view_info_td02-2"><?php echo $roomNo['date'] ?></div>
							                          	</div>
							                        </div>
							                  	</div>
							                  	<div class="view_info_tr"><!--詳細資訊區塊時間tr-->
							                        <div class="view_info_bg"><!--詳細資訊白底區塊-->
							                          	<div class="view_info_td01">
								                            <div class="view_info_td01-2">時間</div>
								                        </div>
								                       	<div class="view_info_td02">
								                            <div class="view_info_td02-2"><?php echo $time."-".$time2 ?></div>
							                          	</div>
							                        </div>
							                  	</div>
							                  	<div class="view_info_tr"><!--詳細資訊地點區塊tr-->
							                        <div class="view_info_bg"><!--詳細資訊白底區塊-->
							                          	<div class="view_info_td01">
							                            	<div class="view_info_td01-2">地點</div>
							                          	</div>
							                          	<div class="view_info_td02">
							                            	<div class="view_info_td02-2"><?php echo $roomNo['store'] ?></div>
							                          	</div>
							                        </div>
							                  	</div>
							                  	<div class="view_info_tr"><!--詳細資訊人數區塊tr-->
							                        <div class="view_info_bg"><!--詳細資訊白底區塊-->
							                          	<div class="view_info_td01">
							                            	<div class="view_info_td01-2">人數</div>
							                          	</div>
							                          	<div class="view_info_td02">
							                            	<div class="view_info_td02-2"><?php echo $num."/".$roomNo['people'] ?></div>
							                          	</div>
							                        </div>
							                  	</div>
							                  	<div class="view_info_tr"><!--詳細資訊遊戲區塊tr-->
							                        <div class="view_info_bg"><!--詳細資訊白底區塊-->
							                          	<div class="view_info_td01">
							                            	<div class="view_info_td01-2">遊戲</div>
							                          	</div>
							                          	<div class="view_info_td02">
							                            	<div class="view_info_td02-2"><?php echo $roomNo['game'] ?></div>
							                          	</div>
							                        </div>
							                  	</div>
							              	</div>
							            </td>
							            <td class="view_room_fram02_table_td">
							              	<div class="view_info_tr"><!--備註區塊tr-->
							                  	<div class="view_info_bg02"><!--詳細資訊黃底區塊-->
								                    <div class="view_info_td01">
								                      	<div class="view_info_td01-2">備註</div>
								                    </div>
								                    <div class="view_info_td02">
								                      	<div class="view_info_td02-3"><?php echo $roomNo['remark'] ?></div>
								                    </div>
							                  	</div>
							              	</div>
							            </td>
						            	<td>
						              		<!--店家資訊卡-->
						              		<!--店家資訊卡-->
						              		<!--店家資訊卡-->
						              		<!--做一個店家資料的table，再select from it where store = $roomNo['store']-->
						                  	<div class="jo_store_info_card-02">
							                    <div class="jo_info_card01"><!--店家資訊卡店名與圖片部分-->
							                      	<span class="span_love_img">
							                        	<img class="jo_love_img" src="../../jomor_html/img/love.png">
							                      	</span>
							                      	<span class="jo_store_name">Swancafe天鵝咖啡館</span>
							                      	<div><img class="jo_store_img" src="../../jomor_html/img/swancafe01.jpg"></div>
							                    </div>
						                    	<!--店家資訊卡文字部分-->
						                   	 	<div class="jo_store_info_card02">
							                    	<table class="jo_store_info_card02_table">
								                        <tr>
								                          <td class="jo_store_info_card02_td01">店家地址｜</td>
								                          <td class="jo_store_info_p2">台北市羅斯福路五段170巷37號一樓</td>
								                        </tr>
								                        <tr>
								                          <td class="jo_store_info_card02_td01">店家電話｜</td>
								                          <td class="jo_store_info_p2">(02)2930-8983</td>
								                        </tr>
								                        <tr>
								                          <td class="jo_store_info_card02_td01">營業時間｜</td>
								                          <td class="jo_store_info_p2">每天10:00-22:00</td>
								                        </tr>
							                      	</table>
						                    	</div>
						                  	</div>
						            	</td>
						          	</tr>
						        </table>
					      	</div>

				      		<!--第三欄”參與成員“欄位-->
				      		<!--第三欄”參與成員“欄位-->
				      		<!--第三欄”參與成員“欄位-->

					      	<div class="view_room_fram03">
					            <div class="view_room_title02"><?php echo $num."/".$roomNo['people'] ?></div>
					        	<div class="abgne_tab"><!--圖像與條列頁籤切換鈕-->
						          	<ul class="tabs_ul">
							            <li class="tabs_li"><a href="#tab1">圖像顯示</a></li>
							            <li class="tabs_li"><a href="#tab2">條列顯示</a></li>
						          	</ul>
				        			<!--第一個頁籤（頭像式）含聊天室-->
				        			<!--第一個頁籤（頭像式）含聊天室-->
				        			<!--第一個頁籤（頭像式）含聊天室-->
						        	<div class="tab_container">

							        	<?php
								        	error_reporting(0); 
								        	//用房號來抓取討論室裡的資料
								        	$selectChatNo = "SELECT * FROM `chat` WHERE `no`='".$no."'";
								        	$selectChat1 = mysql_query($selectChatNo);//分1和2給兩不同頁籤
								        	$selectChat2 = mysql_query($selectChatNo);
								        	//抓取 member table 裡面房號與目前點選房間的房號相同，帳號又跟目前使用者的session紀錄相同的資料，若有才開放聊天室
								        	$selectMemberAccount = "SELECT * FROM `member` WHERE `account` = '".$_SESSION['account']."' AND `no` = '".$no."'";
								        	$selectMemberAccount = mysql_query($selectMemberAccount);
								        	$memberSignIn = mysql_num_rows($selectMemberAccount);		        	
							        	?>
							            <div id="tab1" class="tab_content">
								            <div class="player_frame">
								            	<div class="player"><!--參與玩家視窗-->
									                <div class="player_table"><!--參與玩家視窗表格-->
									                  	<div class="player_tr">
										                    <?php
											                    //selectRoomNo已經做過不用再做
											                    //selectMemberNo已經做過不用再做
											                    //抓到member裡的此房間的房主
											                    $limit = $roomNo['people']-$num;					                    
											                    $selectMemberHost = "SELECT * FROM `member` WHERE `no` = '".$no."' AND `account` =  '".$roomNo['host']."'";
											                    $selectMemberHost = mysql_query($selectMemberHost);
											                    $memberHost = mysql_fetch_assoc($selectMemberHost);
											                   
											                    $selectOnlyMember1 = mysql_query("SELECT * FROM `member` WHERE `no` = '".$no."' AND `account` != '".$roomNo['host']."'");
											                    $selectOnlyMember2 = mysql_query("SELECT * FROM `member` WHERE `no` = '".$no."' AND `account` != '".$roomNo['host']."'");

										                    ?>
										                    <!--成員包裹-->
										                    <!--成員包裹-->
										                    <!--成員包裹-->

										                    <!--顯示房主資料-->
										                    <!--顯示房主資料-->
										                    <!--顯示房主資料-->
										                    <div class="player_tr">
										                    	<div class="player_tr_frame" >
										                    		<div class="player_td0" title="<?php echo $memberHost['name']; ?>" >
										                    			<a class="player_a" href="userData.php?account=<?php echo $memberHost['account']; ?>">
										                    				<?php echo $memberHost['name']; ?>
										                    			</a>							                    			    
										                    		</div> 
											                      	<img class="jo_photo" src="../user/photo/<?php echo $memberHost['photo']; ?>">

											                      	<!--帳號欄包含選單-->
											                      	<div class="jo_acount">
											                      		<div id="jo_select" class="jo_acount_selection">
											                      			<form method="post">
											                      				<!--要房長才會顯示-->
											                      				<button name="deletePerson" class="jo_acount_select" value="<?php echo $memberHost['account']; ?>">踢除此成員</button>
														                      	<div class="jo_acount_sborder"></div><!--要房長才會顯示-->
														                      	<button class="jo_acount_select" ><a href="userData.php?account=<?php echo $memberHost['account']; ?>">查看個人資料</a></button>
													                      	</form>
											                      		</div>
											                      		<div style="clear:both"></div>   
										                        		<div class="jo_acount_no">
										                        			<?php echo $memberHost['account']; ?>
										                        			<div class="player_a_img">
												                    			<img 
												                    				id="triangle" 
												                    				class="jo_striangle_img" 
												                    				src="../../jomor_html/img/jo_triangle.png" 
												                    				onmouseover="this.src='../../jomor_html/img/jo_triangle2.png'" 
													                    			onmouseout="this.src='../../jomor_html/img/jo_triangle.png'"
												                    				onClick="selectShow();"
												                    			>
												                    		</div>
										                        		</div>
										                        	</div>
										                    	</div>						                    		
									                      	</div> 

									                      	<!--顯示成員資料-->
									                      	<!--顯示成員資料-->
									                      	<!--顯示成員資料-->
										                    <?php
											                    while($onlyMember = mysql_fetch_assoc($selectOnlyMember1)){
											                	?>
											                    <div class="player_tr">
											                    	<div class="player_tr_frame" >
											                    		<div class="player_td01" title="<?php echo $onlyMember['name']; ?>" >
											                    			<a class="player_a01" href="userData.php?account=<?php echo $onlyMember['account']; ?>">
											                    				<?php echo $onlyMember['name']; ?>
											                    			</a>							                    			    
											                    		</div> 
												                      	<img class="jo_photo" src="../user/photo/<?php echo $onlyMember['photo']; ?>">

												                      	<!--帳號欄包含選單-->
												                      	<div class="jo_acount">
												                      		<div id="jo_select" class="jo_acount_selection">
												                      			<form method="post">
												                      				<!--要房長才會顯示-->
												                      				<button name="deletePerson" class="jo_acount_select" value="<?php echo $onlyMember['account']; ?>">踢除此成員</button>
															                      	<div class="jo_acount_sborder"></div><!--要房長才會顯示-->
															                      	<button class="jo_acount_select" ><a href="userData.php?account=<?php echo $onlyMember['account']; ?>">查看個人資料</a></button>
														                      	</form>
												                      		</div>
												                      		<div style="clear:both"></div>   
											                        		<div class="jo_acount_no">
											                        			<?php echo $onlyMember['account']; ?>
											                        			<div class="player_a_img">
													                    			<img 
													                    				id="triangle" 
													                    				class="jo_striangle_img" 
													                    				src="../../jomor_html/img/jo_triangle.png" 
													                    				onmouseover="this.src='../../jomor_html/img/jo_triangle2.png'" 
													                    				onmouseout="this.src='../../jomor_html/img/jo_triangle.png'"
													                    				onClick="selectShow()"
													                    			>
													                    		</div>
											                        		</div>
											                        	</div>
											                    	</div>							                    		
										                      	</div>
										                    	<?php
										                    }
										                    //顯示等待中
										                    //顯示等待中
										                    //顯示等待中
										                    for( $i=1 ; $i <= $limit ; $i++ ){
										                    	?>
										                    	<div class="player_waiting">
										                    		<div class="player_tr">
										                    			<div class="player_tr_frame" >
										                    				<div class="player_td02">等待中</div> 
													                      	<img class="jo_photo" src="../../jomor_html/img/jo_photo.png">
											                        		<div class="jo_acount_no">empty</div>
										                    			</div>								                    		
											                      	</div>
										                    	</div>
										                    	<?php
										                    }
										                    ?>

									                  	</div>
									                  	
									                </div><!--參與玩家視窗表格結束-->
									                <div>測試捲軸！！</div>
									                <div>當資訊需要到第二行時確保可以有卷軸往下滑</div>
									            </div><!--參與玩家視窗結束-->
								            </div>

							              	<div class="chat_bg"><!--聊天室的黃背景-->
								              	<?php
									              	if($memberSignIn==0){
									        			?>			        		
										                <div class="chat_window">
										                  	<p class="chat_window_p">您必須先加入此房間才能使用聊天室<p>
										                </div>
										                <?php
										            }
										            else{
										            	?>
										            	<div class="chat_window">
										            		<?php
										            		while($chatNo = mysql_fetch_assoc($selectChat1)){
										            			echo "(".$chatNo['now'].")".$chatNo['name']."說：&nbsp".$chatNo['chat']."<br>";     
										            			//echo"<p class='chat_window_p'>($row4[2])"."$row4[1]"."說：&nbsp"."$row4[3]<p>";
										            		}					            		
										                  	?>
										                </div>
										                <?php
										            }
									            ?>
								                <div class="message"><!--留言打字框-->
								                	<form method="post">
									                  	<span>我有話要說：</span>
									                  	<span><input class="chat_text" type="text" name="chat"></span>
									                  	<span><input class="chat_enter" type="submit" name="OK" value="輸入"></span>
									                </form>
								                </div>
								                
								                
							            	</div>
							            	<?php
												if($roomNo['decide']==0){
													if($_SESSION['account']==$memberHost['account']){
										                ?>
										                <form method="post">
											            	<div class="join_bt">
												            	<button type="submit" name="lockRoom" class="join_Hbtn" >
												            		鎖定<br>房間
												            	</button>
												            	<button type="submit" name="deleteRoom" class="join_Hbtn" onClick="javascript:window.location.href='jo.php';">
												            		刪除<br>房間
												            	</button>
											            	</div>
										            	</form>
										                <?php
									            	}
									            	else{
									            		?>
									            		<form method="post">
											            	<div class="join_bt">
												            	<button type="submit" name="join" class="join_btn" onClick="javascript:window.location.href='jo.php';">
												            		加入
												            	</button>
											            	</div>
										            	</form>
										            	<?php
									            	}
												}
												else{
													?>
									            	<div class="join_bt">
										            	<button type="submit" name="join" class="join_btn" onClick="javascript:window.location.href='jo.php';" disabled>
										            		已鎖
										            	</button>
									            	</div>
													<?php
												}								                
							                ?> 
							        	</div>


							          	<!--第二個頁籤（條列式）含聊天室-->
							          	<!--第二個頁籤（條列式）含聊天室-->
							          	<!--第二個頁籤（條列式）含聊天室-->
							            <div id="tab2" class="tab_content">
							            	<div class="b_player_frame">
								            	<div class="b_player"><!--參與玩家視窗-->
									            	
									                <div class="b_player_td">
									                  	<div class="b_player_td0" title="<?php echo $memberHost['name'] ?>" ><?php echo $memberHost['name']; ?></div>
								                      	<div class="b_jo_acount_no_td">
								                        	<div class="b_jo_acount_no"><?php echo $memberHost['account'] ?></div>
								                        </div>
								                        <?php
									                    	while($onlyMember = mysql_fetch_assoc($selectOnlyMember2)){
									                    	?>
									                        <div class="b_player_td01" title="<?php echo $onlyMember['name']; ?>" ><?php echo $onlyMember['name']; ?> </div>
									                      	<div class="b_jo_acount_no_td">
									                        	<div class="b_jo_acount_no"><?php echo $onlyMember['account']; ?></div>
									                        </div>
								                        	<?php
								                    	}
								                    	for( $i=1 ; $i <= $limit ; $i++ ){
									                    	?>
									                    	<div class="b_player_td02">等待中</div>
									                      	<div class="b_jo_acount_no_td">
									                        	<div class="b_jo_acount_no">empty</div>
									                        </div>
									                        <?php
								                    	}
								                    	?>
								       			    </div>
									            </div><!--參與玩家視窗結束-->
								            </div>
							              	<div class="chat_bg"><!--聊天室的黃背景-->
							                	<?php
									              	if($memberSignIn==0){
									        			?>			        		
										                <div class="chat_window">
										                  	<p class="chat_window_p">您必須先加入此房間才能使用聊天室<p>
										                </div>
										                <?php
										            }
										            else{
										            	?>
										            	<div class="chat_window">
										            		<?php
										            		while($chatNo = mysql_fetch_assoc($selectChat2)){
										            			echo "(".$chatNo['now'].")".$chatNo['name']."說：&nbsp".$chatNo['chat']."<br>";     
										            			//echo"<p class='chat_window_p'>($row4[2])"."$row4[1]"."說：&nbsp"."$row4[3]<p>";
										            		}					            		
										                  	?>
										                </div>
										                <?php
										            }
									            ?>
								                <div class="message"><!--留言打字框-->
								                	<form method="post">
									                  	<span>我有話要說：</span>
									                  	<span><input class="chat_text" type="text" name="chat"></span>
									                  	<span><input class="chat_enter" type="submit" name="OK" value="輸入"></span>
									                </form>
								                </div>
							            	</div> 
								            <?php
												if($roomNo['decide']==0){
													if($_SESSION['account']==$memberHost['account']){
										                ?>
										                <form method="post">
											            	<div class="join_bt">
												            	<button type="submit" name="lockRoom" class="join_Hbtn" >
												            		鎖定<br>房間
												            	</button>
												            	<button type="submit" name="deleteRoom" class="join_Hbtn" onClick="javascript:window.location.href='jo.php';">
												            		刪除<br>房間
												            	</button>
											            	</div>
										            	</form>
										                <?php
									            	}
									            	else{
									            		?>
									            		<form method="post">
											            	<div class="join_bt">
												            	<button type="submit" name="join" class="join_btn" onClick="javascript:window.location.href='jo.php';">
												            		加入
												            	</button>
											            	</div>
										            	</form>
										            	<?php
									            	}
												}
												else{
													?>
									            	<div class="join_bt">
										            	<button type="submit" name="join" class="join_btn" onClick="javascript:window.location.href='jo.php';" disabled>
										            		已鎖
										            	</button>
									            	</div>
													<?php
												}								                
							                ?>
						        		</div><!--第二個頁籤（條列式）含聊天室結束-->
									</div>
					  			</div>
							</div>
						</div>
					</div>
					<?php
				}
			?>

			<!--房間內的”加入“按鈕所跳出的創建房間資訊div-->
			<!--房間內的”加入“按鈕所跳出的創建房間資訊div-->
			<!--房間內的”加入“按鈕所跳出的創建房間資訊div-->
		    <div id="join">
		        <div class="join_position">
		            <div class="join_fram01">
		                <span class="join_title">請填寫您的聯絡資訊</span>
		                <span class="join_close" onClick="javascript:join.style.display='none';">
		                    <img src="../../jomor_html/img/close.png" class="jo_close_img">
		                </span>
		            </div>
		            <div class="join_fram02">
		                <table class="jo_fram02_table">
		                    <tr class="jo_info_tr">
		                        <td class="jo_info_td">稱呼</td>
		                        <td class="jo_info_input_td">
		                            <input type="text" name="roomnames" class="jo_text01">&nbsp;&nbsp;*必填
		                        </td>
		                        <td rowspan="9">
		                    </tr>
		                    <tr class="jo_info_tr">
		                        <td class="jo_info_td">電話</td>
		                        <td class="jo_info_input_td">
		                            <input type="tel" pattern="[0][9][0-9]{8}" class="jo_text05">&nbsp;&nbsp;*必填
		                        </td>
		                    </tr>
		                    <tr class="jo_info_trr">
		                        <td class="jo_info_td">其他聯絡方式</td>
		                        <td class="jo_info_input_td">
		                            <input type="text" class="jo_text01">
		                        </td>
		                    </tr>
		                </table>
		                <a href="#" class="join_btn02" onClick="javascript:join.style.display='none';">確定</a>
		            </div>
		        </div>
		    </div>

		    <!--跳出的評價資訊div，所以從這邊複製貼到想要的地方-->
		    <!--跳出的評價資訊div，所以從這邊複製貼到想要的地方-->
		    <!--跳出的評價資訊div，所以從這邊複製貼到想要的地方-->		    
		    <div id="grade">
		        <div class="grade_position">
		            <div class="grade_fram01">
		                <span class="grade_title">您尚未評分！</span>
		                <!--關掉的xx-->
		                <span class="grade_close" onClick="javascript:grade.style.visibility='hidden';">
		                    <img src="../../jomor_html/img/close.png" class="grade_close_img">
		                </span>
		            </div>
		            <div class="grade_fram02">
		                <div class="grade_p">
		                    <p>您尚未對前次揪團房間成員予以評價，</p>
		                    <p>請依您前次揪團體驗在此清單為其他成員做出正負評，謝謝！</p>
		                </div>
		                <div class="rank_div">
		                    <span class="rank_span01">優良^_^</span>
		                    <span class="rank_span02">普通O_O</span>
		                    <span class="rank_span03">差勁=_=</span>
		                </div>
		                <!--評價內的框框-->
		                <div class="score_div">
		                    <table class="score_table" rules="rows">
		                        <tr class="score_tr">
		                            <td class="score_td0">
		                                <img src="../../jomor_html/img/headph.png" class="grade_head_img">
		                            </td>
		                            <td class="score_td1">
		                                <div class="score_username">皮皮君</div>
		                            </td>
		                            <td class="score_td2">
		                                <a href="individual.html" class="score_viewother">查看個人資料</a>
		                            </td>
		                            <td class="score_td3">
		                                <form>
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--優良-->
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--普通-->
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--差勁-->
		                                </form>
		                            </td>
		                        </tr>
		                        <!--第二行-->
		                        <tr class="score_tr">
		                            <td class="score_td0">
		                                <img src="../../jomor_html/img/headph.png" class="grade_head_img">
		                            </td>
		                            <td class="score_td1">
		                                <div class="score_username">波爸</div>
		                            </td>
		                            <td class="score_td2">
		                                <a href="individual.html" class="score_viewother">查看個人資料</a>
		                            </td>
		                            <td class="score_td3">
		                                <form class="score_radio_form">
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--優良-->
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--普通-->
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--差勁-->
		                                </form>
		                            </td>
		                        </tr>
		                        <!--第三行-->
		                        <tr class="score_tr">
		                            <td class="score_td0">
		                                <img src="../../jomor_html/img/headph.png" class="grade_head_img">
		                            </td>
		                            <td class="score_td1">
		                                <div class="score_username">我打了六個字</div>
		                            </td>
		                            <td class="score_td2">
		                                <a href="individual.html" class="score_viewother">查看個人資料</a>
		                            </td>
		                            <td class="score_td3">
		                                <form class="score_radio_form">
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--優良-->
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--普通-->
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--差勁-->
		                                </form>
		                            </td>
		                        </tr>
		                        <!--第四行-->
		                        <tr class="score_tr">
		                            <td class="score_td0">
		                                <img src="../../jomor_html/img/headph.png" class="grade_head_img">
		                            </td>
		                            <td class="score_td1">
		                                <div class="score_username">我打五個字</div>
		                            </td>
		                            <td class="score_td2">
		                                <a href="individual.html" class="score_viewother">查看個人資料</a>
		                            </td>
		                            <td class="score_td3">
		                                <form class="score_radio_form">
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--優良-->
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--普通-->
		                                    <input type="radio" name="#" class="score_radio">
		                                    <!--差勁-->
		                                </form>
		                            </td>
		                        </tr>
		                    </table>
		                </div>
		                <!--按鈕-->
		                <div class="grade_btn_div">
		                    <span><a href="#" class="grade_btn" onClick="javascript:grade.style.visibility='hidden';">稍後</a></span>
		                    <span><a href="#" class="grade_btn" onClick="javascript:grade.style.visibility='hidden';">完成</a></span>
		                </div>
		            </div>
		        </div>
		    </div>

		    <!--跳出的詢問確定要加入房間嗎div（sure)-->
	        <!--跳出的詢問確定要加入房間嗎div（sure)-->
	        <!--跳出的詢問確定要加入房間嗎div（sure)-->
	        <?php
	        	if(isset($_GET['confirm'])){
	        		?>
	        		<div id="sure">
			            <div class="sure_position">
			                <div class="sure_fram01">
			                    <span class="sure_title">確定加入嗎？</span>
			                    <!--關掉的xx-->
			                    <span class="sure_close" onClick="javascript:sure.style.visibility='hidden';">
			            			<img src="../../jomor_html/img/close.png" class="sure_close_img">
			            		</span>
			                </div>
			                <div class="sure_fram02">
			                    <div class="sure_p">
			                        <p>按下”確定“後就要記得與揪團室的夥伴赴約唷！</p>
			                        <p class="sure_p01">加入後就無法自己退出囉！</p>
			                        <p class="sure_p01">如果需要退出就要請房主幫忙退出唷！</p>
			                        <p>確定要加入嗎？</p>
			                    </div>
			                    <!--按鈕-->
			                    <div class="sure_btn_div">
			                    	<form method="post">
			                    		<span><button name="no" class="sure_btn" >取消</button></span>
			                    		<span><button name="yes" class="sure_btn" >確定</button></span>
			                    	</form>	                        
			                    </div>
			                </div>
			            </div>
			            <!--跳出的詢問確定要加入房間嗎div（sure_position)結束-->
			        </div>
			        <?php
	        	}
	        ?>	        
	        
	        <!--跳出成功加入房間的揪團資訊div-->
	        <!--跳出成功加入房間的揪團資訊div-->
	        <!--跳出成功加入房間的揪團資訊div-->
	        <?php
	        	if(isset($_GET['success'])){
	        		$no = $_GET['no'];
	        		$selectRoomNo = "SELECT * FROM `room` WHERE `no` = '".$no."'";
	        		mysql_query("SET NAMES'UTF8'");
					mysql_query("SET CHARACTER SET UTF8");
					mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
	        		$selectRoomNo = mysql_query($selectRoomNo);
	        		$roomNo = mysql_fetch_assoc($selectRoomNo);
	        		?>
	        		<div id="success">
			            <div class="success_position">
			                <div class="success_fram01">
			                    <span class="success_title">加入成功</span>
			                    <!--關掉的xx-->
			                    <span class="success_close" onClick="javascript:success.style.visibility='hidden';">
				                	<img src="../../jomor_html/img/close.png" class="success_close_img">
				                </span>
			                </div>
			                <div class="success_fram02">
			                    <div class="success_block">
			                        <div class="success_info_bg">
			                            <!--詳細資訊黃底區塊-->
			                            <div class="success_info_td01">
			                                <div class="success_info_td01-2">日期</div>
			                            </div>
			                            <div class="success_info_td02">
			                                <div class="success_info_td02-2"><?php echo $roomNo['date'] ?></div>
			                                <!--日期的空值填這裡！！-->
			                            </div>
			                        </div>
			                        <div class="success_info_tr">
			                            <!--詳細資訊區塊時間tr-->
			                            <div class="success_info_bg">
			                                <!--詳細資訊黃底區塊-->
			                                <div class="success_info_td01">
			                                    <div class="success_info_td01-2">時間</div>
			                                </div>
			                                <div class="success_info_td02">
			                                    <div class="success_info_td02-2"><?php echo $roomNo['time'] ?></div>
			                                    <!--時間的空值填這裡！！-->
			                                </div>
			                            </div>
			                        </div>
			                        <div class="success_info_tr">
			                            <!--詳細資訊地點區塊tr-->
			                            <div class="success_info_bg">
			                                <!--詳細資訊黃底區塊-->
			                                <div class="success_info_td01">
			                                    <div class="success_info_td01-2">地點</div>
			                                </div>
			                                <div class="success_info_td02">
			                                    <div class="success_info_td02-2"><?php echo $roomNo['store'] ?></div>
			                                    <!--地點的空值填這裡！！-->
			                                </div>
			                            </div>
			                        </div>
			                        <div class="success_info_tr">
			                            <!--詳細資訊人數區塊tr-->
			                            <div class="success_info_bg">
			                                <!--詳細資訊黃底區塊-->
			                                <div class="success_info_td01">
			                                    <div class="success_info_td01-2">人數</div>
			                                </div>
			                                <div class="success_info_td02">
			                                    <div class="success_info_td02-2"><?php echo $roomNo['people'] ?></div>
			                                    <!--人數的空值填這裡！！-->
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="success_block">
			                        <div class="success_info_bg02">
			                            <!--詳細資訊白底區塊-->
			                            <div class="success_info_td01">
			                                <div class="success_info_td01-2">遊戲</div>
			                            </div>
			                            <div class="success_info_td02">
			                                <div class="success_info_td02-2"><?php echo $roomNo['game'] ?></div>
			                                <!--遊戲的空值填這裡！！-->
			                            </div>
			                        </div>
			                        <div class="success_info_bg03">
			                            <!--詳細資訊黃底區塊-->
			                            <div class="success_info_td01">
			                                <div class="success_info_td01-3">備註</div>
			                            </div>
			                            <div class="success_info_td03">
			                                <div class="success_info_td03-3"><?php echo $roomNo['remark'] ?></div>
			                                <!--備註的空值填這裡！！-->
			                            </div>
			                        </div>
			                    </div>
			                </div>
			                <!--fram2結束-->
			            </div>
			            <!--跳出成功加入房間的揪團資訊div（success）結束-->
			        </div>
			        <?php
	        	}
	        ?>
	        
		</section>
	</body>
</html>