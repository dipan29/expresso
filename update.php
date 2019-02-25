<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

if(isset($_SESSION['usr_id'])=="") {
	header("Location: login.php");
}

include_once 'dbconnect.php';

//CATCH COOKIE SECTION//


if(isset($_COOKIE["messageCookie"])) {
	?>
    <script>
	window.alert("<?php echo $_COOKIE["messageCookie"] ; ?>");
    </script>
	<?php
	setcookie("messageCookie", "", time() - 120, '/');
}



/////////////////////////////////////////////////////////

/*
if (isset($_POST['update'])) {
	$email = $_SESSION['usr_email'];
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$gender = mysqli_real_escape_string($con, $_POST['gender']);
	$seq_ans = mysqli_real_escape_string($con, $_POST['seq_ans']);
	$conf_pass = mysqli_real_escape_string($con, $_POST['conf_pass']);
	$seq_qns= mysqli_real_escape_string($con, $_POST['seq_qns']);
	$dob = mysqli_real_escape_string($con, $_POST['dob']);
	$about = mysqli_real_escape_string($con, $_POST['about']);
	$fb = mysqli_real_escape_string($con, $_POST['fb']);
	$tw = mysqli_real_escape_string($con, $_POST['tw']);
	$inst = mysqli_real_escape_string($con, $_POST['inst']);
	
	
	if(mysqli_query($con, "UPDATE users SET updated_at = '".$timeNow."', phone = '" . $phone. "', about = '".$about."' , fa-facebook =  '" . $fb. "', fa-twitter = '" . $tw. "', fa-inst =  '" . $inst. "', gender = '" . $gender. "', dob= '" . $dob. "', seq_ans = '" . $seq_ans. "', seq_qns = '" . $seq_qns. "' WHERE email = '" . $email. "' and password = '" . md5($conf_pass) . "' ")){
			$successmsg = "Updated Sucessfully...\nYou are now Logged Out, Please Login Again";
			session_destroy();
				unset($_SESSION['usr_id']);
				unset($_SESSION['usr_name']);
				unset($_SESSION['temp']);
				unset($_SESSION['usr_time']);
				unset($_SESSION['usr_email']);
				unset($_SESSION['usr_phone']);
				unset($_SESSION['usr_gender']);
				unset($_SESSION['usr_dob']);
				unset($_SESSION['seq_qns']);
				unset($_SESSION['seq_ans']);
			header("Location: login.php");
	} else {
			$errormsg = "Could Not Update File...Please Try Again Later";
	}
} else {
	$errormsg = "Get method not working...";
}
*/


