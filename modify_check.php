<?php
  include "setup.php"; // 連結設定檔
  date_default_timezone_set('Asia/Taipei');
  $board_date = date("Y/m/d H:i:s");
  $back_name = "modify.php";// 前一支php的檔名

  // 使用者輸入變數
  $user = $_GET['user'];
  $pasd = $_GET['pasd'];
  $MID = $_GET['MID'];
  $title = $_GET['title'];
  $message = $_GET['message'];



  // 確認資料是否輸入正確
  if ($user == ''){
    $err_message = "使用者帳號未輸入!!";
    header("location: ./".$back_name."?err_message=".$err_message."&MID=".$MID);
    exit;
  }

  if ($pasd == ''){
    $err_message = "使用者密碼未輸入!!";
    header("location: ./".$back_name."?err_message=".$err_message."&MID=".$MID);
    exit;
  }


  $user_tablename = "user"; //資料表名稱
  $user_tablename_1 = "board"; //資料表名稱

  // 確認此帳號是否存在
  $sql = "SELECT * FROM `user` WHERE `user` = '" . $user . "' and `password` = '" . $pasd . "'";

  $sql_result = mysql_query($sql) or die($sql."sql語法有誤!!");
  $row = mysql_fetch_array($sql_result);
  if ($row[0]<>0){

    // 確認此帳號與此則公告者是否相同
    $sql_1 = "SELECT * FROM `board` WHERE `MID`='" . $MID . "' and `user` = '" . $user ."'"; 
   
    $sql_result_1 = mysql_query($sql_1) or die("無相關公告內容!!");
    $row_1 = mysql_fetch_array($sql_result_1);

    if ($row_1[0]==0){
      $err_message = "很抱歉，您並非第".$MID."則的公告使用者，請重新輸入帳號!!";
      header("location: ./".$back_name."?err_message=".$err_message."&MID=".$MID);
      exit;
    }

  }else{
    $err_message = "很抱歉，您並非".$unit_name."的使用者，請重新輸入帳號!!";
    header("location: ./".$back_name."?err_message=".$err_message."&MID=".$MID);
    exit;
  }

  // 確認公告輸入之資料是否正確
  if ($title == ''){
    $err_message = "公告標題未輸入!!";
    header("location: ./".$back_name."?err_message=".$err_message."&MID=".$MID);
    exit;
  }

  if ($message == ''){
    $err_message = "公告內容未輸入!!";
    header("location: ./".$back_name."?err_message=".$err_message."&MID=".$MID);
    exit;
  }


  $user_tablename_1 = "board"; //資料表名稱
  // 修改資料表中的資料
  $sql = "UPDATE `board` SET `title` ='" . $title ." ',`message` ='" . $message . "' , board_date = '" . $board_date ."' WHERE `MID` = '" . $MID . "'";


  $sql_result = mysql_query($sql);
  //echo $sql;
  echo "修改第".$MID."則公告完成!!";
?>