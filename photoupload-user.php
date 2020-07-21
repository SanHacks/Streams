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

require_once('php/php_image_magician.php');
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
if ((($ext == "jpg") || ($ext == "png") || ($ext == "gif")) && ($_FILES["file"]["size"] < 5000000))
  {
  	
  	//Check for errors, make sure upload worked
  	if ($_FILES["file"]["error"] > 0)
    	{
		$post_wid =$_POST[username];
	   $success = 'success';
header("location: userprofile.php?name=$post_wid&successs=$success");
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
		$picturelocation = "userfiles/photos/$picid.$ext";
	
		//move pic
		move_uploaded_file($_FILES["file"]["tmp_name"],
      "$picturelocation");
      	
		     	$magicianObj = new imageLib($picturelocation);

   $contentv = $_POST['content'];
	//$magicianObj -> addWatermark('images/logo.png', '50x 50', 180, 30);
		if($value0){
    //$magicianObj -> addCaptionBox('b', 115, 0, '#000',   65);
	//$magicianObj -> addText($valueme.$value0, 'bl', 20,'#FFF',90);
	//$magicianObj -> addTextToCaptionBox($value0);
	//$magicianObj -> addText($value0, '460x460', 65, '#000', 65, 65, 'php/fonts/windsong.ttf');
    }
    $magicianObj -> resizeImage(460,460, 'portrait', true);
	
   
		
		
		
      	//make this new picture the default picture.
$nt = $_POST['content'];
$typee = $_POST['type'];
		$tribe = $_POST['user'];
		$name = $_POST['username'];
		$location = $_POST['location'];
$timestamp = time();
$timestap = time();
$contentr = "Sent You A Photo";
$type = "user";
		include "connect.php";
		
		  $gotosms = "SELECT post,user_id
                          FROM posts 
                          WHERE post='$nt'
                          ";
		$querym=mysqli_query($conn, $gotosms);
						 
    
    if(mysqli_num_rows($querym)<=1){
		$sql="INSERT INTO posts(post,user_id,user2_id,image,timestamp,type,location)
VALUES
('$content','$userid',$tribe,'$picturelocation','$timestamp ','$ext','$location')";
$sqls=mysqli_query($conn, $sql);

}else{
header("location: home.php?username=$name&duplicate=$success");
exit;
}
//	$com=  	mysql_query("UPDATE users
	//				 SET posts = posts + 1
				//	 WHERE id='$userid'
		//			");
															if($user_id){
															if($sql){
	
								$not="INSERT INTO notifications(user_id,user2, timestamp,content,type) 
						 VALUES ('$user_id','$tribe','$timestap','$contentr','$type')
						";
						mysqli_query($conn, $not);

						}	
						}	
						//Get hashtags from user text
	
	$strings = $_POST['content'];
 $result = explode('#',$strings);
 array_shift($result);
 
 

 
 //print_R($result);
//echo $cleantexts = implode($result, " 	"); 
 
  //  foreach($result as $key => $resul) {
   // $key = $result;
	//echo "$key 
//	";
	$value0 = $result[0];
   $value1 = $result[1]; 
   $value2 = $result[2];   
   $value3 = $result[3];   
   
   
   
   
   
if($value0){

$comie=	"INSERT INTO tags(tag,user_id,timestamp,location) 
						 VALUES ('#$value0','$user_id','$timestamp','$location')
						";	
						$comi=mysqli_query($conn, $comie);
						if($value1){
$comie1="INSERT INTO tags(tag,user_id,timestamp,location) 
						 VALUES ('#$value1','$user_id','$timestamp','$location')
						";
						$comi1=mysqli_query($conn, $comie1);
						}
						
						if($value2){
$comie2=	"INSERT INTO tags(tag,user_id,timestamp,location) 
						 VALUES ('#$value2','$user_id','$timestamp','$location')
						";
						$comi2=mysqli_query($conn, $comie2);
						}	

						if($value3){
$comie3=	"INSERT INTO tags(tag,user_id,timestamp,location) 
						 VALUES ('#$value3','$user_id','$timestamp','$location')
						";
						$comi3=mysqli_query($conn, $comie3);
						}
						
						}		
	$stringse = $_POST['content'];
 $resulte = explode('@',$stringse);
 array_shift($resulte);
 
 

 
 //print_R($result);
//echo $cleantexts = implode($result, " 	"); 
 
  //  foreach($result as $key => $resul) {
   // $key = $result;
	//echo "$key 
//	";
	$value0e = $resulte[0];
   $value1e = $resulte[1]; 
   $value2e = $resulte[2];   
   $value3e = $resulte[3];   
   $timestap = time();
   $types = "mention";
       $contenta = "Mentioned you on a post";
    
    $gotosms = "SELECT id,username
                          FROM users 
                          WHERE username='$value0e'
                          ";
		$querym=mysqli_query($conn, $gotosms);
						 
    
    if(mysqli_num_rows($querym)>=1){
     
      $rows = mysqli_fetch_assoc($querym);
	  
	  
	 $id = $rows['id'];





     if($value0e){
       
                $not="INSERT INTO notifications(user_id,user2, timestamp,content,type) 
						 VALUES ('$user_id','$id','$timestap','$contenta','$types')
						";
						mysqli_query($conn, $not);
					//	if($value1){
                     //    $comie1="INSERT INTO tags(tag,user_id,timestamp,location) 
					//	 VALUES ('#$value1','$user_id','$timestamp','$location')
					//	";
					//	$comi1=mysqli_query($conn, $comie1);
					//	}					
						}	
							
   	}
   
		
	   $success = 'success';
header("location: userprofile.php?username=$name&success=$success");
exit();
      } 
}
else
	{
	$post_wid =$_POST[username];
	   $succes = 'succes';
header("location: userprofile.php?username=$post_wid&successs=$succes");
exit();
	}
?>
<?php ob_end_flush();?>