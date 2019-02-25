<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

if(isset($_SESSION['usr_id'])!="") {
	header("Location: login.php");
}
$seq_qns = "";
$email_address = 'mindwebsteam@gmail.com';
include_once 'dbconnect.php';

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

if (isset($_POST['get'])) {
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' ");
			if ($row = mysqli_fetch_array($result)) {
				$_SESSION['temp_seq_qns'] = $row['seq_qns'];
				$_SESSION['temp_email'] = $email;
				header("Location: forgetpass.php#forget_pass");
			}
}

if (isset($_POST['change'])) {
	$seq_ans = mysqli_real_escape_string($con, $_POST['seq_ans']);
	$dob = mysqli_real_escape_string($con, $_POST['dob']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and seq_ans = '" . $seq_ans. "' and dob = '" . $dob. "' " );
	if($result) {
		if(mysqli_query($con, "UPDATE users SET password = '" . md5($pass_new) . "' WHERE email = '" . $email. "'"))   	{
			$successmsg = "Check your email for further procedure";
			
			$to = $email; 
			$contentAct = $to." Requested Password Change At : ". $timeNow;
			$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('User Password Change', '".$to."', '".$contentAct."', '".$timeNow."') ");
			$email_subject = "Change of Password at MinD Webs (mindwebs.org)";
			$email_body = "You have requested for an password change\nHere is a new password. Use this to get access to your account and change your password.\n New Temporary Password : $pass_new \n\nThis is valid for 24 Hours. So act fast.\nIf you did not request password change, please mail us to let us know. But still we would recomend you to go to your profile using this password and change it\n\n Thank you \nMinD Webs Team"; 
	
			$headers = "From: administrator@mindwebs.org\n"; 
			$headers .= "Reply-To: $email_address";
			
			mail($to,$email_subject,$email_body,$headers);
			
			unset($_SESSION['temp_email']);
			unset($_SESSION['temp_seq_qns']);
			
			} else {
				$errormsg = "Please Try again Later!!!!";
			}
	
	} else {
		$errormsg = "Mismatch Of Details...";
	}

}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Expresso &mdash; MinD Webs </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Welcome to The New Site of MinD Webs, Created By Dipan Roy" />
	<meta name="keywords" content="mindwebs, mind webs, m-diary, m diary, dipanroy, dipan roy" />
	<meta name="author" content="Dipan Roy" />


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- 
	Default Theme Style 
	You can change the style.css (default color purple) to one of these styles
	
	1. pink.css
	2. blue.css
	3. turquoise.css
	4. orange.css
	5. lightblue.css
	6. brown.css
	7. green.css

	-->
	<link rel="stylesheet" href="css/style.css">

	<!-- Styleswitcher ( This style is for demo purposes only, you may delete this anytime. ) -->
	<link rel="stylesheet" id="theme-switch" href="css/style.css">
	<!-- End demo purposes only -->


	<style>
	/* For demo purpose only */
	
	/* For Demo Purposes Only ( You can delete this anytime :-) */
	#colour-variations {
		padding: 10px;
		-webkit-transition: 0.5s;
	  	-o-transition: 0.5s;
	  	transition: 0.5s;
		width: 140px;
		position: fixed;
		left: 0;
		top: 100px;
		z-index: 999999;
		background: #fff;
		/*border-radius: 4px;*/
		border-top-right-radius: 4px;
		border-bottom-right-radius: 4px;
		-webkit-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-moz-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-ms-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
	}
	#colour-variations.sleep {
		margin-left: -140px;
	}
	#colour-variations h3 {
		text-align: center;;
		font-size: 11px;
		letter-spacing: 2px;
		text-transform: uppercase;
		color: #777;
		margin: 0 0 10px 0;
		padding: 0;;
	}
	#colour-variations ul,
	#colour-variations ul li {
		padding: 0;
		margin: 0;
	}
	#colour-variations li {
		list-style: none;
		display: block;
		margin-bottom: 5px!important;
		float: left;
		width: 100%;
	}
	#colour-variations li a {
		width: 100%;
		position: relative;
		display: block;
		overflow: hidden;
		-webkit-border-radius: 4px;
		-moz-border-radius: 4px;
		-ms-border-radius: 4px;
		border-radius: 4px;
		-webkit-transition: 0.4s;
		-o-transition: 0.4s;
		transition: 0.4s;
	}
	#colour-variations li a:hover {
	  	opacity: .9;
	}
	#colour-variations li a > span {
		width: 33.33%;
		height: 20px;
		float: left;
		display: -moz-inline-stack;
		display: inline-block;
		zoom: 1;
		*display: inline;
	}
	

	.option-toggle {
		position: absolute;
		right: 0;
		top: 0;
		margin-top: 5px;
		margin-right: -30px;
		width: 30px;
		height: 30px;
		background: #f64662;
		text-align: center;
		border-top-right-radius: 4px;
		border-bottom-right-radius: 4px;
		color: #fff;
		cursor: pointer;
		-webkit-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-moz-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		-ms-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
		box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
	}
	.option-toggle i {
		top: 2px;
		position: relative;
	}
	.option-toggle:hover, .option-toggle:focus, .option-toggle:active {
		color:  #fff;
		text-decoration: none;
		outline: none;
	}
	</style>
	<!-- End demo purposes only -->


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>

