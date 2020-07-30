<!-- <?php
// if(!empty($_GET['time'])){ 
// 	$selected = $_GET['time'];
//    $a= explode(",", $selected);}
// else{
//  $selected = '08:00:00,10:00:00';
// $a= explode(",", $selected);
// }

// echo '<script>
// function myFunction(time) {
	
//   var a= time.split(","); 
//   document.getElementById("result1").value = a[0];
//   document.getElementById("result2").value = a[1];


// }
// </script>';



?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<br>
<form action="" method="post">		
		<label><input type="radio" name="time" onclick="myFunction(this.value)" value="12:00:00,14:00:00">12.00PM - 2.00PM
		</label>												
	<input type="radio" name="time" onclick="myFunction(this.value)"  value="14:00:00,16:00:00">
		<label>2.00PM - 4.00PM</label>
	<input type="radio" name="time" onclick="myFunction(this.value)" value="16:00:00,18:00:00">
		<label>4.00PM - 6.00PM</label>
		<br>	
</form>
<br>
<input type="text" id="result1">
<br>
<input type="text" id="result2">



</body>
</html>

 -->



 <?php
  // Turn on output buffering
  // There will be no output until you "flush" or echo the buffer's contents
  ob_start();
  
  // Set some variables unrelated to buffering
  $name = "Lara";
  $food = "cashews";
?>


<!-- Remember, none of this HTML will be sent to the browser, yet! -->

<h1>Hi, my name is <?php echo $name; ?>.</h1>
<p>I like <?php echo $food; ?>.</p>


<?php
  // Put all of the above ouptut into a variable
  // This has to be before you "clean" the buffer
  $content = ob_get_contents();
  
  // Erase the buffer in case we want to use it for something else later
  ob_end_clean();

  // All of the data that was in the buffer is now in $content
  echo $content;
?>