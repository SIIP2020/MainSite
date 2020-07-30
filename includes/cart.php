<?php 
session_start();
require 'dbh.inc.php';
	
if(isset($_POST['add_to_cart']) && isset($_GET['pid']))
  {
	$pid=base64_decode($_GET['pid']);	
	
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($pid, $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
			'item_id'			=>	$pid,
			'user_id'  			=>	$_POST["user_id"],
			'vendor_id' 		=>	$_POST["vendor_id"],
			'item_name'			=>	$_POST["product_name"],
			'item_quantity'		=>	$_POST["product_quantity"],
			'item_price'		=>	$_POST["product_price"],
			'item_image'		=>	$_POST["product_image"],
			'item_imagename'	=>	$_POST["product_imagename"],
			'item_off'			=>  $_POST["mrp"],
			'item_stock'		=>  $_POST["stock"]

			
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
			$_SESSION["total_items"] = $count+1;
			$_SESSION["total_amount"]=$_SESSION["total_amount"]+($_POST["product_quantity"]*$_POST["product_price"]);

			echo '<script>window.location="../index.php"</script>';
		}
		else
		{
			
			//header("location:javascript://history.go(-1)");
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$pid,
			'user_id'  			=>	$_POST["user_id"],
			'vendor_id' 		=>	$_POST["vendor_id"],
			'item_name'			=>	$_POST["product_name"],
			'item_quantity'		=>	$_POST["product_quantity"],
			'item_price'		=>	$_POST["product_price"],
			'item_image'		=>	$_POST["product_image"],
			'item_imagename'	=>	$_POST["product_imagename"],
			'item_off'			=>  $_POST["mrp"],
			'item_stock'		=>  $_POST["stock"]
			
		);
		$_SESSION["shopping_cart"][0] = $item_array;
		$_SESSION["vendor_id"] = $_POST["vendor_id"];
		$_SESSION["total_items"] = 1;		
		$_SESSION["total_amount"]=$_POST["product_quantity"]*$_POST["product_price"];
		echo '<script>window.location="../index.php"</script>';
	}
	
}


if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		$id=base64_decode($_GET['id']);
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $id)
			{
				unset($_SESSION["shopping_cart"][$keys]);
				$_SESSION["total_items"]=$_SESSION["total_items"]-1;
				$_SESSION["total_amount"]=$_SESSION["total_amount"]-($values['item_quantity']*$values['item_price']);
				if($_SESSION["total_items"]==0)
					{
						unset($_SESSION["vendor_id"]);
						unset($_SESSION["shopping_cart"]);
					}
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="../index.php"</script>';
			}
		}
	}
}

if(isset($_GET["action"])){
	if ($_GET["action"]=="increase") {
		foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				if($values["item_id"] == $_GET["id"])
					{
						//$nq=$values["item_quantity"];
						$values["item_quantity"]=$_GET["qty"];
						if(isset($_SESSION["total_amount"])){
							$_SESSION["total_amount"]=$_SESSION["total_amount"]+$values["item_price"];
						}
							
					}
					
			}
			header("Location: ../index.php?qty=success&new_qty=".$values["item_quantity"]);
         				exit(); 
	}
}


/*if(isset($_POST["action"])){
	if($_POST["action"] == "increase")
	{
		$p=$_POST["product_id"];
		require 'dbh.inc.php';
		$sql = "SELECT quantity FROM product WHERE pid=$p";
    	$stmt = mysqli_stmt_init($conn);
    	if(!mysqli_stmt_prepare($stmt,$sql)){
       		header("Location: ../index.php?error=sqlerror");
     		exit();
    	}
    	else{
    		 mysqli_stmt_execute($stmt);
             $result = mysqli_stmt_get_result($stmt);
             if(mysqli_num_rows($result)>0)
             {
             	 while ($row = mysqli_fetch_assoc($result))
             	 {
             	 	$stock=$row["quantity"];
             	 }

               foreach($_SESSION["shopping_cart"] as $keys => $values)
               {
               		if($values["item_id"] == $p)
               		{
               			$new_quantity=$values["item_quantity"]+1;
               			if($stock<$new_quantity){
               				echo json_encode(array('qty'=>$values["item_quantity"]));
               			}
               			else{
               				$values["item_quantity"]=$new_quantity;
               				echo json_encode(array('qty'=>$values["item_quantity"]));
               			}
               		}
               }


             }
    	}
	}
}*/
?>