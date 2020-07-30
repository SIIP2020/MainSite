<?php
session_start();
 
if (isset($_POST['editprofile']))
{    
    require 'dbh.inc.php';   
    $uname =$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $userid=$_SESSION['userId'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../edit_profile.php?error=invalidmail");
        exit();
    }
    else
    {
         $sql = "UPDATE users SET uidUsers=?, uemail=?, uphone=?  where uid= $userid";
                                     
         $stmt = mysqli_stmt_init($conn);
                    
            if (!mysqli_stmt_prepare($stmt, $sql))
             {
                header("Location: ../myprofile.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "sss", $uname, $email, $phone );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                 $_SESSION['userId'] =$userid; 

                $_SESSION['username'] =$uname; 
                $_SESSION['user_email'] =$email;
                $_SESSION['user_phone'] =$phone;
 
                header("Location: ../dashboard_overview.php?edit=success");
                exit();
            }
            
        
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);    
}
else
{
    header("Location: ../myprofile.php");
    exit();
}
?>
