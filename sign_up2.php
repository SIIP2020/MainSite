 <?php
 session_start();
 	if (isset($_GET['error'])) {
 		if ($_GET['error'] == 'emptyfields') {
 			alert("Fill in all fields.");
 		}
 		

 		if($_GET['signup'] == 'success') {
 		alert ("Signup successful. ");
 		header("Location: ../sign_up.php?signup=success");
        exit();
 	    }
 	}
     
    function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
    }

 	?>






<html lang="en">
	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="In-Grolthemes">
		<meta name="author" content="In-Grolthemes">		
		<title>In-Gro - Sign Up</title>
		
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="images/fav.png">
		
		<!-- Stylesheets -->
		<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/night-mode.css" rel="stylesheet">
		<link href="css/step-wizard.css" rel="stylesheet">
		
		<!-- Vendor Stylesheets -->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">	
		
	</head>

<body>
	<div class="sign-inup">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="sign-form">
						<div class="sign-inner">
							<div class="sign-logo" id="logo">
								<a href="index.html"><img src="images/logo.svg" alt=""></a>
								<a href="index.html"><img class="logo-inverse" src="images/dark-logo.svg" alt=""></a>
							</div>
							<div class="form-dt">
								<div class="form-inpts checout-address-step">

									<form action="includes/signup.inc.php" method="post">
										
										<div class="form-title"><h6>Sign Up</h6></div>
									
										<div class="form-group pos_rel">
											<input id="full[name]" name="fullname" type="text" placeholder="Full name" class="form-control lgn_input" required="">
											<i class="uil uil-user-circle lgn_icon"></i>
										</div>

										<div class="form-group pos_rel">
											<input id="email[address]" name="emailaddress" type="email" placeholder="Email Address" class="form-control lgn_input" required="">
											<i class="uil uil-envelope lgn_icon"></i>
										</div>
																				
										<div class="form-group pos_rel">
											<input id="password1" name="password1" type="password" placeholder="New Password" class="form-control lgn_input" required="">
											<i class="uil uil-padlock lgn_icon"></i>
										</div>


										<input type="hidden"  name="phone" value="<?php echo $mobile; ?>" >
										
										<button class="login-btn hover-btn" type="submit" name="submit">Sign Up Now</button>
									</form>
								</div>
								<div class="signup-link">
									<p>I have an account? - <a href="sign_in.html">Sign In Now</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="copyright-text text-center mt-3">
						<i class="uil uil-copyright"></i>Copyright 2020 <b>In-Grolthemes</b> . All rights reserved
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Javascripts -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/OwlCarousel/owl.carousel.js"></script>
	<script src="vendor/semantic/semantic.min.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/product.thumbnail.slider.js"></script>
	<script src="js/offset_overlay.js"></script>
	<script src="js/night-mode.js"></script>
	
	
</body>

</html>