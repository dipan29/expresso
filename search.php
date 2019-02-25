<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

include_once 'dbconnect.php';

$search = '';
$found = false;
$oneUser = false;


if(isset($_SESSION['usr_id'])) {

$seen = "N";
$countNot = 0;	

                             
							$reqC = mysqli_query($con, "SELECT * FROM user_notify WHERE email = '".$_SESSION['usr_email']."' AND seen = 'N' ");
							if($reqC) {
							if($reqC->num_rows > 0) {
							while($rowC = $reqC->fetch_assoc() ) {
								$countNot = $countNot + 1;	
								}
							} }
							
}



//////////////SEARCH PART/////////////////////////////////////
if(isset($_POST['search'])) {
	$search = true;
	
	$keywordTemp = mysqli_real_escape_string($con,$_POST['searchWord']);
	$keyword = nl2br(htmlentities($keywordTemp, ENT_QUOTES, 'UTF-8'));
	
	$query1 = mysqli_query($con, "SELECT * FROM users WHERE (email = '".$keyword."') OR (phone = '".$keyword."') ");   //SEARCH BY email or phone
	
		$s1 = $keyword." ";
		$s2 = " ".$keyword." ";
		$s3 = " ".$keyword;
	$query2 = mysqli_query($con, "SELECT * FROM users WHERE (name LIKE '%$keyword%' )");    //NAME SEARCH
	$query3 = mysqli_query($con, "SELECT * FROM post_blog WHERE ((name LIKE '%$keyword%') OR (content LIKE '%$keyword%')) AND published = 'Y' "); //SEARCH for POSTS
	$query4 = mysqli_query($con, "SELECT * FROM upload_img WHERE ((user LIKE '%$keyword%') OR (subject LIKE '%$keyword%') OR (content LIKE '%$keyword%'))  ");
	$query5 = mysqli_query($con, "SELECT * FROM image WHERE ((subject LIKE '%$keyword%') OR (content LIKE '%$keyword%')) ");
	
	
	
} else {
$search = false;
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
	<meta name="description" content="EXPRESSO - THE BLOG, The New Site of MinD Webs. MinD Webs, Created by Dipan Roy, Student have a dream to make MinD Webs Top Tech Blog Icon of India. The site features an enriched blog as well as support by Expert Admins Team. We also have a dedicated Software Development Team developing for PCs to PDAs. Login to Explore More" />
	<meta name="keywords" content="mindwebs, mind webs, expresso, expresso-mindwebs, m-diary, m diary, tech, science, sports, news, sportsfever, technology, team, dipanroy, dipan roy, login, register" />
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
	
	<?php include_once("analyticstracking.php") ?>
	
	<header role="banner" id="fh5co-header">
			<div class="container">
				<!-- <div class="row"> -->
			    <nav class="navbar navbar-default">
		        <div class="navbar-header">
		        	<!-- Mobile Toggle Menu Button -->
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		         <a class="navbar-brand" href="home.php">Expresso | MinD Webs</a>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          <ul class="nav navbar-nav navbar-right">

                    <li><a href="home.php" class="external" ><span>Posts</span></a></li>
		            <?php if (isset($_SESSION['usr_id'])) {
						if($countNot > 0 ) { ?>
                        	<li><a href="notification.php" class="external">Notifications(<?php echo $countNot; ?>)</a></li>
                   	    <?php } 
						 
		            } else {?>
		            <li ><a href="login.php#loginnow" class="external" ><span>Login</span></a></li>
		            <li><a href="login.php#registernow" class="external"><span>Register</span></a></li>
		            <?php } ?>
		            
		            
		            
		            <?php 
		            if((isset($_SESSION['usr_type'])=="W")|| (isset($_SESSION['usr_type'])=="A")){ ?>				
				<li><a href="upload.php" class="external"><span>Upload Images</span></a></li>
			    <?php } else { ?>
                	<li><a href="upload_photo.php" class="external"><span>Upload Images</span></a></li>
                <?php } ?>
   	
		            <li><a href="submit.php#submitnow" class="external"><span>Submit Content</span></a></li>

		            
                    <?php if (isset($_SESSION['usr_id'])) { ?> <li><a href="<?php echo "user.php?var=" . $_SESSION['usr_id'] ; ?>" class="external"><span>Open Your Profile</span></a></li>
                     <li><a href="logout.php" class="external"><span>Logout</span></a></li>
					<?php } ?>
		          </ul>
		        </div>
			    </nav>
			  <!-- </div> -->
		  </div>
	</header>



<a name="display"></a>
	<section id="fh5co-work" data-section="work">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">SEARCH</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">

						</div>
                        
                        
                            <?php if (isset($_SESSION['usr_id'])) { ?> 
                            	<?php if(is_null($_SESSION['updated_at'])) {
									echo "<script> 
									if(confirm(\"You Have Not Updated Your Profile Yet... \\nPlease Click OK to do so...or Cancel to Leave as it is...\")) { 
											document.location = 'update.php';
									}
                                </script>";
                                } ?>
                            <?php } else { 
								echo "<script> 
									if(confirm(\"You are Not Logged In... \\nPlease Login (or Register) to View Articles\")) { 
											document.location = 'login.php#loginnow';
									}
                                </script>";
                            } ?>						
					</div>
				</div>
			</div>
			<div class="row row-bottom-padded-sm">
            
                        <div class="col-lg-12 col-lg-12 col-xxs-12">
                        <div class="fh5co-text">
						<form role="form" action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="post" name="searchform"> 
                        	<div class="form-group" id="searchBar" style="padding-top: 15px !important">
                            <div class="form-group">
                            <input class="form-control" style="background-color:white !important" type="text" name="searchWord" placeholder="Enter Keywords Here" <?php if(isset($keyword)) { ?> value="<?php echo $keyword; ?>" <?php } ?>>
                            </div>
                            <div class="form-group">
                            <input style="text-align:center !important" class="btn btn-primary btn-lg" value="Search" name="search" type="submit">
                            <!--<input type="image" src="search.png" style="float:right !important; width:18% !important" class="btn btn-primary btn-sm" value="Search" name="search">-->
                            </div>
                            </div>
                        </form>
                        </div>     
                        </div>
                        
           </div>
           
           <div class="row row-bottom-padded-sm">
           <?php 
			if($search) {
				if($query1->num_rows > 0 )	{ 
				$found = true;
				$oneUser = true;
				//START USER SEARCH
				?>
                
                </div>
            </div>
      </section>
              
      <section id="fh5co-about" data-section="about">			
			<div class="container">
                
                <div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Found Users</h2>
				</div>
                
                 <div class="row">
                 <?php while($row = $query1->fetch_assoc()) { ?>
                  <div class="col-md-4">
						<div class="fh5co-person text-center to-animate">
                    	<figure><img src="<?php echo "uploads/profile/" . $row['profile_img'] ; ?>" alt="Image"></figure>
						<h3><?php echo $row['name']; ?></h3>   <!--Check Here , Create New Query Up for Email -->
						<span class="fh5co-position"><?php echo $row['role']; ?></span>
						<p><?php echo nl2br($row['about']); ?></p>
						<ul class="social social-circle">
							<li><a href="<?php echo $row['fa-facebook']; ?>" target="_blank"><i class="icon-facebook"></i></a></li>
							<li><a href="<?php echo $row['fa-twitter']; ?>" target="_blank"><i class="icon-twitter"></i></a></li>						
						</ul>
                     </div>				
                  </div>
                 </div>
                </div>
              </div>
      </section>	
	  
       <section id="fh5co-work" data-section="work">
		<div class="container">
        							
				<?php } 
				
				} else if($query2->num_rows > 0) {
					if($query2->num_rows == 1) {
						$oneUser = true;
					}
					
					$found = true;
					?>
                    
                    </div>
            </div>
      </section>
              
      <section id="fh5co-about" data-section="about">			
			<div class="container">
                
                <div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">Found Users</h2>
				</div>
                
                 <div class="row">
                 <?php while($row = $query2->fetch_assoc()) { ?>
                  <div class="col-md-4">
						<div class="fh5co-person text-center to-animate">
                    	<figure><img src="<?php echo "uploads/profile/" . $row['profile_img'] ; ?>" alt="Image"></figure>
						<h3><?php echo $row['name']; ?></h3>   <!--Check Here , Create New Query Up for Email -->
						<span class="fh5co-position"><?php echo $row['role']; ?></span>
						<p><?php echo nl2br($row['about']); ?></p>
						<ul class="social social-circle">
							<li><a href="<?php echo $row['fa-facebook']; ?>" target="_blank"><i class="icon-facebook"></i></a></li>
							<li><a href="<?php echo $row['fa-twitter']; ?>" target="_blank"><i class="icon-twitter"></i></a></li>						
						</ul>
                     </div>				
                  </div>
                 <?php } ?>
                 </div>
                </div>
            </div>
      </section>	
	  
       <section id="fh5co-work" data-section="work">
		<div class="container">
        			
        		<?php 
				if($oneUser) {
					
				if ($query3->num_rows > 0) {
					
					echo "<div class=\"col-md-12 section-heading text-center\">
							<h2 class=\"to-animate\">Posts By : $keyword</h2>
						  </div>";
					
					
						$found = true;
						while($row = $query3->fetch_assoc()) { 
					?>
                    			<div class="col-md-4 col-sm-6 col-xxs-12">
                                	<a href="<?php echo "blog_view.php?var=" . $row["id"] ; ?>" class="fh5co-project-item to-animate">
                                    <div class="fh5co-text">
										<h2><?php echo $row["subject"] ; ?> <strong>By <?php echo $row["name"] ; ?></strong></h2>
                                        <?php
                                        	$content = nl2br($row["content"]);
                               				 if(strlen($content) >=180) {
												$text = mb_substr($content,0,180);
												$text.="...<span style=\"color:blue\">(Read More)</span>";
											} else {
												$text = $content;
											} ?>
                                        <span><?php echo $text ;?></span><br><br>
                                		<span><?php echo $row["date"] ; ?></span><br>
                                		<span>Filled Under : <strong><?php echo $row["type"] ; ?></strong></span>
                                    </div>
                                    </a>
                                </div>		
					<?php }//END OF WHILE
					} //END OF IF ?>
        
        		<?php if ($query4->num_rows > 0) {
						$found = true;
						while($rowC = $query4->fetch_assoc()) { ?>
                        
						    <div class="col-md-4 col-sm-6 col-xxs-12">	  
                    			<a href="<?php echo "uploads/" . $rowC["image"] ; ?>" class="fh5co-project-item image-popup to-animate">
								<img src="<?php echo "uploads/" . $rowC["image"] ; ?>" alt="Image" class="img-responsive">
							
                            	<div class="fh5co-text">
									<h2><?php echo $rowC["subject"] ; ?></h2>
									<span><?php echo $rowC["content"] ; ?></span><br>
                                	<span><?php echo $rowC["date"] ; ?></span>
									<?php if((isset($_SESSION['usr_id']))!="") {
										if((($_SESSION['usr_type'])=="W") || (($_SESSION['usr_type'])=="A")) { ?>										
											<br>
											<span>ID : <?php echo $rowC["id"] ; ?> (ADMIN UPLOADED)</span>
									<?php } 
									} ?>
								</div>
                            	</a>
                     		</div>
						
				<?php	}
					} 
					
				}	?>
                    
                <?php
                    if ($query5->num_rows > 0) {
						$found = true;
						while($rowC = $query5->fetch_assoc()) { ?>
                        
						    <div class="col-md-4 col-sm-6 col-xxs-12">	  
                    			<a href="<?php echo "uploads/" . $rowC["image"] ; ?>" class="fh5co-project-item image-popup to-animate">
								<img src="<?php echo "uploads/" . $rowC["image"] ; ?>" alt="Image" class="img-responsive">
							
                            	<div class="fh5co-text">
									<h2><?php echo $rowC["subject"] ; ?></h2>
									<span><?php echo $rowC["content"] ; ?></span><br>
                                	<span><?php echo $rowC["date"] ; ?></span>
									<?php if((isset($_SESSION['usr_id']))!="") {
										if((($_SESSION['usr_type'])=="W") || (($_SESSION['usr_type'])=="A")) { ?>										
											<br>
											<span>ID : <?php echo $rowC["id"] ; ?> (ADMIN UPLOADED)</span>
									<?php } 
									} ?>
								</div>
                            	</a>
                     		</div>
						
						
						
				<?php	}
					}
                    
				
				?>	
				
				<?php 
				//FOR USER SEARCH			
				} else {
				//FOR OTHER AREAS
					if ($query3->num_rows > 0) {
						
						echo "<div class=\"col-md-12 section-heading text-center\">
							<h2 class=\"to-animate\">Search Results : $keyword</h2>
						  </div>";
						
						$found = true;
						while($row = $query3->fetch_assoc()) { 
					?>
                    			<div class="col-md-4 col-sm-6 col-xxs-12">
                                	<a href="<?php echo "blog_view.php?var=" . $row["id"] ; ?>" class="fh5co-project-item to-animate">
                                    <div class="fh5co-text">
										<h2><?php echo $row["subject"] ; ?> <strong>By <?php echo $row["name"] ; ?></strong></h2>
                                        <?php
                                        	$content = nl2br($row["content"]);
                               				 if(strlen($content) >=180) {
												$text = mb_substr($content,0,180);
												$text.="...<span style=\"color:blue\">(Read More)</span>";
											} else {
												$text = $content;
											} ?>
                                        <span><?php echo $text ;?></span><br><br>
                                		<span><?php echo $row["date"] ; ?></span><br>
                                		<span>Filled Under : <strong><?php echo $row["type"] ; ?></strong></span>
                                    </div>
                                    </a>
                                </div>		
					<?php }//END OF WHILE
					} //END OF IF
					 
					if ($query4->num_rows > 0) {
						$found = true;
						while($rowC = $query4->fetch_assoc()) { ?>
                        
						    <div class="col-md-4 col-sm-6 col-xxs-12">	  
                    			<a href="<?php echo "uploads/" . $rowC["image"] ; ?>" class="fh5co-project-item image-popup to-animate">
								<img src="<?php echo "uploads/" . $rowC["image"] ; ?>" alt="Image" class="img-responsive">
							
                            	<div class="fh5co-text">
									<h2><?php echo $rowC["subject"] ; ?></h2>
									<span><?php echo $rowC["content"] ; ?></span><br>
                                	<span><?php echo $rowC["date"] ; ?></span>
									<?php if((isset($_SESSION['usr_id']))!="") {
										if((($_SESSION['usr_type'])=="W") || (($_SESSION['usr_type'])=="A")) { ?>										
											<br>
											<span>ID : <?php echo $rowC["id"] ; ?> (ADMIN UPLOADED)</span>
									<?php } 
									} ?>
								</div>
                            	</a>
                     		</div>
						
				<?php	}
					} 
					
					if ($query5->num_rows > 0) {
						$found = true;
						while($rowC = $query5->fetch_assoc()) { ?>
                        
						    <div class="col-md-4 col-sm-6 col-xxs-12">	  
                    			<a href="<?php echo "uploads/" . $rowC["image"] ; ?>" class="fh5co-project-item image-popup to-animate">
								<img src="<?php echo "uploads/" . $rowC["image"] ; ?>" alt="Image" class="img-responsive">
							
                            	<div class="fh5co-text">
									<h2><?php echo $rowC["subject"] ; ?></h2>
									<span><?php echo $rowC["content"] ; ?></span><br>
                                	<span><?php echo $rowC["date"] ; ?></span>
									<?php if((isset($_SESSION['usr_id']))!="") {
										if((($_SESSION['usr_type'])=="W") || (($_SESSION['usr_type'])=="A")) { ?>										
											<br>
											<span>ID : <?php echo $rowC["id"] ; ?> (ADMIN UPLOADED)</span>
									<?php } 
									} ?>
								</div>
                            	</a>
                     		</div>
						
						
						
				<?php	}
					}
					

				}
				
			} else { 
				if(!$search) {
					echo "Please Enter some Keywords...";	
				}
			} ?>
            
            <?php if(!$found) {
					echo "No Results Found";
				}
            ?>
              
			</div>
            

			<div class="row">
				<div class="col-md-12 text-center to-animate">
					
				</div>
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
    
    <script>
	if((<?php echo $countNot; ?>) >0) {
		var alerted = sessionStorage.getItem('alerted') || '';
    	if (alerted != 'yes') {
			alert("You Have <?php echo $countNot; ?> New Notifications \nCheck Menu For More");
			sessionStorage.setItem('alerted','yes');
    	}	
	}
	</script>
	


	
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

