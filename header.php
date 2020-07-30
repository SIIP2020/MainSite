
<!DOCTYPE html>
<html lang="en">

	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="In-Grolthemes">
		<meta name="author" content="In-Grolthemes">		
		<title>In-Gro - header</title>
		
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
	<div id="category_model" class="header-cate-model main-In-Gro-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
        <div class="modal-dialog category-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
                    </button>
                </div>
                <div class="category-model-content modal-content"> 
					<div class="cate-header">
						<h4>Select Category</h4>
					</div>
					<ul class="category-by-cat">

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
                                       
                                        <li>
											<a href="shop_grid.php?cat='.base64_encode($row["cat_id"]).'&catname='.base64_encode($row["cat_name"]).'" class="single-cat-item">
												<div class="icon">
											      <img src="uploads/'.$image.'" alt="">
												</div>
												<div class="text"> '.$row["cat_name"].' </div>
											</a>
				   					   </li>
				          
				                          ';
				                    }
				                }
				         }
			        ?>
                   
                    </ul>
					<a href="#" class="morecate-btn"><i class="uil uil-apps"></i>More Categories</a>
                </div>
            </div>
        </div>
    </div>
	<!-- Category Model End-->
	<!-- Search Model Start-->
	<div id="search_model" class="header-cate-model main-In-Gro-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
        <div class="modal-dialog search-ground-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
                    </button>
                </div>
                <div class="category-model-content modal-content"> 
					<div class="search-header">
						<form action="search.php" method="post">
							<input class="prompt srch10" name="search" type="text" placeholder="Search for products..">
						</form>
					</div>
					<div class="search-by-cat">
						<?php 
						 mysqli_stmt_execute($stmt);
                           	 $result = mysqli_stmt_get_result($stmt);
                             if(mysqli_num_rows($result)>0)
                                { 
                                    while ($row = mysqli_fetch_assoc($result)) {
                                   	$image = $row['image'];
                                   		                                       
                                    echo '
                                       
                                        
											<a href="shop_grid.php?cat='.base64_encode($row["cat_id"]).'&catname='.base64_encode($row["cat_name"]).'" class="single-cat">
												<div class="icon">
											      <img src="uploads/'.$image.'" alt="">
												</div>
												<div class="text"> '.$row["cat_name"].' </div>
											</a>
				   					   
				          
				                          ';
				                    }
				                }
						?>
                        
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--Search Model End-->
	<!-- Cart Sidebar Offset Start-->
<?php include('cart_display.php'); ?>

	

