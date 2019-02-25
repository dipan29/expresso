<script type="text/javascript">

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var user=getCookie("APP");
    if (user != "") {
        //
    } else {
       setCookie("APP","A1",180);
    }
}


  if (screen.width >= 700) {
    window.location = "index.php";
  } else {	
  	checkCookie();  	 	
  }
  
 
</script>

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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Expresso &mdash; MinD Webs </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="The New Site of MinD Webs, Expresso. MinD Webs, Created by Dipan Roy, Student have a dream to make MinD Webs Top Tech Blog Icon of India. The site features an enriched blog as well as support by Expert Admins Team. We also have a dedicated Software Development Team developing for PCs to PDAs. Login to Explore More" />
	<meta name="keywords" content="mindwebs, mind webs, expresso, expresso-mindwebs, m-diary, m diary, tech, science, sports, news, sportsfever, technology, team, dipanroy, dipan roy" />
	<meta name="author" content="Dipan Roy" />

	<meta http-equiv="refresh" content="2;url=home.php" />

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
.loader {
  border: 6px solid #f3f3f3;
  border-radius: 50%;
  border-top: 6px solid #3498db;
  width: 60px;
  height: 60px;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

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
    
    
    <section id="fh5co-about" data-section="intro">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">EXPRESSO</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>The Blog for Everyone, The Blog for Everything</h3>
                            <!--<h3>Check Our Entire Team <a href="team.php#show" target="_blank">Here</a></h3>-->
						</div>
					</div>
                <span style="color:black">
                Expresso is All About The Users. Share your works with us so as to display them here.<br>
                Submit all your creative work here, ranging from articles, poems, stories till captured images.<br>
                Click on <a href="blog.php">BLOG</a> to list the blog posts and <a href="gallery_n.php">IMAGES PANEL</a> to view the photos.
                <br><a href="submit.php">Submit Your Content Now</a>
                </span>
                <br><br><center><div class="loader"></div></center>			
            	</div>
                
			</div>
			
        </div>
        
	</section>    
    
    <footer id="footer" role="contentinfo">
    	
		<div class="container">
			<div class="">
				<div class="col-md-12 text-center">
                <?php if (isset($_SESSION['usr_id'])) { ?>
    			<p>Last Sucessful Login :  <?php echo $_SESSION['usr_time'];  ?></p>
                <?php } ?>
					<p>Created by Dipan Roy and Team <br> &copy; MinD Webs. All Rights Reserved. </p>
					
				</div>
			</div>
			
		</div>
	</footer>
    
    
    
    </body>      