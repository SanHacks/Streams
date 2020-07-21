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
if($_POST[twitter]){

	$username =$_POST['username'];
	$tribe =$_POST['tribe'];
          include 'connect.php';
        $not="UPDATE tribes  SET twitter='$username'
		WHERE id='$tribe'
                      ";
			mysqli_query($conn,$not);		  
          mysqli_close($conn);
		  header("location:social_tribe.php?connected=success&tribe=$tribe");
		  
		  $connected="  Successfuly Connected ";
exit();
}else{

		  header("location:social_tribe.php?fail=fail&tribe=$tribe"); 	 	
exit();
}

?><?php ob_end_flush();?>