<header class="header clearfix">
		<div class="top-header-group">
			<div class="top-header">
				<div class="res_main_logo">
					<a href="index.php"><img src="images/ingro.png" alt=""></a>
				</div>
				<div class="main_logo" id="logo">
					<a href="index.php"><img src="images/ingro.png" alt=""></a>
					<a href="index.php"><img class="logo-inverse" src="images/ingro.png" alt=""></a>
				</div>
				<div class="select_location">
					<div class="ui inline dropdown loc-title">
						<div class="text">
						  <i class="uil uil-location-point"></i>
						  Pune
						</div>
						<i class="uil uil-angle-down icon__14"></i>
						<div class="menu dropdown_loc">
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								Pune
							</div>
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								New Delhi
							</div>
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								Bangaluru
							</div>
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								Mumbai
							</div>
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								Hyderabad
							</div>
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								Kolkata
							</div>
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								Ludhiana
							</div>
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								Chandigrah
							</div>
						</div>
					</div>
				</div>
				<div class="search120">
					<div class="ui search">
					  <div class="search-header">
					  	
					  	<form action="search.php" method="post">
							<input class="prompt srch10" name="search" type="text" placeholder="Search for products..">
						</form>
						
					  </div>
					</div>
				</div>
				<div class="header_right">
					<ul>
						<li>
							<a href="#" class="offer-link"><i class="uil uil-phone-alt"></i>9766049372</a>
						</li>
						<li>
							<a href="Shop_req_send.php" class="offer-link">Become Our Patners</a>
						</li>
						<li>
							<a href="faq.php" class="offer-link"><i class="uil uil-question-circle"></i>Help</a>
						</li>
						<li>
							<a href="dashboard_my_wishlist.php" class="option_links" title="Wishlist"><i class='uil uil-heart icon_wishlist'></i><span class="noti_count1">3</span></a>
						</li>
						<?php
                        if (isset($_SESSION['userId'])) {
                        echo'
                        <li class="ui dropdown">
							<a href="#" class="opts_account">
								<img src="images/avatar/img-5.jpg" alt="">
								<span class="user__name">'.$_SESSION['username'].'</span>
								<i class="uil uil-angle-down"></i>
							</a>
							<div class="menu dropdown_account">
								<div class="night_mode_switch__btn">
									<a href="#" id="night-mode" class="btn-night-mode">
										<i class="uil uil-moon"></i> Night mode
										<span class="btn-night-mode-switch">
											<span class="uk-switch-button"></span>
										</span>
									</a>
								</div>	
								<a href="dashboard_overview.php" class="item channel_item"><i class="uil uil-apps icon__1"></i>Dashbaord</a>								
								<a href="dashboard_my_orders.php" class="item channel_item"><i class="uil uil-box icon__1"></i>My Orders</a>
								<a href="dashboard_my_wishlist.php" class="item channel_item"><i class="uil uil-heart icon__1"></i>My Wishlist</a>
								<a href="dashboard_my_addresses.php" class="item channel_item"><i class="uil uil-location-point icon__1"></i>My Address</a>
								<a href="offers.php" class="item channel_item"><i class="uil uil-gift icon__1"></i>Offers</a>
								<a href="faq.php" class="item channel_item"><i class="uil uil-info-circle icon__1"></i>Faq</a>
								<a href="logout.php" class="item channel_item"><i class="uil uil-lock-alt icon__1"></i>Logout</a>
							</div>
						</li>';
                        }

                         else{
                                echo '
                                <li>
	                                <a href="Sign_up.php" class="opts_account">							
									<span class="user__name">Sign Up</span>
									</a>
                                </li>
                                <li>
	                                <a href="Sign_in.php" class="opts_account">							
									<span class="user__name">Login</span>								
							    	</a>
                                </li>';
                             }

                    ?>


						


					</ul>
				</div>
			</div>
		</div>
		<div class="sub-header-group">
			<div class="sub-header">
				<div class="ui dropdown">
					<a href="#" class="category_drop hover-btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i><span class="cate__icon">Select Category</span></a>
				</div>
				<nav class="navbar navbar-expand-lg navbar-light py-3">
					<div class="container-fluid">
						<button class="navbar-toggler menu_toggle_btn" type="button" data-target="#navbarSupportedContent"><i class="uil uil-bars"></i></button>
						<div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu" id="navbarSupportedContent">
							<ul class="navbar-nav main_nav align-self-stretch">
								<li class="nav-item"><a href="index.php" class="nav-link active" title="Home">Home</a></li>
								<li class="nav-item"><a href="All_Stores.php" class="nav-link new_item" title="Stores">Stores</a></li><li class="nav-item">
									<div class="ui icon top left dropdown nav__menu">
										<a class="nav-link" title="Pages">Account Details <i class="uil uil-angle-down"></i></a>
										<div class="menu dropdown_page">
											<a href="dashboard_overview.php" class="item channel_item page__links">Account</a>
											<a href="order_placed.php" class="item channel_item page__links">Order Placed</a>										
											
										</div>
									</div>
								</li>
								<li class="nav-item"><a href="contact_us.php" class="nav-link" title="Contact">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="catey__icon">
					<a href="#" class="cate__btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i></a>
				</div>
				<div class="header_cart order-1">
					<a href="#" class="cart__btn hover-btn pull-bs-canvas-left" title="Cart"><i class="uil uil-shopping-cart-alt"></i><span>Cart</span><ins>
						<?php
			if(isset($_SESSION["total_items"]))
				$ti=$_SESSION["total_items"];
					else
				$ti = 0;
			echo $ti;?>
					</ins><i class="uil uil-angle-down"></i></a>
				</div>
				<div class="search__icon order-1">
					<a href="#" class="search__btn hover-btn" data-toggle="modal" data-target="#search_model" title="Search"><i class="uil uil-search"></i></a>
				</div>
			</div>
		</div>
	</header>
	<!-- Header End -->
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