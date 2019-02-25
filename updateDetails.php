<?php

session_start();
date_default_timezone_set('Asia/Kolkata');

if(isset($_SESSION['usr_id'])=="") {
	header("Location: login.php");
}

$success = false; 

include_once 'dbconnect.php';

if (isset($_POST['updateBtn'])) {
	
	$username = mysqli_real_escape_string($con, $_POST['uname']);
	$email = $_SESSION['usr_email'];
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$dob = mysqli_real_escape_string($con, $_POST['dob']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']);
	$about = mysqli_real_escape_string($con, $_POST['about']);
	
	$facebook = mysqli_real_escape_string($con, $_POST['facebook']);
	$twitter = mysqli_real_escape_string($con, $_POST['twitter']);
	$instagram = mysqli_real_escape_string($con, $_POST['instagram']);
	
	$seq_qns= mysqli_real_escape_string($con, $_POST['seq_qns']);
	$seq_ans = mysqli_real_escape_string($con, $_POST['seq_ans']);
	
	$conf_pass = mysqli_real_escape_string($con, $_POST['conf_pass']);
	
	
	
	
$result = mysqli_query($con, "SELECT * FROM users WHERE email = '".$email."' AND password = '". md5($conf_pass) ."' ");
$row = $result->fetch_assoc();

if($result->num_rows > 0 ) {
	
	if(($row['username'] != $username) && ($username != '' )) {
		$success = false;
		$resultT = mysqli_query($con, "SELECT * FROM users WHERE username = '".$username."' ");

		if($resultT->num_rows > 0 ) {
				$msg = "Same Username Already Exists... Please Try some other username...";
				setcookie("messageCookie", $msg, time()+120, '/');
				$referUrl = $_SERVER['HTTP_REFERER'];
				header("Location:$referUrl");
				exit();
		} else {
			if(mysqli_query($con, " UPDATE users SET username = '".$username."', updated_at = '".$timeNow."'  WHERE email = '".$email."' ")) {
				$success = true;
			}
		}
	}
	
	if(($row['phone'] != $phone) && ($phone != '' )) {
		$success = false;
		if(mysqli_query($con, " UPDATE users SET phone = '".$phone."', updated_at = '".$timeNow."'  WHERE email = '".$email."' ")) {
			$success = true;
		}
	}
	
	if(($row['dob'] != $dob) && ($dob !='')) {
		$success = false;
		if(mysqli_query($con, " UPDATE users SET dob = '".$dob."', updated_at = '".$timeNow."' WHERE email = '".$email."' ")) {
			$success = true;
		}
	}	
	
	if(($row['gender'] != $gender) && ($gender != '') ) {
		$success = false;
		if(mysqli_query($con, " UPDATE users SET gender = '".$gender."', updated_at = '".$timeNow."' WHERE email = '".$email."' ")) {
			$success = true;
		}
	}
	
	
	if(($row['about'] != $about) && ($about != '') ) {
		$success = false;
		if(mysqli_query($con, " UPDATE users SET about = '".$about."', updated_at = '".$timeNow."' WHERE email = '".$email."' ")) {
			$success = true;
		}
	}
	
	if(($row['facebook'] != $facebook) &&  ($facebook != '') ){
		$success = false;
		if(mysqli_query($con, " UPDATE users SET facebook = '".$facebook."', updated_at = '".$timeNow."' WHERE email = '".$email."' ")) {
			$success = true;
		}
	}
	
	if(($row['fa-twitter'] != $twitter) && ($twitter != '') ) {
		$success = false;
		if(mysqli_query($con, " UPDATE users SET twitter = '".$twitter."', updated_at = '".$timeNow."' WHERE email = '".$email."' ")) {
			$success = true;
		}
	}
	
	if(($row['fa-inst'] != $instagram) && ($instagram != '') ) {
		$success = false;
		if(mysqli_query($con, " UPDATE users SET inst = '".$instagram."', updated_at = '".$timeNow."' WHERE email = '".$email."' ")) {
			$success = true;
		}
	}
	
	if(($row['seq_qns'] != $seq_qns) && ($seq_qns != '' ) ){
		$success = false;
		if(mysqli_query($con, " UPDATE users SET seq_qns = '".$seq_qns."', updated_at = '".$timeNow."' WHERE email = '".$email."' ")) {
			$success = true;
		}
	}
	
	if(($row['seq_ans'] != $seq_ans) && ($seq_ans != '') ) {
		$success = false;
		if(mysqli_query($con, " UPDATE users SET seq_ans = '".$seq_ans."', updated_at = '".$timeNow."' WHERE email = '".$email."' ")) {
			$success = true;
		}
	}


}

if($success == true) {
	$msg = "Your Profile Has been Successfully Updated...";
	setcookie("messageCookie", $msg, time()+120, '/');
	?>
    <script>
	window.alert("Your Profile Has been Successfully Updated...");
    </script>
	<?php
 	
} else {
	$errormsg = "COULD NOT COMPLETE THE SAME";
	$msg = $errormsg;
	setcookie("messageCookie", $msg, time()+120, '/');
	
}

/*
if(mysqli_query($con, "SELECT * FROM users WHERE email = '".$email."' AND password = '".$conf_pass."' ")) {	
	
	
	if(mysqli_query($con, " UPDATE users SET phone ")){
			$successmsg = "Updated Sucessfully...\nYou are now Logged Out, Please Login Again";
			session_destroy();
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
			header("Location: login.php");
	} else {
			$errormsg = "Could Not Update File...Please Try Again Later";
	}
} else {
	$errormsg = "Get method not working...";
}


*/

}

if(isset($errormsg)) { echo $errormsg; }
$referUrl = $_SERVER['HTTP_REFERER'];
header("Location:$referUrl");



?>
