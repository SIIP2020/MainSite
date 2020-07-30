<?php


if(isset($_POST['login']))
{

  require 'dbh.inc.php';
  $mobile = $_POST['phone'];
  $password1 = $_POST['password1'];


  if(empty($mobile) || empty($password1)) {
     header("Location: ../sign_in.php?error=emptyfields");
     exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE uphone=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
       header("Location: ../index.php?error=sqlerror");
     exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s", $mobile);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row =mysqli_fetch_assoc($result)){
           $pwdCheck = password_verify($password1, $row['upassword']);
           if($pwdCheck == false){
             header(
               "Location: ../sign_in.php?error=wrongpassword");
            exit();
           }
           elseif ($pwdCheck == true) 
           {
               session_start();
               $_SESSION['userId'] = $row['uid'];
               $_SESSION['username'] = $row['uidUsers'];
               $_SESSION['user_email'] = $row['uemail'];
               $_SESSION['user_phone'] = $row['uphone'];
               $id = $row['uid'];
                $sql = "SELECT * FROM cart WHERE uid = $id";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt,$sql)) {
                       echo"errorrrr";
                         exit();  
                      }
                  else{
                      mysqli_stmt_execute($stmt);
                      $result = mysqli_stmt_get_result($stmt);

                      if(mysqli_num_rows($result)>0)
                         { 
                          $count=0;
                          $total=0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $image_src = "uploads/".$row['image'];
                                $_SESSION["vendor_id"]=$row['vid'];
                                $total = $total+($row['Price']*$row['P_quantity']);
                                $item_array = array(
                                'item_id'       =>  $row['P_id'],
                                'user_id'       =>  $row['uid'],
                                'vendor_id'     =>  $row['vid'],
                                'item_name'     =>  $row['Pname'],
                                'item_quantity' =>  $row['P_quantity'],
                                'item_price'    =>  $row['Price'],
                                'item_image'    =>  $image_src,
                                'item_off'      =>  $row["orig_price"]                          
                                );
                                $_SESSION["shopping_cart"][$count] = $item_array;
                                $_SESSION["total_items"] = $count+1;
                                $count = count($_SESSION["shopping_cart"]);
                              }
                              $_SESSION['total_amount']=$total;
                         }
                      }          
                
                       /*  foreach($_SESSION["shopping_cart"] as $keys => $values)
                             {
                            echo $values["item_name"]."<br>"; 
                        echo $values["item_quantity"]."<br>"; 
                         echo $values["item_price"]."<br>";
                          }*/
                             


                header("Location: ../index.php?login=success");
                exit();
           }
           else{
            header("Location: ../sign_in.php?error=wrongpassword");
            exit();
           }

        }
        else{           
            header("Location: ../index.php?error=nouser");
            exit();
        }
    }
  }

}

else
{
    header("Location: ../index.php");
    exit();
}