if (isset($_POST['upload_image'])) {
	
	echo '<script type="text/javascript">alert("If You Have Upload a NON-SQUARE IMAGE,\nThen please upload a SQUARE IMAGE again, \nElse The Profile would look bad, as Our Servers does not support Auto-Cropping")</script>';
		
	$target = "uploads/profile/".basename($_FILES['image']['name']);
	
	$image = $_FILES['image']['name'];
	if(mysqli_query($con,"Update users SET profile_img = '$image' WHERE id = '" . $_SESSION['usr_id']. "' ")) {
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		
			$isuccessmsg = "Image (".$image.") Uploaded Successfully!!!";	
			header("Location:home.php");

			
		} else {
			$ierrormsg = "Could not upload file...";
		}			
	} else {
		$ierrormsg = "Could Not Upload Database...";
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
		            <li class="active"><a href="#" data-nav-section="contact"><span>Update User Profile</span></a></li>
                    <li><a href="<?php echo "user.php?var=" . $_SESSION['usr_id'] ; ?>" class="external"><span>View Your Profile</span></a></li>
		            <li><a href="submit.php" class="external"><span>Submit Your Content</span></a></li>
		          </ul>
		        </div>
			    </nav>
			  <!-- </div> -->
		  </div>
	</header>
    
   <section id="fh5co-work" data-section="work">

	</section>
    
 <section id="fh5co-contact" data-section="contact">
		<div class="container">
			<div class="row">
            
			</div>
            
			<div class="row row-bottom-padded-md">
          		

       <a name="updateuser"></a>
				<div class="col-md-6 to-animate">
                
					<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Update Your Profile</h2>
                    
					</div>
                <form role="form" action="updateDetails.php" method="post" name="updateform">
                	<?php
					$userQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '".$_SESSION['usr_email']."' ");
					$user_row = $userQuery->fetch_assoc();
										
					?>      
                	<div class="form-group ">
                    Select Your <a style="text-decoration:none">@EXPRESSO</a> Username 
						<!--<label for="uname" class="sr-only">User Name or Profile Name</label>-->
						<input id="uname" name = "uname" class="form-control" onkeyup="nospaces(this)" onkeydown ="changeSpan(this)" autocomplete="off" placeholder="Create a User Name" value="<?php echo $user_row['username'] ; ?>" type="text" required >
                    Your Profile Link : <a style="text-decoration:none">http://expresso.mindwebs.org/user-<span id="myspan"><?php echo $user_row['username'] ; ?></span>.php</a>
					</div>
                    
                    <script>
					function nospaces(t){
					  if(t.value.match(/\s/g)){
						t.value=t.value.replace(/\s/g,'');
						document.getElementById("myspan").textContent=t.value;
					  }
					}
					
					function changeSpan(t2){
						document.getElementById("myspan").textContent=t2.value;
					}
					</script>
                    
                    <a><br></a>
					<div class="form-group ">
						<label for="name" class="sr-only">Name</label>
						<input id="name" name = "name" class="form-control" placeholder="Your Full Name" value="<?php echo $_SESSION['usr_name'] ; ?>" disabled type="text" required >
					</div>
					<div class="form-group ">
						<label for="email" class="sr-only">Email</label>
						<input id="email" name="email_ver" class="form-control" placeholder="Your Email" value="<?php echo $_SESSION['usr_email'] ; ?>" disabled type="email" required>
					</div>
                    <div class="form-group ">
						<label for="phone" class="sr-only">Phone</label>
						<input id="phone" name="phone" class="form-control" placeholder="Enter Your Phone Number" value="<?php echo $_SESSION['usr_phone'] ; ?>" type="text">
					</div>                 
                    <div class="form-group ">
						<label for="dob" class="sr-only">Date of Birth</label>
						<input id="dob" name="dob" class="form-control" placeholder="Enter Your Date of Birth (dd/mm/yyyy)" value="<?php echo $_SESSION['usr_dob'] ; ?>" type="text" required>
					</div> 
                                  
                      
                    <div class="form-group ">
						<label for="gender" class="sr-only">Gender</label>
						Select Your Gender
                    	<select name="gender">
                        
  				<option value="M" <?php if($user_row['gender'] == 'M' ) { ?> selected <?php } ?> >Male</option>
  				<option value="F" <?php if($user_row['gender'] == 'F' ) { ?> selected <?php } ?> >Female</option>
  				<option value="OR" <?php if($user_row['gender'] == "OR" ) { ?> selected <?php } ?> >Other</option>
                        
			</select>   
           			</div>    
                    <div class="form-group ">
                    <p>Write Your Info (About Yourself)</p>
						<label for="about" class="sr-only">About Yourself</label>
						<textarea rows="3" cols="50" id="about" name="about" class="form-control" placeholder="Write A short Info about Yourself (100 characters)" maxlength="250"required><?php if($user_row['about']!='' ) { echo $user_row['about']; } ?></textarea>
					</div>
				<p>If You Don't have any of the profile, Please Use #(hash) for those fields</p>
		<div class="form-group ">
						<label for="facebook" class="sr-only">Facebook</label>
						<input id="fcbk" name="facebook" class="form-control" <?php if($user_row['facebook']!='') { ?> value="<?php echo $user_row['fa-facebook'] ; ?>"  <?php } ?>placeholder="Enter Your Complete Facebook Profile Address" type="text">
					</div>  
		<div class="form-group ">
						<label for="twitter" class="sr-only">Twitter</label>
						<input id="twtr" name="twitter" class="form-control" <?php if($user_row['twitter']!='') { ?> value="<?php echo $user_row['fa-twitter'] ; ?>"  <?php } ?> placeholder="Enter Your Complete Twitter Profile Address" type="text">
					</div>  
		<div class="form-group ">
						<label for="instagram" class="sr-only">Instagram</label>
						<input id="inst" name="instagram" class="form-control" <?php if($user_row['inst']!='') { ?> value="<?php echo $user_row['fa-inst'] ; ?>"  <?php } ?> placeholder="Enter Your Complete Instagram Profile Address" type="text">
					</div>          
                    <div class="form-group ">
                    Your Security Question:<br>
					<label for="seq_qns" class="sr-only">Select Your Security Question   </label>
                    	<select name="seq_qns" required>
  							<?php if($user_row['seq_qns'] != '') { ?> <option value="<?php echo $user_row['seq_qns'] ; ?>" selected ><?php echo $user_row['seq_qns'] ; ?></option> <?php } else { ?>
  							<option value="What was the name of your elementary / primary school?">What was the name of your elementary / primary school?</option>
  							<option value="What is Your Favourite Book">What is Your Favourite Book?</option>
  							<option value="Who was your childhood hero?">Who was your childhood hero?</option>
  							<option value="What is your mother's maiden name? ">What is your mother's maiden name?</option>
                            				<option value="Where were you born? ">Where were you born?</option>
                            				<option value="What is your favorite color? ">What is your favorite color?</option>
                            				<?php } ?>
			</select>   
                    </div>  
                    <div class="form-group ">                    
                    Answer To Your Security Question<br>
						<label for="seq_ans" class="sr-only">Answer To Your Security Question</label>
						<input id="seq_ans" name = "seq_ans" class="form-control" placeholder="Answer To Your Security Question" value="<?php echo $user_row['seq_ans'] ; ?>" type="text" required>
					</div>      
                    
                    <div class="form-group ">
						<label for="password" class="sr-only">Enter Your Current Password</label>
						<input id="pass" name="conf_pass" class="form-control" placeholder="Enter Your Password to confirm its you" type="password" required>
					</div>               
					
					<div class="form-group ">
						<input class="btn btn-primary btn-lg" value="Update" name="updateBtn" type="submit">
					</div>
                    <p>After This You will be logged out, Please Login Again</p>
                    <p>You will be redirected Automatically</p>
                    
					
                 </form>   
				</div>
                
                <div class="col-md-6 to-animate">
                <div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">User Image</h2>
                </div>
                    
               <form method="POST" name="uploadform_1" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">  
               		<br>
                    <div class="form-group ">
                     <div class="fh5co-person text-center to-animate">
						
                        <figure><img src="<?php echo "uploads/profile/" . $user_row['profile_img'] ; ?>" alt="Image"></figure>
                        <span style="color:blue" >Current Profile Image</span><br>Profile Image Should Be Square in dimensions (1:1 ratio) and less than 10MB in size
                     </div>   
                    </div>
                    
                    
                    <div class="form-group ">
                    <p>Select Your Profile Image... </p>
						<label for="image" class="sr-only">Image File</label>
                    	<input type="file" name="image" id="image" >
					</div>
					<div class="form-group ">
						<input class="btn btn-primary btn-lg" name = "upload_image" value="Upload Image" type="submit">
					</div>
					
               </form>
               <?php if(isset($isuccessmsg)) { 
			   		echo $isuccessmsg ;
					
				 ?>
				<?php 	
			   
			   } else if(isset($ierrormsg)) { echo $ierrormsg ; } ?>
               
               </div>
               <br><br><br>
                
                
                <a name="change_pass"></a> 
                
				<div class="col-md-6 to-animate" >
					<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Change Password</h2>
					</div>
                <form role="form" action="changepass.php" method="post" name="changeform">
					<div class="form-group ">
						<label for="email" class="sr-only">Email</label>
						<input id="email" name="email" class="form-control" placeholder="Email" value = "<?php echo $_SESSION['usr_email'] ; ?>"type="email" required>
					</div>
                    
					<div class="form-group ">
						<label for="password" class="sr-only">Enter Your Current Password</label>
						<input id="phone" name="current_password" class="form-control" placeholder="Enter Your Current Password" type="password" required>
					</div>
                    
                    <div class="form-group ">
						<label for="password" class="sr-only">Enter Your New Password</label>
						<input id="phone" name="password" class="form-control" placeholder="Enter Your New Password" type="password" required>
					</div>
                    
                    <div class="form-group ">
						<label for="password" class="sr-only">Confirm Your New Password</label>
						<input id="phone" name="cpassword" class="form-control" placeholder="Confirm Your New Password" type="password" required>
					</div>

					<div class="form-group ">
						<input class="btn btn-primary btn-lg" name="change" value="Change Password" type="submit">
					</div>
                    
                    <p>After This You will be logged out, Please Login Again</p>
                    <p>You will be redirected Automatically</p>
                 </form>
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