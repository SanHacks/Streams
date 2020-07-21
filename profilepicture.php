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

include("php/php_image_magician.php");

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
    
    	
   



// Load
//$thumb = imagecreatetruecolor($newwidth, $newheight);
//$source = imagecreatefromjpeg($_FILES["file"]["tmp_name"]);


// Output

    

		
		//Get pic info and upload pic to server
		$RandoNum = "hybrd";
		$RandomNum = rand(0, 9999999999);
		$RandomNume = md5($userid);
		$nameof = "$RandoNum-$RandomNum-$RandomNume";
		$nameofs = "$RandomNum-$RandomNume";
		
		$picid = $nameof;
	
		$picturelocationa = "userfiles/avatars/original/$picid.$ext";
		$picturelocation = "userfiles/avatars/$picid.$ext";
		$picturelocations = "userfiles/avatars/profile/$nameofs.$ext";
	
	
	 
 // pathinfo($thumb, $picturelocation);
		//move pic
	move_uploaded_file($_FILES["file"]["tmp_name"],
"$picturelocationa");
      	
		   
	$magicianObj = new imageLib($picturelocationa);



	/*	Purpose: Resize image
     *	Usage:	 resizeImage([width], [height], [resize type], [sharpen])
     * 	Params:	 width - the new width to resize to
     *			 height - the new height to resize to
     *			 resize type - choose from the below options
     *
     *      exact = The exact height and width dimensions you set. (Default)
     *      portrait = Whatever height is passed in will be the height that
     *          is set. The width will be calculated and set automatically 
     *          to a the value that keeps the original aspect ratio. 
     *      landscape = The same but based on the width. We try make the image 
     *         the biggest size we can while stil fitting inside the box size
     *      auto = Depending whether the image is landscape or portrait, this
     *          will automatically determine whether to resize via 
     *          dimension 1,2 or 0
     *      crop = Will resize and then crop the image for best fit
 	 *	
 	 *			 sharpen - set as true if you would like shapening applied to 
 	 *				to your resized image    
     */	
	$magicianObj -> resizeImage(48, 48, 'crop', true);

//$magicianObj -> roundCorners(15, 'teal');
	/*	Purpose: Save image
     *	Usage:	 saveImage('[filename.type]', [quality])
     * 	Params:	 filename.type - the filename and file type to save as
 	 * 			 quality - (optional) 0-100 (100 being the highest (default))
     *				Only applies to jpg & png only
     */
	$magicianObj -> saveImage($picturelocation , 100);
	
	
	$magicianObj = new imageLib($picturelocationa);


	/*	Purpose: Resize image
     *	Usage:	 resizeImage([width], [height], [resize type], [sharpen])
     * 	Params:	 width - the new width to resize to
     *			 height - the new height to resize to
     *			 resize type - choose from the below options
     *
     *      exact = The exact height and width dimensions you set. (Default)
     *      portrait = Whatever height is passed in will be the height that
     *          is set. The width will be calculated and set automatically 
     *          to a the value that keeps the original aspect ratio. 
     *      landscape = The same but based on the width. We try make the image 
     *         the biggest size we can while stil fitting inside the box size
     *      auto = Depending whether the image is landscape or portrait, this
     *          will automatically determine whether to resize via 
     *          dimension 1,2 or 0
     *      crop = Will resize and then crop the image for best fit
 	 *	
 	 *			 sharpen - set as true if you would like shapening applied to 
 	 *				to your resized image    
     */	
	$magicianObj -> resizeImage(200, 200, 'crop', true);
//$magicianObj -> roundCorners(15, 'teal');

	/*	Purpose: Save image
     *	Usage:	 saveImage('[filename.type]', [quality])
     * 	Params:	 filename.type - the filename and file type to save as
 	 * 			 quality - (optional) 0-100 (100 being the highest (default))
     *				Only applies to jpg & png only
     */
	$magicianObj -> saveImage($picturelocations , 100);

	
	
		
      	//make this new picture the default picture.
		include "connect.php";
      	$sql = "UPDATE users SET avatar ='$picturelocation' WHERE id = '$userid';";
		$sqls=mysqli_query($conn, $sql);
		
		$sqlc = "UPDATE users SET avatarpro ='$picturelocations' WHERE id = '$userid';";
		$sqlsb=mysqli_query($conn, $sqlc);
		
		$sqlcd = "UPDATE users SET avataro ='$picturelocations' WHERE id = '$userid';";
		$sqlsbe=mysqli_query($conn, $sqlcd);
		
	  
		
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