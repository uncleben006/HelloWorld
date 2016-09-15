<?php
include('link.php');
if(isset($_POST['create'])){
	$room = $_POST['room'];
	$store = $_POST['store'];
	$game = $_POST['game'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$people = $_POST['people'];
	$spend = $_POST['spend'];
	$remark = $_POST['remark'];

	$setSQL = 'INSERT INTO `room`(`room`, `store`, `game`, `date`, `time`, `people`, `spend`, `remark`) VALUES ("'.$room.'","'.$store.'","'.$game.'","'.$date.'","'.$time.'","'.$people.'","'.$spend.'","'.$remark.'")';
	mysql_query("SET NAMES'UTF8'");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET CHARACTER_SET_RESULTS='UTF8'");
	mysql_query($setSQL);
	header("refresh:3;group.php");	
}
	?>


<!DOCTYPE html>
<html>
<head>
	<title>AddNew</title>
	<meta charset="UTF-8">
	<style type="text/css">
		.frame{
			width: 720px;
			margin-right: auto;
			margin-left: auto;
			padding-top: 20px;
		}
		input[type="text"],input[type="password"],input[type="date"],input[type="time"],input[type="number"]{
			border-color:#bdc5d0;
		}
		select{
			border-color:#bdc5d0;
			border-width: 2px;
			border-style: inset;
		}
		div{
			margin-top: 5px;
		}
		table{
			height: 80px;
		}
		th{
			width:100px;
			text-align: left;
		}
		table,th,td{
			border: 1px solid lightgrey;
		}
		
	</style>

</head>
<body>
	<div class="frame">
		<h1>這是登入頁面!!~</h1>
		<form method="post">
			<table>
			<div>
				<?php
			if(isset($_POST['create'])){
				echo "將在三秒後轉跳回顯示頁面";
			}
			?>
			</div>
				<tr>
					<th>房間名稱</th>
					<td><input type="text" name="room"></td>
				</tr>
				<tr>
					<th>地點</th>
					<td>
						<select name="store" style="width:100%;font-size:12px" required>
							<option value="#">你家</option>
							<option value="#">我家</option>
							<option value="#">社桌</option>
							<option value="#">swan caf'e</option>
							<option value="#">看屁看!</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>遊戲</th>
					<td><input type="text" name="game" placeholder="矮人礦坑"></td>
				</tr>
				<tr>
					<th>日期</th>
					<td><input type="date" name="date" style="width:97%" required></td>
				</tr>
				<tr>
					<th>開始時間</th>
					<td><input type="time" name="time" style="width:97%" step="1800"></td>
				</tr>
				<tr>
					<th>人數</th>
					<td><input type="number" name="people" style="width:97%" min="1" placeholder="最少1人"></td>
				</tr>
				<tr>
					<th>消費方式</th>
					<td><input type="text" name="spend" placeholder="50元/小時"></td>
				</tr>
				<tr>
					<th>備註</th>
					<td><input type="text" name="remark"></td>
				</tr>
			</table>
			<div>
				<button type="submit" name="create">成立房間</button>
			</div>
		</form>
	</div>
	
</body>
</html>