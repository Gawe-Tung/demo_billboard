<?php
	include "setup.php";

	echo "<center><font size='7' color='#66CCFF'>".$unit_name."，歡迎光臨</font><br><br>";

	$sql = "SELECT * FROM `board` order by `MID` DESC";
	$sql_result = mysql_query($sql) or die($sql."sql語法有誤");

	if (mysql_num_rows($sql_result)==0)
	{
	  echo "目前沒有任何公告存在!!<br>\n";
	  exit;
	}

	while ($row = mysql_fetch_array($sql_result))
	{
	  echo "序號：".$row['MID'];
	  echo "&nbsp;公告標題：";
	  echo "<a href='browser_list.php?MID=".$row['MID']."' target='_blank'>";
	  echo $row['title']."</A>";
	  echo "&nbsp;公告日期：".$row['board_date'];
	  echo "<br>\n";
	}


?>