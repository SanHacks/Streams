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
if (($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg"))
{
	$ext = "jpg";
	$src = imagecreatefromjpeg($_FILES['file']['tmp_name']);
}
else if ($_FILES["file"]["type"] == "image/png")
{
	$ext = "png";
	$src = imagecreatefrompng($_FILES['file']['tmp_name']);
}
else if ($_FILES["file"]["type"] == "image/gif")
{
	$ext = "gif";
	$src = imagecreatefromgif($_FILES['file']['tmp_name']);
}
else if ($_FILES["file"]["type"] == "video/mp4")
{
	$ext = "mp4";
	$src = imagecreatefromgif($_FILES['file']['tmp_name']);
}


//Make sure it was a valid file, if not complain. 
if ((($ext == "jpg") || ($ext == "png") || ($ext == "gif")) && ($_FILES["file"]["size"] < 5000000))
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
    	//Check image size
    	list($width,$height)=getimagesize($_FILES["file"]["tmp_name"]);
    	if ($width > 600)
    	{
    	
    	//Resize image
    	$newwidth=300;
		$newheight=($height/$width)*$newwidth;
		$tmp = imagecreatetruecolor($newwidth, $newheight);
		imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
		$width = $newwidth;
		$height = $height;
		$oldsrc = $src;
		$src = $tmp;
		$ext="jpg";
		imagedestroy($oldsrc);
		}
    

		
		//Get pic info and upload pic to server
		$RandoNum = "IntelliFeed";
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
$yi="UPDATE messages
						 SET viewed2 = viewed2 = 0
						 WHERE id='$message'
						";
				
mysqli_query($conn, $yi);

}else{

	$yi="UPDATE messages
						 SET viewed = viewed = 0
						 WHERE id='$message'
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

header("location: conversation.php?con=$message&success=$succes");
exit();
	}
?><?php ob_end_flush();?>