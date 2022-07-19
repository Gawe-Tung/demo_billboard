<?php
	include "setup.php"; // 連結設定檔

	@$err_message = $_REQUEST['err_message'];
	if ($err_message <> ''){
	  echo "<font size='7' color='#FF0000'>".$err_message."</font>";
	}
	$next_name = "insert_check.php";
	echo "<center>";
	echo $unit_name."公告新增畫面<br>";
	echo "<form method='get' action='insert_check.php' enctype='multipart/form-data'>";
	echo "<input type='text' name='user' size='10'>使用者帳號<br>";
	echo "<input type='password' name='pasd' size='10'>使用者密碼<br><br>";
	echo "<input type='text' name='title' size='20'>公告標題<br>";
	echo "<textarea name='message' rows='10' cols='10'></textarea> 公告內容<br>";
	echo "<input type='submit' value='確定送出'>";
	echo "</form>";
?>