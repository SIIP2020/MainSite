<?php 
session_start();
/*if (!isset($_SESSION['userId'])) {
	$temp=0;
	$_SESSION['userid']= $temp;
}*/
 ?>
<!DOCTYPE html>
<html lang="en">

	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="In-Grolthemes">
		<meta name="author" content="In-Grolthemes">		
		<title>In-Gro - Index</title>
		
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="images/fav.png">
		
		<!-- Stylesheets -->
		<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="css/style.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/night-mode.css" rel="stylesheet">
		
		<!-- Vendor Stylesheets -->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">	
		
	</head>

<body>
	
	
	<!-- Header Start -->
	<?php include('header.php'); ?>
	<!-- Body Start -->
	<div class="wrapper">
		<!-- Offers Start -->
		<div class="main-banner-slider">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="owl-carousel offers-banner owl-theme">
							<div class="item">
								<div class="offer-item">								
									<div class="offer-item-img">
										<div class="In-Gro-overlay"></div>
										<img src="images/banners/offer-1.jpg" alt="">
									</div>
									<div class="offer-text-dt">
										<div class="offer-top-text-banner">
											<p>6% Off</p>
											<div class="top-text-1">Buy More & Save More</div>
											<span>Fresh Vegetables</span>
										</div>
										<a href="#" class="Offer-shop-btn hover-btn">Shop Now</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="offer-item">								
									<div class="offer-item-img">
										<div class="In-Gro-overlay"></div>
										<img src="images/banners/offer-2.jpg" alt="">
									</div>
									<div class="offer-text-dt">
										<div class="offer-top-text-banner">
											<p>5% Off</p>
											<div class="top-text-1">Buy More & Save More</div>
											<span>Fresh Fruits</span>
										</div>
										<a href="#" class="Offer-shop-btn hover-btn">Shop Now</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="offer-item">								
									<div class="offer-item-img">
										<div class="In-Gro-overlay"></div>
										<img src="images/banners/offer-3.jpg" alt="">
									</div>
									<div class="offer-text-dt">
										<div class="offer-top-text-banner">
											<p>3% Off</p>
											<div class="top-text-1">Hot Deals on New Items</div>
											<span>Daily Essentials Eggs & Dairy</span>
										</div>
										<a href="#" class="Offer-shop-btn hover-btn">Shop Now</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="offer-item">								
									<div class="offer-item-img">	
										<div class="In-Gro-overlay"></div>
										<img src="images/banners/offer-4.jpg" alt="">
									</div>
									<div class="offer-text-dt">
										<div class="offer-top-text-banner">
											<p>2% Off</p>
											<div class="top-text-1">Buy More & Save More</div>
											<span>Beverages</span>
										</div>
										<a href="#" class="Offer-shop-btn hover-btn">Shop Now</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="offer-item">								
									<div class="offer-item-img">
										<div class="In-Gro-overlay"></div>
										<img src="images/banners/offer-5.jpg" alt="">
									</div>
									<div class="offer-text-dt">
										<div class="offer-top-text-banner">
											<p>3% Off</p>
											<div class="top-text-1">Buy More & Save More</div>
											<span>Nuts & Snacks</span>
										</div>
										<a href="#" class="Offer-shop-btn hover-btn">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Offers End -->
		<!-- Categories Start -->
		<div class="section145">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title-tt">
							<div class="main-title-left">
								<span>Shop By</span>
								<h2>Categories</h2>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="owl-carousel cate-slider owl-theme">

							<?php
				        require '/xampp/htdocs/MainSite/includes/dbh.inc.php';
                        $sql = "SELECT * from category ";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql)) {
                          echo"errorrrr";
                          exit(); 	
                         }
                        else 
                         {
                           	 mysqli_stmt_execute($stmt);
                           	 $result = mysqli_stmt_get_result($stmt);
                             if(mysqli_num_rows($result)>0)
                                { 
                                    while ($row = mysqli_fetch_assoc($result)) {
                                   	$image = $row['image'];
                                   		                                       
                                    echo '                   
                            <div class="item">
								<a href="shop_grid.php?cat='.base64_encode($row["cat_id"]).'&catname='.base64_encode($row["cat_name"]).'" class="category-item">
									<div class="cate-img">
										<img src="uploads/'.$image.'" alt="">
									</div>
									<h4>'.$row["cat_name"].'</h4>
								</a>
							</div>	
				                          ';
				                    }
				                }
				         }
			        ?>					
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Categories End -->
		<!-- Featured Products Start -->
		<div class="section145">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title-tt">
							<div class="main-title-left">
								<span>For You</span>
								<h2>Top Featured Stores</h2>
							</div>
							<a href="#" class="see-more-btn">See All</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="owl-carousel featured-slider owl-theme">
							<?php

					$sql2 = "SELECT * from shop";
					if (!mysqli_stmt_prepare($stmt,$sql2)) {
                          echo"errorrrr";
                          exit(); 	
                         }
                        else 
                         {
                         	 mysqli_stmt_execute($stmt);
                           	 $result2 = mysqli_stmt_get_result($stmt);
                           	  if(mysqli_num_rows($result2)>0)
                                { 
                                    while ($row = mysqli_fetch_assoc($result2)) 
                                    {
                             $status = $row['status'];
                       		$image = $row['shop_image'];                       		
                       		$ot= date("g:i A",strtotime($row['open_time']));      		
                       		$ct=date("g:i A",strtotime($row['close_time']));
                       		date_default_timezone_set('Asia/Kolkata');
                       		if($status=="Active"){
                       			if(time()>=strtotime($row['open_time']) && time()<strtotime($row['close_time']))
                       			{
                       				echo'
							<div class="item">
								<div class="product-item">
									<a href="Shops.php?shopid='.base64_encode($row["shop_id"]).'&shopname='.base64_encode($row["shop_name"]).'" class="product-img">
										<img src="uploads/'.$image.'" alt="">
										<br>
										<div class="product-text-dt">
										<h4>'.$row["shop_name"].'</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>'.$row["street_address"].'</p>
										<p>Open, Closes at '.$ct.'</p>
										</div>
								</div>
							</div>';	
                       			}
                       			else{
                       				echo'
							<div class="item">
								<div class="product-item">
									<a href="#" class="product-img">
										<img src="uploads/'.$image.'" alt="">
										<br>
										<div class="product-text-dt">
										<h4>'.$row["shop_name"].'</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>'.$row["street_address"].'</p>
										<p>Closed</p>
										</div>
								</div>
							</div>';	
                       			}
                       		}

                                   		
                                   	}
                                 }
                         }		

							
							?>					
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
		<!-- Featured Products End -->
		<!-- Best Values Offers Start -->
		<div class="section145">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title-tt">
							<div class="main-title-left">
								<span>Offers</span>
								<h2>Best Values</h2>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<a href="#" class="best-offer-item">
							<img src="images/best-offers/offer-1.jpg" alt="">
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a href="#" class="best-offer-item">
							<img src="images/best-offers/offer-2.jpg" alt="">
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a href="#" class="best-offer-item offr-none">
							<img src="images/best-offers/offer-3.jpg" alt="">
							<div class="cmtk_dt">
								<div class="product_countdown-timer offer-counter-text" data-countdown="2021/01/06"></div>
							</div>
						</a>
					</div>
					<div class="col-md-12">
						<a href="#" class="code-offer-item">
							<img src="images/best-offers/offer-4.jpg" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Best Values Offers End -->
		<!-- Vegetables and Fruits Start -->
		<div class="section145">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title-tt">
							<div class="main-title-left">
								<span>Discover the best places around your area</span>
								<h2>Trending grocery stores</h2>
							</div>
							<a href="#" class="see-more-btn">See All</a>
						</div>
					</div>
					
					
					<div class="col-md-12">
						<div class="owl-carousel featured-slider owl-theme">
							<div class="item">
								<div class="product-item">
									<a href="shop_grid.php" class="product-img">
										<img src="images/product/img-11.jpg" alt="">
										<br>
										<div class="product-text-dt">
										<h4>Raveena Super Market</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>Address</p>
										</div>
								</div>
							</div>
							<div class="item">
								<div class="item">
								<div class="product-item">
									<a href="shop_grid.php" class="product-img">
										<img src="images/product/img-11.jpg" alt="">
										<br>
										<div class="product-text-dt">
										<h4>Raveena Super Market</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>Address</p>
										</div>
								</div>
							</div>
							</div>
							<div class="item">
								<div class="item">
								<div class="product-item">
									<a href="shop_grid.php" class="product-img">
										<img src="images/product/img-11.jpg" alt="">
										<br>
										<div class="product-text-dt">
										<h4>Raveena Super Market</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>Address</p>
										</div>
								</div>
							</div>
							</div>
							<div class="item">
								<div class="item">
								<div class="product-item">
									<a href="shop_grid.php" class="product-img">
										<img src="images/product/img-11.jpg" alt="">
										<br>
										<div class="product-text-dt">
										<h4>Raveena Super Market</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>Address</p>
										</div>
								</div>
							</div>
							</div>
							<div class="item">
								<div class="item">
								<div class="product-item">
									<a href="shop_grid.php" class="product-img">
										<img src="images/product/img-11.jpg" alt="">
										<br>
										<div class="product-text-dt">
										<h4>Raveena Super Market</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>Address</p>
										</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					
					
					
					
				</div>
			</div>
		</div>
		<!-- Vegetables and Fruits Products End -->
		<!-- New Products Start -->
		<div class="section145">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title-tt">
							<div class="main-title-left">
								<span>For You</span>
								<h2>New Added Stores</h2>
							</div>
							<a href="#" class="see-more-btn">See All</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="owl-carousel featured-slider owl-theme">
							<div class="item">
								<div class="product-item">
									<a href="shop_grid.php" class="product-img">
										<img src="images/product/img-11.jpg" alt="">
										<br>
										<div class="product-text-dt">
										<h4>Raveena Super Market</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>Address</p>
										</div>
								</div>
							</div>
							<div class="item">
								<div class="item">
								<div class="product-item">
									<a href="shop_grid.php" class="product-img">
										<img src="images/product/img-11.jpg" alt="">
										<br>
										<div class="product-text-dt">
										<h4>Raveena Super Market</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>Address</p>
										</div>
								</div>
							</div>
							</div>
							<div class="item">
								<div class="item">
								<div class="product-item">
									<a href="shop_grid.php" class="product-img">
										<img src="images/product/img-11.jpg" alt="">
										<br>
										<div class="product-text-dt">
										<h4>Raveena Super Market</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>Address</p>
										</div>
								</div>
							</div>
							</div>
							<div class="item">
								<div class="item">
								<div class="product-item">
									<a href="shop_grid.php" class="product-img">
										<img src="images/product/img-11.jpg" alt="">
										<br>
										<div class="product-text-dt">
										<h4>Raveena Super Market</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>Address</p>
										</div>
								</div>
							</div>
							</div>
							<div class="item">
								<div class="item">
								<div class="product-item">
									<a href="shop_grid.php" class="product-img">
										<img src="images/product/img-11.jpg" alt="">
										<br>
										<div class="product-text-dt">
										<h4>Raveena Super Market</h4>
									</div>
										<div class="product-absolute-options">
											
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									
									<div class="product-text-dt">
										<p>Address</p>
										</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>
		<!-- New Products End -->
	</div>
	<!-- Body End -->
	<!-- Footer Start -->
	<?php include('footer.php'); ?>
	<!-- Javascripts -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/OwlCarousel/owl.carousel.js"></script>
	<script src="vendor/semantic/semantic.min.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/offset_overlay.js"></script>
	<script src="js/night-mode.js"></script>
	
	
</body>

</html>