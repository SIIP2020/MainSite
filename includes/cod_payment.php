<?php
session_start();
require 'dbh.inc.php';

$id = $_SESSION['userId'];


$sql = "INSERT INTO orders(transaction_id,customer_id, vid, total_amount, order_date, status, payment_mode) VALUES(?,?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
   	header("Location: ../checkout.php?error1=sqlerror");
   	exit(); 	
   }
   else
   {
   	$date=date('Y-m-d H:i:s');
   	$t=0;
   	$ss="processing";
    $pm = "COD";
    //$transaction_id=null;
   	mysqli_stmt_bind_param(
    	        		$stmt,"iiidsss",
    	        		$t,    	        		
    	        		$_SESSION['userId'],
    	        		$_SESSION['vendor'],
    	        		$_SESSION['total_amount'],
    	        		$date,
    	        		$ss,
    	        		$pm    	        		 
					  );

    		        mysqli_stmt_execute($stmt);    		        
    		        $_SESSION['order']="oder table updated";
              //  header("Location: ../index.php?payment=successful");
              //  exit();

   }




if (isset($_SESSION['order'])){
// getting order_id from order table

  $sql5="SELECT * FROM orders WHERE customer_id=$id AND order_date='$date'";
  $stmt = mysqli_stmt_init($conn);

 if (!mysqli_stmt_prepare($stmt,$sql5)) {
 	echo"-".$date;
  	die("Connection failed:".mysqli_error($conn));
    /*header("Location: ../checkout.php?error2=sqlerror");
    exit(); */  
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



  //inserting into orderitems table

  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
    $s = "INSERT INTO orderitems(order_id, P_id, price, quantity, status, vid) VALUES(?, ?, ?, ?, ?, ?)";
    $stmtt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmtt,$s)) {
      header("Location: ../checkout.php?error3=sqlerror");
      exit();   
     }
     else
     {
     	//$o_id=25;
     	$status1=null;
          mysqli_stmt_bind_param(
                    $stmtt,"iidisi",
                    $o_id,
                    $values['item_id'],
                    $values['item_price'],
                    $values['item_quantity'],
                    $status1,
                    $_SESSION['vendor_id']                                     
              );

                  mysqli_stmt_execute($stmtt);
     }
  }



  


  //deleting entry from cart
  $sql2 = "DELETE FROM cart where uid = $id";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql2)) {
     header("Location: ../checkout.php?error4=sqlerror");
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
            header("Location: ../index.php?orderPlaced=successful");
            exit();
        }
}
else
echo"cart not deleted";




?>