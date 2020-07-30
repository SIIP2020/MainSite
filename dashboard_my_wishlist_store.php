<!DOCTYPE html>
<html lang="en">

	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="In-Grolthemes">
		<meta name="author" content="In-Grolthemes">		
		<title>In-Gro - My Wishlist</title>
		
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
								<li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
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
								<div class="col-md-12">
									<div class="main-title-tab">
										<h4><i class="uil uil-heart"></i>Product Wishlist</h4>
									</div>
								</div>								
								<div class="col-lg-12 col-md-12">
									<div class="pdpt-bg">
										<div class="wishlist-body-dtt">
											<div class="cart-item">
												<div class="cart-product-img">
													<img src="images/product/img-11.jpg" alt="">
													
												</div>
												<div class="cart-text">
													<h4>Store Title Here</h4>
													<div class="cart-item-price">Address</div>
													<button type="button" class="cart-close-btn"><i class="uil uil-trash-alt"></i></button>
												</div>		
											</div>
											<div class="cart-item">
												<div class="cart-product-img">
													<img src="images/product/img-2.jpg" alt="">
													
												</div>
												<div class="cart-text">
													<h4>Store Title Here</h4>
													<div class="cart-item-price">Address </div>
													<button type="button" class="cart-close-btn"><i class="uil uil-trash-alt"></i></button>
												</div>		
											</div>
											<div class="cart-item">
												<div class="cart-product-img">
													<img src="images/product/img-14.jpg" alt="">
												</div>
												<div class="cart-text">
													<h4>Store Title Here</h4>
													<div class="cart-item-price">Address</div>
													<button type="button" class="cart-close-btn"><i class="uil uil-trash-alt"></i></button>
												</div>		
											</div>
										</div>
									</div>
								</div>
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