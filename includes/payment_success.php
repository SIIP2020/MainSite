<?php
session_start();
require 'dbh.inc.php';

$id = $_SESSION['userId'];
$date=date('Y-m-d H:i:s');

$sql = "INSERT INTO orders(transaction_id, customer_id, vid, total_amount, order_date, status, payment_mode) VALUES(?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
   	header("Location: ../index.php?error1=sqlerror");
   	exit(); 	
   }
   else
   {
   	
   	$s="processing";
    $pm = "online";
   	mysqli_stmt_bind_param(
    	        		$stmt,"siidsss",
    	        		$_SESSION['transaction_id'],
    	        		$_SESSION['userId'],
    	        		$_SESSION['vendor'],
    	        		$_SESSION['total_amount'],
    	        		$date,
    	        		$s,
                  $pm    	        		 
					  );

    		        mysqli_stmt_execute($stmt);
    		        $_SESSION['order']="oder table updated";
              //  header("Location: ../index.php?payment=successful");
              //  exit();

   }
// getting order_id from order table
  $sqlOrderId="SELECT order_id FROM orders WHERE order_date=$date and customer_id=$id";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sqlOrderId)) {
    header("Location: ../index.php?error1=sqlerror");
    exit();   
   }
   else
   {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0)
    {
      while ($row = mysqli_fetch_assoc($result))
      {
        $o_id=$row['order_id'];
      }
    }
   }



if (isset($_SESSION['order'])){

  //inserting into orderitems table

  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
    $s = "INSERT INTO orderitems(order_id, P_id, price, quantity, status, vid) VALUES(?, ?, ?, ?, ?, ?)";
    $stmtt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmtt,$s)) {
      header("Location: ../index.php?error1=sqlerror");
      exit();   
     }
     else
     {
          mysqli_stmt_bind_param(
                    $stmt,"iidisi",
                    $o_id,
                    $values['item_id'],
                    $values['item_price'],
                    $values['item_quantity'],
                    null,
                    $_SESSION['vendor_id']
                                     
              );

                  mysqli_stmt_execute($stmt);
     }
  }



  


  //deleting entry from cart
  $sql2 = "DELETE FROM cart where uid = $id";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql2)) {
     header("Location: ../index.php?error3=sqlerror");
     exit();   
    }
    else{
            mysqli_stmt_execute($stmt);
            unset($_SESSION['shopping_cart']);
            unset($_SESSION['vendor_id']);
            unset($_SESSION['total_amount']);
            unset($_SESSION['transaction_id']);
            unset($_SESSION['order']);
            unset($_SESSION['total_amount']);
            unset($_SESSION['total_items']);
            header("Location: ../index.php?payment=successful");
            exit();
        }
}
else
echo"cart not deleted";



/*
if (isset($_SESSION['order'])) {
	$stmt = mysqli_stmt_init($conn);
							
	foreach($_SESSION["shopping_cart"] as $keys => $values)
				{
					$sqll = "INSERT INTO orderitems(transaction_id, P_id, Price, quantity,status) VALUES(?, ?, ?, ?, ?)";					
                    if (!mysqli_stmt_prepare($stmt,$sqll)) {

    	            	header("Location: ../index.php?error2=sqlerror");
                    	exit(); 	
    	            }
    	            else
    	            {
    	            	$st="order placed";
                  	 	mysqli_stmt_bind_param(
    	        		$stmt,"iidis",
    	        		$_SESSION["transaction_id"],
    	        		$values["item_id"],    	        		
						$values["item_price"],
						$values["item_quantity"],
						$st   	        		 
					  );
                  	 	mysqli_stmt_execute($stmt);
                    }			 	
				}
				unset($_SESSION['order']);

				 


    }
    else {echo "oder session nt set";}

*/
?>