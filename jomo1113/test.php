<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

echo '此頁面將 Marry    存入 SESSION 變數：name中';

$_SESSION['name'] = 'Marry';

echo '<br /><a href="test2.php">見下一頁結果</a>';