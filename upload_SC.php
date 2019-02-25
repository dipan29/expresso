<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

include_once 'dbconnect.php';

if(isset($_SESSION['usr_type'])!="W") {
	if(isset($_SESSION['usr_type'])!="A") {
		header("Location: index.php");
		
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

if (isset($_POST['upload'])) {
	$admin = $_SESSION['usr_name'];
	$pid = mysqli_real_escape_string($con, $_POST['type']);
	$content = mysqli_real_escape_string($con, $_POST['content']);
	$vis = mysqli_real_escape_string($con, $_POST['vis']);
	
	$result = mysqli_query($con, "SELECT * FROM facebook WHERE url = '" .$content."'  ");
	if ($result->num_rows > 0) {
		$errormsg = "Same entry already exists. Try Next Record";
		} else {

	if(mysqli_query($con,"Insert Into facebook (pid, url,view,email) VALUES ('" .$pid. "', '" .$content. "', '" .$vis. "', '" .$admin. "') ")) {
		$successmsg = "Link Created Successfully ";
	} else {
		$errormsg = "Could Not Update Database...";
	}
	
    }
	

}

if (isset($_POST['delete'])) {
	$id = mysqli_real_escape_string($con, $_POST['del_id']);
	if(mysqli_query($con,"DELETE FROM facebook WHERE id = '".$id."' ")) {
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
                    <li><a href="approve.php" class="external"><span>Approve Content</span></a></li>
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

	</section>

	
	
	<a name="uploadnow"</a>"
	<section id="fh5co-contact" data-section="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Expresso : SOCIAL CONNECT (Administrator Upload)</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>WELCOME <?php if (isset($_SESSION['usr_id'])) { echo $_SESSION['usr_name']; } ?>, Submit Any LINK Now</h3>
                            
						</div>
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-md">


				<div class="col-md-6 to-animate">
					<h3>Please Complete the Form Carefully</h3>
                    
               <form method="POST" name="uploadform_1" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">                     
					<div class="form-group ">
						<label for="name" class="sr-only">Administrator Name</label>
						<input id="name" name="admin_name" class="form-control" placeholder="Name" value="<?php if (isset($_SESSION['usr_id'])) { echo $_SESSION['usr_name']; } ?>" type="text" required disabled>
					</div>
					<div class="form-group ">
						<label for="email" class="sr-only">Email</label>
						<input id="email" name ="email" class="form-control" placeholder="Email (if any)" <?php if (isset($email)) { ?> value="<?php echo $email; ?>" disabled <?php } ?> type="email">
					</div>
					<div class="form-group ">
						<label for="type" class="sr-only">Type</label>
						Select Your PAGE: <br>
							<input type="radio" name="type" value="1" > MinD Webs
 							<input type="radio" name="type" value="2" checked> M-Diary 
 							<input type="radio" name="type" value="3" > Sports Updates  <br>
                            <input type="radio" name="type" value="4" > M-Science and Tech 
                            <input type="radio" name="type" value="4" > Indian Cricket Team... <br>
                    </div>
                    
                    <div class="form-group ">
						<label for="type" class="sr-only">Visibility</label>
						Visibility : <br>
							<input type="radio" name="vis" value="P" checked> Anyone Can See
 							<input type="radio" name="vis" value="R"> Registered Users Can Only See <br>
 					</div>
                   <span style="color:blue;"> The URL Copied Link will be somewhat like this : </span>
                    <br><h4>https://www.facebook.com/mindwebs/posts/<span style="color:red;">1370988886282768</span></h4>
                    <span style="color:blue;"> The URL Copied Link will be or somewhat like this : </span>
                    <br><h4>https://www.facebook.com/diaryofminds/photos/a.238117703261923.1073741828.238114276595599/<span style="color:red;">266335150440178</span>/?type=3</h4>
                   <span style="color:blue;"> Insert Only the Red Part Here in URL and delete the Rest</span>
                    
                    
					<div class="form-group ">
						<label for="message" class="sr-only">URL</label>
						<textarea name="content" id="message" cols="50" rows="5" class="form-control" required placeholder="Enter The Number from LINK Here (Only The RED PART)" required><?php if (isset($content)) { echo $content; }?></textarea>
					</div>                
					
					<div class="form-group ">
						<input class="btn btn-primary btn-lg" name = "upload" value="Link Content" type="submit">
					</div>
					
               </form>
               <?php if(isset($successmsg)) { 
			   		echo $successmsg ;
					
				 ?>
				<?php 	
			   
			   } else if(isset($errormsg)) { echo $errormsg ; } ?>
               
               </div>
               
				<div class="col-md-6 to-animate">
               
               <h3>Delete Any content If you are sure of the ID</h3>
               
               <form method="POST" name="deleteform" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                
                <div class="form-group ">
						<label for="name" class="sr-only">Delete By Id </label>
						<input id="name" name="del_id" class="form-control" placeholder="ID" type="text" required>
                </div>
                <div class="form-group ">
						<input class="btn btn-primary btn-lg" name = "delete" value="Delete Link" disabled type="submit">
					</div>
                
                </form>
                <br>
                <?php if(isset($sm)) { 
			   		echo $sm ;
				}
				 ?>
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

