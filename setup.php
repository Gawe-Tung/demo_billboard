<?php 
	$host = "localhost";
	$user = "root";
	$password = "123456";
	$dbname = "sboard";
	$connection = mysql_pconnect($host,$user,$password) or die("無法連結資料庫");
	$db = mysql_select_db($dbname,$connection) or die("無法選取資料庫");
	//echo 測試完成;

	//通常變數
	$opendir_path = "./upload";
	$unit_name = "公佈欄";
?>