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
$id =$_POST['receipt'];
 if($_POST['content']!="" ){

							}else{
 $message =$_POST['message'];
     $succes = 'empty';
header("location: conversation.php?con=$message&empty=$succes&id=$id");
exit();
						}
?>
<?php

include("connect.php");
$content = $_POST['content'];
$message =$_POST['message'];
$timestamp = time();
$user_id = $_SESSION['user_id'];
$status = "unread";


$sql="INSERT INTO convo (content,message_id, user_id, timestamp,recepient)
VALUES
('$content','$message','$user_id','$timestamp ','$id')";
	
		$comx=mysqli_query($conn, $sql);
if($user_id==$id){

$yi="UPDATE convo
						 SET viewed2 = viewed2 = 0
						 WHERE message_id='$message'
						";
				
mysqli_query($conn, $yi);



}else{

		$yi="UPDATE convo
						 SET viewed = viewed = 0
						 WHERE message_id='$message'
						";
				mysqli_query($conn, $yi);	
						
				}				

header("location: conversation.php?con=$message&name=$usernameR&id=$id");
exit();

mysqli_close($conn)

?><?php ob_end_flush();?>