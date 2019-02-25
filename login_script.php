<?php
session_start();
date_default_timezone_set("Asia/Kolkata"); 

if(isset($_SESSION['usr_id'])!="") {
	header("Location: index.php");
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 32; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
$time = date("Y-m-d H:i:s");
$t=time();
$hash = randomPassword();
$key = $hash;
$key.=$t;

if(isset($_SESSION['temp_seq_qns'])) {
	unset($_SESSION['temp_email']);
	unset($_SESSION['temp_seq_qns']);
}

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		$_SESSION['usr_email'] = $row['email'];
		$_SESSION['usr_time'] = $row['last_login'];
		$_SESSION['usr_phone'] = $row['phone'];
		$_SESSION['usr_gender'] = $row['gender'];
		$_SESSION['usr_dob'] = $row['dob'];
		$_SESSION['seq_qns'] = $row['seq_qns'];
		$_SESSION['seq_ans'] = $row['seq_ans'];
		$_SESSION['usr_type'] = $row['type'];
		$_SESSION['updated_at'] = $row['updated_at'];
		$_SESSION['temp'] = "";
		$temp_key = $row['login_hash'];

		
		if(!empty($_POST["remember"])) {
			if($temp_key == NULL){
				if(mysqli_query($con, "UPDATE users SET last_login = '" .$timeNow. "' , login_no = 1, login_hash = '" .$key."' WHERE email = '" . $email. "' and password = '" . md5($password) . "' ")){
					setcookie ("hash",$key,time()+ 15552000, '/');	
					}
			
			} else {
				if(mysqli_query($con, "UPDATE users SET last_login = '" .$timeNow. "', login_no = login_no + 1 WHERE email = '" . $email. "' and password = '" . md5($password) . "' ")){
					setcookie ("hash",$temp_key,time()+ 15552000, '/');	
				}
			} 
		} else {
				if(mysqli_query($con, "UPDATE users SET last_login = '" .$timeNow. "' WHERE email = '" . $email. "' and password = '" . md5($password) . "' ")){		
					echo "Login Success!!! Redirecting in A Moment...";			
				}
			}
		
		$contentAct = $_SESSION['usr_name']." Logged In At : ". $timeNow;
		$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('User Login', '".$email."', '".$contentAct."', '".$timeNow."') ");
		?>
        <script>
			 window.history.go(-2);
		</script>
        <?php
		
		} else {
		$errormsg = "Incorrect Email or Password!!!";
		?>
        <script>
			if(alert("You Have Entered An Incorrect Password! Please Try Again")) {
				<!--Do nothing-->
			} else {
				window.history.go(-1);
			}
		</script>
        
        <?php
		
		}
}  // END OF if (isset($_POST['login'])) {
?> 

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page -  Error</title>
</head>

<body>

<?php


if(isset($errormsg)) {
		echo $errormsg;
}
?>

</body>
</html>