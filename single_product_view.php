<?php 
session_start();
if (isset($_GET['pid'])&&isset($_GET['catname'])&&isset($_GET['catid'])) {
	 $pid=base64_decode($_GET['pid']);
	 $cn = base64_decode($_GET['catname']);
	 $cat= base64_decode($_GET['catid']);
	}

require '/xampp/htdocs/Mainsite/includes/dbh.inc.php';
$sql = "SELECT * from product where Pid = $pid";
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
            $row = mysqli_fetch_assoc($result);
           	$image2 = $row['image'];
           	$image_src = "uploads/".$image2;
           	$pname=$row['Pname'];
           	$mrp=$row['MRP'];
           	$discmrp = $row['Discount_mrp'];
           	$off=$row['Discount_mrp']/$row['MRP']*100;
           	$description= $row['Descp'];
           	$vendor_id=$row['vid'];
           	$shopid=$row['shop_id'];
           	$pq = $row['quantity']; 
           	if($row['quantity']<5)
				$st="Not in Stock";
				   else
				$st="In Stock";

           	$sql2 = "SELECT shop_name from shop where shop_id = $shopid";
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
		          	$row = mysqli_fetch_assoc($result2);
		          	$shop_name = $row['shop_name'];
		           }
		          		           
		    }

		   
        }
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
		<title>In-Gro - Single Product View</title>
		
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		

		
	</head>

