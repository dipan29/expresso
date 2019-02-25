<?php

//THIS IS A SCRIPT FILE RELATING A QUERY OF FINDIND USERS
//PLEASE DONT MODIFY IT
//COPYRIGHTS DIPAN ROY | MIND WEBS

session_start();
date_default_timezone_set('Asia/Kolkata');

include_once 'dbconnect.php';

$targetUrl = 'home.php';

if(isset($_COOKIE['referCookie'])) {
	$targetUrl = $_COOKIE['referCookie'];
	setcookie("referCookie", '' , time()-3600); 
}

$targetUrlname = 'user-';
$targetUrlid = 'user.php?var=';

if(isset($_SERVER['HTTP_REFERER'])) {
	$referenceUrl = $_SERVER['HTTP_REFERER'];
}

if(isset($referenceUrl)) {
	setcookie("referCookie", $referenceUrl, time()+3600); 
}


if(isset($_SESSION['temp_seq_qns'])) {
	unset($_SESSION['temp_email']);
	unset($_SESSION['temp_seq_qns']);
}

if (isset($_GET['var']))
{
	$id = $_GET['var'];
	$resultB = mysqli_query($con, "SELECT * FROM post_blog WHERE id = '" .$id. "' ");
		if ($resultB->num_rows > 0) {
			while($rowB = $resultB->fetch_assoc()) {
				$email = $rowB["email"];
			}
		}
	
	$resultA = mysqli_query($con, "SELECT * FROM users WHERE email = '" .$email. "' ");
		if ($resultA->num_rows > 0) {
			while($rowA = $resultA->fetch_assoc()) { 
					$username = $rowA['username'];
					$id = $rowA['id'];
					if($username != '') {
						$targetUrlname = $targetUrlname . $username . ".php";
						$targetUrl = $targetUrlname;
					} else {
						$targetUrlid = $targetUrlid . $id;
						$targetUrl = $targetUrlid;
					}	
					header("Location:$targetUrl");				
			}
		}
	
	
} else {
	header("Location:$targetUrl");	
}
/*
echo $email; echo $id; echo $username;

?> <br> <br> <?php
echo $targetUrl;
?> <br> <?php
echo $targetUrlname;
?> <br> <?php
echo $targetUrlid;
?> <br> <?php
echo $_SERVER['HTTP_REFERER'];
?> <br> <?php
echo $_COOKIE['referCookie'];
*/
?>
