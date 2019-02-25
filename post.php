<?php 
include_once 'dbconnect.php';

$errors = '';
$myemail = 'mindwebsteam@gmail.com';
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['content']))
{
    $errors .= "\n Error: all fields are required";
}
$t= time();
$name = $_POST['name']; 
$type = $_POST['type'];
$email_address = $_POST['email']; 
$message = $_POST['content']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{   if(mysqli_query($con, "INSERT INTO content(name,email,type,time,content) VALUES('" . $name . "','" . $email_address . "', '" . $type . "', now() , '" . $message . "')" )) {
	$to = $myemail; 
	$contentAct = $_SESSION['usr_name']." Submitted A Content at : ". $timeNow;
	$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('Approval', '".$_SESSION['usr_email']."', '".$contentAct."', '".$timeNow."') ");
	$email_subject = "Content submission: $name";
	$email_body = "You have received a new content. \n".
	" Here are the details:\n Name: $name \n Email: $email_address \n Content Type: $type \n \n Content \n $message"; 
	
	$headers = "From: administrator@mindwebs.org\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: thank_you.php');
	}
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>