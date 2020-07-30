<?php
if(isset($_POST['register'])){
	require 'dbh.inc.php';
   
    $owner_nm =$_POST['owner_nm'];
    $shop_nm=$_POST['shop_nm'];
    $email=$_POST['email'];
    $gst_no=$_POST['gst_no'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $verified="not verified";


    $sql = "SELECT shop_nm FROM shopreq WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
    	if (!mysqli_stmt_prepare($stmt,$sql)) {
    	     header("Location: ../shop_req_send.php?error=sqlerror");
             exit(); 	
    	}
    	else {

    		mysqli_stmt_bind_param($stmt,"s",$email);
    		mysqli_stmt_execute($stmt);
    		mysqli_stmt_store_result($stmt);
    		$resultCheck = mysqli_stmt_num_rows($stmt);

    		if ($resultCheck > 0) {
    		header("Location: ../shop_req_send.php?error=alreadyTaken=".$email);
             exit(); 	
    		}
    		else{

    			$sql = "INSERT INTO shopreq(owner_nm, shop_nm, email, gst_no, phone, address, verified) VALUES(?, ?, ?, ?, ?, ?, ?)";
    			$stmt = mysqli_stmt_init($conn);
                 if (!mysqli_stmt_prepare($stmt,$sql)) {
    	         header("Location: ../shop_req_send.php?error=sqlerror");
                 exit(); 	
    	        }
    	        else{

    	        	mysqli_stmt_bind_param($stmt,"ssssiss", $owner_nm, $shop_nm, $email, $gst_no, $phone , $address, $verified );
    		        mysqli_stmt_execute($stmt);
    		        header("Location: ../index.php?request=success");
                    exit();
    	        }



    		}
    	}
   
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
   
}


else{
	header("Location: ../shop_req_send.php");
    exit();
    

}

?>



