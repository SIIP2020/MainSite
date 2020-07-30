<?php
session_start();
 
if (isset($_POST['editaddress']))
{    
    require 'dbh.inc.php';   
    $type=$_POST['address1'];
    $address =$_POST['address'];
    $locality=$_POST['locality'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];

    $userid=$_SESSION['userId'];

    else
    {
         $sql = "UPDATE useraddress SET address_name=?, locality=?, city=?, state=? , pincode=? , type=? where uid=$userid";
                                     
         $stmt = mysqli_stmt_init($conn);
                    
            if (!mysqli_stmt_prepare($stmt, $sql))
             {
                header("Location: ../dashboard_my_addresses.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "ssssis", $address, $locality, $city, $state, $pincode, $type );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
               
                header("Location: ../dashboard_my_addresses.php?edit=success");
                exit();
            }
            
        
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);    
}
else
{
    header("Location: ../dashboard_my_addresses.php");
    exit();
}
?>
