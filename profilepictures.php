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


//Make sure it was a valid file, if not complain. 
if ((($ext == "jpg") || ($ext == "png") || ($ext == "gif")) && ($_FILES["file"]["size"] < 3000000))
  {
  	
  	//Check for errors, make sure upload worked
  	if ($_FILES["file"]["error"] > 0)
    	{
    	echo "Error Code: ";
    	echo $_FILES["file"]["error"];
    	echo "<br />";
    	}
 	 else
    	{
    	//Check image size
    
    	
   
$percent = 0.3;


// Get new sizes
list($width, $height) = getimagesize($_FILES["file"]["tmp_name"]);
$newwidth = $width * $percent;
$newheight = $height * $percent;

// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($_FILES["file"]["tmp_name"]);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Output
imagejpeg($thumb,$picturelocation);
    

		
		//Get pic info and upload pic to server
		$RandoNum = "IntelliFeed";
		$RandomNum = rand(0, 9999999999);
		$RandomNume = md5($userid);
		$nameof = "$RandoNum-$RandomNum-$RandomNume";
		
		$picid = $nameof;
	
		$picturelocation = "userfiles/avatars/$picid.$ext";
	
	
	 
  pathinfo($thumb, $picturelocation);
		//move pic
		move_uploaded_file($_FILES["file"]["tmp_name"],
      "$picturelocation");
      	
      	//make this new picture the default picture.
		include "connect.php";
      	$sql = "UPDATE users SET avatar ='$picturelocation' WHERE id = '$userid';";
		$sqls=mysqli_query($conn, $sql);

		
		header("location: settings.php");

      } 
}
else
{

   header("location: settings.php");
  exit;
 }
?>
<?php ob_end_flush();?>