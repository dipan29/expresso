<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

include_once 'dbconnect.php';

$queryC = "UPDATE views SET count = count +1 ";

if(mysqli_query($con,$queryC)) {
$resultC = mysqli_query($con, "SELECT * FROM views ");
	if ($resultC->num_rows > 0) {
		while($rowC = $resultC->fetch_assoc()) {
			$views = $rowC['count'];
		}
	}
	
}

if((isset($_COOKIE["hash"])) && (!isset($_SESSION['usr_id'])) )  { 
	$result = mysqli_query($con, "SELECT * FROM users WHERE login_hash = '" . $_COOKIE["hash"]. "' ");
	if(mysqli_query($con, "UPDATE users SET last_login = now() WHERE login_hash = '" . $_COOKIE["hash"]. "' ")){
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
		$_SESSION['temp'] = "null";
		}
			
	}

}

if(isset($_SESSION['temp_seq_qns'])) {
	unset($_SESSION['temp_email']);
	unset($_SESSION['temp_seq_qns']);
}
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4836172599025695",
    enable_page_level_ads: true
  });
</script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Expresso &mdash; MinD Webs </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="The New Site of MinD Webs, Expresso. MinD Webs, Created by Dipan Roy, Student have a dream to make MinD Webs Top Tech Blog Icon of India. The site features an enriched blog as well as support by Expert Admins Team. We also have a dedicated Software Development Team developing for PCs to PDAs. Login to Explore More" />
	<meta name="keywords" content="mindwebs, mind webs, expresso, expresso-mindwebs, m-diary, m diary, tech, science, sports, news, sportsfever, technology, team, dipanroy, dipan roy" />
	<meta name="author" content="Dipan Roy" />



  	<!-- Facebook and Twitter integration -->
  	<meta property="fb:app_id" content="442436492767780" /> 
	<meta property="og:title" content="Expresso | MinD Webs"/>
	<meta property="og:image" content="http://expresso.mindwebs.org/favicon.png"/>
	<meta property="og:image:type" content="image/png" /> 
	<meta property="og:url" content="http://expresso.mindwebs.org/"/>
	<meta property="og:site_name" content="Expresso"/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="Expresso | MinD Webs" />
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
    
    
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#1d8a8a"
    },
    "button": {
      "background": "#f1c40f"
    }
  },
  "theme": "classic",
  "position": "bottom-right",
  "content": {
    "href": "http://wikipedia.org/wiki/HTTP_cookie"
  }
})});
</script>

	</head>
	<body>
	

	
    <?php include_once("analyticstracking.php") ?>
    
	<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=442436492767780";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	
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
		            <li ><a href="index.php" class="active" data-nav-section="home"><span>Home</span></a></li>
		            <?php if (isset($_SESSION['usr_id'])) {  ?>
						<li ><a href="<?php echo "user.php?var=" . $_SESSION['usr_id'] ; ?>" class="external" ><span>Open User Profile</span></a></li>
		            <?php } else {?>
		            <li ><a href="login.php#loginnow" class="external" ><span>Login</span></a></li>
		            <li><a href="login.php#registernow" class="external"><span>Register</span></a></li>
                    
		            <?php } ?>
		            
		            <li><a href="home.php" class="external"><span>POSTS</span></a></li>
		            
		            <?php 
		            if((isset($_SESSION['usr_type'])=="W")|| (isset($_SESSION['usr_type'])=="A")){ ?>				
				<li><a href="admin.php" class="external"><span>Admin Panel</span></a></li>
			    <?php } else {?>
			    <li><a href="#" data-nav-section="contact"><span>Contact Us</span></a></li>
			    <?php }?>
			    
			    
			    <!--
			    <li><a href="blog.php" class="external"><span>The Blog</span></a></li>
                   	    <li><a href="gallery_n.php" class="external"><span>Images Panel</span></a></li>
                   	    -->
                    	<li><a href="team.php" class="external"><span>Our Team</span></a></li>
                    
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
                            <h1 class="to-animate" style="font-size:32px !important">Expressions to Opinions</h1>    
                            <div class="fb-like" data-href="https://www.facebook.com/diaryofminds" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>                    
                            <h2 class="to-animate">WELCOME <?php if (isset($_SESSION['usr_id'])) { echo $_SESSION['usr_name']; } ?></h2>
                            <?php if (isset($_SESSION['usr_id'])) { ?> 
                            	<?php if(is_null($_SESSION['updated_at'])) {
									echo "<script> 
									if(confirm(\"You Have Not Updated Your Profile Yet... \\nPlease Click OK to do so...or Cancel to Leave as it is...\")) { 
											document.location = 'update.php';
									}
                                </script>";
                                } ?>
                            <?php } else { 
							/*	echo "<script> 
									if(confirm(\"You are Not Logged In... \\nPlease Login (or Register) to View Articles\")) { 
											document.location = 'login.php#loginnow';
									}
                                </script>"; */
                            } ?>
                            <br><a style="color:white" href="submit.php">Click Here To Submit Your Articles/Images</a><br>
                            <br><?php echo "Views Counter : ".$views ; ?>
						</div>
					</div>
				</div>
			
            </div>
         </div>
   
		<div class="slant"></div>
        
	</section>

	<script>
		function loadFunction() {
			
		}
	</script>
    
    <section id="fh5co-about" data-section="intro">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">INTRO</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>The Blog for Everyone, The Blog for Everything</h3>
                            <!--<h3>Check Our Entire Team <a href="team.php#show" target="_blank">Here</a></h3>-->
						</div>
					</div>
                <span class="to-animate" style="color:black">
                Expresso is All About The Users. Share your works with us so as to display them here.<br>
                Submit all your creative work here, ranging from articles, poems, stories till captured images.<br>
                Click on <a href="blog.php">BLOG</a> to list the blog posts and <a href="gallery_n.php">IMAGES PANEL</a> to view the photos.
                <br><a href="submit.php">Submit Your Content Now</a>
                <br><a href="ourteam.php">Click Here to know about our team</a>
                </span>
				</div>
			</div>
						
            
        </div>
        
	</section>
    
	<section id="fh5co-work" data-section="work">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">SPOTLIGHT</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Some of our best works.</h3>
                            <h3>Check out rest of the works <a href ="home.php">Here</a></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-sm">
			<!--	<div class="col-md-4 col-sm-6 col-xxs-12">
					<a href="images/display_1.jpg" class="fh5co-project-item image-popup to-animate">
						<img src="images/display_1.jpg" alt="Image" class="img-responsive">
						<div class="fh5co-text">
						<h2>M Diary</h2>
						<span>The Diary of MinDs</span>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 col-xxs-12">
					<a href="images/display_2.jpg" class="fh5co-project-item image-popup to-animate">
						<img src="images/display_2.jpg" alt="Image" class="img-responsive">
						<div class="fh5co-text">
						<h2>Sports Updates</h2>
						<span>One Stop Location for all your Sports Update</span>
						</div>
					</a>
				</div>

				<div class="clearfix visible-sm-block"></div>

				<div class="col-md-4 col-sm-6 col-xxs-12">
					<a href="images/display_3.jpg" class="fh5co-project-item image-popup to-animate">
						<img src="images/display_3.jpg" alt="Image" class="img-responsive">
						<div class="fh5co-text">
						<h2>MinD Webs</h2>
						<span>Inspiring The Inspirers</span>
						</div>
					</a>
				</div>  -->
				<div class="col-md-4 col-sm-6 col-xxs-12">
					<a href="images/display_4.jpg" class="fh5co-project-item image-popup to-animate">
						<img src="images/display_4.jpg" alt="Image" class="img-responsive">
						<div class="fh5co-text">
						<h2>স্বপ্ন</h2>
						<span>Editor, M - Diary</span>
						</div>
					</a>
				</div>
				
				<div class="clearfix visible-sm-block"></div>

				<div class="col-md-4 col-sm-6 col-xxs-12">
					<a href="images/display_5.jpg" class="fh5co-project-item image-popup to-animate">
						<img src="images/display_5.jpg" alt="Image" class="img-responsive">
						<div class="fh5co-text">
						<h2>শহর</h2>
						<span>Anwesha Chatterjee</span>
						</div>
					</a>
				</div>
				<div class="col-md-4 col-sm-6 col-xxs-12">
					<a href="images/display_6.jpg" class="fh5co-project-item image-popup to-animate">
						<img src="images/display_6.jpg" alt="Image" class="img-responsive">
						<div class="fh5co-text">
						<h2>Broken</h2>
						<span>Nilesh Poddar</span>
						</div>
					</a>
				</div>
				
				<div class="clearfix visible-sm-block"></div>

				
                
			</div>
			<div class="row">
				<div class="col-md-12 text-center to-animate">
					
				</div>
			</div>
		</div>
	</section>
    
    <section id="fh5co-intro">
		<div class="container">
			<div class="row row-bottom-padded-lg">
			
				<div class="fh5co-block to-animate" style="background-image: url(images/img_7.jpg);">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-bulb"></i>
						<h2>Submit Content</h2>
						<p>Share Your Thoughts, Let Others Perceive Them</p><br><br><br><br><br>
						<p><a href="submit.php" class="btn btn-primary">Submit Now</a></p>
					</div>
				</div>
				
				<div class="fh5co-block to-animate" style="background-image: url(images/img_8.jpg);">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-rocket"></i>
						<h2>Social Connect</h2>
						<p>A Panel of All our Social Pages</p>
						<p>Automatically Updated with latest content</p><br><br><br>
						<p><a href="SocialConnect.php" class="btn btn-primary">Open Now</a></p>
					</div>
				</div>
				
				<div class="fh5co-block to-animate" style="background-image: url(images/img_8.jpg);">
					<div class="overlay-darker"></div>
					<div class="overlay"></div>
					<div class="fh5co-text">
						<i class="fh5co-intro-icon icon-wrench"></i>
						<h2>Develop</h2>
						<p>Are You a Developer? We are recruiting new budding talents</p>
						<p>Registered Users Should Drop a mail to the administrator, The following link is disabled for them</p>
						<p><a href="signup.php" class="btn btn-primary">Get In Touch</a></p>
					</div>
				</div>
			</div>
			
		</div>
	</section>

<!--
	
	<section id="fh5co-about2" data-section="about">
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

	<a name="contactUs"></a>
	<section id="fh5co-contact" data-section="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Get In Touch</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Fill Up the Form to get in touch with us</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-md">
				<div class="col-md-6 to-animate">
					<h3>Contact Info</h3>
					<ul class="fh5co-contact-info">
						<li class="fh5co-contact-address ">
							<i class="icon-home"></i>
							Kolkata, West Bengal<br>India
						</li>
						<!--<li><i class="icon-phone"></i>  </li>-->
						<li><i class="icon-envelope"></i>mindwebsteam@gmail.com</li>
						<li><i class="icon-globe"></i> <a href="http://web.mindwebs.org/" target="_blank">mindwebs.org</a></li>
					</ul>
				</div>

				<div class="col-md-6 to-animate">
					<h3>Contact Form</h3>
                    <form method="POST" name="contactform" action="post_contact.php">
                    
					<div class="form-group ">
						<label for="name" class="sr-only">Name</label>
						<input id="name" name="name" class="form-control" placeholder="Name" type="text" required>
					</div>
					<div class="form-group ">
						<label for="email" class="sr-only">Email</label>
						<input id="email" name="email" class="form-control" placeholder="Email" type="email" required>
					</div>
					
					<div class="form-group ">
						<label for="message" class="sr-only">Message</label>
						<textarea name="content" id="message" cols="30" rows="5" class="form-control" placeholder="Your Message"></textarea>
					</div>
					<div class="form-group ">
						<input class="btn btn-primary btn-lg" value="Send Message" name="contact" type="submit">
					</div>
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
		          	expires: 3600,
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
    
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/59e9dcb1c28eca75e4627246/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

	
	</body>
</html>

