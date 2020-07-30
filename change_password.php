<?php
session_start();
require 'includes/dbh.inc.php';

if (count($_POST) > 0){
	$password1=$_POST["currentPassword"];

	$query="SELECT * from users WHERE uid='" . $_SESSION["userId"] . "'";
    $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
    $row = mysqli_fetch_array($result);
  
    	$pwdCheck = password_verify($password1, $row['upassword']);
    if ($password1 == $pwdCheck) {
    	$hashedPwd=password_hash($_POST["newPassword"], PASSWORD_DEFAULT); 
        mysqli_query($conn, "UPDATE users set upassword='" . $hashedPwd. "' WHERE uid='" . $_SESSION["userId"] . "'");
      echo '<script>alert("Password Changed")</script>'; 

    } else
echo '<script>alert("Old Password is Wrong")</script>'; 
    
}
?>
<!DOCTYPE html>
<html lang="en">

	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="In-Grolthemes">
		<meta name="author" content="In-Grolthemes">		
		<title>In-Gro - Dashboard</title>
		
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
			<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
		
	</head>

<body>
	<!-- Category Model Start-->
	
	<!-- Header Start -->
	<?php include('header.php'); ?>
	<!-- Header End -->
	<!-- Body Start -->
	<div class="wrapper">
		<div class="In-Gro-Breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">User Account Details</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
				<?php include('myprofile.php'); ?>
	
			<div class="container">
				<div class="row">
					
						<?php include('minisidebar.php'); ?>

				<div class="col-lg-9 col-md-8">
						<div class="dashboard-right">
							<div class="row">
								<div class="col-md-12">
									<div class="main-title-tab">
										<h4><i class="uil uil-location-point"></i>Change Password</h4>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="pdpt-bg">
										<div class="pdpt-title">
											<h4>Change Password</h4>
										</div>
										<div class="address-body">
											
										<form name="frmChange" method="post" action=""
                                           onSubmit="return validatePassword()">
											<div class="address-item">
												<div class="address-icon1">
												</div>
												<div class="address-dt-all">
												
													<h4>Old Password*</h4>
													
													<div class="form-group">
														<input name="currentPassword"
												          id="currentPassword" type="password" placeholder="Enter old password" class="form-control input-md" >
													</div>
													 
												</div>
											</div>
											<div class="address-item">
												<div class="address-icon1">
												</div>
												<div class="address-dt-all">
													
													<h4>New Password*</h4>
												
													<div class="form-group">
														<input name="newPassword" id="newPassword" type="password" placeholder="Enter new password" class="form-control input-md" required>
													</div>
													 
												</div>
											</div>
											<div class="address-item">
												<div class="address-icon1">
												</div>
												<div class="address-dt-all">
													
													<h4>Re-Type New Password*</h4>
													
													<div class="form-group">
														<input name="confirmPassword" id="confirmPassword" type="password" placeholder="Enter New confirmation password" class="form-control input-md" >
													</div>
												</div>
											</div>
											<div class="address-item">
												<div >
												</div>
												<div class="address-dt-all">
																										
													<div class="form-group mb-0">
														<div class="address-btns">
															<center><button  class="save-btn14 hover-btn" name="submit">Save</button></center>
														</div>
													</div>
												</div>
											</div>
											</form>
										</div>
											
									</div>
								</div>
							</div>
						</div>
					</div>
			
	</div>
	<!-- Body End -->
	<!-- Footer Start -->
	<?php include('footer.php'); ?>
	<!-- Footer End -->

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