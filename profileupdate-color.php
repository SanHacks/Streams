<?php ob_start(); ?>
<?php 
session_start();
$user = $_SESSION['user_id'];
?>

<?php

if(!$user){

header('location:index.php');
}



    $color  =  $_GET['color']; 
	 
          include 'connect.php';
        $queryaw ="UPDATE users  SET backcolor='$color'
		WHERE id='$user'
                      ";
					  		mysqli_query($conn, $queryaw);
          mysqli_close($conn);
		  	  //Store user background color information
		    session_start();
	   
	   setcookie("backcolor", "$color", time()+86400);
		 
		  header('location:themes.php');
exit();


?><?php ob_end_flush();?>