<?php 
session_start();
include_once 'dbconnect.php';

$errors = '';
$myemail = 'mindwebsteam@gmail.com';

if(empty($_POST['name'])  || 
   empty($_POST['subject']) || 
   empty($_POST['content']))
{
    $errors .= "\n Error: all fields are required";
}
$t= time();
$name = $_POST['name']; 
$email_address = $_POST['email'];
$type = mysqli_real_escape_string($con,$_POST['type']);
$view= $_POST['vis'];
$subject = mysqli_real_escape_string($con,$_POST['subject']);
$tagline = mysqli_real_escape_string($con,$_POST['s_content']);
$content = mysqli_real_escape_string($con,$_POST['content']);
$textToStore = nl2br(htmlentities($content, ENT_QUOTES, 'UTF-8'));
$published = 'Y';

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{   if(mysqli_query($con, "INSERT INTO post_blog(name,email,type,view,subject,tagline,content,published,date) VALUES('" . $name . "','" . $email_address . "', '" . $type . "', '" . $view . "' , '" . $subject . "','" . $tagline . "','" . $textToStore . "','" . $published . "','" .$timeNow. "')" )) {
	
	$contentAct = $_SESSION['usr_name']." Posted At : ". $timeNow;
	$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('Post Admin', '".$_SESSION['usr_email']."', '".$contentAct."', '".$timeNow."') ");
	
	$to = $myemail; 
	$email_subject = "Content submission: $name";
	$email_body = "You have received a new content. \n".
	" Here are the details:\n Name: $name \n Email: $email_address \n Content Type: $type \n \n Content \n $content\n\nPlease Open Your Admin Panel To Approve the content"; 
	
	$headers = "From: administrator@mindwebs.org\n"; 
	$headers .= "Reply-To: $email_address";
	

	
	//redirect to the 'thank you' page
	header('Location: thank_you.php');
	}
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Post form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>