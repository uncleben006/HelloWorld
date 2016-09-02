<?php

	$DB_HOST = 'localhost';
	$DB_USER = 'testphp';
	$DB_PASS = 'ken0426';
	$DB_NAME = 'boardgame';
	$DB_TYPE = 'mysql';
	
	try{
		$DB = new PDO($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME,$DB_USER,$DB_PASS);
		$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
?> 