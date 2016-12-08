<!DOCTYPE html>
<html>
<head>
	<title>桌末狂歡 JOMOR - 桌遊資訊平台</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<link href="../../style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../javascript.js"></script>
	<script type="text/javascript" src="../../include/redips-scroll.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../../jomor_html/img/jomorparty_logo.png" type="image/ico" />
	
	<?php
		if(isset($_GET['no'])){
			$no = $_GET['no'];
			$selectRoomNo = "SELECT * FROM `room` WHERE `no` = '".$no."'";
			$selectRoomNo = mysql_query($selectRoomNo);
			$roomNo = mysql_fetch_assoc($selectRoomNo);
			//以上為取得店家照片
			?>
			<meta property="og:image" content="http://www.jomorparty.com/jomor_html/img/f3.jpg"/>
			<meta property="og:title" content="桌末狂歡" />
			<meta property="og:description" content="缺人一起打桌遊嗎? 加入我的房間吧!" />
			<meta property="og:url" content="http://www.jomorparty.com/system/group/jo.php?no=<?php echo $no;?>" />
			<meta property="og:type" content="website" />
			<?php
		}
		
	?>
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
				date_default_timezone_set('Asia/Taipei');
				$now = date("Y-m-d-H:i:s");
			    $chat = $_POST['chat'];     
			    $sql = "INSERT INTO `chat`(`no`, `account` ,`name`,`now`,`chat`)values('$no', '$account' ,'$name','$now','$chat')";
			    mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
			    mysql_query($sql);
			    header("Location:jo.php?no=".$no."#enter");//避免重新整理時，重複傳送表單`,故需導回原畫面。
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
				}
				else{
					header("Location:jo.php?no=".$no."&confirm=".$no);			
				}			
			}

			//跳出確認提示，按確認則輸入訊息
			if(isset($_POST['yes'])){

				$no = $_GET['no'];
				$account = $_SESSION['account'];

				$selectMemberNo = "SELECT * FROM `member` WHERE `no`= '".$no."' ";
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$selectMemberNo = mysql_query($selectMemberNo);
				$memberNo = mysql_fetch_assoc($selectMemberNo);
				
				$selectUserAccount = "SELECT * FROM `user` WHERE `account` = '".$account."'";
			    mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$selectUserAccount = mysql_query($selectUserAccount);
				$userAccount = mysql_fetch_assoc($selectUserAccount);

				//把member表裡的人數資料，user表裡的姓名、帳號、信箱跟照片，再存入member表裡
				$insertMember = 'INSERT INTO `member`(`no`,`people`, `name`, `account`,`email`, `photo`) VALUES ("'.$no.'","'.$memberNo['people'].'","'.$userAccount['name'].'","'.$userAccount['account'].'","'.$userAccount['email'].'","'.$userAccount['photo'].'")';
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				mysql_query($insertMember);

				$selectRoomNo = "SELECT * FROM `room` WHERE `no` = '".$no."'";
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$selectRoomNo = mysql_query($selectRoomNo);
				$roomNo = mysql_fetch_assoc($selectRoomNo);

				$insertRemind = 'INSERT INTO `remind`(`no`,`account`, `email`, `host`,`room`, `date`, `time`, `store`, `decide`) VALUES ("'.$no.'","'.$account.'","'.$userAccount['email'].'","'.$roomNo['host'].'","'.$roomNo['room'].'","'.$roomNo['date'].'","'.$roomNo['time'].'","'.$roomNo['store'].'","3")';
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				mysql_query($insertRemind);

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
		 			$people = $_POST['people'];	
					$date = $_POST['date'];
					$time = $_POST['time'];
					$time2 = $_POST['time2'];	
					$storeNo = $_POST['storeNo'];
					
					$selectStorePhoto = "SELECT * FROM `store` WHERE `storeNo` = '".$storeNo."'";
					mysql_query("SET NAMES'UTF8'");
					mysql_query("SET CHARACTER SET UTF8");
					mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
					echo $selectStorePhoto;
					$selectStorePhoto = mysql_query($selectStorePhoto);
					$storePhoto = mysql_fetch_assoc($selectStorePhoto);
					echo $storePhoto['storeName'];

					$setSQL = 'INSERT INTO `room`(`host`,`room`,`storeNo`,`store`,`game`,`date`,`time`,`time2`,`people`,`spend`,`remark`) VALUES ("'.$account.'","'.$room.'","'.$storeNo.'","'.$storePhoto['storeName'].'","'.$game.'","'.$date.'","'.$time.'","'.$time2.'","'.$people.'","'.$spend.'","'.$remark.'")';
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
			if(isset($_GET['deleteAccountConfirm'])){
				$no = $_GET['no'];
				$account = $_GET['deleteAccount'];	
				$result = $_GET['result'];			

				$selectRoomNo = "SELECT * FROM `room` WHERE `no` = '".$no."'";
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$selectRoomNo = mysql_query($selectRoomNo);
				$roomNo = mysql_fetch_assoc($selectRoomNo);
				
				$selectMemberAccount = "SELECT * FROM `member` WHERE `no` = '".$no."' AND `account`= '".$account."' ";
				echo $selectMemberAccount;
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$selectMemberAccount = mysql_query($selectMemberAccount);
				$memberAccount = mysql_fetch_assoc($selectMemberAccount);

				//在 remind table 輸入「被踢會員的提醒資料」
				$insertMemberRemind = 'INSERT INTO `remind`(`no`, `account`, `email`, `host`, `room`, `date`, `time`, `store`,`decide`) VALUES ("'.$no.'","'.$memberAccount['account'].'","'.$memberAccount['email'].'","'.$roomNo['host'].'","'.$roomNo['room'].'","'.$roomNo['date'].'","'.$roomNo['time'].'","'.$roomNo['store'].'","1")';
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				mysql_query($insertMemberRemind);	

				$deletePerson = "DELETE FROM `member` WHERE `no`='".$no."' AND `account`='".$account."'";
				mysql_query($deletePerson);
				
				//寄信給被踢出的會員
				include('deleteAccountMailer.php');

				//header("Location:jo.php?no=".$no);
			}
			

			//刪除房間
			//刪除房間
			//刪除房間
			if(isset($_GET['deleteRoomConfrim'])){
				$no = $_GET['deleteRoomConfrim'];
				$selectRoomNo = "SELECT * FROM `room` WHERE `no` = '".$no."'";
				mysql_query("SET NAMES'UTF8'");
				mysql_query("SET CHARACTER SET UTF8");
				mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
				$selectRoomNo = mysql_query($selectRoomNo);
				$roomNo = mysql_fetch_assoc($selectRoomNo);
				if($_SESSION['account']!=$roomNo['host']){
					?>
					<script type="text/javascript">
						alert("你不是房長!刪什麼刪阿操!(怒)");
						window.location.href="http://www.jomorparty.com";
					</script>
					<?php
				}
				else{
					$no = $_GET['deleteRoomConfrim'];				

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
						$insertMemberRemind = 'INSERT INTO `remind`(`no`, `account`, `email`, `host`, `room`, `date`, `time`, `store`,`decide`) VALUES ("'.$no.'","'.$memberNo['account'].'","'.$memberNo['email'].'","'.$roomNo['host'].'","'.$roomNo['room'].'","'.$roomNo['date'].'","'.$roomNo['time'].'","'.$roomNo['store'].'","2")';
						mysql_query("SET NAMES'UTF8'");
						mysql_query("SET CHARACTER SET UTF8");
						mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
						mysql_query($insertMemberRemind);
					}					
					//寄信給所有成員
					include('deleteRoomMailer.php');
					//刪除房間表裡屬於該房號的房間、成員資料表裡屬於該房號的成員、聊天室資料表裡屬於該房號的資料
					$deleteRoom = "DELETE FROM `room` WHERE `no` = '".$no."'";
					$deleteRoomMember = "DELETE FROM `member` WHERE `no` = '".$no."'";
					$deleteChat = "DELETE FROM `chat` WHERE `no` = '".$no."'";
					mysql_query($deleteRoom);
					mysql_query($deleteRoomMember);
					mysql_query($deleteChat);
				}
			}

			//鎖定房間
			//鎖定房間
			//鎖定房間
			if(isset($_GET['lockRoom'])){
				$no = $_GET['no'];
				
				//已經鎖定
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

					//insert進remind table
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
					<span><a class="jo_btn" onClick="openrule(rule)">如何揪團</a></span>
					<span><a class="jo_btn" onClick="openroom(op)">創建房間</a></span>
					<span><a class="jo_btn" onClick="window.location.href='jo.php?account=<?php echo $_SESSION['account'];?>'">我的房間</a></span>
				</div>
			</section>
			<section><!--揪團房間區塊-->
				<div class="jo_card" >
				<!--第一行div表格-->
					<div class="jo_div_table"><!--div_table-->
					 	<div class="jo_row"><!-- 大表格tr -->
					 	
					 	<?php
				 			$setSQL = 'SELECT * FROM `room` ORDER BY `no` DESC';
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
							if(isset($_GET['account'])){
								$setSQL = "SELECT * FROM `member` WHERE `account` = '".$_SESSION['account']."'";
								mysql_query("SET NAMES'UTF8'");
								mysql_query("SET CHARACTER SET UTF8");
								mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
								$result = mysql_query($setSQL);
								while($row = mysql_fetch_assoc($result) ){
									$no = $row['no'];
									$selectRoomNo = "SELECT * FROM `room` WHERE `no` = '".$no."'";
									mysql_query("SET NAMES'UTF8'");
									mysql_query("SET CHARACTER SET UTF8");
									mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
									$selectRoomNo = mysql_query($selectRoomNo);
									$roomNo = mysql_fetch_assoc($selectRoomNo);

									$room = $roomNo['room'];
									$date = $roomNo['date'];
									$time = date("H:i",strtotime($roomNo['time']));//格式化時間(只顯示小時跟分鐘)
									$time2 = date("H:i",strtotime($roomNo['time2']));
									$store = $roomNo['store'];
									$people = $roomNo['people'];
									$game = $roomNo['game'];	
									$host = $roomNo['host'];								
									$startTime = date("Y-m-d-H:i:s", strtotime($date.$time."5 hours"));

									//抓取當前"no"的房間之人數
									$selectMemberNo = mysql_query("SELECT * FROM `member` WHERE `no` = '".$no."'");
									$num = mysql_num_rows($selectMemberNo);

									$selectUserHost = "SELECT * FROM `user` WHERE `account` = '".$host."'";
								    mysql_query("SET NAMES'UTF8'");
									mysql_query("SET CHARACTER SET UTF8");
									mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
									$selectUserHost = mysql_query($selectUserHost);
									$userHost = mysql_fetch_assoc($selectUserHost);


									/*if($now>$startTime){
										//開始時間再加5小時，時間一到，刪除TABLE room 跟 DB room 還有 chat 裡面 'no'房 的
										$setSQL1 = "DELETE FROM `room` WHERE `no`=".$no."";
										mysql_query($setSQL1);
										$setSQL2 = "DELETE FROM `member` WHERE `no` =".$no."";
										mysql_query($setSQL2);
										$setSQL3 = "DELETE FROM `chat` WHERE `no`=".$no."";
										mysql_query($setSQL3);
										$setSQL4 = "DELETE FROM `remind` WHERE `no` = ".$no."";
										//header("Location:jo.php");//為了避免刪除以後頁面仍顯示房間，導回原頁面做重新整理
									}
									*/
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
																<div class="jo_info_td01-2">房主</div>
															</div>
															<div class="jo_info_td02">
																<div class="jo_info_td02-2"><?php echo $userHost['name'] ?></div>
															</div>
														</div>
													</div>
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
																<div class="jo_info_td02-2" title="<?php echo $store ?>" ><?php echo $store ?></div>
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
							else{
								while($row = mysql_fetch_assoc($result) ){
									$no = $row['no'];
									$room = $row['room'];
									$date = $row['date'];
									$time = date("H:i",strtotime($row['time']));//格式化時間(只顯示小時跟分鐘)
									$time2 = date("H:i",strtotime($row['time2']));
									$store = $row['store'];
									$people = $row['people'];
									$game = $row['game'];	
									$host = $row['host'];								
									$startTime = date("Y-m-d-H:i:s", strtotime($date.$time."5 hours"));

									//抓取當前"no"的房間之人數
									$selectMemberNo = mysql_query("SELECT * FROM `member` WHERE `no` = '".$no."'");
									$num = mysql_num_rows($selectMemberNo);

									$selectUserHost = "SELECT * FROM `user` WHERE `account` = '".$host."'";
								    mysql_query("SET NAMES'UTF8'");
									mysql_query("SET CHARACTER SET UTF8");
									mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
									$selectUserHost = mysql_query($selectUserHost);
									$userHost = mysql_fetch_assoc($selectUserHost);


									if($now>$startTime){
										//開始時間再加5小時，時間一到，刪除TABLE room 跟 DB room 還有 chat 裡面 'no'房 的
										$setSQL1 = "DELETE FROM `room` WHERE `no`=".$no."";
										mysql_query($setSQL1);
										$setSQL2 = "DELETE FROM `member` WHERE `no` =".$no."";
										mysql_query($setSQL2);
										$setSQL3 = "DELETE FROM `chat` WHERE `no`=".$no."";
										mysql_query($setSQL3);
										$setSQL4 = "DELETE FROM `remind` WHERE `no` = ".$no."";
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
																<div class="jo_info_td01-2">房主</div>
															</div>
															<div class="jo_info_td02">
																<div class="jo_info_td02-2"><?php echo $userHost['name'] ?></div>
															</div>
														</div>
													</div>
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
																<div class="jo_info_td02-2" title="<?php echo $store ?>" ><?php echo $store ?></div>
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
							        <td rowspan="7">
										<!--創建房間裡的店家資訊卡-->
											<img id="ss" src="../../jomor_html/img/jo_store_card/none.png" class="select_store_img">
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
									<select name="storeNo" class="jo_text04" onchange="select_storecard(this)">
							          		<option value="none.png">無</option>
							          	<optgroup label="臺北市">
								            <option value="taipei2.jpg">swancafe天鵝咖啡館</option>
								            <option value="taipei1.jpg">女巫店</option>
								            <option value="taipei3.jpg">萊斯樂</option>	
								            <option value="taipei4.jpg">Legend Fun 樂聚坊桌上遊戲</option>
								            <option value="taipei5.jpg">卡卡城桌上遊戲休閒館（士林店）</option>		
								            <option value="taipei6.jpg">Room桌上遊戲店</option>
								            <option value="taipei7.jpg">貓咪貓咪 Catcat 桌遊咖啡屋</option> 
								            <option value="taipei8.jpg">貝克街桌遊專賣店</option>
								            <option value="taipei9.jpg">桌遊地下城Bungeon</option> 
								            <option value="taipei10.jpg">艾客米桌上遊戲世界</option>
								            <option value="taipei11.jpg">卡卡城桌上遊戲休閒館（東門店）</option> 
								            <option value="taipei12.jpg">Me2we一起玩桌遊</option>
								            <option value="taipei13.jpg">卡卡城桌上遊戲休閒館（公館店）</option>
								            <option value="taipei14.jpg">桌兔子桌上遊戲休閒空間</option>
								            <option value="taipei15.jpg">Game Square 遊戲平方</option>
								            <option value="taipei16.jpg">秘密基地桌遊專賣店</option>
								            <option value="taipei17.jpg">舞雩藝遊館</option>
								            <option value="taipei18.jpg">棋樂無窮桌遊咖啡館</option>
								            <option value="taipei19.jpg">桌遊聯盟主題休閒館</option>
								            <option value="taipei20.jpg">精靈寶鑽桌上遊戲專賣店</option>
								            <option value="taipei21.jpg">CardMaster</option>
								            <option value="taipei22.jpg">卡樂比桌遊生活館</option>
								            <option value="taipei23.jpg">卡牌屋（臺北店）</option>
								            <option value="taipei24.jpg">樂氣球（公館店）</option>
								            <option value="taipei25.jpg">宅公館 At Home</option>  
								            <option value="taipei26.jpg">卡卡城桌上遊戲休閒館（萬芳店）</option>
								            <option value="taipei27.jpg">骰子人桌上遊戲（景美店）</option>
								            <option value="taipei28.jpg">Palette。派樂地</option>
								            <!--注意少編號29因為之前有重複的資料-->
								            <option value="taipei30.jpg">陽光桌遊世界</option>        
								            <option value="taipei31.jpg">8F聚會空間</option>
								            <option value="taipei32.jpg">JOOL桌上遊戲俱樂部</option>
								            <option value="taipei33.jpg">卡卡城桌上遊戲休閒館（永春店）</option>
								            <option value="taipei34.jpg">動桌遊 Dong Board Game</option>
								            <option value="taipei35.jpg">本丸屋桌遊</option>
								            <option value="taipei36.jpg">漫果子桌遊主題餐廳（武昌旗艦店）</option>       
								            <option value="taipei37.jpg">漫果子桌遊連鎖店（公館店）</option>
								            <option value="taipei38.jpg">桌遊老爹</option>        
								            <option value="taipei39.jpg">斜角巷桌遊專賣店</option>
								            <option value="taipei40.jpg">桌遊領主</option>        
								            <option value="taipei41.jpg">打醬油Cafe</option>
								            <option value="taipei42.jpg">Peace 桌遊Café Bar</option>        
								            <option value="taipei43.jpg">桌遊盒子（東湖門市）</option>
								            <option value="taipei44.jpg">語冰書屋</option>        
								            <option value="taipei45.jpg">挪亞方舟桌遊</option>
								            <option value="taipei46.jpg">MYSBOX咖啡桌遊館</option>        
								            <option value="taipei47.jpg">諾貝兒萬華店</option>
								        <optgroup label="新北市">
								        	<option value="north1.jpg">漫果子桌遊連鎖店（永和店）</option>
								        	<option value="north2.jpg">骰子人遊戲咖啡館</option>
								        	<option value="north3.jpg">栞日書坊</option>
								        	<option value="north4.jpg">卡卡城桌上遊戲休閒館（三重店）</option>
								        	<option value="north5.jpg">10號丸家</option>
								        	<option value="north6.jpg">晴天喵喵</option>
								        	<option value="north7.jpg">巨魔派對桌上遊戲專賣店</option>
								        	<option value="north8.jpg">紙盒子桌遊休閒館</option>
								        	<option value="north9.jpg">魔法盒子益智遊戲專賣店</option>
								        	<option value="north10.jpg">桌遊侍</option>
								        	<option value="north11.jpg">桌遊列國</option>
								        	<option value="north12.jpg">龍窟桌遊</option>
								        	<option value="north13.jpg">卡牌屋（板橋店）</option>
								        	<option value="north14.jpg">樂遊吧LuckyBar</option>
								        	<option value="north15.jpg">NeverLand N島桌遊館</option>
								        	<option value="north16.jpg">桌遊世界</option>
								        	<option value="north17.jpg">遊弈思．歐洲桌上遊戲工作坊</option>
								        	<option value="north18.jpg">微笑星球親子館</option>
								        	<option value="north19.jpg">時光森林TimeForest</option>
								        	<option value="north20.jpg">FunKids 放小孩</option>
								        	<option value="north21.jpg">輔大Fun桌遊</option>
								        	<option value="north22.jpg">TableGames 桌子遊戲</option>
								        	<option value="north23.jpg">哈囉桌遊</option>
								        	<option value="north24.jpg">奇幻桌遊</option>
								        	<option value="north25.jpg">就這裡 桌遊咖啡廳</option>
								        <optgroup label="基隆市">
								        	<option value="k1.jpg">樂氣球（基隆店）</option>
								        	<option value="k2.jpg">大野狼桌遊</option>
								        	<option value="k3.jpg">Fun桌尚</option>
								        <optgroup label="桃園市">
								        	<option value="taoyun1.jpg">伴桌趣益智桌遊</option>
								        	<option value="taoyun2.jpg">小兔子書坊</option>
								        	<option value="taoyun3.jpg">小桌弄Kids 兒童桌遊</option>
								        	<option value="taoyun4.jpg">桌弄</option>
								        	<option value="taoyun5.jpg">手心親子生活實作空間</option>
								        	<option value="taoyun6.jpg">貓腳印遊樂園</option>
											<option value="taoyun7.jpg">翻桌桌遊店</option>
								        	<option value="taoyun8.jpg">桌遊秘境（林口長庚店）</option>
								        	<option value="taoyun9.jpg">紙盒子桌遊休閒館（龍潭店）</option>
								        	<option value="taoyun10.jpg">桌遊奶爸</option>
								        	<option value="taoyun11.jpg">小園丁兒童教育用品社</option>
								        	<option value="taoyun12.jpg">特帛休閒空間</option>
								        	<!--注意少編號13因為之前有重複的資料-->
								        	<option value="taoyun14.jpg">可樂農莊桌上遊戲</option>
								        	<option value="taoyun15.jpg">Psy space</option>
								        	<option value="taoyun16.jpg">逗你玩</option>
								        	<option value="taoyun17.jpg">骰子貓</option>
								        	<option value="taoyun18.jpg">I-Play Boardgame</option>
								        	<option value="add01.jpg">桌遊天空城 Laputa</option>
								        <optgroup label="新竹市">
								        	<option value="h1.jpg">Mini Shoppa</option>
								        	<option value="h2.jpg">卡牌屋（新竹店）</option>
								        <optgroup label="新竹縣">
								        	<option value="hh1.jpg">景辰圖書親子館</option>
								        	<option value="hh2.jpg">Trick or Tree 桌遊</option>
								        	<option value="hh3.jpg">庭萱積木森林</option>
								        	<option value="hh4.jpg">桌桌樂</option>
								        	<option value="hh5.jpg">Kiwi 玩具屋</option>
								        	<option value="hh6.jpg">宅媽科學玩具趣味館</option>
										<optgroup label="宜蘭縣">
											<option value="yi1.jpg">雅克諾桌上遊戲精品（宜蘭店）</option>
											<option value="yi2.jpg">格子熊桌上遊戲</option>
											<option value="yi3.jpg">梅林的鬍子工作室 Merlin's Beard Studio</option>
											<option value="yi4.jpg">雅克諾桌上遊戲精品（頭城店）</option>
											<option value="yi5.jpg">玩太郎 Game Taro - 桌遊餐廳</option>
											<option value="yi6.jpg">玩逗樹複合式咖啡館</option>
										<optgroup label="苗栗縣">
											<option value="mia1.jpg">樂玩桌遊</option>
											<option value="mia2.jpg">樂趣味</option>
											<option value="mia3.jpg">桌遊趣-桌遊推廣教室</option>
											<option value="mia4.jpg">頑桌遊</option>
										<optgroup label="臺中市">
											<option value="taichung1.jpg">從前有間桌遊</option>
											<option value="taichung2.jpg">快樂城堡桌遊</option>
											<option value="taichung3.jpg">勃根地桌遊休閒館（光復總店）</option>
											<option value="taichung4.jpg">玩具同萌</option>
											<option value="taichung5.jpg">豆豆桌遊館（中清水湳店）</option>
											<option value="taichung6.jpg">勃根地NOVA英才店</option>
											<option value="taichung7.jpg">Y德俐鼠童書城</option>
											<option value="taichung8.jpg">玩具牧場</option>
											<!--注意少編號9因為之前有重複的資料-->
											<option value="taichung10.jpg">快樂小屋</option>
											<option value="taichung11.jpg">小密親子桌遊</option>
											<option value="taichung12.jpg">聖彼得堡</option>
											<option value="taichung13.jpg">牧羊人桌遊</option>
											<option value="taichung14.jpg">書立得兒童書城</option>
											<option value="taichung15.jpg">Play or Die 啡玩聚</option>
											<option value="taichung16.jpg">亞伯特桌遊基地（3F-A2）</option>
											<option value="taichung17.jpg">玩具牧場（靜宜宜園店）</option>
											<option value="taichung18.jpg">桌謎藏遊戲休閒館</option>
											<option value="taichung19.jpg">烏嘎嘎桌遊</option>
											<option value="taichung20.jpg">遊樂園主題餐廳</option>
											<option value="taichung21.jpg">玩具牧場（東海店）</option>
											<option value="taichung22.jpg">意象樹歡聚桌遊館</option>
											<option value="taichung23.jpg">小禾町親子育樂中心</option>
											<option value="taichung24.jpg">卡牌屋（臺中店）</option>
											<option value="taichung25.jpg">in 桌遊雜誌 肆號寓所</option>
											<option value="taichung26.jpg">玩具牧場（愛買中港店）</option>
											<option value="taichung27.jpg">玩具牧場（愛買豐原店）</option>
											<option value="taichung28.jpg">玩具牧場（愛買復興店）</option>
											<option value="taichung29.jpg">玩具牧場（太平洋豐原店）</option>
											<option value="taichung30.jpg">玩不累實驗室</option>
											<option value="taichung31.jpg">勃根地NOVA東海店</option>
											<option value="taichung32.jpg">勃根地大魯閣新時代店</option>
											<option value="taichung33.jpg">勃根地南和店</option>
											<option value="taichung34.jpg">諾貝兒南屯店</option>
											<option value="taichung35.jpg">大千書局</option>
										<optgroup label="彰化縣">
											<option value="chang1.jpg">蓋亞桌遊 Gaia Board Game</option>
											<option value="chang2.jpg">桌遊饗樂會館</option>
											<option value="chang3.jpg">魔豆桌上遊戲專賣店</option>
											<option value="chang4.jpg">小桌子桌遊（彰化店）</option>
											<option value="chang5.jpg">迦南音樂藝術學苑</option>
											<option value="chang6.jpg">舞山林戶外休閒生活館</option>
										<optgroup label="雲林縣">
											<option value="yun1.jpg">玩坊MoreFun（斗六店）</option>
											<option value="yun2.jpg">圍桌趣桌遊 Weetokki</option>
											<option value="yun3.jpg">桌遊樁</option>
										<optgroup label="嘉義市（縣）">
											<option value="chia1.jpg">玩坊MoreFun（嘉義店）</option>
											<option value="chia2.jpg">曉魚河親子魔法樂園</option>
											<option value="chia3.jpg">元桌世紀）</option>
											<option value="chia4.jpg">小桌末 Weekend of Tabletop-games</option>
										<optgroup label="臺南市">
											<option value="tainan1.jpg">懶日子桌遊餐廳（海安店）</option>
											<option value="tainan2.jpg">懶日子桌遊（公園店）</option>
											<option value="tainan3.jpg">玩坊MoreFun（臺南店）</option>
											<option value="tainan4.jpg">御揚桌遊休閒館</option>
											<option value="tainan5.jpg">主恩桌遊 概念館</option>
											<option value="tainan6.jpg">小路悠閒桌遊</option>
											<option value="tainan7.jpg">一起趣17.to</option>
											<option value="tainan8.jpg">玩具部落客</option>
											<option value="tainan9.jpg">OurSpace奧爾斯貝絲</option>
											<option value="tainan10.jpg">Fun輕鬆親子桌遊寓樂館</option>
											<option value="tainan11.jpg">Funking</option>
											<option value="tainan12.jpg">桌遊小妹</option>
											<option value="tainan13.jpg">冒險者營地 - 桌上遊戲專賣店</option>
											<option value="tainan14.jpg">兩人兩貓桌上遊戲專賣店</option>
											<option value="tainan15.jpg">瘋遊戲</option>
											<option value="tainan16.jpg">六角桌遊</option>
										<optgroup label="高雄市">
											<option value="kao1.jpg">卡牌屋（高雄店）</option>
											<option value="kao2.jpg">口袋C:遊桌遊店（建工店）</option>
											<option value="kao3.jpg">口袋C:遊桌遊店（文山店）</option>
											<option value="kao4.jpg">矮人礦坑桌上遊戲專賣店</option>
											<option value="kao5.jpg">Tobey's Game Cafe 總店</option>
											<option value="kao6.jpg">Tobey's Game Cafe（楠梓店）</option>
											<option value="kao7.jpg">Tobey's Game Cafe 遊戲咖啡館（大福店）</option>
											<option value="kao8.jpg">天下無雙桌遊城</option>
											<option value="kao9.jpg">龐奇桌遊（陽明加盟店）</option>
											<option value="kao10.jpg">Ott童樂繪館</option>
											<option value="kao11.jpg">奇蹟桌上遊戲休閑館</option>
											<option value="kao12.jpg">吐司寶寶桌遊館</option>
											<option value="kao13.jpg">漫遊開心館</option>
											<option value="kao14.jpg">童心創意</option>
											<option value="kao15.jpg">松梅桌遊舖</option>
											<option value="kao16.jpg">敲桌子桌遊</option>
											<option value="kao17.jpg">龐奇桌遊餐廳</option>
											<option value="kao18.jpg">龐奇桌遊（大統百貨五福店）</option>
											<option value="kao19.jpg">BROS. Board game café</option>
											<option value="kao20.jpg">海德堡多元創思</option>
											<option value="kao21.jpg">羅以桌遊 ROI Games</option>
											<option value="kao22.jpg">仨人Together桌遊舍</option>
										<optgroup label="屏東縣">
											<option value="ping1.jpg">ing.映桌遊餐廳</option>
											<option value="ping2.jpg">不只是桌遊</option>
											<option value="ping3.jpg">FTC桌遊主題館</option>
											<option value="ping4.jpg">活米村桌遊</option>
											<option value="ping5.jpg">大金喜桌遊坊</option>
											<option value="ping6.jpg">嘉緯書局</option>
											<option value="ping7.jpg">益智盒桌遊空間</option>
										<optgroup label="花蓮縣">
											<option value="hua1.jpg">卡牌屋（花蓮店）</option>
											<option value="hua2.jpg">清春文創</option>
										<optgroup label="臺東縣">
											<option value="taitung1.jpg">桌遊記</option>
										<optgroup label="澎湖縣">
											<option value="penghu1.jpg">夢想部落館</option>
										<optgroup label="金門縣">
											<option value="kinmen1.jpg">玩坊MoreFun（金門金城店）</option>
											
						          	</select>
								</tr>
								<tr class="openroom_info_tr">
									<td class="openroom_info_td">遊玩遊戲</td>
									<td class="openroom_info_input_td" style="position:relative;top:5px;" ><input type="text" name="game" class="jo_text07">
									<span style="color: #5C5D5D;"><br>（請填寫主要遊玩遊戲，至多兩個）</span>*必填</td>
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

					$selectStore = "SELECT * FROM `store` WHERE `storeName` = '".$roomNo['store']."'";
					mysql_query("SET NAMES'UTF8'");
					mysql_query("SET CHARACTER SET UTF8");
					mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
					$selectStore = mysql_query($selectStore);
					$store = mysql_fetch_assoc($selectStore);

					?>
				    <div id="view_room"><!--瀏覽房間-->
					    <div class="view_room_center">
					        <div class="view_room_fram01">
						            	<span class="view_room_title"><?php echo $no ?>號房-<?php echo $roomNo['room'] ?></span>
						              	<span class="view_room_close" onClick="javascript:window.location.href='jo.php';">X</span>
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
							                      	
							                      	<span class="jo_store_name"><?php echo $roomNo['store']; ?></span>
							                      	<div><img class="jo_store_img" src="../store/photo/<?php echo $store['storePhoto'];?>" onclick="storeInf()"></div>
							                    </div>
						                    	<!--店家資訊卡文字部分-->
						                   	 	<div class="jo_store_info_card02">
							                    	<table class="jo_store_info_card02_table">
								                        <tr>
								                          <td class="jo_store_info_card02_td01">店家地址｜</td>
								                          <td colspan="2" class="jo_store_info_p2">
								                          <?php echo $store['storeAddress']; ?></td>
								                        </tr>
								                        <tr>
								                          <td class="jo_store_info_card02_td01">店家電話｜</td>
								                          <td colspan="2" class="jo_store_info_p2"><?php echo $store['storeNumber']; ?></td>
								                        </tr>
								                        <tr>
								                          <td class="jo_store_info_card02_td01">網站連結｜</td>
								                          <?php
								                          	if(isset($store['fbURL'])){
								                          		?>
								                          		<td class="jo_store_info_p2">
								                          			<a href="<?php echo $store['fbURL']; ?>" class="jofb_a" target="_blank">
								                          				<span class="jofb_hover">
										                					<img src="../../jomor_html/img/fb2.png" class="jo_fb_bt">
										                					<img src="../../jomor_html/img/fb.png" class="jo_fb_bt">
					                									</span>
								                          			</a>
								                          		</td>
								                          		<?php
								                          	}
								                          	else if(isset($store['webURL'])){
								                          		?>
								                          		<td class="jo_store_info_p2">
								                          			<a href="<?php echo $store['webURL']; ?>" class="joweb_a" target="_blank">
																		<span class="joweb_hover">
										                					<img src="../../jomor_html/img/webicon2.png" class="jo_web_bt">
										                					<img src="../../jomor_html/img/webicon.png" class="jo_web_bt">
										                				</span>								                          				
								                          			</a>
								                          		</td>
								                          		<?php
								                          	}
								                          ?>	
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
										                    		<?php
										                    			$selectUserAccount = mysql_query("SELECT * FROM `user` WHERE `account` = '".$memberHost['account']."'");
										                    			$userAccount = mysql_fetch_assoc($selectUserAccount);
										                    			if($userAccount['pri']==2){
										                    				?>
										                    				<img class="jo_photo" src="<?php echo $memberHost['photo']; ?>">
										                    				<?php
										                    			}
										                    			else{
										                    				?>
											                      			<img class="jo_photo" src="../user/photo/<?php echo $memberHost['photo']; ?>">
										                    				<?php
										                    			}
										                    		?>
											                      	<!--帳號欄包含下拉選單-->
											                      	<div class="jo_acount">											                      		
										                        		<div class="jo_acount">
										                        			<?php echo $memberHost['account']; ?>
										                        			<div class="player_select_div">
																				<select class="player_select" onchange="location.href=this.options[this.selectedIndex].value" >
																					<option value="">權限:房主</option>
											                        				<option value="userData.php?account=<?php echo $memberHost['account']; ?>&no=<?php echo $memberHost['no']; ?>">查看資料</option>
											                        			</select>
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
											                    		<!--圖片判定-->
											                    		<?php
											                    			$selectUserAccount = mysql_query("SELECT * FROM `user` WHERE `account` = '".$onlyMember['account']."'");
											                    			$userAccount = mysql_fetch_assoc($selectUserAccount);
											                    			if($userAccount['pri']==2){
											                    				?>
											                    				<img class="jo_photo" src="<?php echo $onlyMember['photo']; ?>">
											                    				<?php
											                    			}
											                    			else{
											                    				?>
											                    				<img class="jo_photo" src="../user/photo/<?php echo $onlyMember['photo']; ?>">
											                    				<?php
											                    			}
											                    		?>											                      	

												                      	<!--帳號欄包含下拉選單-->
												                      	<div class="jo_acount">
										                        			<?php echo $onlyMember['account']; ?>

										                        			<div class="player_select_div">
																				<select class="player_select" onchange="location.href=this.options[this.selectedIndex].value" >
																					<option value="">權限:成員</option>
																					<?php 
												                        				if($_SESSION['account']==$memberHost['account']&&$roomNo['decide']==0){
												                        					?>
												                        					<option value="jo.php?deleteAccount=<?php echo $onlyMember['account']; ?>&no=<?php echo $no; ?>">踢除成員</option>
												                        					<?php
												                        				}
												                        			?>											                        				
											                        				<option value="userData.php?account=<?php echo $onlyMember['account']; ?>&no=<?php echo $onlyMember['no']; ?>">查看資料</option>
											                        			</select>
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
											                        		<div class="jo_acount">empty</div>
										                    			</div>								                    		
											                      	</div>
										                    	</div>
										                    	<?php
										                    }
										                    ?>

									                  	</div>
									                  	
									                </div><!--參與玩家視窗表格結束-->
									            </div><!--參與玩家視窗結束-->
								            </div>

							              	<div class="chat_bg"><!--聊天室的黃背景-->
								              	<?php
									              	if($memberSignIn==0){
									        			?>			        		
										                <div class="chat_window">
										                  	<p class="chat_window_p">您必須先加入此房間才能使用聊天室<p>
										                </div>
										                <div class="message"><!--留言打字框-->
										                  	<div class="chat_block">您必須先加入此房間才能使用聊天室</div>
										                </div> 
										                <?php
										            }
										            else{
										            	?>
										            	<div class="chat_window">
										            		<?php
										            		while($chatNo = mysql_fetch_assoc($selectChat1)){
										            			echo "(".date("m/d",strtotime($chatNo['now']))."&nbsp&nbsp".date("H:i",strtotime($chatNo['now'])).")&nbsp".$chatNo['name']."說：&nbsp".$chatNo['chat']."<br>";     
										            			//echo"<p class='chat_window_p'>($row4[2])"."$row4[1]"."說：&nbsp"."$row4[3]<p>";
										            		}					            		
										                  	?>
										                </div>
										                <div class="message"><!--留言打字框-->
										                	<form method="post">
											                  	<span>我有話要說：</span>
											                  	<span><input class="chat_text" type="text" name="chat"></span>
											                  	<span><input class="chat_enter" type="submit" name="OK" value="輸入" id="enter"></span>
											                </form>
										                </div>    
										                <?php
										            }
									            ?>
								                   								                
							            	</div>
							            	<?php
												if($roomNo['decide']==0){
													if($_SESSION['account']==$memberHost['account']){
										                ?>
										                <form>
											            	<div class="join_bt">
											            		<a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent('http://www.jomorparty.com/system/group/jo.php?no=<?php echo $no;?>'))));"><img style="width: 80px; float: right; position: relative; top: 280px; right: 10px;" src="http://www.jomorparty.com/jomor_html/img/sharebutton.png"></a>
											            		<input type="hidden" name="no" value="<?php echo $no;?>">
												            	<button type="submit" name="lockRoom" class="join_Hbtn">鎖定<br>房間</button>
												            	<button type="submit" name="deleteRoom" value="<?php echo $_GET['no'];?>" class="join_Hbtn">刪除<br>房間</button>
											            	</div>
										            	</form>
										                <?php
									            	}
									            	else{
									            		?>
									            		<form method="post">
											            	<div class="join_bt">
											            		<a href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent('http://www.jomorparty.com/system/group/jo.php?no=<?php echo $no;?>'))));"><img style="width: 80px; float: right; position: relative; top: 280px; right: 10px;" src="http://www.jomorparty.com/jomor_html/img/sharebutton.png"></a>
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
								                        	<div class="b_jo_acount_no">
								                        		<?php echo $memberHost['account'] ?>
								                        		<div class="player_select_div">
																	<select class="player_select" onchange="location.href=this.options[this.selectedIndex].value" style="width: 145px;">
																		<option value="">權限:房主</option>
								                        				<option value="userData.php?account=<?php echo $memberHost['account']; ?>&no=<?php echo $memberHost['no']; ?>">查看資料</option>
								                        			</select>
																</div>	
								                        	</div>
								                        </div>
								                        <?php
									                    	while($onlyMember = mysql_fetch_assoc($selectOnlyMember2)){
									                    	?>
									                        <div class="b_player_td01" title="<?php echo $onlyMember['name']; ?>" ><?php echo $onlyMember['name']; ?> </div>
									                      	<div class="b_jo_acount_no_td">
									                        	<div class="b_jo_acount_no">
									                        		<?php echo $onlyMember['account']; ?>
									                        		<div class="player_select_div">
																		<select class="player_select" onchange="location.href=this.options[this.selectedIndex].value" style="width: 145px;">
																			<option value="">權限:成員</option>
																			<?php 
										                        				if($_SESSION['account']==$memberHost['account']&&$roomNo['decide']==0){
										                        					?>
										                        					<option value="jo.php?deleteAccount=<?php echo $onlyMember['account']; ?>&no=<?php echo $no; ?>">踢除成員</option>
										                        					<?php
										                        				}
										                        			?>											                        				
									                        				<option value="userData.php?account=<?php echo $onlyMember['account']; ?>&no=<?php echo $onlyMember['no']; ?>">查看資料</option>
									                        			</select>
																	</div>		
									                        	</div>
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
										            			echo "(".date("m/d",strtotime($chatNo['now']))."&nbsp&nbsp".date("H:i",strtotime($chatNo['now'])).")&nbsp".$chatNo['name']."說：&nbsp".$chatNo['chat']."<br>";     
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
									                  	<span><input class="chat_enter" type="submit" name="OK" value="輸入" id="enter"></span>
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
	        		$no = $_GET['no'];
	        		?>
	        		<div id="sure">
			            <div class="sure_position">
			                <div class="sure_fram01">
			                    <span class="sure_title">確定加入嗎？</span>
			                    <!--關掉的xx-->
			                    <span class="sure_close" onClick="window.location.href='jo.php?no=<?php echo $no;?>'">
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
			                    <span class="success_close" onClick="window.location.href='jo.php?no=<?php echo $no;?>'">
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

	        <!--跳出詢問刪除此人的原因-->
	        <!--跳出詢問刪除此人的原因-->
	        <!--跳出詢問刪除此人的原因-->
	        <?php
	        	if(isset($_GET['deleteAccount'])){
	        		$no = $_GET['no'];
	        		$deleteAccount = $_GET['deleteAccount'];
	        		?>
	        		<div id="sure">
			            <div class="sure_position">
			                <div class="sure_fram01">
			                    <span class="sure_title">為什麼刪除<?php echo $deleteAccount ?>?</span>
			                    <!--關掉的xx-->
			                    <span class="sure_close" onClick="window.location.href='jo.php?no=<?php echo $no;?>'">
			            			<img src="../../jomor_html/img/close.png" class="sure_close_img">
			            		</span>
			                </div>
			                <div class="sure_fram02">
			                	<form>
				                    <div class="sure_p">
				                    	<input type="hidden" name="no" value="<?php echo $no;?>">
				                    	<input type="hidden" name="deleteAccount" value="<?php echo $deleteAccount;?>">
				                        <textarea name="result" class="result"></textarea>
				                    </div>
				                    <!--按鈕-->
				                    <div class="sure_btn_div">
			                    		<span><button onclick="window.location.href='jo.php?no=<?php echo $no;?>'" class="sure_btn" >取消</button></span>
			                    		<span><button type="submit" name="deleteAccountConfirm" class="sure_btn">確定</button></span>               
			                   		</div>
			                    </form>	
			                </div>
			            </div>
			        </div>
			        <?php
	        	}
	        ?>

	        <?php
	        	if(isset($_GET['deleteRoom'])){
	        		$no = $_GET['deleteRoom'];
	        		?>
	        		<div id="sure">
			            <div class="sure_position">
			                <div class="sure_fram01">
			                    <span class="sure_title">確定刪除房間嗎？</span>
			                    <!--關掉的xx-->
			                    <span class="sure_close" onclick="window.location.href='jo.php?no=<?php echo $no;?>'">
			            			<img src="../../jomor_html/img/close.png" class="sure_close_img">
			            		</span>
			                </div>
			                <div class="sure_fram02">
			                    <div class="sure_p">
			                        <p>按下”確定“後就會刪除此房間並且不能復原!</p>
			                        <p class="sure_p01">此舉可能造成成員的不便與困擾，</p>
			                        <p class="sure_p01">建議先在聊天室確認大家的認知一致再做決定！</p>
			                        <p>確定要刪除嗎？</p>
			                    </div>
			                    <!--按鈕-->
			                    <div class="sure_btn_div">
			                    	<form>
			                    		<span><button name="no" value="<?php echo "$no";?>" class="sure_btn" >取消</button></span>
			                    		<span><button name="deleteRoomConfrim" class="sure_btn" value="<?php echo $no;?>">確定</button></span>
			                    	</form>	                        
			                    </div>
			                </div>
			            </div>
			            <!--跳出的詢問確定要加入房間嗎div（sure_position)結束-->
			        </div>
			        <?php
	        	}
	        ?>

	        <!--如何玩圖片教學div-->
	        <!--如何玩圖片教學div-->
	        <!--如何玩圖片教學div-->
			<div id="rule" onClick="window.location.href='jo.php'">
				<div class="rule_center">
				  <div class="rule_fram01">
						<span class="rule_title">如何揪團</span>
						<!--關掉的xx-->
						<span class="rule_close" onClick="window.location.href='jo.php'">X</span>
				  </div> 
				  <div class="rule_fram02">
						<img src="../../jomor_html/img/jorule.png" class="rule_img">
				  </div>
				</div>
			</div>  
	        
		</section>
	</body>
</html>
<?php
	if(isset($_GET['no'])){
		$no = $_GET["no"];
		$selectStoreName = 'SELECT * FROM `store` WHERE `no` = "'.$no.'"';
		mysql_query("SET NAMES'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
		$selectStoreName = mysql_query($selectStoreName);
		$store = mysql_fetch_assoc($selectStoreName);
		?>
		<div id="Store_inf" style="visibility:hidden">
			<div style="position: fixed; width: 100%; height: 100%" onclick="my_scroll('jo.php?no=<?php echo $no;?>'); return false"></div>
	  		<div class="div_store_card-0">
			    <section class="div_store_section">
			         <div class="div_store_card-01"><!--店家資訊卡店名與圖片部分-->
			             <span class="div_store_name"><?php echo $store['storeName']?></span>
			                <div><img class="div_store_img" src="../store/photo/<?php echo $store['storePhoto'];?>" ></div>
			         </div>
			         <!--店家資訊卡文字部分-->
			         <div class="div_store_card-02">
			            <table class="div_store_info_card02_table">
			                <tr>
			                    <td class="div_store_info_card02_td01">店家類型｜</td>
			                    <td class="div_store_info_p2" ><?php echo $store['storeType']; ?></td>
			                </tr>
			                <tr>
			                    <td class="div_store_info_card02_td01">店家地址｜</td>
			                    <td class="div_store_info_p2"><?php echo $store['storeAddress']; ?></td>
			                </tr>
			                <tr>
			                    <td class="div_store_info_card02_td01">店家電話｜</td>
			                    <td class="div_store_info_p2"><?php echo $store['storeNumber']; ?></td>
			                </tr>
			                <tr>
			                    <td class="div_store_info_card02_td01">營業時間｜</td>
			                    <td class="div_store_info_p2"><?php echo $store['storeTime']; ?></td>
			                </tr>
			                <tr>
			                    <td class="div_store_info_card02_td01">消費模式｜</td>
			                    <td class="div_store_info_p2" ><?php echo $store['storeSpend'];?></td>
			                </tr>
			                 <!--店家資訊卡內臉書與網站的icon-->
			                <tr>
			                	<td colspan="2" style="height: 40px">				     
			                		<span class="span_aa">	                			
			                		<?php
			                			if($store['webURL']!=''){
			                				?>
											<span class="web_hover">
			                					<img src="../../jomor_html/img/webicon2.png" class="store_web_bt" onclick="window.open('<?php echo $store['webURL'];?>', '_blank');">
			                					<img src="../../jomor_html/img/webicon.png" class="store_web_bt" onclick="window.open('<?php echo $store['webURL'];?>', '_blank');">
			                				</span>
			                				<?php
			                			}
			                		?>	
			                		</span>	
			                		<span class="span_aa">
			                		<?php
			                			if($store['fbURL']!=''){
			                				?>
		                					<span class="fb_hover">
			                					<img src="../../jomor_html/img/fb2.png" class="store_fb_bt" onclick="window.open('<?php echo $store['fbURL'];?>', '_blank');">
			                					<img src="../../jomor_html/img/fb.png" class="store_fb_bt" onclick="window.open('<?php echo $store['fbURL'];?>', '_blank');">
			                				</span>
			                				<?php
			                			}
			                		?>	
			                		</span>				                			
			                	</td>
			                </tr>
			            </table>
			            <div class="rwd_googlemap">
			            <aside class="div_store_aside">
					        <iframe class="rwdmap_iframe" src="<?php echo $store['googleURL']; ?>" frameborder="0" style="border:0" allowfullscreen>
					        </iframe>
				        	<div class="div_store_btn">
				        		<?php 
				        			if(isset($_GET['storePlace'])){
				        				$storePlace = $_GET['storePlace'];
				        				?>
				        				<button name="close" class="btn" onclick="my_scroll('jo.php?no=<?php echo $no;?>'); return false">關閉</button>
				        				<?php 
				        			} 
				        			else{
				        				?>
				        				<button name="close" class="btn" onclick="my_scroll('jo.php?no=<?php echo $no;?>'); return false">關閉</button>
				        				<?php
				        			}
				        		?>
					        </div>			        
				    	</aside>
				    	</div>
			         </div>
			    </section>
			   	  <div class="or_googlemap">
						<aside class="div_store_aside">
					        <iframe class="rwdmap_iframe" src="<?php echo $store['googleURL']; ?>" frameborder="0" style="border:0" allowfullscreen>
					        </iframe>
				        	<div class="div_store_btn">
				        		<?php 
				        			if(isset($_GET['storePlace'])){
				        				$storePlace = $_GET['storePlace'];
				        				?>
				        				<button name="close" class="btn" onclick="my_scroll('jo.php?no=<?php echo $no;?>'); return false">關閉</button>
				        				<?php 
				        			} 
				        			else{
				        				?>
				        				<button name="close" class="btn" onclick="my_scroll('jo.php?no=<?php echo $no;?>'); return false">關閉</button>
				        				<?php
				        			}
				        		?>
					        </div>			        
				    	</aside>
				    </div>
			</div>
	  	</div>   
		<?php
	}
?>