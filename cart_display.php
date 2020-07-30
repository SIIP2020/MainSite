
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
		<script type="text/javascript">
			function decrease(id)
			{
				var d=parseInt(document.getElementById(id).value);
				var t=d-1;				
				if(d==1)
					document.getElementById(id).value=1;
				else
					document.getElementById(id).value=t;
			}
			function increase(pq,id, price){
				var d=parseInt(document.getElementById(id).value);
				var t=d+1;
				if(pq<t ){
					document.getElementById(id).value=d;
				}
				else
				{
			 		document.getElementById(id).value=t; 
			 		window.location='/Mainsite/includes/cart.php?action=increase&id='+id+'&qty='+t;		
					/*var new_price=t*price;	
					var di="price-"+id;*/
			 		
			 		
				}
				/*document.getElementById("price").value=new_price;
				alert(new_price);*/
				
			}
		</script>

	</head>
<body>
	
	<!-- Category Model End-->
	<!-- Search Model Start-->
	
	<!--Search Model End-->
	<!-- Cart Sidebar Offset Start-->
	<div class="bs-canvas bs-canvas-left position-fixed bg-cart h-100">
	<?php
	if(isset($_SESSION["total_items"]))
			$ti=$_SESSION["total_items"];
		else
			$ti = 0;
	//$total = 0;
		echo'<div class="bs-canvas-header side-cart-header p-3 ">
			<div class="d-inline-block  main-cart-title">My Cart <span>'.$ti.'</span></div>
			<button type="button" class="bs-canvas-close close" aria-label="Close"><i class="uil uil-multiply"></i></button>
		</div> 
		<div class="bs-canvas-body">
			
			<div class="side-cart-items">';
			
				
				if(!empty($_SESSION["shopping_cart"]))
				{
					
					foreach($_SESSION["shopping_cart"] as $keys => $values)
					{
						$p = $values["item_id"];
						require '/xampp/htdocs/Mainsite/includes/dbh.inc.php';
						$sql = "SELECT quantity FROM product WHERE pid=$p";
    					$stmt = mysqli_stmt_init($conn);
    					if(!mysqli_stmt_prepare($stmt,$sql))
    					{
       						header("Location: ../index.php?error=sqlerror");
     						exit();
    					}
    					else{
    						mysqli_stmt_execute($stmt);
             				$result = mysqli_stmt_get_result($stmt);
             				while ($row = mysqli_fetch_assoc($result))
				             	 {
				             	 	$stock=$row["quantity"];
				             	 }
    					}


						$d=$values["item_price"]/$values["item_off"]*100;
						echo'
				<div class="cart-item">
					<div class="cart-product-img">
						<img src="'.$values["item_image"].'" alt="">
						<div class="offer-badge">'.number_format($d, 0).'% OFF</div>
					</div>
					<div class="cart-text">
						<h4>'.$values["item_name"].'</h4>
						<!--<div class="cart-radio">
							<ul class="kggrm-now">
								<li>
									<input type="radio" id="a1" name="cart1">
									<label for="a1">1 Kg</label>
								</li>
								
								</li>
							</ul>
						</div>--> 

						<div class="qty-group">
							<!--<div class="quantity buttons_added">
								<input type="button" onclick="decrease('.$values["item_id"].')" value="-" class="minus minus-btn">-->
								<h4> Qty:'.$values["item_quantity"].'</h4>

							<!--<input type="text"  id="'.$values["item_id"].'" name="quantity" value='.$values["item_quantity"].' class="input-text qty text" readonly>

							<input type="button" onclick="increase('.$stock.','.$values["item_id"].','.$values["item_price"].')" value="+" class="plus plus-btn">
							</div>-->

							<div class="cart-item-price" id="price'.$values["item_id"].'">'.number_format($values["item_quantity"] * $values["item_price"], 2).'</div>
						</div>
						
						<a href="includes/cart.php?action=delete&id='.base64_encode($values["item_id"]).'"  class="cart-close-btn"><i class="uil uil-multiply"></i></a>
					</div>
				</div>
				';

				//$total = $total + ($values["item_quantity"] * $values["item_price"]);
			  }	
			  //$_SESSION['total_amount'] = $total;				
			}
			else
			{
				echo 'Looks like your cart is empty...';
			}
				
		if($ti==0)
			{
				$_SESSION["total_amount"]=0;
				echo '</div>
			
		</div>
		<div class="bs-canvas-footer">			
			<div class="main-total-cart">
				<h2>Total</h2>
			<span>'.number_format(0, 2).'</span>
			</div>';
			}else{
				echo '</div>
			
		</div>
		<div class="bs-canvas-footer">			
			<div class="main-total-cart">
				<h2>Total</h2>
			<span>'.number_format($_SESSION["total_amount"], 2).'</span>
			</div>';
			}
			

			if(isset($_SESSION["total_amount"])){
				if(isset($_SESSION["userId"]))
			echo '
			<div class="checkout-cart">
				<a href="#" class="promo-code">Have a promocode?</a>
				<a href="add_session_set.php" class="cart-checkout-btn hover-btn">Proceed to Checkout</a>
			</div>';
			else
				echo '
			<div class="checkout-cart">
				<a href="#" class="promo-code">Have a promocode?</a>
				<a href="sign_up.php" onclick="alert("Sign Up First")"  class="cart-checkout-btn hover-btn">Proceed to Checkout</a>
			</div>';
			}
			else
				echo '
			<div class="checkout-cart">
				<a href="#" class="promo-code">Have a promocode?</a>
				<button class="cart-checkout-btn hover-btn">Proceed to Checkout</button>
			</div>

			';
			

		echo'</div>';

	?>
	</div>
<header class="header clearfix">
		<div class="top-header-group">
			<div class="top-header">
				
<!-- location
				<div class="select_location">
					<div class="ui inline dropdown loc-title">
						<div class="text">
						  <i class="uil uil-location-point"></i>
						  Gurugram
						</div>
						<i class="uil uil-angle-down icon__14"></i>
						<div class="menu dropdown_loc">
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								Gurugram
							</div>						
						</div>
					</div>
				</div>
-->
				
				
			</div>
		</div>
		<div class="sub-header-group">
			<div class="sub-header">				
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