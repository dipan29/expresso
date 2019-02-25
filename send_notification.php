<?php

session_start();

$con = mysqli_connect("localhost", "root", "", "table_name") or die("Error " . mysqli_error($con));

$message = $_SESSION['messageNT'];
$title = $_SESSION['titleNT'];
//$token = $_SESSION['tokenNT'];
$email = $_SESSION['emailNT'];

$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
$server_key = "ENTER YOUR SERVER KEY";
define( 'API_ACCESS_KEY', 'ENTER YOUR API KEY');

	$resultA = mysqli_query($con, "SELECT * FROM api_key WHERE email = '" .$email. "' ");
		if ($resultA->num_rows > 0) {
			while($rowA = $resultA->fetch_assoc()) { 
				$token = $rowA["hash"];


$result = mysqli_query($con,"SELECT * FROM api_key WHERE hash = '".$token."' ");
if($result) {
	$row = $result->fetch_assoc();
	$name = $row["name"];
	$email = $row["email"];
	$resultSub = mysqli_query($con, "INSERT INTO user_notify(name,email,hash,title,content) VALUES('".$name."','".$email."','".$token."','".$title."','".$message."') ");
}



	$fields = array
			(
				'to'		=> $token,
				'notification'	=> array('title'=>$title,'body'=>$message,'sound'=>"default",'color'=>"#800080")
				
			);
	
	
	$headers = array
			(
				'Authorization: key=' . $server_key,
				'Content-Type: application/json'
			);
			
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		echo $result;
		curl_close( $ch );
		
			}
		} else {
			
			$headers = 'From: notification@mindwebs.org';
			$headers.= 'Reply-To: dipanroy@mindwebs.org';
		
	mail($email, $title, $message, $headers);
		
			
		}
		

//DELETE VARIABLES		
unset($_SESSION['messageNT']);
unset($_SESSION['titleNT']);
//unset($_SESSION['tokenNT']);
unset($_SESSION['emailNT']);
?>

<script>
	window.history.go(-1);
</script>
<?php
//END OF FILE
?>