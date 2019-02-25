<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

    session_start();
    date_default_timezone_set('Asia/Kolkata');
    
    $con = mysqli_connect("localhost", "root", "", "table_name") or die("Error " . mysqli_error($con));
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $hash = $_POST['hash'];
	
   
if(mysqli_query($con, "INSERT INTO api_key (name, email, hash) VALUES ('".$name."', '".$email."', '".$hash."') ON DUPLICATE KEY UPDATE hash = '".$hash."' ")) {   
    $response = array();
    $response["success"] = true;
    
    $email_subject = "New API KEY GENERATED";
    $email_body = "CONTENT :\n\nName : $name\nEmail : $email\n\nKey_API : $hash";
    
    $headers = "From: $email\n"; 
    $headers .= "Reply-To: administrator@mindwebs.org";
    
    $to = "dipanroy@mindwebs.org";
    
    mail($to,$email_subject,$email_body,$headers);
    //mail($to1,$email_subject,$email_body,$headers);
   
    
} else {
    $response = array();
    $response["success"] = false;
}
   
    echo json_encode($response);
?>