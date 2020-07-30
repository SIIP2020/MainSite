<?php 
session_start();
 require '/xampp/htdocs/MainSite/includes/dbh.inc.php';

  if (isset($_SESSION['userId']))
    {
	  $uid=$_SESSION['userId'];
	
?>

<!DOCTYPE html>
<html lang="en">

	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="In-Grolthemes">
		<meta name="author" content="In-Grolthemes">		
		<title>In-Gro - My Address</title>
		
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
	<!-- Add Address Model Start-->
	<div id="address_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
        <div class="modal-dialog category-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
                    </button>
                </div>
                <div class="category-model-content modal-content"> 
					<div class="cate-header">
						<h4>Add New Address</h4>
					</div>
					<div class="add-address-form">
						<div class="checout-address-step">
							<div class="row">
								<div class="col-lg-12">												
									<form action="includes/add_address.php" method="post">
										
										<div class="form-group">
											<div class="product-radio">
												<ul class="product-now">
													<li>
														<input type="radio" id="ad1" name="address1" value="Home" checked required="">
														<label for="ad1">Home</label>
													</li>
													<li>
														<input type="radio" id="ad2" name="address1" value="Office">
														<label for="ad2">Office</label>
													</li>
													<li>
														<input type="radio" id="ad3" name="address1" value="Others">
														<label for="ad3">Other</label>
													</li>
												</ul>
											</div>
										</div>
										<div class="address-fieldset">
											<div class="row">
												<div class="col-lg-12 col-md-12">
													<div class="form-group">
														<label class="control-label">Address*</label>
														<input id="flat" name="address" type="text" placeholder="Address" class="form-control input-md" required="">
													</div>
												</div>
												
												<div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label class="control-label">Locality*</label>
														<input id="Locality" name="locality" type="text" placeholder="Enter Locality" class="form-control input-md" required="">
													</div>
												</div>
												<div class="col-lg-12 col-md-12">
													<div class="form-group">
														<label class="control-label">City*</label>
														<input id="street" name="city" type="text" placeholder="City" class="form-control input-md" required="">
													</div>
												</div>
												<div class="col-lg-12 col-md-12">
													<div class="form-group">
														<label class="control-label">State*</label>
														<input id="street" name="state" type="text" placeholder="State" class="form-control input-md" required="">
													</div>
												</div>
												<div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label class="control-label">Pincode*</label>
														<input id="pincode" name="pincode" type="text" placeholder="Pincode" class="form-control input-md" required="">
													</div>
												</div>
												
												<div class="col-lg-12 col-md-12">
													<div class="form-group mb-0">
														<div class="address-btns">
															<button class="save-btn14 hover-btn" name="addaddress">Save</button>
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
        </div>
    </div>
	<!-- Add Address Model End-->
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
										<h4><i class="uil uil-location-point"></i>My Address</h4>
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="pdpt-bg">
										<div class="pdpt-title">
											<h4>My Address</h4>
										</div>
										<div class="address-body">
											<a href="#" class="add-address hover-btn" data-toggle="modal" data-target="#address_model">Add New Address</a>
											<div class="address-item">
												<div class="address-icon1">
													<i class="uil uil-home-alt"></i>
												</div>
												<div class="address-dt-all">
												<?php	$sql = "SELECT * FROM useraddress WHERE uid=$uid and type='Home'";
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
													     $aid=$row['add_id'];
													     ?>
													<h4>Home</h4>
													<p><?php echo $row['address_name']." ,".$row['locality']." ,".$row['city']." ,".$row['state']." ,".$row['pincode']; ?></p>
													<ul class="action-btns">
														<li><a href="#" id="<?php  echo $aid;  ?>" class="action-btn"  data-toggle="modal" data-target="#editadd" onclick="add($aid)"><i class="uil uil-edit"></i></a></li>
														<li><a href="#" class="action-btn"><i class="uil uil-trash-alt"></i></a></li>
													</ul>
													 <?php 
														  }
														 } }
																		                                
														?>
												</div>
											</div>
											<div class="address-item">
												<div class="address-icon1">
													<i class="uil uil-home-alt"></i>
												</div>
												<div class="address-dt-all">
													<?php	$sql = "SELECT * FROM useraddress WHERE uid=$uid and type='Office'";
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
													     	$aid=$row['add_id'];?>
													<h4>Office</h4>
													<p><?php echo $row['address_name']." ,".$row['locality']." ,".$row['city']." ,".$row['state']." ,".$row['pincode']; ?></p>	
													<ul class="action-btns">
														<li><a id="<?php  echo $aid;  ?>" href="#" class="action-btn"  data-toggle="modal" data-target="#editadd"><i class="uil uil-edit" onclick="add($aid)"></i></a></li>
														<li><a href="#" class="action-btn"><i class="uil uil-trash-alt"></i></a></li>
													</ul>
													 <?php 
														  }
														 } }
																		                                
														?>
												</div>
											</div>
												<?php	$sql = "SELECT * FROM useraddress WHERE uid=$uid and type='Others'";
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
													     $aid=$row['add_id']; ?>
											<div class="address-item">
												<div class="address-icon1">
													<i class="uil uil-home-alt"></i>
												</div>
												<div class="address-dt-all">
												
													<h4>Other</h4>
													<p><?php echo $row['address_name']." ,".$row['locality']." ,".$row['city']." ,".$row['state']." ,".$row['pincode']; ?></p>
													<ul class="action-btns">
														<li><a id="<?php  echo $aid;  ?>" href="#" class="action-btn" data-toggle="modal" data-target="#editadd" onclick="add($aid)"><i class="uil uil-edit"></i></a></li>
														<li><a href="#" class="action-btn"><i class="uil uil-trash-alt"></i></a></li>
													</ul>
													 
												</div>
											</div>
											<?php 
														  }
														 } }
																		                                
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

	<!-- Edit Address -->
   <script>
     function add(id)
     {
     	var d=parseInt(document.getElementById(id).value);
     	 alert("The data-id of clicked item is: " + d);

     }
    </script>
   <div id="editadd" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
        <div class="modal-dialog category-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
                    </button>
                </div>
                <div class="category-model-content modal-content"> 
					<div class="cate-header">
						<h4>Edit Address</h4>
					</div>
					<div class="add-address-form">
						<div class="checout-address-step">
							<div class="row">
								<div class="col-lg-12">												
									<form action="includes/edit_address.php" method="post">
										
										<div class="form-group">
											<div class="product-radio">
												<ul class="product-now">
													<li>
														<input type="radio" id="ad1" name="address1" value="Home" checked required="">
														<label for="ad1">Home1</label>
													</li>
													<li>
														<input type="radio" id="ad2" name="address1" value="Office">
														<label for="ad2">Office</label>
													</li>
													<li>
														<input type="radio" id="ad3" name="address1" value="Others">
														<label for="ad3">Other</label>
													</li>
												</ul>
											</div>
										</div>
										<div class="address-fieldset">
											<div class="row">
												<div class="col-lg-12 col-md-12">
													<div class="form-group">
														<label class="control-label">Address*</label>
														<input id="flat" name="address" type="text" placeholder="Address" class="form-control input-md" required="">
													</div>
												</div>
												
												<div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label class="control-label">Locality*</label>
														<input id="Locality" name="locality" type="text" placeholder="Enter Locality" class="form-control input-md" required="">
													</div>
												</div>
												<div class="col-lg-12 col-md-12">
													<div class="form-group">
														<label class="control-label">City*</label>
														<input id="street" name="city" type="text" placeholder="City" class="form-control input-md" required="">
													</div>
												</div>
												<div class="col-lg-12 col-md-12">
													<div class="form-group">
														<label class="control-label">State*</label>
														<input id="street" name="state" type="text" placeholder="State" class="form-control input-md" required="">
													</div>
												</div>
												<div class="col-lg-6 col-md-12">
													<div class="form-group">
														<label class="control-label">Pincode*</label>
														<input id="pincode" name="pincode" type="text" placeholder="Pincode" class="form-control input-md" required="">
													</div>
												</div>
												
												<div class="col-lg-12 col-md-12">
													<div class="form-group mb-0">
														<div class="address-btns">
															<button class="save-btn14 hover-btn" name="editaddress">Save</button>
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
        </div>
    </div>
    <!-- edit address end -->

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
 <?php 
 }
				                                
?>