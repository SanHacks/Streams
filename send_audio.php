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

//Initialize Values

$userid = $_SESSION['user_id'];
$src = NULL;
$ext = "";


//Based upon file, convert for use in database
if ($_FILES["file"]["type"] == "audio/mp3")
{
	$ext = "mp3";
	$src = $_FILES['file']['tmp_name'];
}else if ($_FILES["file"]["type"] == "audio/mp3")
{
	$ext = "mpeg";
	$src = $_FILES['file']['tmp_name'];
}else if ($_FILES["file"]["type"] == "audio/mpeg")
{
	$ext = "ogg";
	$src = $_FILES['file']['tmp_name'];
}


//Make sure it was a valid file, if not complain. 
if ((($ext == "mp3") ||($ext == "ogg") ||($ext == "mpeg") || ($ext == "gif")) && ($_FILES["file"]["size"] < 10000000))
  {
  	
  	
  	//Check for errors, make sure upload worked
  	if ($_FILES["file"]["error"] > 0)
    	{
 $post_wid =$_POST[tribe];
	 $succes = 'succes';
header("location: converse.php");
exit();
    	}
 	 else
    	{


		
		//Get pic info and upload pic to server
		$RandoNum = "Intelliaudio";
		$RandomNum = rand(0, 9999999999);
		$nameof = "$RandoNum-$RandomNum-$userid";
		
		$picid = $nameof;
		$picturelocation = "userfiles/converse/$picid.$ext";
	
		//move pic
		move_uploaded_file($_FILES["file"]["tmp_name"],
      "$picturelocation");
      	
      	//make this new picture the default picture.

        $content = $_POST['content'];
        
		$message = $_POST['message'];
		$id = $_POST['receipt'];
		$tribe =$_POST['tribe'];
		
        $timestamp = time();
		include "connect.php";
		$sql="INSERT INTO convo(content,user_id,recepient,image,timestamp,message_id,type)
VALUES
('$content','$user_id','$id','$picturelocation','$timestamp ','$message ','$ext')";
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
	
		
	   $success = 'success';
header("location: conversation.php?con=$message&success=$success");
exit();
      } 
}
else
	{
	 $succes = 'succes';
	  $post_wid =$_POST[tribe];
	 $succes = 'succes';

header("location: conversation.php?con=$message&name=$usernameR&id=$id");
exit();
	}
?><?php ob_end_flush();?>