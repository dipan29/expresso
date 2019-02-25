<?php

include_once 'dbconnect.php';

session_start();

if(isset($_POST['submit'])) {

$Nmessage = mysqli_real_escape_string($con,	$_POST['message']);
$Ntitle = mysqli_real_escape_string($con, $_POST['title']);
$email = mysqli_real_escape_string($con, $_POST['email']);

/*	$resultA = mysqli_query($con, "SELECT * FROM api_key WHERE email = '" .$email. "' ");
		if ($resultA->num_rows > 0) {
			while($rowA = $resultA->fetch_assoc()) { 
	*/				
				$_SESSION['messageNT'] = $Nmessage;
				$_SESSION['titleNT'] = $Ntitle;
				$_SESSION['emailNT'] = $email;
				
				header("Location:send_notification.php");
	/*			
			}
		}
*/
}
?>

<html>

<body>
<form action-"<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table>
    	<tr>
        <td>Title : </td><td><input type="text" name="title"/></td>
        </tr>
        
        <tr>
        <td>Message : </td><td><input type="text" name="message"/></td>
        </tr>
        
        <tr>
        <td>Email : </td><td><input type="text" name="email"/></td>
        </tr>
        
        <td><input name =submit type="submit" value="Submit"/></td>
    </table>
</form>
</body>

</html>    