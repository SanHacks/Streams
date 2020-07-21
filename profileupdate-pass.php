<?php ob_start(); ?>
<?php 
session_start();
$user = $_SESSION['user_id'];
?>
<p><?php
if($_POST['login']){
 


    include "connect.php";
    $sqls = "SELECT id, password
                          FROM users 
                          WHERE id='$user_id'
                          ";
		$query =mysqli_query($conn, $sqls);
						 
    mysqli_close($conn);
      $password = md5($_POST['password']);
      $row = mysql_fetch_assoc($query);
      if($password==$row['password']){
	     include 'connect.php';
        $query4="UPDATE users  SET password='$password'
		WHERE id='$user+id'
                      ";
					  	$query4 =mysqli_query($conn, $sqls);
						 
          mysqli_close($conn);
        header("location: settings.php");
		$error = "Password Successfully Changed";
        exit;
      }
      else{
        $error_msg = "Incorrect Password";
      }

}else
{
   header("location: change.php");
  exit;
 }
?><?php ob_end_flush();?>