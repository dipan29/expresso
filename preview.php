<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Prewiew of Uploaded File</title>


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.jpg">

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
    
    
</head>

<body>

<section id="fh5co-work" data-section="work">
		<div class="container">
			<div class="row">
				<div class="col-md-12 section-heading text-center">
					<h2 class="to-animate">VISUAL DISPLAY</h2>
					<div class="row">
						<div class="col-md-8 col-md-offset-2 subtext to-animate">
							<h3>Check The Apperance Here.</h3>
                            
						</div>
					</div>
				</div>
			</div>
            
			<div class="row row-bottom-padded-sm">
				<div class="col-md-4 col-sm-6 col-xxs-12" id="view_upload">
					<a href="uploads/" class="fh5co-project-item image-popup to-animate">
						<img src="<?php echo $_SESSION['img_tmp'] ; ?>" class="img-responsive">

                        <div class="fh5co-text">
						<h2><?php if (isset($_SESSION['img_tmp_subject'])) { echo $_SESSION['img_tmp_subject']; } ?></h2>
						<span><?php if (isset($_SESSION['img_tmp_content'])) { echo $_SESSION['img_tmp_content']; } ?></span>
						</div>
					</a>
				</div>
            </div>
            
        </div>
      </section>
      
      <br><br>
      <center>
      <h4>Please Close This Window</h4>
      <h4>Or Press the Back Key</h4>
      </center>
      
<?php 
if (isset($_SESSION['img_tmp'])) {
	unset($_SESSION['img_tmp']); }
if (isset($_SESSION['img_tmp_subject'])) {
	unset($_SESSION['img_tmp_subject']); }
if (isset($_SESSION['img_tmp_content'])) {
	unset($_SESSION['img_tmp_content']); }
?>
      
</body>
</html>