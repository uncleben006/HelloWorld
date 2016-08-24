<?php

//建立session並製作no亂碼

include('link.php');

/*
$account = $_POST["account"];
$pass = $_POST["pass"];
$repass = $_POST["repass"];
$name = $_POST["name"];
$email = $_POST["email"];
$introduction = $_POST["introduction"];
$pic = $_POST["pic"];
*/

session_set_cookie_params(600);
session_start();
$_SESSION["account"] = $_POST["account"];
$_SESSION["name"] = $_POST["name"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["introduction"] = $_POST["introduction"];
$_SESSION["pic"] = $_POST["pic"];
$_SESSION["pri"] = 0;

$getAllrowsSQL="SELECT COUNT(*) FROM user";
$runSQL=mysql_query($getAllrowsSQL);
$Allrows=mysql_fetch_assoc($runSQL);
$nowRow=$Allrows["COUNT(*)"]+1;
if(strlen($nowRow)==1)
	$no = '00' . $nowRow;
else if(strlen($nowRow)==2)
	$no = '0' . $nowRow;
else
	$no = $nowRow;
for($i=0;$i<2;$i++)
{
	$j = rand(1,26);
	switch($j)
	{
		case 1:
			$j = 'A';
			break;
		case 2:
			$j = 'B';
			break;
		case 3:
			$j = 'C';
			break;
		case 4:
			$j = 'D';
			break;
		case 5:
			$j = 'E';
			break;
		case 6:
			$j = 'F';
			break;
		case 7:
			$j = 'G';
			break;
		case 8:
			$j = 'H';
			break;
		case 9:
			$j = 'I';
			break;
		case 10:
			$j = 'J';
			break;
		case 11:
			$j = 'K';
			break;
		case 12:
			$j = 'L';
			break;
		case 13:
			$j = 'M';
			break;
		case 14:
			$j = 'N';
			break;
		case 15:
			$j = 'O';
			break;
		case 16:
			$j = 'P';
			break;
		case 17:
			$j = 'Q';
			break;
		case 18:
			$j = 'R';
			break;
		case 19:
			$j = 'S';
			break;
		case 20:
			$j = 'T';
			break;
		case 21:
			$j = 'U';
			break;
		case 22:
			$j = 'V';
			break;
		case 23:
			$j = 'W';
			break;
		case 24:
			$j = 'X';
			break;
		case 25:
			$j = 'Y';
			break;
		case 26:
			$j = 'Z';
			break;
	}
	$no.=$j;
}
echo $no;

if($_POST["pass"]!=$_POST["repass"]){
	$url = "signup.php?value=1&wrong=1";
	echo "<script type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
}
else


?>