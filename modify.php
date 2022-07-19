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

  /*
  if (mysql_num_rows($sql_result)==0){
    echo "目前沒有任何公告存在!!<br>\n";
    exit;
  }*/
  // 公告細項內容
  echo "<form action='modify_check.php' method='get' ENCTYPE='multipart/form-data'>";
  $row = mysql_fetch_array($sql_result);
  echo "序號：".$row['MID']."<br>\n";
  echo "<input type='hidden' name='MID' value='".$row['MID']."'>";
  echo "公告標題：<input type='text' name='title' size='20' value='".$row['title']."'><br>\n";
  echo "公告內容：<textarea name='message' rows='10' cols='20'>".$row['message']."</textarea><br>\n";

  echo "<br><input type='text' name='user' size='10'>使用者帳號<br>";
  echo "<input type='password' name='pasd' size='10'>使用者密碼<br>";
  echo "<input type='submit' value='確定修改'>";
  echo "</form>";
?>