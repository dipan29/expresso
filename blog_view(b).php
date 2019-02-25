<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

include_once 'dbconnect.php';

if(isset($_SESSION['temp_seq_qns'])) {
	unset($_SESSION['temp_email']);
	unset($_SESSION['temp_seq_qns']);
}

if (isset($_GET['var']))
{
	$id = $_GET['var'];
	$resultA = mysqli_query($con, "SELECT * FROM post_blog WHERE id = '" .$id. "' ");
		if ($resultA->num_rows > 0) {
			while($rowA = $resultA->fetch_assoc()) { 
					$post_name = $rowA["subject"]. " By : - " . $rowA["name"];
					$post_author = $rowA["email"];
					$post_nauthor = $rowA["name"];
			}
		}
	
	
} else {
	header("Location:blog.php");	
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
	<meta name="description" content="The self designed blog for everyone by Dipan Roy" />
	<meta name="keywords" content="mindwebs, mind webs, m-diary, m diary, dipanroy, dipan roy" />
	<meta name="author" content="Dipan Roy" />



  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="Expresso : THE BLOG"/>
	<meta property="og:image" content="http://expresso.mindwebs.org/favicon.png"/>
	<meta property="og:image:type" content="image/png" /> 
	<meta property="og:url" content="http://expresso.mindwebs.org/"/>
	<meta property="og:site_name" content="Expresso"/>
	<meta property="og:description" content="The self designed blog for everyone by Dipan Roy. Click Here to view the whole post"/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="http://expresso.mindwebs.org/favicon.png" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="The self designed blog for everyone by Dipan Roy. Click Here to view the whole post" />

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
                    <li><a href="blog.php" class="active" clas="external"><span>The Blog</span></a></li>
		            <?php if (isset($_SESSION['usr_id'])) { 
		            } else {?>
		            <li ><a href="login.php#loginnow" class="external" ><span>Login</span></a></li>
		            <li><a href="login.php#registernow" class="external"><span>Register</span></a></li>
		            <?php } ?>
		            <?php 
		            if((isset($_SESSION['usr_type'])=="W")|| (isset($_SESSION['usr_type'])=="A")){ ?>				
				<li><a href="upload.php" class="external"><span>Upload Images</span></a></li>
			    <?php } ?>
                   	<li><a href="gallery_n.php" class="external"><span>Images Panel</span></a></li>
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
                            <h1 class="to-animate" style="font-size:34px !important">Posts</h1>
                            <?php if (isset($post_name)) { ?> 
                            <h2 class="to-animate"><?php echo $post_name; ?></h2>
                            <?php } ?>                                                    
                            <?php if (isset($_SESSION['usr_id'])) { ?> 
                            <br><h2 class="to-animate"><a href="submit_user.php" target="_blank">Want To POST Something. Please Do it Here</a></h2>
                            <?php } ?>
                            <h2 class="to-animate" style="font-size:20px !important">Scroll Down TO See the Post</h2>
                            
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
					<h2 class="to-animate">DISPLAY</h2>
					<div class="row">

						<div class="col-md-8 col-md-offset-2 subtext to-animate">
                            <?php if (isset($post_name)) { ?> 
                            <h3>Submission - <?php echo $post_name; ?> </h3>
                            <?php } ?> 
                            
						</div>
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-sm">
    			<?php
					
					$result = mysqli_query($con, "SELECT * FROM post_blog WHERE id = '" .$id. "' ");
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) { ?>
                    <div class="col-md-4 col-sm-6 col-xxs-12">	  
                    		<a href="<?php echo "blog_edit.php?var=" . $row["id"] ; ?>" class="fh5co-project-item to-animate">   <!-- Check This Part Link -->
                            <div class="fh5co-text">
								<h2><?php echo $row["subject"] ; ?> <strong>By <?php echo $row["name"] ; ?></strong></h2><br>
								<span><?php echo nl2br($row["content"]) ; ?></span><br><br>
                                <span>Filled Under : <strong><?php echo $row["type"] ; ?></strong></span><br>
                                <span>Date : <?php echo $row["date"] ; ?></span>
								</div>
                            </a>
                     </div>
					<?php } 
				} 
			?>

             <h1>Comments</h1>   
            <?php
				$result = mysqli_query($con, "SELECT * FROM comment WHERE pid = '" .$id. "' ORDER BY cid DESC");
            		if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) { ?>
            			<div class="col-md-4 col-sm-6 col-xxs-12">	
                        <!-- <a href="<?php //echo "view_user.php?var=" . $row["pid"] ; ?>" class="fh5co-project-item to-animate"> -->
                        <a href="#" class="fh5co-project-item to-animate">
                        <div class="fh5co-text">
                        	<h2><?php echo $row["name"] ; ?> </h2>
                            <span><?php echo nl2br($row["comment"]) ; ?></span>
                            
                           </div>
                           </a>
                        </div>                
            <?php } 
				} else {
					echo "\nNo Comments Yet";
				}
			?>
            </div>
            <br><br>
            <?php if(isset($_SESSION['usr_id'])) { ?>
            <div class="col-md-4 col-sm-6 col-xxs-12">
            	<form role="form" action="send_comment.php?var=<?php echo $id?>" method="post" name="sendform">
					<div class="form-group ">
						<label for="id" class="sr-only">Comment</label>
                        <p>Commenting As <?php echo $_SESSION['usr_name']; ?></p>
						<input id="name" style="background-color : #fff !important" name="comment" class="form-control" placeholder="Enter Your Comment" type="text" required>
					</div>
                    
                    <div class="form-group ">
						<input class="btn btn-primary btn-lg" name="send_c" value="Comment Now" type="submit" > 
					</div>
                    
                	
                </form>
            
            </div>
            <?php } else { ?>
				<a href="login.php#loginnow">LOGIN FIRST TO COMMENT HERE</a>
		<?php	} ?>
            
            
			<div class="row">
				<div class="col-md-12 text-center to-animate">
					
				</div>
			</div>
		</div>
	</section>


	
	<section id="fh5co-about" data-section="about">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">About The Author</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3><?php echo $post_nauthor; ?></h3>
                            <h3>Check Our Entire Team <a href="team.php#show" target="_blank">Here</a></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
                	<?php
                    $resultB = mysqli_query($con, "SELECT * FROM users WHERE email = '" .$post_author. "' ");
						if ($resultB->num_rows > 0) {
							while($rowB = $resultB->fetch_assoc()) { 
							$author = $rowB["name"];
							$role = $rowB["role"];
							$about =$rowB["about"]; 
							$image = $rowB["profile_img"]; //add image and all here
							$fb = $rowB["fa-facebook"];
							$tw = $rowB["fa-twitter"];
							$in = $rowB["fa-inst"];
							}
						}
					?>
					<div class="fh5co-person text-center to-animate">
                    	<figure><img src="<?php echo "uploads/profile/" . $image ; ?>" alt="Image"></figure>
						<h3><?php echo $author; ?></h3>   <!--Check Here , Create New Query Up for Email -->
						<span class="fh5co-position"><?php echo $role; ?></span>
						<p><?php echo nl2br($about); ?></p>
						<ul class="social social-circle">
							<li><a href="<?php echo $tw; ?>" target="_blank"><i class="icon-twitter"></i></a></li>
							<li><a href="<?php echo $fb; ?>" target="_blank"><i class="icon-facebook"></i></a></li>						
						</ul>
                     </div>
                 <br>  <h3><a href="<?php echo "view_user.php?var=" . $id ; ?>" class="fh5co-project-item to-animate">View User Profile</a></h3>
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

