<?php 
session_start();
if (isset($_GET['shopid']) && isset($_GET['shopname'])) {
					$shopid=base64_decode($_GET['shopid']);
					$sn=base64_decode($_GET['shopname']);
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
		<title>In-Gro - Shop Grid</title>
		
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
	
	<!-- Filter Right Sidebar Offset Start-->
	<div class="bs-canvas bs-canvas-right position-fixed bg-cart h-100">
		<div class="bs-canvas-header side-cart-header p-3 ">
			<div class="d-inline-block  main-cart-title">Filters</div>
			<button type="button" class="bs-canvas-close close" aria-label="Close"><i class="uil uil-multiply"></i></button>
		</div> 
		<div class="bs-canvas-body filter-body">
			<div class="filter-items">
				<div class="filtr-cate-title">
					<h4>Categories</h4>
				</div>
				<div class="filter-item-body scrollstyle_4">
					<div class="cart-radio">
						<ul class="cte-select">
							<li>
								<input type="radio" id="c1" name="category1">
								<label for="c1">All</label>
							</li>
							<li>
								<input type="radio" id="c2" name="category1" checked>
								<label for="c2">Vegetables & Fruits</label>
							</li>
							<li>
								<input type="radio" id="c3" name="category1">
								<label for="c3">Grocery & Staples</label>
							</li>
							<li>
								<input type="radio" id="c4" name="category1">
								<label for="c4">Dairy & Eggs</label>
							</li>
							<li>
								<input type="radio" id="c5" name="category1">
								<label for="c5">Beverages</label>
							</li>
							<li>
								<input type="radio" id="c6" name="category1">
								<label for="c6">Snacks</label>
							</li>
							<li>
								<input type="radio" id="c7" name="category1">
								<label for="c7">Home Care</label>
							</li>
							<li>
								<input type="radio" id="c8" name="category1">
								<label for="c8">Noodles & Sauces</label>
							</li>
							<li>
								<input type="radio" id="c9" name="category1">
								<label for="c9">Personal Care</label>
							</li>
							<li>
								<input type="radio" id="c10" name="category1">
								<label for="c10">Pat Care</label>
							</li>
							<li>
								<input type="radio" id="c11" name="category1">
								<label for="c11">Mea & Seafood</label>
							</li>
							<li>
								<input type="radio" id="c12" name="category1">
								<label for="c12">Electronics</label>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="filter-items">
				<div class="filtr-cate-title">
					<h4>Brand</h4>
				</div>
				<div class="other-item-body scrollstyle_4">
					<div class="brand-list">
						<div class="search-by-catgory">
							<div class="ui search">
							  <div class="ui left icon input swdh10">
								<input class="prompt srch10" type="text" placeholder="Search by brand..">
								<i class="uil uil-search-alt icon icon1"></i>
							  </div>
							</div>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="brand_1">
							<label class="custom-control-label" for="brand_1">Brand Name</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="brand_2">
							<label class="custom-control-label" for="brand_2">Brand Name</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="brand_3">
							<label class="custom-control-label" for="brand_3">Brand Name</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="brand_4">
							<label class="custom-control-label" for="brand_4">Brand Name</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="brand_5">
							<label class="custom-control-label" for="brand_5">Brand Name</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="brand_6">
							<label class="custom-control-label" for="brand_6">Brand Name</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="brand_7">
							<label class="custom-control-label" for="brand_7">Brand Name</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="brand_8">
							<label class="custom-control-label" for="brand_8">Brand Name</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="brand_9">
							<label class="custom-control-label" for="brand_9">Brand Name</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="brand_10">
							<label class="custom-control-label" for="brand_10">Brand Name</label>
						</div>
					</div>
				</div>
			</div>
			<div class="filter-items">
				<div class="filtr-cate-title">
					<h4>Price</h4>
				</div>
				<div class="price-pack-item-body scrollstyle_4">
					<div class="brand-list">
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="price_1">
							<label class="custom-control-label" for="price_1">Less than ₹2 <span class="webproduct">(9)</span></label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="price_2">
							<label class="custom-control-label" for="price_2">₹2 to ₹5 <span class="webproduct">(8)</span></label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="price_3">
							<label class="custom-control-label" for="price_3">₹6 to ₹10 <span class="webproduct">(12)</span></label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="price_4">
							<label class="custom-control-label" for="price_4">₹11 to ₹15 <span class="webproduct">(4)</span></label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="price_5">
							<label class="custom-control-label" for="price_5">₹15 to ₹20 <span class="webproduct">(16)</span></label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="price_6">
							<label class="custom-control-label" for="price_6">₹21 to ₹25 <span class="webproduct">(18)</span></label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="price_7">
							<label class="custom-control-label" for="price_7">More than ₹25 <span class="webproduct">(25)</span></label>
						</div>
					</div>
				</div>
			</div>
			<div class="filter-items">
				<div class="filtr-cate-title">
					<h4>Discount</h4>
				</div>
				<div class="offer-item-body scrollstyle_4">
					<div class="brand-list">
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="offer_1">
							<label class="custom-control-label" for="offer_1">2% - 5% <span class="webproduct">(9)</span></label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="offer_2">
							<label class="custom-control-label" for="offer_2">6% - 10% <span class="webproduct">(5)</span></label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="offer_3">
							<label class="custom-control-label" for="offer_3">11% - 15% <span class="webproduct">(11)</span></label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="offer_4">
							<label class="custom-control-label" for="offer_4">16% - 25% <span class="webproduct">(27)</span></label>
						</div>
					</div>
				</div>
			</div>
			<div class="filter-items">
				<div class="filtr-cate-title">
					<h4>Pack Size</h4>
				</div>
				<div class="price-pack-item-body scrollstyle_4">
					<div class="brand-list">
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_1">
							<label class="custom-control-label" for="pack_1">1 pc</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_2">
							<label class="custom-control-label" for="pack_2">1 pc approx. 400 to 600 gm</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_3">
							<label class="custom-control-label" for="pack_3">1 pc approx. 500 to 800 gm</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_4">
							<label class="custom-control-label" for="pack_4">Combo 3 Items</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_5">
							<label class="custom-control-label" for="pack_5">Combo 4 Items</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_6">
							<label class="custom-control-label" for="pack_6">Combo 5 Items</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_7">
							<label class="custom-control-label" for="pack_7">2 pcs</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_8">
							<label class="custom-control-label" for="pack_8">100 g</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_9">
							<label class="custom-control-label" for="pack_9">200 g</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_10">
							<label class="custom-control-label" for="pack_10">250 g</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_11">
							<label class="custom-control-label" for="pack_11">500g</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_12">
							<label class="custom-control-label" for="pack_12">1kg</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_13">
							<label class="custom-control-label" for="pack_13">2kg</label>
						</div>
						<div class="custom-control custom-checkbox pb2">
							<input type="checkbox" class="custom-control-input" id="pack_14">
							<label class="custom-control-label" for="pack_14">3kg</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Filter Right Sidebar Offsetl End-->
		
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
								<li class="breadcrumb-item"><a href="All_Stores.php">All Stores</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo $sn;?></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>';    
		

		<div class="all-product-grid">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="product-top-dt">
							<div class="product-left-title">
								<h2><?php echo $sn;?></h2>
							</div>
							<a href="#" class="filter-btn pull-bs-canvas-right">Filters</a>
							<div class="product-sort">
								<div class="ui selection dropdown vchrt-dropdown">
									<input name="gender" type="hidden" value="default">
									<i class="dropdown icon d-icon"></i>
									<div class="text">Popularity</div>
									<div class="menu">
										<div class="item" data-value="0">Popularity</div>
										<div class="item" data-value="1">Price - Low to High</div>
										<div class="item" data-value="2">Price - High to Low</div>
										<div class="item" data-value="3">Alphabetical</div>
										<div class="item" data-value="4">Saving - High to Low</div>
										<div class="item" data-value="5">Saving - Low to High</div>
										<div class="item" data-value="6">% Off - High to Low</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="product-list-view">
					<div class="row">

						<?php
				             require '/xampp/htdocs/MainSite/includes/dbh.inc.php';

				             $sql = "SELECT product.Pid, product.Pname, product.cat_id, product.MRP, product.Discount_mrp, product.quantity, product.Descp, product.image, product.vid, product.shop_id, category.cat_id, category.cat_name, category.status from product join category on product.cat_id=category.cat_id where product.shop_id = $shopid";
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
				                    	$cat = $row['cat_id']; 
				                    	$cn =  $row['cat_name'];   					
				                    	$off=$row['Discount_mrp']/$row['MRP']*100;
				                    	$image = $row['image'];	                    	
				                       	$image_src = "uploads/".$image;
				                       	if($row['quantity']<5)
				                       		$st="Not in Stock";
				                         else
				                         	$st="In Stock";

				                       echo '
				        <div class="col-lg-3 col-md-6">
							<div class="product-item mb-30">
								<a href="single_product_view.php?pid='.base64_encode($row["Pid"]).'&catname='.base64_encode($cn).'&catid='.base64_encode($cat).'" class="product-img">
									<img src="uploads/'.$image.'" alt="">
									<div class="product-absolute-options">
										<span class="offer-badge-1">'.number_format($off, 0).'% off</span>
										<span class="like-icon" title="wishlist"></span>
									</div>
								</a>
								<div class="product-text-dt">
									<p>'.$st.'</span></p>
									<h4>'.$row["Pname"].'</h4>
									<div class="product-price">₹'.$row["Discount_mrp"].' <span>₹'.$row["MRP"].'</span></div>			
								</div>
							</div>
						</div>
				                       ';
				                   }
				                  }
				                }
				         ?>
						
																
						<div class="col-md-12">
							<div class="more-product-btn">
								<button class="show-more-btn hover-btn">Show More</button>
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
	<script src="js/offset_overlay.js"></script>
	<script src="js/night-mode.js"></script>
	
	
</body>

</html>