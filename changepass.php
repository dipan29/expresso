<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

if(isset($_SESSION['usr_id'])=="") {
	header("Location: login.php");
}

include_once 'dbconnect.php';

if (isset($_POST['change'])) {
	$email = $_SESSION['usr_email'];
	$curr_pass = mysqli_real_escape_string($con, $_POST['current_password']);
	$pass = mysqli_real_escape_string($con, $_POST['password']);
	$cpass =  mysqli_real_escape_string($con, $_POST['cpassword']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($curr_pass) . "'");
	
	
  if($result && ($pass==$cpass)) {	
	if(mysqli_query($con, "UPDATE users SET pass_changed = now(), password = '" . md5($pass) . "', login_hash = NULL, login_no = 0 WHERE email = '" . $email. "'  ")){
			$successmsg = "Updated Sucessfully...\nYou are now Logged Out, Please Login Again";
			
			$subject = "Update of Profile at Expresso | MinD Webs (mindwebs.org)";
			$content = "Your Profile Has Sucessfully Updated\n\n If you did not do this change, please reply to this mail (mindwebsteam@gmail.com) with the same\n\nThank You\nMinD Webs Team ";
			$headers = "From: administrator@mindwebs.org\n"; 
			$headers .= "Reply-To: $email_address";
			mail($email,$subject,$content,$headers);
			
					header("Location: logout.php");
					
	} else {
			$errormsg = "Could Not Update File...Please Try Again Later";
	}
  } else {
	  
	  $errormsg = "Paswords Dont Match...Please Try Again Later... GO Back";
  }
} else {
	$errormsg = "Get method not working... Please Try Again Later";
}



?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Pass Handler</title>
</head>
<?php
if(isset($errormsg)) {
	echo $errormsg;
}
?>
<body>
</body>
</html>