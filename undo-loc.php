<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>
<?php
 if(!$user_id){
   header("location: index.php");
  exit;
 }
?>

<?php

		

			include 'connect.php';
	$location="UPDATE users
					 SET loc = loc - 1
					 WHERE id='$user_id'
				";
		mysqli_query($conn,$location);
				header("location: settings.php");
	
			mysqli_close($conn);
		

		
		

?>