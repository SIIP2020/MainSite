<?php

session_start();
require 'dbh.inc.php'; 


    if (isset($_SESSION['userId']) && isset($_SESSION["shopping_cart"])) {

                         
    foreach($_SESSION["shopping_cart"] as $keys => $values)
     {
                    $pi=$values['item_id'];
                    $ui=$values['user_id'] ;
                    $vi=$values['vendor_id'];
                    $sq = "SELECT cart_id,P_id,uid,vid FROM cart where P_id=$pi and uid =$ui and vid = $vi ";
        $result = mysqli_query($conn,$sq);       
        $rows = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)) {
            $cid=$row["cart_id"];
        }
       
               //echo "inside execution of 1st sql";                                      
               //echo $rows;
               if($rows==0)
                   {
                    echo "inside 2 sql";
                    $sql = "INSERT INTO cart(P_id, uid, vid, Pname, P_quantity, Price, orig_price, image) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt,$sql)) {

                        header("Location: ../index.php?error=sqlerror2");
                        exit();     
                    }
                    else
                    {
                        mysqli_stmt_bind_param(
                        $stmt,"iiisidds",
                        $pi, 
                        $values["user_id"], 
                        $values["vendor_id"],
                        $values["item_name"], 
                        $values["item_quantity"],
                        $values["item_price"],
                        $values["item_off"],
                        $values["item_imagename"] 
                      );
                    mysqli_stmt_execute($stmt);
                    /*echo"<br>this".$values["item_id"]." ".$values["user_id"]." ".$values["vendor_id"]." ".$values["item_name"]." ".
                        $values["item_quantity"]." ".
                        $values["item_price"]." ".
                        $values["item_off"]." ".
                        $values["item_imagename"] ;*/
                        $_SESSION = array();
                    session_destroy();
                    header("Location: ../index.php?cart=success");
                    exit();
                    }
                     
                  }
                  else
                    if ($rows==1) {

                     //$cid=$rows["cart_id"];
                     $qty=$values["item_quantity"];
                     $sql3="UPDATE cart SET P_quantity=$qty WHERE cart_id=$cid";
                     $stmt1 = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt1,$sql3)) {

                        header("Location: ../index.php?error=sqlerror3&cid=".$cid);
                        exit();     
                    }
                    else
                    {                   
                        mysqli_stmt_execute($stmt1);
                        echo '<br>cid='.$cid.'<br>qty='.$qty;
                        /*$_SESSION = array();
                    session_destroy();
                    header("Location: ../index.php?quantity=success");
                    exit();*/
                    }
                        
               
                   
            }                    
                

    }
}
else
if (isset($_SESSION['userId']) && !isset($_SESSION["shopping_cart"]))
 {
      $id = $_SESSION['userId'];
      $sql2 = "DELETE FROM cart where uid = $id";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql2)) {
        echo $id;
         //header("Location: ../index.php?errorrrrrr=sqlerror");
         exit();   
        }
        else{
                mysqli_stmt_execute($stmt);
                echo $id;            
               /* $_SESSION = array();
                session_destroy();
                header("Location: ../index.php?");
                exit();*/ 
        }
}
else
{
 
                        
            $_SESSION = array();
            session_destroy();
            header("Location: ../index.php?");
            exit(); 
    
}

?>









