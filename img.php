<?php ob_start(); ?>
//Collects user preferences from sessions and cookies
<?php include"sessions.php"; ?>
<?php
 if(!$user_id){
   header("location: index.php");
  exit;
 }
?>

<?php

		

			include 'connect.php';
			$location="UPDATE users
					 SET img = img + 1
					 WHERE id='$user_id'
				";

				mysqli_query($conn,$location);
		
		//Start sessions 
		session_start();
		setcookie("img", "1", time()+86400);
				header("location: data-settings.php?update=updated");
	
			mysqli_close($conn);
		

		
		

?>
<?php ob_end_flush();?>