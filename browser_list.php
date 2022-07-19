<?php
	include "setup.php"; // 連結設定檔

	$MID = $_REQUEST['MID'];

	echo "<center><font size='5' color='#66CCFF'>".$unit_name."，歡迎光臨!!</font><br><br>\n";

	$user_tablename = "board";

	// 取出資料表中所有使用者之資料
	$sql = "SELECT * FROM `board` WHERE `MID` = '" . $MID . "'";

	$sql_result = mysql_query($sql) or die($sql."sql語法有誤!!");


	if (mysql_num_rows($sql_result)==0){
	echo "目前沒有任何公告存在!!<br>\n";
	exit;
	}
	// 公告細項內容
	$row = mysql_fetch_array($sql_result);
	echo "序號：".$row['MID']."<br>\n";
	echo "公告標題：".$row['title']."<br>\n";
	echo "公告內容：".$row['message']."<br>\n";


	// 找出帳號對應之使用者姓名
	$user_tablename_1 = "user"; 
	$sql_1 = "select user from `user` WHERE `user` = '" . $row['user'] . "'";

	$sql_result_1 = mysql_query($sql_1) or die($sql."sql語法有誤!!");
	$row_1 = mysql_fetch_array($sql_result_1);

	echo "公告者：".$row_1['user']."<BR>\n";
	echo "公告日期：".$row['board_date']."<BR>\n";
	echo "[ <a href='browser.php'>瀏覽</a> ]\n"; 
	echo "[ <a HREF='modify.php?MID=".$row['MID']."'>修改</a> ]\n";
	echo "[ <a HREF='delete.php?MID=".$row['MID']."'>刪除</a> ]\n";
?>