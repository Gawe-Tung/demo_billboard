<?php
  include "setup.php"; // 連結設定檔
  date_default_timezone_set('Asia/Taipei');
  $board_date = date("Y/m/d H:i:s");

  $back_name = "insert.php";// 前一支php的檔名

  // 使用者輸入變數
  $user = $_REQUEST['user'];
  $pasd = $_REQUEST['pasd'];
  $title = $_REQUEST['title'];
  $message = $_REQUEST['message'];


  // 確認資料是否輸入正確
  if ($user == ''){
    $err_message = "使用者帳號未輸入!!";
    header("location: ./".$back_name."?err_message=".$err_message);
    exit;
  }

  if ($pasd == ''){
    $err_message = "使用者密碼未輸入!!";
    header("location: ./".$back_name."?err_message=".$err_message);
    exit;
  }


  $user_tablename = "user"; //資料表名稱

  // 確認此帳號是否存在
  $sql = "SELECT  * FROM `user` where `user`='" . $user . "'and `password` = '" . $pasd . "'";

  $sql_result = mysql_query($sql) or die($sql."sql語法有誤!!");
  $row = mysql_fetch_array($sql_result);
  if ($row[0]==0){
    $err_message = "很抱歉，您並非".$unit_name."的使用者，請重新輸入帳號!!";
    header("location: ./".$back_name."?err_message=".$err_message);
    exit;
  }

  // 確認公告輸入之資料是否正確
  if ($title == ''){
    $err_message = "公告標題未輸入!!";
    header("location: ./".$back_name."?err_message=".$err_message);
    exit;
  }

  if ($message == ''){
    $err_message = "公告內容未輸入!!";
    header("location: ./".$back_name."?err_message=".$err_message);
    exit;
  }

  $user_tablename_1 = "board"; //資料表名稱
  //echo "<center>管理者您好!!<BR>\n";
  // 新增一個公告
  $sql = "INSERT INTO `board`(`title` ,`message`,`user`,`board_date`) VALUES('" . $title ."','" .$message."','" . $user ."','" .$board_date."')";

  $sql_result = mysql_query($sql);
  //echo $sql;
  echo "新增公告完成!!";
  echo "[<a href=\"browser.php\">公告欄閱覽</a>]<br>\n"; 
?>