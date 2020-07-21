<?php

session_start();
if(isset($user_id)){
 unset($_SESSION['token']);
  unset($_SESSION['user_id']);
   unset($_COOKIE['path']);
}

	$user_id = $_SESSION['user_id'];
	$imgs =$_COOKIE['img'];
	$path = $_COOKIE['path'];
	session_unset();
	session_destroy();
	
    
header('Location:index.php');
?>