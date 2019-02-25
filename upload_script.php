<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

include_once 'dbconnect.php';

if(isset($_SESSION['usr_type'])!="W") {
	if(isset($_SESSION['usr_type'])!="A") {
		header("Location: accessDenied.php");
		
	}
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$pass_new = randomPassword();

//PHP IMAGE and DATA VALIDATION

if (isset($_POST['upload_image'])) {
	$admin = $_SESSION['usr_name'];
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$head = mysqli_real_escape_string($con, $_POST['heading']);
	$content = mysqli_real_escape_string($con, $_POST['content']);
	$view = mysqli_real_escape_string($con, $_POST['vis']);
	
	$img_name = "img_";
	$img_name .= $pass_new;
	
	$image = $_FILES['image']['name'];
	
	$temp = explode(".", $_FILES["image"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	
	$target2 = "uploads/".basename($_FILES['image']['name']);
	$target = "uploads/".$newfilename;
	
	
	if(mysqli_query($con,"Insert Into image (image, text,admin,email,subject,content,view) VALUES ('".$newfilename."', '".$img_name."','".$admin."','".$email."','".$head."','".$content."','".$view."') ")) {
		if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $newfilename)) {
			
			$contentAct = $_SESSION['usr_name']." Uploaded Image At : ". $timeNow;
			$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('Image Admin', '".$_SESSION['usr_email']."', '".$contentAct."', '".$timeNow."') ");
		
			$successmsg = "Image (".$image.") Uploaded Successfully!!!";	
			?>
            <script>
				window.history.go(-1);
			</script>
            <?php			
		} else {
			$errormsg = "Could not upload file...";
		}			
	} else {
		$errormsg = "Could Not Upload Database...";
	}
	

}