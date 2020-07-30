<?php
session_start();


$MERCHANT_KEY = "WB6x2bCX";
$SALT = "TWFucScnJB";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
  $_SESSION['transaction_id']=$txnid;

} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;
    $_SESSION["vendor"] = $posted["vendor_id"];
    //$_SESSION["shopping_cart"] = $_POST["shopping_cart"];

    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
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
		<title>In-Gro - Checkout</title>
		
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
		    var hash = '<?php echo $hash ?>';
		    function submitPayuForm() {
		      if(hash == '') {
		        return;
		      }
		      var payuForm = document.forms.payuForm;
		      payuForm.submit();
		    }
		    
	  	</script>
	</head>

<body onload="submitPayuForm()">
	<!-- Category Model Start-->
	
	<!-- Cart Sidebar Offsetl End-->
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
								<li class="breadcrumb-item active" aria-current="page">Checkout</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="all-product-grid">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-7">
						<div id="checkout_wizard" class="checkout accordion left-chck145">
							
							<div class="checkout-step">
								<div class="checkout-card" id="headingTwo">
									<span class="checkout-step-number">1</span>
									<h4 class="checkout-step-title">				
										<button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> Delivery Address</button>
									</h4>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#checkout_wizard">
									<div class="checkout-step-body">
										<div class="checout-address-step">
											<div class="row">
												<div class="col-lg-12">												
													<form class="" action="" method="post">
														<!-- Multiple Radios (inline) -->
														<div class="form-group">
															<div class="product-radio">
																<ul class="product-now">
																	<li>
																		<input type="radio" id="ad1" name="address1" checked>
																		<label for="ad1">Home</label>
																	</li>
																	<li>
																		<input type="radio" id="ad2" name="address1">
																		<label for="ad2">Office</label>
																	</li>
																	<li>
																		<input type="radio" id="ad3" name="address1">
																		<label for="ad3">Other</label>
																	</li>
																</ul>
															</div>
														</div>
														<div class="address-fieldset">
															<div class="row">
																<div class="col-lg-6 col-md-12">
																	<div class="form-group">
																		<label class="control-label">Name:<?php echo $_SESSION["username"];?></label><br>
																		<label class="control-label">Phone:<?php echo $_SESSION["user_phone"];?></label>
																		
																	</div>
																	
																</div>
																<div class="col-lg-12 col-md-12">
																	<div class="form-group">
																		<label class="control-label">Flat / House / Office No.*</label>
																		<textarea id="flat" name="flat"  <?php if(isset($_SESSION["address_name"])){
																		echo 'value='.$_SESSION["address_name"];}
																		else {echo 'placeholder="Address"';}?>
																		maxlength="50"
																		 class="form-control input-md" required=""> <?php if(isset($_SESSION["address_name"])){
																		echo $_SESSION["address_name"];}?></textarea> 
																	</div>
																</div>
																<div class="col-lg-6 col-md-12">
																	<div class="form-group">
																		<label class="control-label">Locality / Society / Office Name*</label>
																		<input id="street" name="street" type="text" <?php if(isset($_SESSION["locality"])){
																		echo 'value='.$_SESSION["locality"];}
																		else {echo 'placeholder="Street Address"';}?>
																		class="form-control input-md">
																	</div>
																</div>
																	
																<div class="col-lg-6 col-md-12">
																	<div class="form-group">
																		<label class="control-label">Pincode*</label>
																		<input id="pincode" name="pincode" type="text" <?php if(isset($_SESSION["pincode"])){
																		echo 'value='.$_SESSION["pincode"];}
																		else {echo 'placeholder="Pincode"';}?>   class="form-control input-md" required="">
																	</div>
																</div>
																<div class="col-lg-6 col-md-12">
																	<div class="form-group">
																		<label class="control-label">State*</label>
																		<input id="state" name="state" type="text" <?php if(isset($_SESSION["state"])){
																		echo 'value='.$_SESSION["state"];}
																		else {echo 'placeholder="Enter State"';}?>
																		class="form-control input-md">
																	</div>
																</div>
																<div class="col-lg-6 col-md-12">
																	<div class="form-group">
																		<label class="control-label">City*</label>
																		<input id="Locality" name="locality" type="text" <?php if(isset($_SESSION["city"])){
																		echo 'value='.$_SESSION["city"];}
																		else {echo 'placeholder="Enter City"';}?>  class="form-control input-md" required="">
																	</div>
																</div>
																<div class="col-lg-12 col-md-12">
																	<div class="form-group">
																		<div class="address-btns">
																			<button class="save-btn14 hover-btn">Save</button>
																			<a class="collapsed ml-auto next-btn16 hover-btn" role="button" data-toggle="collapse" data-parent="#checkout_wizard" href="#collapseThree"> Next </a>
																		</div>
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
							<div class="checkout-step">
								<div class="checkout-card" id="headingThree"> 
									<span class="checkout-step-number">2</span>
									<h4 class="checkout-step-title">
										<button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Delivery Time </button>
									</h4>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#checkout_wizard">
									<div class="checkout-step-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label">Select Time*</label>
													
													<form action="demo.php" method="post">
													<div class="time-radio">
														<div class="ui form">
															<div class="grouped fields">
																<div class="field">
																	<div class="ui radio checkbox chck-rdio">
																		<input type="radio" name="time" checked="" tabindex="0" class="hidden"
																		value="08:00:00,10:00:00">
																		<label>8.00AM - 10.00AM</label>
																	</div>
																</div>
																<div class="field">
																	<div class="ui radio checkbox chck-rdio">
																		<input type="radio" name="time" tabindex="0" class="hidden"
																		value="10:00:00,12:00:00">
																		<label>10.00AM - 12.00PM</label>
																	</div>
																</div>
																<div class="field">
																	<div class="ui radio checkbox chck-rdio">
																		<input type="radio" name="time" tabindex="0" class="hidden" value="12:00:00,14:00:00"
																		>
																		<label>12.00PM - 2.00PM</label>
																	</div>
																</div>
																<div class="field">
																	<div class="ui radio checkbox chck-rdio">
																		<input type="radio" name="time" tabindex="0" class="hidden" value="14:00:00,16:00:00">
																		<label>2.00PM - 4.00PM</label>
																	</div>
																</div>
																<div class="field">
																	<div class="ui radio checkbox chck-rdio">
																		<input type="radio" name="time" tabindex="0" class="hidden" value="16:00:00,18:00:00">
																		<label>4.00PM - 6.00PM</label>
																	</div>
																</div>
																<div class="field">
																	<div class="ui radio checkbox chck-rdio">
																		<input type="radio" name="time" tabindex="0" class="hidden" value="18:00:00,20:00:00">
																		<label>7.00PM - 9.00PM</label>
																	</div>
																</div>
																<h3>Select Delivery Type</h3>
																<div class="field">
																	<div class="ui radio checkbox chck-rdio">
																		<input type="radio" name="Normal" checked="" tabindex="0" class="hidden">
																		<label>Normal Delivery + ₹20</label>
																	</div>
																</div>
																<div class="field">
																	<div class="ui radio checkbox chck-rdio">
																		<input type="radio" name="Normal" checked="" tabindex="0" class="hidden">
																		<label>Express Delivery + ₹50</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<input type="submit" name="Save" value="Save" class="save-btn14 hover-btn" >
										<a class="collapsed next-btn16 hover-btn" role="button" data-toggle="collapse"  href="#collapseFour"> Proceed to payment </a>
										</div>
									</div>
													</form>
												</div>
											</div>
										</div>
									
									</div>
								</div>
							</div>
							<div class="checkout-step">
								<div class="checkout-card" id="headingFour">
									<span class="checkout-step-number">3</span>
									<h4 class="checkout-step-title"> 
										<button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Payment</button>
									</h4>
								</div>
								<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#checkout_wizard">
									<div class="checkout-step-body">
										<div class="payment_method-checkout">	
											<div class="row">	
												<div class="col-md-12">
													<div class="rpt100">													
										<ul class="radio--group-inline-container_1">
															<li>					
																<form action="includes/cod_payment.php" method="post">
																	<button class="add-cart-btn hover-btn" name="add_to_cart" value="Add to value" >Cash On Delivery
																	</button>
																</form>				
															</li>						
		<li>
		  <form action="<?php echo $action; ?>" method="post" name="payuForm">

		  	<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      		<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      		<input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

      		<input type="hidden" name="amount" value="<?php echo $_SESSION['total_amount']; ?>" />
      		<input type="hidden" name="firstname" id="firstname" value="<?php echo $_SESSION['username']; ?>" />
      		<input type="hidden" name="email" id="email" value="<?php echo $_SESSION['user_email'] ; ?>" />
            <input type="hidden" name="phone" value="<?php echo $_SESSION['user_phone']; ?>" />
       		<input type="hidden" name="productinfo" value=" <?php echo "very nice";//$_SESSION['vendor_id']?>"/>
			<input type="hidden" name="surl" value="<?php echo 'http://localhost/MainSite/includes/payment_success.php'; ?>" size="64" />

			<input type="hidden" name="furl" value="<?php echo 'http://localhost/MainSite/checkout.php';?>" size="64" />

			<input type="hidden" name="service_provider" value="payu_paisa" size="64" />

 			<input type="hidden" name="vendor_id" value="<?php echo $_SESSION['vendor_id']; ?>" />
 			
			<button class="add-cart-btn hover-btn" type="submit" value="Submit">Online Payment
			</button>

		  </form>
		</li>

									     				</ul>
													</div>							
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-5">
						<div class="pdpt-bg mt-0">
							<div class="pdpt-title">
								<h4>Order Summary</h4>
							</div>
							<?php 
							$saving = 0;
				foreach($_SESSION["shopping_cart"] as $keys => $values)
				{
					$d=$values["item_price"]/$values["item_off"]*100;
					echo'
							<div class="right-cart-dt-body">
								<div class="cart-item border_radius">
									<div class="cart-product-img">
										<img src="'.$values["item_image"].'" alt="">
										<div class="offer-badge">'.number_format($d, 0).'% OFF</div>
									</div>
									<div class="cart-text">
										<h4>'.$values["item_name"].'</h4>
										<div class="cart-item-price">₹'.number_format($values["item_quantity"] * $values["item_price"], 2).' 								
										</div>
										
										<button type="button" class="cart-close-btn"><i class="uil uil-multiply"></i></button>
									</div>		
								</div>
							</div>
							';

						$saving = $saving +($values["item_off"]*$values["item_quantity"] - $values["item_price"]*$values["item_quantity"]);
						$amount_aftr_delivery_charges=$_SESSION['total_amount']+20;
						$_SESSION['amount_delivery_charges']=$amount_aftr_delivery_charges;
				}
							?>
							
							<div class="total-checkout-group">
								<div class="cart-total-dil pt-3">
									<h4>Delivery Charges</h4>
									<span>₹20</span>
								</div>
							</div>
							<div class="cart-total-dil saving-total ">
								<h4>Total Saving</h4>
								<span>₹<?php echo $saving;?></span>
							</div>
							<div class="main-total-cart">
								<h2>Total</h2>
								<span>₹<?php echo $amount_aftr_delivery_charges;?></span>
							</div>
							<div class="payment-secure">
								<i class="uil uil-padlock"></i>Secure checkout
							</div>
						</div>
						<a href="#" class="promo-link45">Have a promocode?</a>
						<div class="checkout-safety-alerts">
							<p><i class="uil uil-sync"></i>100% Replacement Guarantee</p>
							<p><i class="uil uil-check-square"></i>100% Genuine Products</p>
							<p><i class="uil uil-shield-check"></i>Secure Payments</p>
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
	<script src="js/custom.js"></script>
	<script src="js/product.thumbnail.slider.js"></script>
	<script src="js/offset_overlay.js"></script>
	<script src="js/night-mode.js"></script>
	
	
</body>

</html>