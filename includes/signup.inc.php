<?php
session_start();
if(isset($_POST['submit'])){
	require 'dbh.inc.php';
   
    $uname =$_POST['fullname'];
    $email=$_POST['emailaddress'];
    $password=$_POST['password1'];
    $phone=$_SESSION['phone'];


    //echo $uname.":".$email.":".$password.":".$phone;
	

//error handling
//empty fields check
    if(empty($uname)||empty($email)||empty($password)||empty($phone)) {
       header("Location: ../sign_up.php?error=emptyfields&fullname=".$uname."&emailaddress=".$email);
       exit();
    }

    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
    	header("Location: ../sign_up.php?error=invalidemailuid");
       exit(); 
    }
//email validation
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    	header("Location: ../sign_up.php?error=invalidemail&fullname=".$uname);
       exit(); 
    }
// input character checking    
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
    	header("Location: ../sign_up.php?error=invalidusername&emailaddress=".$email);
       exit(); 
    }
    
    else 
    { 


    	$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
    	$stmt = mysqli_stmt_init($conn);
    	if (!mysqli_stmt_prepare($stmt,$sql)) {
    	     header("Location: ../sign_up.php?error=sqlerror");
             exit(); 	
    	}
    	else {

    		mysqli_stmt_bind_param($stmt,"s",$uname);
    		mysqli_stmt_execute($stmt);
    		mysqli_stmt_store_result($stmt);
    		$resultCheck = mysqli_stmt_num_rows($stmt);

    		if ($resultCheck > 0) {
    		header("Location: ../sign_up.php?error=usertaken&emailaddress=".$email);
             exit(); 	
    		}
    		else{

    			$sql = "INSERT INTO users(uidUsers, uemail, upassword, uphone) VALUES(?, ?, ?, ?)";
    			$stmt = mysqli_stmt_init($conn);
                 if (!mysqli_stmt_prepare($stmt,$sql)) {
    	         header("Location: ../sign_up.php?error=sqlerror");
                 exit(); 	
    	        }
    	        else{
                   $hashedPwd=password_hash($password, PASSWORD_DEFAULT); 

    	        	mysqli_stmt_bind_param($stmt,"ssss", $uname, $email, $hashedPwd, $phone );
    		        mysqli_stmt_execute($stmt);
    		        header("Location: ../index.php?signup=success");
                    exit();
    	        }



    		}
    	}
   }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
   
}
else{
	header("Location: ../sign_up.php");
    exit();
    

}

?>



