<?php ob_start(); ?>
<?php 
session_start();
$user = $_SESSION['user_id'];
?>

<?php

if(!$user){

header('location:index.php');
}

if($_POST['edit11']){

    $name  =  $_POST['name']; 
	 
          include 'connect.php';
        $queryaw ="UPDATE users  SET name='$name'
		WHERE id='$user'
                      ";
					  		mysqli_query($conn, $queryaw);
          mysqli_close($conn);
		  header('location:about-settings.php');
exit();
}

?><?php ob_end_flush();?>