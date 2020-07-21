<?php ob_start(); ?>
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

	
		
		$location = $_GET[location];
		include 'connect.php';

$query2="UPDATE users  SET trends='$location'
		WHERE id='$user_id'
                      ";
					  mysqli_query($conn, $query2);
			mysqli_close($conn);
			

header("location: hot.php");


?><?php ob_end_flush();?>