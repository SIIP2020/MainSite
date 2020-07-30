<?php
session_start();
require 'dbh.inc.php';


$date=date('Y-m-d H:i:s');

$sql5="SELECT order_date FROM orders WHERE customer_id=1";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql5)) {
  	
    echo "error";   
   }
   else
   {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0)
    {
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<br> ".$row['order_date'];
      }
    }
   }

?>