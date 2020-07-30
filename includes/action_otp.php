<?php
 session_start();

$mobile= $_POST['phone'];
$_SESSION['phone']=$_POST['phone'];
   #### 2Factor API Setting
    $APIKey='ffb8a3f2-a4ec-11ea-9fa5-0200cd936042';
    $OTPMessage="<p>We have sent an OTP to $mobile,<br>Please enter the same below</p>";
    
    #### Custom Logic
    $otpValue=(( isset($_REQUEST['otp']) AND $_REQUEST['otp']<>'' ) ? $_REQUEST['otp'] : '' );
    
    if ( $otpValue =='' AND $mobile=="")
    {
        echo "<script type='text/javascript'> window.history.back(); </script>";
        die();
    }
    else
    if ( $mobile =='' AND $email=='' )
    {
        echo "<script type='text/javascript'> alert('Please provide either a mobile number or an email address to proceed');window.history.back(); </script>";
        die();
    }
    else if (  $mobile =='' AND $email <> '' )
    $forceSubmitWithEmail=1;

    if ( ( $mobile =='' OR strlen($mobile) <>10 OR substr($mobile,0,2) < 60) AND $email =='')
    {
        echo "<script type='text/javascript'> alert('Please enter valid mobile number');window.history.back(); </script>";
        die();
    }
     if ( $otpValue <> '') ### OTP value entered by user
    {
        ### Check if OTP is matching or not
       

        $VerificationSessionId=$_REQUEST['VerificationSessionId'];
        $API_Response_json=json_decode(file_get_contents("https://2factor.in/API/V1/$APIKey/SMS/VERIFY/$VerificationSessionId/$otpValue"),false);
        $VerificationStatus= $API_Response_json->Details;
            
            ### Check if OTP is matching
            if ( $VerificationStatus =='OTP Matched')
            {
                
            
            //echo "Congratulations $mobile has been verified. Following are the details captured: <br>Name : $name <br> Email:  $email <br> Mobile : $mobile ";
               // die();

               $_SESSION["phone"]=$mobile;

                 header("Location: ../sign_up2.php");
                 exit();     
    
                
            }
            else
            {
                echo "<script type='text/javascript'>alert('Sorry, OTP entered was incorrect. Please enter correct OTP');  window.history.back();  </script>";
                  die();
            }
        
    }

    else
    {    
            ### Send OTP
            $API_Response_json=json_decode(file_get_contents("https://2factor.in/API/V1/$APIKey/SMS/$mobile/AUTOGEN"),false);
            $VerificationSessionId= $API_Response_json->Details;
            
    }


?>


<html lang="en">
    
<!-- Mirrored from gambolthemes.net/html-items/gambo_supermarket_demo/sign_up.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Jun 2020 15:32:09 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=9">
        <meta name="description" content="Gambolthemes">
        <meta name="author" content="Gambolthemes">     
        <title>Gambo - Sign Up</title>
        
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
    <div class="sign-inup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="sign-form">
                        <div class="sign-inner">
                            <div class="sign-logo" id="logo">
                                <a href="index.html"><img src="images/logo.svg" alt=""></a>
                                <a href="index.html"><img class="logo-inverse" src="images/dark-logo.svg" alt=""></a>
                            </div>
                            <div class="form-dt">
                                <div class="form-inpts checout-address-step">

                                    <form action="action_otp.php" method="post">
                                        
                                        <div class="form-title"><h6>Sign Up</h6></div>
                                    
                                        <div class="form-group pos_rel">
                                            <input id="otp" name="otp" maxlength="6" type="text" placeholder="Enter OTP" class="form-control lgn_input" required="required">
                                            <i class="uil uil-mobile-android-alt lgn_icon"></i>
                                        </div>

                                        <input type="hidden"  name="VerificationSessionId" value="<?php echo $VerificationSessionId; ?>" >
                                         
                                        <input type="hidden"  name="phone" value="<?php echo $mobile; ?>" >                                   
                                        <button class="login-btn hover-btn" type="submit" name="submit">Sign Up Now</button>
                                    </form>
                                </div>
                                <div class="signup-link">
                                    <p>I have an account? - <a href="sign_in.html">Sign In Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text text-center mt-3">
                        <i class="uil uil-copyright"></i>Copyright 2020 <b>Gambolthemes</b> . All rights reserved
                    </div>
                </div>
            </div>
        </div>
    </div>

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







