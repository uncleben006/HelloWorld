<?php
include('link.php');

$no = $_GET["no"];
$setSQL = "UPDATE `user` SET `pri`='1' WHERE `no`='".$no."'";
echo $setSQL;
mysql_query($setSQL);

echo '<h1>驗證完成</h1><br>';
echo '你已經信箱驗證並開通了你的帳號，現在你帳號擁有更多的權限<br>';
echo '<a href="http://localhost:8080/JOMO/index6.html"><button>好的非常感謝</button></a>';
?>