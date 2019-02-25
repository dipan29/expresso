<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

include_once 'dbconnect.php';



if(isset($_SESSION['usr_id'])=="") {
	header("Location:blog.php");
}

if (isset($_GET['var'])) {
	$id = $_GET['var'];
} else {
	header("Location:blog.php");	
} 
	
	$loc =  "blog_view.php?var=".$id;

//FORM SECTION
$published = 'N';

$t= time();

if (isset($_POST['update'])) {

$view= $_POST['vis'];
$subject = $_POST['subject'];
$tagline = $_POST['s_content'];
$content = mysqli_real_escape_string($con,$_POST['content']);
$textToStore = nl2br(htmlentities($content, ENT_QUOTES, 'UTF-8'));



if( empty($errors))
{   if(mysqli_query($con, "UPDATE post_blog SET view = '" . $view . "', subject = '" . $subject . "' , tagline = '" . $tagline . "' , content = '" . $textToStore . "' WHERE id = '" .$id ."' " )) {
		$contentAct = $_SESSION['usr_name']." Updated Content At : ". $timeNow;
		$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('Approval', '".$_SESSION['usr_email']."', '".$contentAct."', '".$timeNow."') ");
		$successmsg = "Post Updated Successfully!!! Please Close this window...";
		
	} else {
		$errors .= "\n Error: Something did not work well, Please try again later. Until then please close this page!";
	}
}

}

if (isset($_POST['unpublish'])) {

	$result = mysqli_query($con, "Select * from post_blog where id = '" .$id ."' AND published = 'Y' " );
	if($result->num_rows > 0) {
		if(mysqli_query($con, "UPDATE post_blog SET published = '" . $published . "' WHERE id = '" .$id ."' AND published = 'Y' ") ) {
			$successmsg = "Post Unpublished Successfully!!! Please Close this window...";
	} else {
		$errors .= "\n Error: Something didnot work well, Please try again later. Until then please close this page!";
	}
   
}

}






?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Add Handaler</title>
</head>

<body>

<?php if(isset($errors)) { echo $errors; } else { header("Location:blog_view.php?var=$id"); }?>
</body>
</html>