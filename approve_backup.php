<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

$myemail = 'no-reply@mindwebs.org';

include_once 'dbconnect.php';

if((isset($_SESSION['usr_type'])) != "W"){
	if((isset($_SESSION['usr_type'])) != "A") {
		header("Location:index.php");
	}
}

if(isset($_SESSION['temp_seq_qns'])) {
	unset($_SESSION['temp_email']);
	unset($_SESSION['temp_seq_qns']);
}

if (isset($_POST['approve'])) {
	$id = mysqli_real_escape_string($con, $_POST['id']);
	if(mysqli_query($con, "UPDATE post_blog SET published = 'Y' WHERE id = '" .$id. "' AND Published = 'N' ")) {
		$successmsg = "Approval Done!!! Please Close the Page";
			$resultA = mysqli_query($con, "SELECT * FROM post_blog WHERE id = '" .$id. "' ");
			if ($resultA->num_rows > 0) {
				while($rowA = $resultA->fetch_assoc()) { 
					$email = $rowA["email"];
				}
				
					$to = $email; 
					$email_subject = "Expresso : Content submission";
					$email_body = "Thank You For Your Submission. \n".
					"Your Submission Has been Approved By our Admins.\nPlease Check it at : http://expresso.mindwebs.org/blog_view.php?var=$id "; 
	
					$headers = "From: $myemail\n"; 
					$headers .= "Reply-To: administrator@mindwebs.org";
	
					mail($to,$email_subject,$email_body,$headers);
				
			}
	} else {
		$errormsg = "Could Not Approve The Same, Please Verify and Try Again!!!";
	}
}

if (isset($_POST['upload'])) {
	$id = mysqli_real_escape_string($con, $_POST['id']);
	if(mysqli_query($con, "UPDATE post_blog SET Uploaded = 'Y' WHERE id = '" .$id. "' AND Uploaded = 'N' ")) {
		$successmsg = "Marked Uploaded!!! Please Close the Page";
	} else {
		$errormsg = "Could Not Mark The Same as Uploaded, Please Verify and Try Again!!!";
	}
}

if (isset($_POST['img_approve'])) {
	$id = mysqli_real_escape_string($con, $_POST['id']);
	if(mysqli_query($con, "UPDATE upload_img SET published = 'Y' WHERE id = '" .$id. "' AND Published = 'N' ")) {
		$successmsg = "Approval Done!!! Please Close the Page";
			$resultB = mysqli_query($con, "SELECT * FROM upload_img WHERE id = '" .$id. "' ");
			if ($resultB->num_rows > 0) {
				while($rowB = $resultB->fetch_assoc()) { 
					$emailB = $rowB["email"];
				}
				
					$to = $emailB; 
					
					$contentAct = $_SESSION['usr_email']." Approved Content of : ".$emailB ." At : ". $timeNow;
					$resultAct = mysqli_query($con,"INSERT INTO activity(type,email,content,time) VALUES('Approval', '".$email."', '".$contentAct."', '".$timeNow."') ");
					
					$email_subject = "Expresso : Content submission";
					$email_body = "Thank You For Your Image Submission. \n".
					"Your Submission Has been Approved By our Admins.\nPlease Check it at : http://expresso.mindwebs.org/gallery_n.php "; 
	
					$headers = "From: $myemail\n"; 
					$headers .= "Reply-To: administrator@mindwebs.org";
	
					mail($to,$email_subject,$email_body,$headers);
				
			}
	} else {
		$errormsg = "Could Not Approve The Same, Please Verify and Try Again!!!";
	}
}

if (isset($_POST['img_delete'])) {
	$id = mysqli_real_escape_string($con, $_POST['id']);
	if(mysqli_query($con, "UPDATE upload_img SET published = 'D' WHERE id = '" .$id. "' AND Published = 'Y' ")) {
		$successmsg = "Removal Done!!! Please Close the Page";
	} else {
		$errormsg = "Could Not Remove The Same, Please Verify and Try Again!!!";
	}
}

