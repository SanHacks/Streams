<?php ob_start(); ?>
<?php 
session_start();
$user = $_SESSION['user_id'];
?>


 <?php
if($_POST[twitter]){

	$username =$_POST['username'];
          include 'connect.php';
        $sqls="UPDATE users  SET twitter='$username'
		WHERE id='$user'
                      ";
					  mysqli_query($conn, $sqls);	
          mysqli_close($conn);
		  header('location:social.php');
		  
		  $connected="  Successfuly Connected ";
exit();
}else{

		  header('location:social.php');
exit();
}

?><?php ob_end_flush();?>