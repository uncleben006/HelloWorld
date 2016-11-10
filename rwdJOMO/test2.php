<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

echo '此頁面將會依照 SESSION變數name  作顯示';

$name = empty($_SESSION['name'])?'SESSION:name無內容': $_SESSION['name'];

echo '<br />SESSION["name"] = ' . $name;