<body>
	<!-- Share Icons Start-->
	<div class="icon-bar">
	  <a href="#" class="facebook" title="Share"><i class="fab fa-facebook-f"></i></a> 
	  <a href="#" class="twitter" title="Share"><i class="fab fa-twitter"></i></a> 
	  <a href="#" class="google" title="Share"><i class="fab fa-google"></i></a> 
	  <a href="#" class="linkedin" title="Share"><i class="fab fa-linkedin-in"></i></a>
	  <a href="#" class="whatsapp" title="Share"><i class="fab fa-whatsapp"></i></a> 
	</div>
	
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
								<?php
								echo'
								<li class="breadcrumb-item">
									<a href="shop_grid.php?catname='.base64_encode($cn).'&cat='.base64_encode($cat).'">'.$cn.'</a>
								</li>';
								?>
								<!-- Need to Fetch product category -->
								<li class="breadcrumb-item active" aria-current="page"><?php echo $pname; ?></li>   <!-- Need to Fetch product name -->
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="all-product-grid">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="product-dt-view">
							<div class="row">

								<div class="col-lg-4 col-md-4">
									<div id="sync1" class="owl-carousel owl-theme">
										<div class="item">
											<img src=<?php echo $image_src;?> alt="">
											<div class="product-absolute-options">
										<span class="offer-badge-1"><?php 
										echo number_format($off, 0) ;?>% off</span>
										<span class="like-icon" title="wishlist"></span>
									</div>
										</div>
										
									</div>
									
								</div>
								<div class="col-lg-8 col-md-8">

									<div class="product-dt-right">

									  <form method="post" action="<?php echo 'includes/cart.php?pid='.base64_encode($pid);?>" >
										<h2><?php echo $pname; ?></h2>
										<div class="no-stock">
											<p class="pd-no">Product No.<span><?php echo $pid; ?></span></p><!-- Need to Fetch product Number From Database -->
											<p class="stock-qty"><span>(<?php echo $st; ?>)</span></p><!-- Need to Check if it is available or not from database -->
											<?php if($pq==5){echo'
											<br><p>
												<span>(Last '.$pq.' in stock)</span>
											</p>';}?>
											
											<br>
											<p class="pd-no">Sold by:<span><?php echo $shop_name; ?></span></p>
										</div>
										<div class="product-radio"><!-- We will Provide 4 Options for vender while uploading his product ---the 4 options will be fetch below -->
											<ul class="product-now">
												<li>
													<input type="radio" id="p1" name="product1">
													<label for="p1">500g</label><!-- Need to Fetch Option 1 -->
												</li>									
											</ul>
										</div>
										<!-- Need to Fetch Info of product from database -->
										<p class="pp-descp"><?php echo $description; ?></p>

										<input type="hidden" name="product_id" value="<?php echo $pid; ?>" />	
										<input type="hidden" name="product_name" value="<?php echo $pname; ?>" />
										<input type="hidden" name="product_price" value="<?php echo $discmrp; ?>" />

										<input type="hidden" name="product_image" value="<?php echo $image_src; ?>" />
										<input type="hidden" name="product_imagename" value="<?php echo $image2; ?>" />

										<input type="hidden" name="user_id" value="<?php echo $_SESSION['userId']; ?>" />
										
										<input type="hidden" name="mrp" value="<?php echo $mrp; ?>" />
										<input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>" />	


										<div class="product-group-dt">
											<ul>
												<li><div class="product-text-dt color-discount">
												<div class="product-text-dt">
													MRP 
													<div class="product-price color-discount">
														₹<?php echo $discmrp; ?><span>₹<?php echo $mrp; ?></span>
													</div>
												</div>
												</div></li>
												
											</ul>
											<ul class="gty-wish-share">
												<li>
													<div class="qty-product">
														<div class="quantity buttons_added">
															<input type="button" value="-" onclick="decrease();" class="minus minus-btn">
															
															<input type="number" id="q" name="product_quantity" value="1" class="input-text qty text">

															<input type="button" value="+" onclick="increase(<?php  echo $pq;?>);" class="plus plus-btn">
															<input type="hidden" name="stock" value="<?php  echo $pq;?>">
		<script>
			function decrease()
			{
				
				var d=parseInt(document.getElementById("q").value);
				var t=d-1;
				//alert(t);
				if(d==1)
					document.getElementById("q").value=1;
				else
					document.getElementById("q").value=t;
			}
			function increase(pq)
			{
				var d=parseInt(document.getElementById("q").value);
				var t=d+1;
				if(pq<t ){
					document.getElementById("q").value=d;
				}
				else
				{
			 		document.getElementById("q").value=t;
				}
				
			}
		</script>
														</div>
													</div>
												</li>
												<li><span class="like-icon save-icon" title="wishlist"></span></li>
											</ul>
			<?php 
			  if(isset($_SESSION["vendor_id"]))
				{
					if($_SESSION["vendor_id"] == $vendor_id)
					{
						echo '<ul class="ordr-crt-share">
								<li>
									<button class="add-cart-btn hover-btn" name="add_to_cart" value="Add to value">
										<i class="uil uil-shopping-cart-alt" ></i>Add to Cart
									</button>
								</li>		
							  </ul>';
					}
					else
					{
						echo '<ul class="ordr-crt-share">
								<li>
									<button class="add-cart-btn hover-btn" name="add_to_cart" value="Add to value" disabled>
										<i class="uil uil-shopping-cart-alt" ></i>Add to Cart
									</button>
								</li>		
							  </ul>';
					}
				}
				else
				{
					echo '<ul class="ordr-crt-share">
								<li>
									<button class="add-cart-btn hover-btn" name="add_to_cart" value="Add to value">
										<i class="uil uil-shopping-cart-alt" ></i>Add to Cart
									</button>
								</li>		
							  </ul>';	
				}
			 ?>								
											
										</div>
										</form>


										<div class="pdp-details">
											<ul>
												<li>
													<div class="pdp-group-dt">
														<div class="pdp-icon"><i class="uil uil-usd-circle"></i></div>
														<div class="pdp-text-dt">
															<span>Lowest Price Guaranteed</span>
															<p>Get difference refunded if you find it cheaper anywhere else.</p>
														</div>
													</div>
												</li>
												<li>
													<div class="pdp-group-dt">
														<div class="pdp-icon"><i class="uil uil-cloud-redo"></i></div>
														<div class="pdp-text-dt">
															<span>Easy Returns & Refunds</span>
															<p>Return products at doorstep and get refund in seconds.</p>
														</div>
													</div>
												</li>
											</ul>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<div class="pdpt-bg">
							<div class="pdpt-title">
								<h4>More Like This</h4>
							</div>
							<div class="pdpt-body scrollstyle_4">
								<div class="cart-item border_radius">
									<a href="single_product_view.php" class="cart-product-img">
										<img src="images/product/img-6.jpg" alt="">
										<div class="offer-badge">4% OFF</div>
									</a>
									<div class="cart-text">
										<h4>Product Title Here</h4>
										<div class="cart-radio">
											<ul class="kggrm-now">
												<li>
													<input type="radio" id="k1" name="cart1">
													<label for="k1">0.50</label>
												</li>
												<li>
													<input type="radio" id="k2" name="cart1">
													<label for="k2">1kg</label>
												</li>
												<li>
													<input type="radio" id="k3" name="cart1">
													<label for="k3">2kg</label>
												</li>
												<li>
													<input type="radio" id="k4" name="cart1">
													<label for="k4">3kg</label>
												</li>
											</ul>
										</div>
										<div class="qty-group">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<div class="cart-item-price">₹12 </div>
										</div>
									</div>
								</div>
								<div class="cart-item border_radius">
									<a href="single_product_view.php" class="cart-product-img">
										<img src="images/product/img-2.jpg" alt="">
										<div class="offer-badge">6% OFF</div>
									</a>
									<div class="cart-text">
										<h4>Product Title Here</h4>
										<div class="cart-radio">
											<ul class="kggrm-now">
												<li>
													<input type="radio" id="k5" name="cart2">
													<label for="k5">0.50</label>
												</li>
												<li>
													<input type="radio" id="k6" name="cart2">
													<label for="k6">1kg</label>
												</li>
												<li>
													<input type="radio" id="k7" name="cart2">
													<label for="k7">2kg</label>
												</li>
											</ul>
										</div>
										<div class="qty-group">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<div class="cart-item-price">₹24 </div>
										</div>	
									</div>
								</div>
								<div class="cart-item border_radius">
									<a href="single_product_view.php" class="cart-product-img">
										<img src="images/product/img-5.jpg" alt="">
									</a>
									<div class="cart-text">
										<h4>Product Title Here</h4>
										<div class="cart-radio">
											<ul class="kggrm-now">
												<li>
													<input type="radio" id="k8" name="cart3">
													<label for="k8">0.50</label>
												</li>
												<li>
													<input type="radio" id="k9" name="cart3">
													<label for="k9">1kg</label>
												</li>
												<li>
													<input type="radio" id="k10" name="cart3">
													<label for="k10">1.50kg</label>
												</li>
											</ul>
										</div>
										<div class="qty-group">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<div class="cart-item-price">₹15</div>
										</div>	
									</div>
								</div>	
							</div>
						</div>
					</div>
					
			</div>
		</div>
		<!-- Featured Products Start -->
		<div class="section145">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title-tt">
							<div class="main-title-left">
								<span>For You</span>
								<h2>Top Featured Products</h2>
							</div>
							<a href="#" class="see-more-btn">See All</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="owl-carousel featured-slider owl-theme">
							<div class="item">
								<div class="product-item">
									<a href="single_product_view.php" class="product-img">
										<img src="images/product/img-1.jpg" alt="">
										<div class="product-absolute-options">
											<span class="offer-badge-1">6% off</span>
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									<div class="product-text-dt">
										<p>Available<span>(In Stock)</span></p>
										<h4>Product Title Here</h4>
										<div class="product-price">₹12 </div>
										<div class="qty-cart">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="product-item">
									<a href="single_product_view.php" class="product-img">
										<img src="images/product/img-2.jpg" alt="">
										<div class="product-absolute-options">
											<span class="offer-badge-1">2% off</span>
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									<div class="product-text-dt">
										<p>Available<span>(In Stock)</span></p>
										<h4>Product Title Here</h4>
										<div class="product-price">₹10 </div>
										<div class="qty-cart">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="product-item">
									<a href="single_product_view.php" class="product-img">
										<img src="images/product/img-3.jpg" alt="">
										<div class="product-absolute-options">
											<span class="offer-badge-1">5% off</span>
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									<div class="product-text-dt">
										<p>Available<span>(In Stock)</span></p>
										<h4>Product Title Here</h4>
										<div class="product-price">₹5 </div>
										<div class="qty-cart">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="product-item">
									<a href="single_product_view.php" class="product-img">
										<img src="images/product/img-4.jpg" alt="">
										<div class="product-absolute-options">
											<span class="offer-badge-1">3% off</span>
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									<div class="product-text-dt">
										<p>Available<span>(In Stock)</span></p>
										<h4>Product Title Here</h4>
										<div class="product-price">₹15 </div>
										<div class="qty-cart">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="product-item">
									<a href="single_product_view.php" class="product-img">
										<img src="images/product/img-5.jpg" alt="">
										<div class="product-absolute-options">
											<span class="offer-badge-1">2% off</span>
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									<div class="product-text-dt">
										<p>Available<span>(In Stock)</span></p>
										<h4>Product Title Here</h4>
										<div class="product-price">₹9 </div>
										<div class="qty-cart">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="product-item">
									<a href="single_product_view.php" class="product-img">
										<img src="images/product/img-6.jpg" alt="">
										<div class="product-absolute-options">
											<span class="offer-badge-1">2% off</span>
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									<div class="product-text-dt">
										<p>Available<span>(In Stock)</span></p>
										<h4>Product Title Here</h4>
										<div class="product-price">₹7 </div>
										<div class="qty-cart">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="product-item">
									<a href="single_product_view.php" class="product-img">
										<img src="images/product/img-7.jpg" alt="">
										<div class="product-absolute-options">
											<span class="offer-badge-1">1% off</span>
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									<div class="product-text-dt">
										<p>Available<span>(In Stock)</span></p>
										<h4>Product Title Here</h4>
										<div class="product-price">₹6.95 </div>
										<div class="qty-cart">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="product-item">
									<a href="single_product_view.php" class="product-img">
										<img src="images/product/img-8.jpg" alt="">
										<div class="product-absolute-options">
											<span class="offer-badge-1">3% off</span>
											<span class="like-icon" title="wishlist"></span>
										</div>
									</a>
									<div class="product-text-dt">
										<p>Available<span>(In Stock)</span></p>
										<h4>Product Title Here</h4>
										<div class="product-price">₹8 </div>
										<div class="qty-cart">
											<div class="quantity buttons_added">
												<input type="button" value="-" class="minus minus-btn">
												<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
												<input type="button" value="+" class="plus plus-btn">
											</div>
											<span class="cart-icon"><i class="uil uil-shopping-cart-alt"></i></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Featured Products End -->
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