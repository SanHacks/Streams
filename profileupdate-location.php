<?php ob_start(); ?>
<?php 
session_start();
$user = $_SESSION['user_id'];
?>


 <?php
if($_POST['edit11']){
       $location = $_POST['location']; 
          include 'connect.php';
        $sqls="UPDATE users  SET hometown='$location'
		WHERE id='$user'
                      ";
				  mysqli_query($conn, $sqls);	  
          mysqli_close($conn);
		  header('location:about-settings.php');
exit();
}

?><?php ob_end_flush();?>