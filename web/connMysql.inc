<?php
	$db_host = "localhost";
	$db_username = "root";
	$db_password = "terrylee880820";
	$db_link = @mysqli_connect($db_host, $db_username, $db_password);
	if (!$db_link) die("資料庫連結失敗！");
	//設定字元集與連線校對
	mysqli_set_charset($db_link, 'utf8');
?>
