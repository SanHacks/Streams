<?php ob_start(); 
?>
<?php 
	$username =$_GET[username];
		 if($_GET[username]){
   header("location: tprofile.php?username=$username");
  exit;
 }
ob_end_flush();
 ?>