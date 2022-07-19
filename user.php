<?php
	require 'setup.php'; // 連結設定檔

	@$err_message = $_GET['err_message'];
	if ($err_message <> ''){
	echo "<font size='7' color='#FF0000'>".$err_message."</font>";
	}


	//echo "<center>";
	echo "<br>";
	echo $unit_name."新增使用者畫面<br>";
	echo "<form method='get' action='user_check.php'>";
	echo "<input type='text' name='user' size='10'>使用者帳號<br>";
	echo "<input type='password' name='pasd' size='10'>使用者密碼<br>";
	echo "<input type='submit' value='確定送出'>";
	echo "</form>";
?>