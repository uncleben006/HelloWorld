<!DOCTYPE html>
<html>
<head>
	<title>Inform</title>

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
		button{
			color:black;
		}
		
	</style>

</head>
<body>
	<div class="frame">
		<h1>確認頁面</h1>
		<?php
		//依照$situation號碼決定此文件的顯示
		header("Content-Type:text/html; charset=utf-8");
		$situation = $_GET["situation"];
		if($situation==1){
			//狀況一，顯示完成第一階段註冊。
			echo "您已完成第一階段的註冊，請去信箱收信驗證完成帳號開通。<br>
			若未完成註冊將只有一個空頭帳號，雖然不能使用揪團和留言，<br>
			但仍然有剛剛填的這些基本資料，也就是說信箱驗證後將會幫您開通更多權限讓您能使用更多功能。<br>";
			echo '<a href="../../index.php"><button>我了解囉~</button></a>';
		}
		?>
	</div>
	
</body>
</html>


