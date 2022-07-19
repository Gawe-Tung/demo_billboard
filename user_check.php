<?php
	include 'setup.php';
	date_default_timezone_set('Asia/Taipei');
	$date = date("Y/m/d H:i:s");

	$user = $_GET['user'];
	$pasd = $_GET['pasd'];

	if ($user == '')
	{
	  $err_message = "使用者帳號未輸入!!";
	  header("location: ./user.php?err_message=".$err_message);
	  exit;
	}else if(strlen($user)<=4 or strlen($user)>8){
	  $err_message = "帳號長度未大於4或超過8!!";
	  header("location: ./user.php?err_message=".$err_message);
	  exit;
	}

	if ($pasd == ''){
	  $err_message = "使用者密碼未輸入!!";
	  header("location: ./user.php?err_message=".$err_message);
	  exit;
	}else if(strlen($pasd)<4 or strlen($pasd)>8){
	  $err_message = "密碼長度未大於4或超過8!!";
	  header("location: ./user.php?err_message=".$err_message);
	  exit;
	}
	$user_tablename = "user";

	$sql = "SELECT * FROM `" . $user_tablename ."` WHERE `user` = '" . $user . "'";
	$sql_result = mysql_query($sql) or die("無相關公告內容!!");
	$row = mysql_fetch_array($sql_result);
	if ($row[0]>0){
	  $err_message = "很抱歉，此帳號已經有人申請過了，請重新輸入!!";
	  header("location: ./user.php?err_message=".$err_message);
	  exit;
	}
	
	//$sql = "INSERT INTO `" . $user_tablename . "`(`datetime` , `user`, `pasd`) VALUES ('" . $date . "','"  . $user . "','" . $pasd."')";
	$sql = "INSERT INTO `user`(`datetime` , `user`, `password`) VALUES ('" . $date . "','"  . $user . "','" . $pasd."')";
	//echo $sql;
	$sql_result = mysql_query($sql);
	echo "新增".$user."帳號完成!!";
?>