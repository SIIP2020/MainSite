<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:38:02 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description-gambolthemes" content="">
	<meta name="author-gambolthemes" content="">
	<title>Gambo Supermarket Vendor</title>
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/admin-style.css" rel="stylesheet">
	
	<!-- Vendor Stylesheets -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	
</head>

    <body class="bg-sign">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header card-sign-header">
										<h3 class="text-center font-weight-light my-4">Become Our Partner Send your Shop Details</h3>
										<p class="text-center font-weight-light my-4">We will send you Login details as soon as we have verified your details.</p>
									</div>
                                    <div class="card-body">
                                        <form action="includes/signup.inc.php" method="post">
                                            <div class="form-group">
												<label class="form-label" for="inputEmailAddress">Owner Name*</label>
												<input class="form-control py-3" id="inputName" type="text" name="name" placeholder="Owners's Name">
											</div>
                                            <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Shop Name*</label>
                                                <input class="form-control py-3" id="inputEmailAddress" type="text" name="email" placeholder="Enter Shop Name">
                                            </div>
                                             <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Email*</label>
                                                <input class="form-control py-3" id="inputEmailAddress" type="email" name="email" placeholder="Enter Email Address">
                                            </div>
                                              <div class="form-group">
												<label class="form-label" for="inputEmailAddress">Shop GST Number*</label>
												<input class="form-control py-3" id="inputGST" type="text" name="name" placeholder="Shop GST Number">
											</div>
                                            <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Phone*</label>
                                                <input class="form-control py-3" id="inputphone" type="text" name="password" placeholder="Enter Phone Number">
                                            </div>
                                             <div class="form-group">
                                                <label class="form-label" for="inputEmailAddress">Address*</label>
                                                <input class="form-control py-3" id="inputAddress" type="text" placeholder="Enter Address">
                                            </div>
                                            <div>
                                                <button  type="submit" name="register">Send Request</button>
											</div>
                                            <br>
                                             <h6>Already a Member..??  <a  href="login.html">Click Here</a></h6>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
		 <script src="js/jquery-3.4.1.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>		
		
    </body>

<!-- Mirrored from gambolthemes.net/html-items/gambo_admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:38:03 GMT -->
</html>
