<?php ob_start(); ?>
<?php 
session_start();
$user = $_SESSION['user_id'];
?>
 <?php
if($_POST[facebook]){

	$username =$_POST['username'];
          include 'connect.php';
        $sqls="UPDATE users  SET facebook='$username'
		WHERE id='$user'
                      ";
        mysqli_query($conn, $sqls);	  
          mysqli_close($conn);
		  header('location:social.php?connected=success');
		  
		  $connected="  Successfuly Connected ";
exit();
}else{

		  header('location:social.php?connected=fail');
exit();
}

?><?php ob_end_flush();?>