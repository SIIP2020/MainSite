<?php

$_SESSION['username'] = $_POST['fullname'];
$_SESSION['userphone'] = $_POST['phone'];
$_SESSION['useremail'] = $_POST['emailaddress'];

    header("Location: ../sign_up2.php");
    exit(); 	
    
?>







