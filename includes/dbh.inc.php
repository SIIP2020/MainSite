<?php
    $dbhost = "localhost";
	$dbuser ="root";
 	$dbpass = "";
 	$db     = "grocery2";

 	 	$conn =  mysqli_connect($dbhost,$dbuser,$dbpass,$db);



    if($conn->connect_error) {
 		echo "connection was failed";
 	}
 	
 	 /*	if(!$conn){
 	 		die("Connection failed:".mysqli_connect_error());
 	 	}
     */