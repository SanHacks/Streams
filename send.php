<?php ob_start(); ?>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>
<?php
 if($_POST['content']!="" ){

 }else{
 $post_wid =$_POST['tribe'];
     $succes = 'empty';
header("location: converse.php");
exit();
 }
?>
<?php

include("connect.php");

$content =$_POST['content'];
$id =$_POST['receipt'];
$timestamp = time();
$user = $user_id;
$status = "unread";


$sql="INSERT INTO messages (content, userid, timestamp,recipientid,status)
VALUES
('$content','$user_id','$timestamp ','$id ','$status ')";

 mysqli_query($conn, $sql);


		

header("location: converse.php");
exit();

mysqli_close($conn)

?><?php ob_end_flush();?>