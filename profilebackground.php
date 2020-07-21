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
include("resize-class.php");

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
	$ext = "jpg";
	$src = imagecreatefromgif($_FILES['file']['tmp_name']);
}


//Make sure it was a valid file, if not complain. 
if ((($ext == "jpg") || ($ext == "png") || ($ext == "gif")) && ($_FILES["file"]["size"] < 10000000))
  {
  	
  	//Check for errors, make sure upload worked
  	if ($_FILES["file"]["error"] > 0)
    	{
    	echo "Error Code: ";
    	echo $_FILES["file"]["error"];
    	echo "<br />";
    	}

    

		
		//Get pic info and upload pic to server
		$RandoNum = "HD";
		$RandomNum = rand(0, 9999999999);
		$nameof = "$RandoNum-$RandomNum-$userid";
		
		$picid = $nameof;
		$picturelocation = "userfiles/background/$picid.$ext";
	
		//move pic
		move_uploaded_file($_FILES["file"]["tmp_name"],
      "$picturelocation");
	  
      		$resizeObj = new resize($picturelocation);

	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(320,420, 'crop');

	// *** 3) Save image
	$resizeObj -> saveImage($picturelocation , 100);
	    
      	//make this new picture the default picture.
		include "connect.php";
      	$sql = "UPDATE users SET background ='$picturelocation' WHERE id = '$userid';";
		mysqli_query($conn,$sql);
		
		header("location: settings.php");

      } 

else
{

   header("location: settings.php");
  exit;
 }
?>