if (isset($_POST['post_delete'])) {
	$id = mysqli_real_escape_string($con, $_POST['id']);
	if(mysqli_query($con, "UPDATE post_blog SET published = 'D' WHERE id = '" .$id. "' AND Published = 'Y' ")) {
		$successmsg = "Removal Done!!! Please Close the Page";
	} else {
		$errormsg = "Could Not Remove The Same, Please Verify and Try Again!!!";
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
	<meta property="og:title" content="Expresso | MinD Webs"/>
	<meta property="og:image" content="http://expresso.mindwebs.org/favicon.png"/>
	<meta property="og:image:type" content="image/png" /> 
	<meta property="og:url" content="http://expresso.mindwebs.org/"/>
	<meta property="og:site_name" content="Expresso"/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="http://expresso.mindwebs.org/images/display_1.jpg" />
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
		            <li ><a href="index.php" class="external" ><span>Home</span></a></li>
		            <?php if (isset($_SESSION['usr_id'])) { 
		            } else {?>
		            <li ><a href="login.php#registernow" class="external" ><span>Login</span></a></li>
		            <li><a href="login.php#registernow" class="external"><span>Register</span></a></li>
		            <?php } ?>
                    <li><a href="#" class = "active" data-nav-section="home"><span>Admin Panel</span></a></li>
		            <li><a href="submit.php#submitnow" class="external"><span>Submit Content</span></a></li>
                    <?php if (isset($_SESSION['usr_id'])) { ?> <li><a href="logout.php" class="external"><span>Logout</span></a></li>
					<?php } ?>
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
							<h1 class="to-animate" >Expresso</h1> 
                            <h1 class="to-animate" style="font-size:32px !important">Administrator Approval</h1>                           
                            <h2 class="to-animate">WELCOME <?php if (isset($_SESSION['usr_id'])) { echo $_SESSION['usr_name']; } ?></h2>
                            
                            <?php if (isset($_SESSION['usr_id'])) { ?> 
                            <h2 class="to-animate"><a href="submit_user.php" target="_blank">Want To POST Something. Please Do it Here</a></h2>
                            <?php } ?>
                            <?php if(isset($successmsg)) { echo $successmsg; }  else { if(isset($errormsg)) { echo $errormsg; } } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="slant"></div>
	</section>
<!--
	<section id="fh5co-intro">
		<div class="container">
			<div class="row row-bottom-padded-lg">

               
				<div class="fh5co-block to-animate" style="background-image: url(images/img_8.jpg);">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-wrench"></i>
						<h2>Develop</h2>
						<p>Are You a Developer? We are recruiting new budding talents</p>
						<p><a href="signup.php" class="btn btn-primary">Get In Touch</a></p>
					</div>
				</div>
                
                <div class="fh5co-block to-animate" style="background-image: url(images/img_7.jpg);">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-bulb"></i>
						<h2>Submit Content</h2>
						<p>Share Your Thoughts, Let Others Perceive Thenm</p>
						<p><a href="submit_user.php" class="btn btn-primary">Submit Now</a></p>
					</div>
				</div>
                
				<div class="fh5co-block to-animate" style="background-image: url(images/img_10.jpg);">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-rocket"></i>
						<h2>Become an Affilate</h2>
						<p>Join our Expert Team. Market yourself with us. Promote, Develop and Host with us</p>
						<p><a href="signup.php" class="btn btn-primary">Sign Up Now</a></p>
					</div>
				</div>
                
			</div>
			
		</div>
	</section>
  -->
<a name="display"></a>
	<section id="fh5co-work" data-section="work">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">The Entire List</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Unapproved Submissions.</h3>
                            
						</div>
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-sm">
            
 <div class="row">
		<div class="col-md-12 text-center to-animate">
				USER UPLOADED IMAGE	PENDING
		</div>
</div>            
            <?php
					
					$resultC = mysqli_query($con, "SELECT * FROM upload_img WHERE published='N' ORDER BY id DESC ");
					if ($resultC->num_rows > 0) {
					while($rowC = $resultC->fetch_assoc()) { ?>
                    <div class="col-md-4 col-sm-6 col-xxs-12">	  
                    		<a href="<?php echo "uploads/" . $rowC["image"] ; ?>" class="fh5co-project-item image-popup to-animate">
							<img src="<?php echo "uploads/" . $rowC["image"] ; ?>" alt="Image" class="img-responsive">
							
                            <div class="fh5co-text">
								<h2><?php echo $rowC["subject"] ; ?></h2>
								<span><?php echo $rowC["user"] ; ?></span>
								<?php if((isset($_SESSION['usr_id']))!="") {
									if((($_SESSION['usr_type'])=="W") || (($_SESSION['usr_type'])=="A")) { ?>										
										<br>
										<span>ID : <?php echo $rowC["id"] ; ?> (USER UPLOADED)</span>
									<?php } 
									} ?>
								</div>
                            </a>
                     </div>
					<?php } 
				}  else {
					echo "No submission is pending approval";
				}
		?>    
 <div class="row">
		<div class="col-md-12 text-center to-animate">
				THE BLOG PENDING UPLOADS	
		</div>
</div>
            
    			<?php
					
					$result = mysqli_query($con, "SELECT * FROM post_blog WHERE Published = 'N' ORDER BY id DESC ");
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) { ?>
                    <div class="col-md-4 col-sm-6 col-xxs-12">	  
                    		<a href="<?php echo "blog_view.php?var=" . $row["id"] ; ?>" class="fh5co-project-item to-animate">   <!-- Check This Part Link -->
                            <div class="fh5co-text">
								<h2><?php echo $row["subject"] ; ?> <strong>By <?php echo $row["name"] ; ?></strong></h2>
								<span><?php echo $row["tagline"] ; ?></span><br>
                                <span>Filled Under : <strong><?php echo $row["type"] ; ?></strong></span>
								<?php if((isset($_SESSION['usr_id']))!="") {
									if((($_SESSION['usr_type'])=="W") || (($_SESSION['usr_type'])=="A")) { ?>										
										<br>
										<span>ID : <?php echo $row["id"] ; ?></span>
									<?php } 
									} ?>
								</div>
                            </a>
                     </div>
					<?php } 
				}  else {
					echo "No submission is pending approval";
				} 
			?>
                                
			</div>
            
            
                        <div class="row row-bottom-padded-sm">
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="approveform">
					<div class="form-group ">
						<label for="id" class="sr-only">Id</label>
						<input id="name" style="background-color : #fff !important" name="id" class="form-control" placeholder="Enter Correct ID" type="text" required>
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="approve" value="Approve Submission" type="submit"> FOR POST ONLY
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="upload" value="Mark As Uploaded" type="submit"> FOR POST ONLY
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="img_approve" value="Approve Image Submission" type="submit"> FOR IMAGE ONLY
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="post_delete" value="DELETE Approved Submission" type="submit"> FOR POST ONLY
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="img_delete" value="DELETE Approved Submission" type="submit"> FOR IMAGE ONLY
					</div>
            
            	</form>
                
            </div>
            
            
			<div class="row">
				<div class="col-md-12 text-center to-animate">
					
				</div>
			</div>
            
            <div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"> </h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Submissions Not Uploaded to FACEBOOK</h3>
                            
						</div>
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-sm">
    			<?php
					
					$result = mysqli_query($con, "SELECT * FROM post_blog WHERE Uploaded = 'N' ORDER BY id DESC ");
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) { ?>
                    <div class="col-md-4 col-sm-6 col-xxs-12">	  
                    		<a href="<?php echo "blog_view.php?var=" . $row["id"] ; ?>" class="fh5co-project-item to-animate">   <!-- Check This Part Link -->
                            <div class="fh5co-text">
								<h2><?php echo $row["subject"] ; ?> <strong>By <?php echo $row["name"] ; ?></strong></h2>
								<span><?php echo $row["tagline"] ; ?></span><br>
                                <span>Filled Under : <strong><?php echo $row["type"] ; ?></strong></span>
								<?php if((isset($_SESSION['usr_id']))!="") {
									if((($_SESSION['usr_type'])=="W") || (($_SESSION['usr_type'])=="A")) { ?>										
										<br>
										<span>ID : <?php echo $row["id"] ; ?></span>
									<?php } 
									} ?>
								</div>
                            </a>
                     </div>
					<?php } 
				} 
			?>

                
			</div>
            
            
            <div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"> </h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Approved Submissions.</h3>
                            
						</div>
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-sm">
            
    			<?php
					
					$result = mysqli_query($con, "SELECT * FROM post_blog WHERE Published = 'Y' ORDER BY id DESC ");
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) { ?>
                    <div class="col-md-4 col-sm-6 col-xxs-12">	  
                    		<a href="<?php echo "blog_view.php?var=" . $row["id"] ; ?>" class="fh5co-project-item to-animate">   <!-- Check This Part Link -->
                            <div class="fh5co-text">
								<h2><?php echo $row["subject"] ; ?> <strong>By <?php echo $row["name"] ; ?></strong></h2>
								<span><?php echo $row["tagline"] ; ?></span><br>
                                <span>Filled Under : <strong><?php echo $row["type"] ; ?></strong></span>
								<?php if((isset($_SESSION['usr_id']))!="") {
									if((($_SESSION['usr_type'])=="W") || (($_SESSION['usr_type'])=="A")) { ?>										
										<br>
										<span>ID : <?php echo $row["id"] ; ?></span>
									<?php } 
									} ?>
								</div>
                            </a>
                     </div>
					<?php } 
				} 
			?>

                
			</div>
            <div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate"> </h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Approved IMAGE Submissions.</h3>
                            
						</div>
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-sm">
            
             <?php
					
					$resultD = mysqli_query($con, "SELECT * FROM upload_img WHERE published='Y' ORDER BY id DESC ");
					if ($resultD->num_rows > 0) {
					while($rowD = $resultD->fetch_assoc()) { ?>
                    <div class="col-md-4 col-sm-6 col-xxs-12">	  
                    		<a href="<?php echo "uploads/" . $rowD["image"] ; ?>" class="fh5co-project-item image-popup to-animate">
							<img src="<?php echo "uploads/" . $rowD["image"] ; ?>" alt="Image" class="img-responsive">
							
                            <div class="fh5co-text">
								<h2><?php echo $rowD["subject"] ; ?></h2>
								<span><?php echo $rowD["user"] ; ?></span>
								<?php if((isset($_SESSION['usr_id']))!="") {
									if((($_SESSION['usr_type'])=="W") || (($_SESSION['usr_type'])=="A")) { ?>										
										<br>
										<span>ID : <?php echo $rowD["id"] ; ?> (USER UPLOADED)</span>
									<?php } 
									} ?>
								</div>
                            </a>
                     </div>
					<?php } 
				}  else {
					echo "No submission done yet";
				}
		?>    
            </div>
            
            
            <div class="row row-bottom-padded-sm">
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="approveform">
					<div class="form-group ">
						<label for="id" class="sr-only">Id</label>
						<input id="name" style="background-color : #fff !important" name="id" class="form-control" placeholder="Enter Correct ID" type="text" required>
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="approve" value="Approve Submission" type="submit"> FOR POST ONLY
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="upload" value="Mark As Uploaded" type="submit"> FOR POST ONLY
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="img_approve" value="Approve Image Submission" type="submit"> FOR IMAGE ONLY
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="post_delete" value="DELETE Approved Submission" type="submit"> FOR POST ONLY
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="img_delete" value="DELETE Approved Submission" type="submit"> FOR IMAGE ONLY
					</div>
            
            	</form>
                <?php if(isset($successmsg)) { echo $successmsg; }  else { if(isset($errormsg)) { echo $errormsg; } } ?>
            </div>
            
		</div>
	</section>


