<?php

session_start();
//if(!empty($_SESSION["shopping_cart"]))

/*if($_SESSION['userid']==0)
{
 $_SESSION = array(); 
 session_destroy(); 
 header("location: ../index.php?cart=temp");
 exit;
}

else*/
///
    

	if (isset($_SESSION['userId']) && isset($_SESSION["shopping_cart"])) {

	require 'dbh.inc.php';						
			foreach($_SESSION["shopping_cart"] as $keys => $values)
				{
                    //$sq = "SELECT * FROM cart where P_id=? and  ";

                    //{
					$sql = "INSERT INTO cart(P_id, uid, vid, Pname, P_quantity, Price, orig_price, image) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt,$sql)) {

    	            	header("Location: ../index.php?error=sqlerror");
                    	exit(); 	
    	            }
    	            else
    	            {
                  	 	mysqli_stmt_bind_param(
    	        		$stmt,"iiisidds",
    	        		$values["item_id"], 
						$values["user_id"], 
						$values["vendor_id"],
						$values["item_name"], 
						$values["item_quantity"],
						$values["item_price"],
                        $values["item_off"],
						$values["item_imagename"] 
					  );
    		        mysqli_stmt_execute($stmt);
    		        
    	          }
                 /* echo"<br>".$values["item_id"]." ".$values["user_id"]." ".$values["vendor_id"]." ".$values["item_name"]." ".
                        $values["item_quantity"]." ".
                        $values["item_price"]." ".
                        $values["item_off"]." ".
                        $values["item_imagename"] ;*/

                }
                    $_SESSION = array();
                    session_destroy();
                    header("Location: ../index.php?cart=success");
                    exit();
				

    }
else
{
	$_SESSION = array();
	session_destroy();
    header("Location: ../index.php?");
    exit();	
}

?>









