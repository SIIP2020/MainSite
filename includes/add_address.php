<?php
session_start();
if(isset($_POST['addaddress'])){
	require 'dbh.inc.php';
    
    $type=$_POST['address1'];
    $address =$_POST['address'];
    $locality=$_POST['locality'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];

    $userid=$_SESSION['userId'];
    
     


    	$sql = "SELECT * FROM useraddress WHERE type=? and uid=?";
    	$stmt = mysqli_stmt_init($conn);
    	if (!mysqli_stmt_prepare($stmt,$sql)) {
    	     header("Location: ../dashboard_my_addresses.php?error=sqlerror");
             exit(); 	
    	}
    	else {

    		mysqli_stmt_bind_param($stmt,"ss",$type,  $userid);
    		mysqli_stmt_execute($stmt);
    	    $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result)>0)
             {
              while ($row = mysqli_fetch_assoc($result)) {
              $resultCheck = $row['type'];
    		if (($resultCheck == 'Home')||($resultCheck == 'Office')||($resultCheck == 'Others')) {
             echo "<script>alert(' ".$resultCheck." Already Exists!!');</script>";  
            header("Location: ../dashboard_my_addresses.php?address=exists");
    
             exit(); 	
    		}
        }}
    		else{

    			$sql = "INSERT INTO useraddress(uid, address_name, locality, city, state , pincode , type) VALUES(?, ?, ?, ?, ?, ?, ?)";
    			$stmt = mysqli_stmt_init($conn);
                 if (!mysqli_stmt_prepare($stmt,$sql)) {
    	         header("Location: ../dashboard_my_addresses.php?error=sqlerror");
                 exit(); 	
    	        }
    	        else{

    	        	mysqli_stmt_bind_param($stmt,"issssis", $userid, $address, $locality, $city, $state, $pincode, $type );
    		        mysqli_stmt_execute($stmt);
    		        header("Location: ../dashboard_my_addresses.php?signup=success");
                    exit();
    	        }



    		}
        
        
    	}
   
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
   
}
else{
	header("Location: ../dashboard_my_addresses.php");
    exit();
    

}

?>



