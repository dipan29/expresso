<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

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
                    <li><a href="#" class = "active" data-nav-section="home"><span>Team</span></a></li>
		            <li><a href="submit.php#submitnow" class="external"><span>Submit Content</span></a></li>
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
    
<a name="show"></a>
<section id="fh5co-about" data-section="about">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Our Team</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Those who have given constant efforts to establish this project.</h3>
                            
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person1.jpg" alt="Image"></figure>
						<h3>Dipan Roy</h3>
						<span class="fh5co-position">Founder and Managing Director</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://twitter.com/mind_webs" target="_blank"><i class="icon-twitter"></i></a></li>
							<li><a href="https://www.facebook.com/Dipan29" target="_blank"><i class="icon-facebook"></i></a></li>
							
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person2.jpg" alt="Image"></figure>
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
						<figure><img src="team/person3.jpg" alt="Image"></figure>
						<h3>Koushili Das</h3>
						<span class="fh5co-position">Senior Editor</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/koushili.das.79" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person4.jpg" alt="Image"></figure>
						<h3>Anwesha Chatterjee</h3>
						<span class="fh5co-position">Editorial Head</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/anwesha.chatterjee.182" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
                <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person5.jpg" alt="Image"></figure>
						<h3>Asmita Chaudhuri</h3>
						<span class="fh5co-position">Senior Editor</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/asmita.chaudhuri" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
                <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person6.jpg" alt="Image"></figure>
						<h3>Shroddha Chakraborty</h3>
						<span class="fh5co-position">Editor, M-Diary</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/profile.php?id=100006925754721" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
            </div>
            <br>
            <div class="row">
            	<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person7.jpg" alt="Image"></figure>
						<h3>Subhomoy Ghosh</h3>
						<span class="fh5co-position">Photographer and Supervisor</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/ichbinsubho" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
                <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person8.jpg" alt="Image"></figure>
						<h3>Pritam Dutta</h3>
						<span class="fh5co-position">Insights Manager and Supervisor</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/pritam.dutta.75436" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
                <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person9.jpg" alt="Image"></figure>
						<h3>Niprojit Ghosh</h3>
						<span class="fh5co-position">Content Provider and Supervisor</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/niprojit.ghosh.9" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
            
			</div>  
            <br> 
            <div class="row">
            	<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person10.jpg" alt="Image"></figure>
						<h3>Anish Bhattacharya</h3>
						<span class="fh5co-position">Developer and Designer</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/bh.anish" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
                <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person11.jpg" alt="Image"></figure>
						<h3>Tathagata Misra</h3>
						<span class="fh5co-position">Developer and Designer</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/tathagata.misra.3" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
                <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person12.jpg" alt="Image"></figure>
						<h3>Parikshit Chatterjee</h3>
						<span class="fh5co-position">Content Provider and Supervisor</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/parikshit.chattopadhyay" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
            
			</div>  
            <br>
                        <div class="row">
            	<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person13.jpg" alt="Image"></figure>
						<h3>Nilesh Poddar</h3>
						<span class="fh5co-position">Content Provider</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/nilesh.poddar.980" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
                <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person14.jpg" alt="Image"></figure>
						<h3>Bipasha Barua</h3>
						<span class="fh5co-position">Content Provider</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/bipsbarua.777701" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
                <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person15.jpg" alt="Image"></figure>
						<h3>Riya Biswas</h3>
						<span class="fh5co-position">Content Provider</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/profile.php?id=100013695101836" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
            
			</div>  
            <br> 
            <div class="row">
            	<div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person16.jpg" alt="Image"></figure>
						<h3>Saptarshi Sarkar</h3>
						<span class="fh5co-position">Content Provider</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/saptarshi.sarkar.167" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>
                <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person17.jpg" alt="Image"></figure>
						<h3>Chirayata Chakraborty</h3>
						<span class="fh5co-position">Content Provider</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/chirayata.chakrabarti" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>               
                 <div class="col-md-4">
					<div class="fh5co-person text-center to-animate">
						<figure><img src="team/person18.jpg" alt="Image"></figure>
						<h3>Soumyajyoti Mahalanobish</h3>
						<span class="fh5co-position">Content Provider</span>
						<p> </p>
						<ul class="social social-circle">
							<li><a href="https://www.facebook.com/soumyajyoti.mahalanobish.9" target="_blank"><i class="icon-facebook" target="_blank"></i></a></li>
						</ul>
					</div>
				</div>            
        </div>
        <center><p>Join Us by <a href="signup.php">Applying Here </a></p></center>
        
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

