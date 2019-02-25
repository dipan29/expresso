<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

$myemail = 'notification@mindwebs.org';

include_once 'dbconnect.php';

if(isset($_SESSION['temp_seq_qns'])) {
	unset($_SESSION['temp_email']);
	unset($_SESSION['temp_seq_qns']);
}

if (isset($_GET['var']))
{
	$id = $_GET['var'];
} else {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['send_c'])) {
	$comment = mysqli_real_escape_string($con, $_POST['comment']);
	$email = $_SESSION['usr_email'];
	$name = $_SESSION['usr_name'];
	if(mysqli_query($con, "INSERT INTO comment (pid,email,name,comment) VALUES('" . $id . "', '" . $email . "','" . $name . "','" .$comment . "') ")) {
		
			$resultA = mysqli_query($con, "SELECT * FROM post_blog WHERE id = '" .$id. "' ");
			if ($resultA->num_rows > 0) {
				while($rowA = $resultA->fetch_assoc()) { 
					$email = $rowA["email"];
				}
					
					$contentAct = $_SESSION['usr_name']." Comented in Post By : ". $rowA["name"];
					$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('Comment', '".$_SESSION['usr_email']."', '".$contentAct."', '".$timeNow."') ");
				
					$to = $email; 
					$email_subject = "Expresso : Comment Received";
					$email_body = "Thank You For Your Content. \nYour Content Has Received A New Comment as follows\n".
					"\nPost Address : http://expresso.mindwebs.org/blog_view.php?var=$id ".
					"\n\nComment : $comment\nBy : $name\n\nThank You"; 
					
					$_SESSION['messageNT'] = $comment."\nBy :- ".$name;
					$_SESSION['titleNT'] = $email_subject;
					$_SESSION['emailNT'] = $email;
					
					include("android_noti.php");
	
					$headers = "From: $myemail\n"; 
					$headers .= "Reply-To: $myemail";
	
					mail($to,$email_subject,$email_body,$headers);
			}

		$successmsg = "COMMENT Done!!! ";header('Location: ' . $_SERVER['HTTP_REFERER']);

		
	} else {
		$errormsg = "Could Not COMMENT The Same, Please Verify and Try Again!!!";
	}
}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php if(isset($successmsg)) { echo $successmsg; }  else { if(isset($errormsg)) { echo $errormsg; } } ?>
<body>
</body>
</html>