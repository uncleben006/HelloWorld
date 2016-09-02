<?php
//依照$situation號碼決定此文件的顯示
header("Content-Type:text/html; charset=utf-8");
$situation = $_GET["situation"];
if($situation==1){
	//狀況一，顯示完成第一階段註冊。
	echo "您已完成第一階段的註冊，請去信箱收信驗證完成帳號開通。<br>若未完成註冊將只有一個空頭帳號(pri=0)，雖然不能使用留言和二手拍賣功能<br>
	但仍然有剛剛填的這些基本資料，也就是說信箱驗證後將會幫您的帳號權限開通讓您能使用更多功能<br>";
	echo '<a href="http://localhost:8080/JOMO/index6.php"><button>我了解囉~</button></a>';
}

?>