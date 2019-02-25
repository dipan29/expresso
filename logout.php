<?php
session_start();

include_once 'dbconnect.php';

$temp = NULL;

$contentAct = $_SESSION['usr_name']." Logged Out At : ". $timeNow;
$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('User Logout', '".$_SESSION['usr_email']."', '".$contentAct."', '".$timeNow."') ");

if(isset($_COOKIE["hash"])) {

if(mysqli_query($con, "UPDATE users SET login_hash = NULL , login_no = 0 WHERE login_no = 1 AND email = '" . $_SESSION['usr_email']. "'  ")) {
	echo "DONE";
}
if(mysqli_query($con, "UPDATE users SET login_no = login_no - 1 WHERE login_no > 1 AND email = '" . $_SESSION['usr_email']. "'  ")) {
	echo "\nDONE 2";
}

}

if(isset($_SESSION['usr_id'])) {
	session_destroy();	
	setcookie ("hash", '',time()-3600, '/');
	unset($_SESSION['usr_id']);
	unset($_SESSION['usr_name']);
	unset($_SESSION['temp']);
	unset($_SESSION['usr_time']);
	unset($_SESSION['usr_email']);
	unset($_SESSION['usr_phone']);
	unset($_SESSION['usr_gender']);
	unset($_SESSION['usr_dob']);
	unset($_SESSION['seq_qns']);
	unset($_SESSION['seq_ans']);
	unset($_SESSION['usr_type']);
	unset($_SESSION['updated_at']);


	header("Location: login.php");
} 
?>