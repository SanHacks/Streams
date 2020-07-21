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

    $color  =  $_POST['color']; 
	 
          include 'connect.php';
        $queryaw ="UPDATE users  SET bback='$color'
		WHERE id='$user'
                      ";
					  		mysqli_query($conn, $queryaw);
          mysqli_close($conn);
		  header('location:design.php');
exit();
}

?><?php ob_end_flush();?>