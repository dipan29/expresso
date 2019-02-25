<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

include_once 'dbconnect.php';


if (isset($_GET['var']))
{
	$id = $_GET['var'];
	$result = mysqli_query($con,"UPDATE user_notify SET seen = 'Y' WHERE id = '".$id."' ");
	if($result) { ?>
		<script>
			window.history.go(-1);
		</script>
	<?php }
} else {
	$result = mysqli_query($con,"UPDATE user_notify SET seen = 'Y' WHERE email = '".$_SESSION['usr_email']."' ");
	if($result) { ?>
		<script>
			window.history.go(-2);
		</script>
	<?php }
}
?>