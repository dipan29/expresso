<?php
session_start();
if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
}


$value = "W";

include_once 'dbconnect.php';

$t=time();
//set validation error flag as false
$error = false;
$email_address = "mindwebsteam@gmail.com";
//check if form is submitted 
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$dob = mysqli_real_escape_string($con, $_POST['dob']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']);
	$seq_qns = mysqli_real_escape_string($con, $_POST['seq_qns']);
	$seq_ans = mysqli_real_escape_string($con, $_POST['seq_ans']);
	$message = mysqli_real_escape_string($con, $_POST['message']);
	$interest = mysqli_real_escape_string($con, $_POST['interest']);
	$admin = "Self Registration on New Site";
	
	$subject = "Registration at MinD Webs (mindwebs.org)";
	$content = "Thank You for registering with Us. We hope your journey with us will be a great one \nHere are the details of registration:\n Name: $name \n Email: $email \n Password : $password (Store it in a safe place)\n\n-------------------------------------\nSubmitted Response :\nArea of Interest: $interest\nYour Message : $message\n-------------------------------------\n\n Link : expresso.mindwebs.org"; 
	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO users(name,email,phone,password,gender,dob,seq_qns,seq_ans,log_up) VALUES('" . $name . "', '" . $email . "', '" . $phone . "', '" . md5($password) . "', '" .$gender . "', '" .$dob . "', '" .$seq_qns . "', '" .$seq_ans . "','".$timeNow."') ON DUPLICATE KEY UPDATE password='" . md5($password) . "', phone='" . $phone . "', gender='" .$gender . "',dob='" .$dob . "',seq_qns='" .$seq_qns . "',seq_ans='" .$seq_ans . "',log_up='".$timeNow."',updated_at='".$timeNow."' " )) {
		if(mysqli_query($con, "INSERT INTO admin_mail(user,reciver,subject,content) VALUES('" . $admin . "', '" . $email . "', '" . $subject . "', '" .$content . "')")) {
			$to = $email; 
			
			$contentAct = $to." Registered At : ". $timeNow;
			$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('User Registration', '".$email."', '".$contentAct."', '".$timeNow."') ");
			
			$email_subject = "Registration at Expresso | MinD Webs (mindwebs.org)";
			$email_body = "Thank You for registering with Us. We hope your journey with us will be a great one \n".
			" Here are the details of registration:\n Name: $name \n Email: $email \n Password : $password (Store it in a safe place)\n Link : expresso.mindwebs.org\n\nIf you want to add any more interest or work field that was not recognised in the form you may reply to this mail at $email_address"; 
	
			$headers = "From: administrator@mindwebs.org\n"; 
			$headers .= "Reply-To: $email_address";
			
			$headers2 = "From: administrator@mindwebs.org\n"; 
			$headers2 .= "Reply-To: $email";
	
		
			mail($to,$email_subject,$email_body,$headers);
			
			mail($email_address,$email_subject,$content,$headers2);
			$successmsg = "Successfully Registered!!!";
			header("Location: login.php");
			} else {	$errormsg = "Error in registering...Please try again later! (Quote :Mail Error)";	}
			
		} else {
			$errormsg = "Error in registering...Please try again later! (Quote: Session Error)";
		}
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration at MinD Webs</title>
</head>
<?php 
if(isset($errormsg)) {
echo $errormsg;
}
?>
GO <a href="login.php">BACK</a>
<body>
</body>
</html>