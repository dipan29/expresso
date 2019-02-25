<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

include_once 'dbconnect.php';

$admin0 = 'dipanroy@mindwebs.org';
$admin1 = 'rituraj.banerjee@mindwebs.org';
$admin2 = 'asmita.chaudhuri@yahoo.com';
$admin3 = 'niprojitghosh09@gmail.com';

if(isset($_SESSION['usr_type'])!="W") {
	if(isset($_SESSION['usr_type'])!="A") {
		
	} else {
		header("Location: upload.php");
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
	$user = $_SESSION['usr_name'];
	$email = $_SESSION['usr_email'];
	$head = mysqli_real_escape_string($con, $_POST['heading']);
	$content = mysqli_real_escape_string($con, $_POST['content']);
	$view = mysqli_real_escape_string($con, $_POST['vis']);
	
	$img_name = "img_";
	$img_name .= $pass_new;
	
	$image = $_FILES['image']['name'];
	
	$temp = explode(".", $_FILES["image"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	
	$target = "uploads/".basename($_FILES['image']['name']);
	
	
	if(mysqli_query($con,"Insert Into upload_img (image, text,user,email,subject,content,view,date) VALUES ('$newfilename', '$img_name','".$user."','".$email."','".$head."','".$content."','".$view."','".$timeNow."') ")) {
		if(move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $newfilename)) {
			
				
				$email_subject = "IMAGE submission: $user";
				$email_body = "You have received a new IMAGE content. \n".
							"\n\nPlease Open Your Admin Panel To Approve the content"; 
	
				$headers = "From: administrator@mindwebs.org\n"; 
				$headers .= "Reply-To: $email";
	
				$headers2 = "From: no-reply@mindwebs.org\n"; 
				$headers2 .= "Reply-To: $email";
	
	
				mail($admin0,$email_subject,$email_body,$headers2);
				mail($admin1,$email_subject,$email_body,$headers2);
				mail($admin2,$email_subject,$email_body,$headers2);
				mail($admin3,$email_subject,$email_body,$headers2);
				
				$contentAct = $_SESSION['usr_name']." Submitted Image At : ". $timeNow;
				$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('Image', '".$_SESSION['usr_email']."', '".$contentAct."', '".$timeNow."') ");
		
			$successmsg = "Image (".$image.") Uploaded Successfully!!!";	

			
		} else {
			$errormsg = "Could not upload file...";
		}			
	} else {
		$errormsg = "Could Not Upload Database...";
	}
	

}

if (isset($_POST['delete'])) {
	$id = mysqli_real_escape_string($con, $_POST['del_id']);
	if(mysqli_query($con,"DELETE FROM image WHERE id = '".$id."' ")) {
		$sm = "Work Executed Successfully!!!";
	} else {
		$sm = "Some Error Occured...Try Again";
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
	<link rel="shortcut icon" href="favicon.png">

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
			    <?php if (isset($_SESSION['usr_id'])) { 
		            } else {?>
		            <li ><a href="login.php#registernow" class="external" ><span>Login</span></a></li>
		            <li><a href="login.php#registernow" class="external"><span>Register</span></a></li>
		            <?php } ?>
                    
		            <li><a href="#" class="active" data-nav-section="home"><span>Upload Content</span></a></li>
                    <?php if (isset($_SESSION['usr_id'])) { ?> <li><a href="logout.php" class="external"><span>Logout</span></a></li>
					<?php } ?>
		          </ul>
		        </div>
			    </nav>
			  <!-- </div> -->
		  </div>
	</header>

	<section id="fh5co-work" data-section="work">
		<h1 class="to-animate text-center">WELCOME <?php if (isset($_SESSION['usr_id'])) { echo $_SESSION['usr_name']; } ?>, Post Your Images Now</h2>
	</section>

	
	
	<a name="uploadnow"</a>
	<section id="fh5co-contact" data-section="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
 
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Fill Up the Form to submit to us.</h3>
                            <h4>Your Post will be displayed as soon any of our admins approve it.</h4>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-md">


				<div class="col-md-12 to-animate">
					
                    
               <form method="POST" name="uploadform_1" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">                     
					<div class="form-group ">
						<label for="name" class="sr-only">User Name</label>
						<input id="name" name="admin_name" class="form-control" placeholder="Name" value="<?php if (isset($_SESSION['usr_id'])) { echo $_SESSION['usr_name']; } ?>" type="text" required disabled>
					</div>
					<div class="form-group ">
						<label for="email" class="sr-only">Email</label>
						<input id="email" name ="email" class="form-control" placeholder="Email (if any)" <?php if (isset($_SESSION['usr_email'])) { ?> value="<?php echo $_SESSION['usr_email']; ?>" disabled <?php } ?> type="email">
					</div>
					<div class="form-group ">
						<label for="type" class="sr-only">Type</label>
						Select Your Content Type : <br>
							<input type="radio" name="type" value="Image" checked> Image (Default)
 							<input type="radio" name="type" value="Poem" disabled> Poem 
 							<input type="radio" name="type" value="Story" disabled> Story  
                            <input type="radio" name="type" value="Quote" disabled> Quote <br>
                    </div>
                    
                    <div class="form-group ">
						<label for="type" class="sr-only">Visibility</label>
						Visibility : <br>
							<input type="radio" name="vis" value="P" checked> Anyone Can See
 							<input type="radio" name="vis" value="R"> Registered Users Can Only See <br>
 					</div>
                    
                    <div class="form-group ">
						<label for="subject" class="sr-only">Heading</label>
						<input id="email" name ="heading" class="form-control" placeholder="Heading/Tagline"  type="text" required>
					</div>
                    
					<div class="form-group ">
						<label for="message" class="sr-only">Content Paragraph</label>
						<textarea name="content" id="message" cols="50" rows="5" class="form-control" placeholder="Content Paragraph. Please Newline and Punctuation Properly... Atleast Enter Picture Details Here" required><?php if (isset($content)) { echo $content; }?></textarea>
					</div>                
					
                    <div class="form-group ">
						<label for="image" class="sr-only">Image File</label>
                    	<input type="file" name="image" id="image" >
					</div>
					<div class="form-group ">
						<input class="btn btn-primary btn-lg" name = "upload_image" value="Upload Image" type="submit">
					</div>
					
               </form>
               <?php if(isset($successmsg)) { 
			   		echo $successmsg ;
					
				 ?>
				<?php 	
			   
			   } else if(isset($errormsg)) { echo $errormsg ; } ?>
               
               </div>

                    
			</div>
            
            <div class="row row-bottom-padded-sm">
                
                <div class="col-md-6 to-animate">
					<h3>Some Important Links and Details</h3>
					<ul class="fh5co-contact-info">
					<!--<li class="fh5co-contact-address ">
							<i class="icon-home"></i>
							Kolkata, West Bengal<br>India
						</li>-->
						<!--<li><i class="icon-phone"></i>  </li>-->
						<li><i class="icon-envelope"></i>mindwebsteam@gmail.com</li>
						<li><i class="icon-globe"></i> <a href="https://www.facebook.com/diaryofminds" target="_blank">M - Diary</a></li>
					</ul>
                </div>
				<div class="col-md-6 to-animate">	
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- Expresso AD UNIT 1 -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-4836172599025695"
                                 data-ad-slot="6487656690"
                                 data-ad-format="auto"></ins>
							<script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>					
					
				</div>
                    
			</div>
            
            <div class="row row-bottom-padded-md">
            	<div class="col-md-12 text-center">
                	<div class="col-md-6 text-center">
                	<a href="submit_user.php"><input class="btn btn-primary btn-lg" value="Content Upload"></a>
                    </div>
                    <div class="col-md-6 text-center">
                	<a href="submit_blog.php"><input class="btn btn-info btn-lg" value="Blog Posts"></a>
                    </div>
                    
            	</div>
            </div>
		</div>
		
	</section>
    
    
            	


    
    
    
	<footer id="footer" role="contentinfo">
    	<a href="#" class="gotop js-gotop"><i class="icon-arrow-up2"></i></a>
		<div class="container">
			<div class="">
				<div class="col-md-12 text-center">
                <?php if (isset($_SESSION['usr_id'])) { ?>
    			<p>Last Sucessful Login :  <?php echo $_SESSION['usr_time'];  ?></p>
                <?php } ?>
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

