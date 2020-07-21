<?php ob_start(); ?>
<?php 
session_start();
$user = $_SESSION['user_id'];
?>

<?php

if(!$user){

header('location:index.php');
}

if($_GET['color']){

    $color  =  $_GET['color']; 
	 
          include 'connect.php';
        $queryaw ="UPDATE users  SET stats='$color'
		WHERE id='$user'
                      ";
					  		mysqli_query($conn, $queryaw);
          mysqli_close($conn);
		  
		  //Start sessions 
		session_start();
		setcookie("menu", "$color", time()+86400*30);
		  header('location:themes.php');
exit();
}

?><?php ob_end_flush();?>