<?php
//資料庫主機設定
$db_host = "us-cdbr-east-04.cleardb.com";
$db_username = "bfa69862a40c61";
$db_password = "5bec0e39";
$db_name = "heroku_c8b7ac2233a2b6e";
// $db_name = "heroku_c8b7ac2233a2b6e2";
//連線資料庫
$db_link = @new mysqli($db_host, $db_username, $db_password, $db_name, 3306);
//錯誤處理
if ($db_link->connect_error != "") {
	echo "資料庫連結失敗！";
} else {
	//設定字元集與編碼
	$db_link->query("SET NAMES 'utf8'");
}