<!--	
	<section id="fh5co-about" data-section="about">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">About US</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Our Team</h3>
                            <h3>Check Our Entire Team <a href="team.php#show" target="_blank">Here</a></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="images/person1.jpg" alt="Image"></figure>
						<h3>Dipan Roy</h3>
						<span class="fh5co-position">Founder and Managing Director</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://twitter.com/mind_webs" target="_blank"><i class="icon-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="icon-facebook"></i></a></li>
							
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="images/person2.jpg" alt="Image"></figure>
						<h3>Rituraj Banerjee</h3>
						<span class="fh5co-position">Web and Graphics Designer</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/rituraj.banerjee.3" target="_blank"><i class="icon-facebook"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="images/person3.jpg" alt="Image"></figure>
						<h3>Koushili Das</h3>
						<span class="fh5co-position">Senior Editor</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/koushili.das.79" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
                
			</div>
            
        </div>
        
	</section>
	
-->	
	
	
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
	
	
	<!-- For demo purposes Only ( You may delete this anytime :-) -->
	<div id="colour-variations">
		<a class="option-toggle"><i class="icon-gear"></i></a>
		<h3>Change THEME</h3>
		<ul>
			<li>
				<a href="javascript: void(0);" data-theme="style">
					<span style="background: #3f95ea;"></span>
					<span style="background: #52d3aa;"></span>
					<span style="background: #f2f2f2;"></span>
				</a>
			</li>
			<li>
				<a href="javascript: void(0);" data-theme="style2">
					<span style="background: #329998;"></span>
					<span style="background: #6cc99c;"></span>
					<span style="background: #f2f2f2;"></span>
				</a>
			</li>
			<li>
				<a href="javascript: void(0);" data-theme="style3">
					<span style="background: #9f466e;"></span>
					<span style="background: #c24d67;"></span>
					<span style="background: #f2f2f2;"></span>
				</a>
			</li>
			<li>
				<a href="javascript: void(0);" data-theme="style4">
					<span style="background: #21825C;"></span>
					<span style="background: #A4D792;"></span>
					<span style="background: #f2f2f2;"></span>
				</a>
			</li>
			
		</ul>
	</div>
	<!-- End demo purposes only -->

	
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

