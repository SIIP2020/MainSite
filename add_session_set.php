<?php
session_start();
 require '/xampp/htdocs/Mainsite/includes/dbh.inc.php';
$id= $_SESSION['userId'];
 $sql3 = "SELECT * FROM useraddress WHERE uid =$id AND type='Office'";
 $stmt = mysqli_stmt_init($conn);
 if (!mysqli_stmt_prepare($stmt,$sql3)) 
 {
          //echo"errorrrr";
          header("Location: checkout.php?address=fail1");
          exit();   
 }
        else 
        {
          mysqli_stmt_execute($stmt);
            $result3 = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result3)>0)
              {
                 $row = mysqli_fetch_assoc($result3);
                      $_SESSION['a_id'] = $row['add_id'];
                      $_SESSION['address_name'] = $row['address_name'];
                      $_SESSION['locality'] = $row['locality'];
                      $_SESSION['city'] = $row['city'];
                      $_SESSION['state'] = $row['state'];
                      $_SESSION['pincode'] = $row['pincode'];
                      $_SESSION['type'] = $row['type'];

                
               }
               header("Location: checkout.php?address=success");
               exit();
                             
        }

header("Location: checkout.php?address=fail22");
exit();


?>