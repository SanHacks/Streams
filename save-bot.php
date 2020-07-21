<?php ob_start(); ?>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>
<?php
 if(!$user_id){
   header("location: index.php");
  exit;
 }
?>


<?php
 if($_POST['content']!="" ){

 }else{
     $succes = 'empty';
header("location: invent-bot.php?success=$succes");
exit();
 }
include("connect.php");

$content = $_POST['content'];
$about = $_POST['about'];
$im = $_POST['image'];
$im = $_POST['image'];
$timestamp = time();






$eaa="INSERT INTO bot(name,user,about,avatar)
VALUES
('$content','$user_id','$about','$im')";
 $sql=mysqli_query($conn, $eaa);

		
 	   $success = 'success';
header("location: mybots.php?success=$success");
exit();

mysqli_close($conn)

?><?php ob_end_flush();?>