<?php ob_start(); ?>
<?php 
session_start();
$user = $_SESSION['user_id'];
?>


 <?php
if($_POST['edit11']){

	$about =$_POST['about'];
          include 'connect.php';
        $sqls="UPDATE users  SET aboutme='$about'
		WHERE id='$user'
                      ";
					  mysqli_query($conn, $sqls);
          mysqli_close($conn);
		  header('location:settings.php');
exit();
}

?><?php ob_end_flush();?>