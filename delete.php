<?php
	include "setup.php"; // 連結設定檔

	$MID = $_GET['MID'];

	echo "<center><font size='7' color='#66CCFF'>".$unit_name."，歡迎光臨</font><br><br>";

	@$err_message = $_GET['err_message'];
	if ($err_message <> ''){
	  echo "<font size='7' color='#FF0000'>".$err_message."</font>";
	}
	$user_tablename = "board";

	// 取出資料表中所有使用者之資料

	$sql = "SELECT * FROM `board` WHERE `MID` = '" . $MID . "'";
	$sql_result = mysql_query($sql) or die($sql."sql語法有誤!!");

	// 公告細項內容
	$row = mysql_fetch_array($sql_result);
	echo "<form action='delete_check.php' method='get' ENCTYPE='multipart/form-data'>";
	echo "<input type='hidden' name='MID' value='".$row['MID']."'>";
	echo "序號：".$row['MID']."<br>\n";
	echo "公告標題：".$row['title']."<br>\n";
	echo "公告內容：".$row['message']."<br>\n";


	// 找出帳號對應之使用者姓名


	$sql_1 = "SELECT * FROM `user` WHERE `user` ='" . $row['user'] . "'";
	$sql_result_1 = mysql_query($sql_1) or die($sql."sql語法有誤!!");
	$row_1 = mysql_fetch_array($sql_result_1);


	echo "公告者：".$row_1['user']."<br>\n";
	echo "公告日期：".$row['board_date']."<br>\n";
	echo "<br><input type='text' name='user' size='10'>使用者帳號<BR>";
	echo "<input type='password' name='pasd' size='10'>使用者密碼<BR>";
	echo "<input type='submit' value='確認刪除'>";
	echo "</form>";
?>