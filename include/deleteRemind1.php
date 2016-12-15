<?php
session_start();
$account = $_SESSION['account'];
$num = $_GET['num'];
$con = mysqli_connect('localhost', 'jomorcom_root', 'Jomor123','jomorcom_boardgame');
if (!$con){
 	die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con);
//一般會員看，判定為1
$sql="DELETE FROM `remind` WHERE `num` = '".$num."'";
mysqli_query($con,$sql);

//做提醒判定，
// decide=0 ==>鎖定房間
// decide=1 ==>被踢出房間
// decide=2 ==>房主刪除房間
// decide=3 ==>有人加入，只有房主會看到提醒

$selectRemindAccountHost = "SELECT * FROM `remind` WHERE `account` = '".$account."' OR `host` = '".$account."' ORDER BY `num` DESC";
mysqli_query($con,"SET NAMES'UTF8'");
mysqli_query($con,"SET CHARACTER SET UTF8");
mysqli_query($con,"SET CHARACTER_SET_RESULTS='UTF8'");
$selectRemindAccountHost = mysqli_query($con,$selectRemindAccountHost);

while($selectRemind = mysqli_fetch_assoc($selectRemindAccountHost)){

	?>
	<script type="text/javascript">
    	var num = '<?php echo $selectRemind['num'] ?>'
	</script>
	<?php

	$selectStoreName = 'SELECT * FROM `store` WHERE `storeName` = "'.$selectRemind['store'].'"';
	$selectUserHost = "SELECT * FROM `user` WHERE `account` = '".$selectRemind['host']."'";
	$selectUserAccount = 'SELECT * FROM `user` WHERE `account` = "'.$selectRemind['account'].'"';

	mysqli_query($con,"SET NAMES'UTF8'");
	mysqli_query($con,"SET CHARACTER SET UTF8");
	mysqli_query($con,"SET CHARACTER_SET_RESULTS='UTF8'");

	//取得房間店家資料
	$selectStoreName = mysqli_query($con,$selectStoreName);
	$storeName = mysqli_fetch_assoc($selectStoreName);

	//取得房主資料
	$selectUserHost = mysqli_query($con,$selectUserHost);
	$userHost = mysqli_fetch_assoc($selectUserHost);
	$hostPri = $userHost['pri'];
	$hostName = $userHost['name'];
	$hostPhoto = $userHost['photo'];											
	
	//取得成員資料
	$selectUserAccount = mysqli_query($con,$selectUserAccount);
	$userAccount = mysqli_fetch_assoc($selectUserAccount);
	$accountPri = $userAccount['pri'];
	$accountName = $userAccount['name'];
	$accountPhoto = $userAccount['photo'];

	$date = date("m/d",strtotime($selectRemind['date']));
	$time = date("H:i",strtotime($selectRemind['time']));

	if($selectRemind['decide']==0){
		if($selectRemind['account']==$_SESSION['account']){
			if($hostPri==2){
				?>
				<div class="notify_div01" >
		            <div class="notify_div_img">
		            	<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['host'];?>">
		              		<img src="<?php echo $hostPhoto; ?>" class="notify_headph" style="border-radius: 50px;">
		              	</a>
		            </div>
		            <div class="notify_div_p">
		                <p>您於剛剛正式加入<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['host'];?>"><font color="blue"><?php echo $hostName; ?></font></a>所創建的房間<a href="http://www.jomorparty.com/system/group/jo.php?no=<?php echo $selectRemind['no']?>"><font color="red"><?php echo $selectRemind['room']; ?></font></a>，提醒您<font color="red"><?php echo $date; ?></font> <font color="red"><?php echo $time; ?></font>，在<a href="http://www.jomorparty.com/system/store/store2.php?no=<?php echo $storeName['no'];?>"><font color="blue"><?php echo $selectRemind['store'] ?></font></a>，別遲到囉~</p>
		            </div>
		            <div class="notify_div_x" onclick="deleteRemind(num)">X</div>
				</div>
				<?php
			}		
			else{
				?>
				<div class="notify_div01" >
		            <div class="notify_div_img">
		            	<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['host'];?>">
		              		<img src="http://www.jomorparty.com/system/user/photo/<?php echo $hostPhoto; ?>" class="notify_headph" style="border-radius: 50px;">
		              	</a>
		            </div>
		            <div class="notify_div_p">
		                <p>您於剛剛正式加入<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['host'];?>"><font color="blue"><?php echo $hostName; ?></font></a>所創建的房間<a href="http://www.jomorparty.com/system/group/jo.php?no=<?php echo $selectRemind['no']?>"><font color="red"><?php echo $selectRemind['room']; ?></font></a>，提醒您<font color="red"><?php echo $date; ?></font> <font color="red"><?php echo $time; ?></font>，在<a href="http://www.jomorparty.com/system/store/store2.php?no=<?php echo $storeName['no'];?>"><font color="blue"><?php echo $selectRemind['store'] ?></font></a>，別遲到囉~</p>
		            </div>

		            <!--搭配AJAX刪除提醒，先把提醒num設給js變數方便傳遞-->
		            <div class="notify_div_x" onclick="deleteRemind(num)">X</div>
				</div>
				<?php
			}
		}	 
	}
	if($selectRemind['decide']==1){
		if($selectRemind['account']==$_SESSION['account']){
			?>
				<div class="notify_div01" >
		            <div class="notify_div_img">
		              	<img src="http://www.jomorparty.com/jomor_html/img/attention.png" class="notify_attention">
		            </div>
		            <div class="notify_div_p">
		                <p>您於剛剛被<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['host'];?>"><font color="blue"><?php echo $hostName; ?></font></a>踢出了房間，房名為<font color="red"><?php echo $selectRemind['room']; ?></font></p>
		            </div>
		            <div class="notify_div_x" onclick="deleteRemind(num)">X</div>
				</div>
		  	<?php 
		}												 
	}
	if($selectRemind['decide']==2){
		if($selectRemind['account']==$_SESSION['account']){
			?>
				<div class="notify_div01" >
		            <div class="notify_div_img">
		              	<img src="http://www.jomorparty.com/jomor_html/img/attention.png" class="notify_attention">
		            </div>
		            <div class="notify_div_p">
		                <p><a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['host'];?>"><font color="blue"><?php echo $hostName; ?></font></a>因為個人因素刪除了房間，房名為<font color="red"><?php echo $selectRemind['room']; ?></font></p>
		            </div>
		            <div class="notify_div_x" onclick="deleteRemind(num)">X</div>
				</div>
		  	<?php 
		}
	}
	if($selectRemind['decide']==3){
		if($selectRemind['account']==$_SESSION['account']){
			if($hostPri==2){
				?>
				<div class="notify_div01" >
		            <div class="notify_div_img">
		              	<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['host'];?>">
		              		<img src="<?php echo $hostPhoto; ?>" class="notify_headph" style="border-radius: 50px;">
		              	</a>
		            </div>
		            <div class="notify_div_p">
		                <p>您剛剛加入了<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['host'];?>"><font color="blue"><?php echo $hostName; ?></font></a>的房間，房名為<font color="red"><?php echo $selectRemind['room']; ?></font></p>
		            </div>
		            <div class="notify_div_x" onclick="deleteRemind(num)">X</div>
				</div>
				<?php
			}
			else{
				?>
				<div class="notify_div01" >
		            <div class="notify_div_img">
		              	<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['host'];?>">
		              		<img src="http://www.jomorparty.com/system/user/photo/<?php echo $hostPhoto; ?>" class="notify_headph" style="border-radius: 50px;">
		              	</a>
		            </div>
		            <div class="notify_div_p">
		                <p>您剛剛加入了<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['host'];?>"><font color="blue"><?php echo $hostName; ?></font></a>的房間，房名為<font color="red"><?php echo $selectRemind['room']; ?></font></p>
		            </div>
		            <div class="notify_div_x" onclick="deleteRemind(num)">X</div>
				</div>
				<?php
			} 
		}
	}
	if($selectRemind['decide']==3){
		if($selectRemind['host']==$_SESSION['account']){
			if($accountPri==2){
				?>
				<div class="notify_div01" >
		            <div class="notify_div_img">
		            	<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['account'];?>">
		              		<img src="<?php echo $accountPhoto; ?>" class="notify_headph" style="border-radius: 50px;">
		              	</a>
		            </div>
		            <div class="notify_div_p">
		                <p><a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['account'];?>"><font color="red"><?php echo $accountName; ?></font></a>剛剛加入了你的房間，你可以和他聊聊天。</p>
		            </div>
		            <div class="notify_div_x" onclick="deleteRemind(num)">X</div>
				</div>
				<?php
			}		
			else{
				?>
				<div class="notify_div01" >
		            <div class="notify_div_img">
		            	<a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['account'];?>">
		              		<img src="http://www.jomorparty.com/system/user/photo/<?php echo $accountPhoto; ?>" class="notify_headph" style="border-radius: 50px;">
		              	</a>
		            </div>
		            <div class="notify_div_p">
		                <p><a href="http://www.jomorparty.com/system/group/userData.php?account=<?php echo $selectRemind['account'];?>"><font color="red"><?php echo $accountName; ?></font></a>剛剛加入了你的房間，你可以和他聊聊天。</p>
		            </div>
		            <div class="notify_div_x" onclick="deleteRemind(num)">X</div>
				</div>
				<?php
			} 
		}												
	}
}

mysqli_close($con);
?> 