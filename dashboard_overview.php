<?php 
session_start();
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
	
		<div class="">
			<div class="container">
				<div class="row">
					
						<?php include('minisidebar.php'); ?>

					<div class="col-lg-9 col-md-8">
						<div class="dashboard-right">
							<div class="row">
								                	<?php
								        require '/xampp/htdocs/MainSite/includes/dbh.inc.php';

                	
                	                   if (isset($_SESSION['userId']))
                	                       {
	                                        $uid=$_SESSION['userId'];
	                              

				                                    $sql = "SELECT * FROM users WHERE uid=$uid";
				                                    $stmt = mysqli_stmt_init($conn);
				                                    if (!mysqli_stmt_prepare($stmt,$sql)) {
				    	                                 header("Location: ../dashboard_overview.php?error=sqlerror");
				                                         exit(); 	
				    	                               }
				    	                            else 
				    	                           {
				    	                           	 mysqli_stmt_execute($stmt);
				    	                           	 $result = mysqli_stmt_get_result($stmt);
				                                    if(mysqli_num_rows($result)>0)
				                                    { 
				                                       while ($row = mysqli_fetch_assoc($result)) {
				                                       ?>
								<div class="col-md-12">
									<div class="main-title-tab">
										<h4><i class="uil uil-apps"></i>Overview</h4>
									</div>
									<div class="welcome-text">
										<h2>Hi! <?php echo $row['uidUsers'] ?></h2><!-- Fetch User name -->
									</div>
								</div>
								
								<div class="col-lg-6 col-md-12">
									<div class="pdpt-bg">
										<div class="pdpt-title">
											<h4>My Orders</h4>
										</div>
										<div class="ddsh-body">
											<h2>2 Recently Purchases</h2><!-- Fetch Number of orders -->
											<ul class="order-list-145">
												<li>
													<div class="smll-history">
														<div class="order-title">Orange  </div>
														<div class="order-status">On the way</div>
														<p>₹22</p>
													</div>
													<div class="smll-history">
														<div class="order-title">Apple  </div>
														<div class="order-status">On the way</div>
														<p>₹25</p>
													</div>
												</li>
											</ul>
										</div>
										
										<a href="dashboard_my_orders.php" class="more-link14">All Orders <i class="uil uil-angle-double-right"></i></a>
									</div>
								</div>
								                    <?php 
											      }
				                                   }
				                                }}
				                                
				                             
				                                    ?>
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