<body>

<header role="banner" id="fh5co-header">
			<div class="container">
				<!-- <div class="row"> -->
			    <nav class="navbar navbar-default">
		        <div class="navbar-header">
		        	<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		         <a class="navbar-brand" href="index.php">Expresso | MinD Webs</a> 
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          <ul class="nav navbar-nav navbar-right">
		            <li ><a href="index.php" class="external"><span>Home</span></a></li>
		            <li class="active"><a href="#" data-nav-section="home"><span>Reset Your Password</span></a></li>
		            <li><a href="submit.php" class="external"><span>Submit Anonymously</span></a></li>
		          </ul>
		        </div>
			    </nav>
			  <!-- </div> -->
		  </div>
	</header>
    
   <section id="fh5co-home" data-section="home" style="background-image: url(images/full_image_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="gradient"></div>
		<div class="container">
			<div class="text-wrap">
				<div class="text-inner">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							
                            <h1 class="to-animate">Reset Your Password</h1>
                            <a href="#loginnow"  data-nav-section="contact"><i class="icon-arrow-down"></i></a>
                            
                            
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="slant"></div>
	</section>
    
 <section id="fh5co-contact" data-section="contact">
		<div class="container">
			<div class="row">
			</div>
            
			<div class="row row-bottom-padded-md">      

                <a name="forget_pass"></a> 
                
				<div class="col-md-6 to-animate" >
					<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Change Password</h2>
					</div>
                    
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="getform">
					<div class="form-group ">
						<label for="email" class="sr-only">Email</label>
						<input id="email" name="email" class="form-control" placeholder="Email" value="<?php if(isset($_SESSION['temp_seq_qns'])) { echo $_SESSION['temp_email']; } ?>" type="email" required>
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="get" value="Get Security Question" type="submit">
					</div>
                </form>
                    
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="changeform">
                    
					<div class="form-group ">
                    Your Security Question. <br>
                    	<label for="password" class="sr-only">Your Security Question</label>
						<input id="phone" name="seq_qns" class="form-control" placeholder="Click on Get Security Question after placing email" value="<?php if(isset($_SESSION['temp_seq_qns'])) { echo $_SESSION['temp_seq_qns'];} ?>"    disabled type="text" >
					</div>
                    
                    <div class="form-group ">
						<label for="seq_ans" class="sr-only">Answer to Your Security Question</label>
						<input id="phone" name="seq_ans" class="form-control" placeholder="Answer to Your Security Question" type="password" required>
					</div>
                    
                    <div class="form-group ">
						<label for="dob" class="sr-only">Date of Birth</label>
						<input id="phone" name="dob" class="form-control" placeholder="Date of Birth (dd/mm/yyyy)" type="text" required>
					</div>

					<div class="form-group ">
						<input class="btn btn-primary btn-lg" name="change" value="Request For Change" type="submit">
					</div>
                    
                    <?php if(isset($successmsg)) { echo $successmsg;
							}  else {
								if(isset($errormsg)) { echo $errormsg;
								}
							}?>
                     
                 </form>
				</div>
                
			</div>
		</div>
	</section>

<footer id="footer" role="contentinfo">
		<a href="#" class="gotop js-gotop"><i class="icon-arrow-up2"></i></a>
		<div class="container">
			<div class="">
				<div class="col-md-12 text-center">
					<p>&copy; MinD Webs. All Rights Reserved. <br>Created by Dipan Roy and Team</a></p>
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="social social-circle">
						<li><a href="https://www.facebook.com/mindwebs" title="MinD Webs Facebook" target="_blank"><i class="icon-facebook"></i></a></li>
                        <li><a href="https://www.facebook.com/diaryofminds" title="M - Diary Facebook" target="_blank"><i class="icon-facebook"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Counter -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>

	<!-- For demo purposes only styleswitcher ( You may delete this anytime ) -->
	<script src="js/jquery.style.switcher.js"></script>
	<script>
		$(function(){
			$('#colour-variations ul').styleSwitcher({
				defaultThemeId: 'theme-switch',
				hasPreview: false,
				cookie: {
		          	expires: 30,
		          	isManagingLoad: true
		      	}
			});	
			$('.option-toggle').click(function() {
				$('#colour-variations').toggleClass('sleep');
			});
		});
	</script>
	<!-- End demo purposes only -->

	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>

	</body>
</html>