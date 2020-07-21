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
    			$post_wid =$_POST['post_id'];
		   $success = 'success';
header("location: post.php?pid=$post_wid&success=$success");
exit();
    	}
 

		
		//Get pic info and upload pic to server
		$RandoNum = "hbrd";
		$RandomNum = rand(0, 999999999);
		$nameof = " $RandoNum-$RandomNum-$userid";
		$nameofa = "$RandomNum-hbrd";
		
		$picid = $nameof;
		$picturelocation = "userfiles/photos/$picid.$ext";
		$picturelocations = "userfiles/photos/original/$nameofa.$ext";
	
		//move pic
		move_uploaded_file($_FILES["file"]["tmp_name"],
      "$picturelocation");
	      	if($ext==gif){
		
		
		
		}else{

	$magicianObj = new imageLib($picturelocation);




	/*	Purpose: Convert image to a vintage look
     *	Usage:	 vintage()
     * 	Params:	 n/a
     */ $contentv = $_POST['content'];
	 $tgged = $_POST['tag'];
     $valueme = "#";
	//$magicianObj -> addWatermark('images/logo.png', '50x 50', 180, 30);
			
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
   echo"$tgged";
		if($tgged){
		if($value0){
    $magicianObj -> addCaptionBox('b', 115, 0, '#000',   65);
	$magicianObj -> addText($valueme.$value0, 'bl', 20,'#FFF',90);
	//$magicianObj -> addTextToCaptionBox($value0);
	//$magicianObj -> addText($value0, '460x460', 65, '#000', 65, 65, 'php/fonts/windsong.ttf');
	//$magicianObj -> addWatermark('images/logo.png', '50x 50', 180, 30);
    }
    }
    $magicianObj -> resizeImage(460,460, 'portrait', true);
	

//	$magicianObj -> addCaptionBox('br', 40, 0, '#000', 50);
//	$magicianObj -> addTextToCaptionBox($contentv);
	
	//$magicianObj -> addWatermark('images/logo.png', 'br', 50);
	
	

	$magicianObj -> saveImage($picturelocation, 65);

	
      	//make this new picture the default picture.
}
$content = $_POST['postcomment'];
$post_id =$_POST['post_id'];
$follow_userid =$_POST['user'];
$location =$_POST['location'];
$timestamp = time();
$type ="comment";
		include "connect.php";


	$e="INSERT INTO posts(post,user_id,timestamp,location,post_id,role,image,type)
    VALUES
    ('$content','$userid','$timestamp ','$location','$post_id','$type','$picturelocation','$ext')";	

	$sql=mysqli_query($conn, $e) ;

		$ie= "UPDATE posts
					 SET comments = comments + 1
					 WHERE id='$post_id'
					";
				
					$com=mysqli_query($conn, $ie);
						$comxc=  "UPDATE users
					 SET posts = posts + 1
			 WHERE id='$user_id'
				";
              $gotor=mysqli_query($conn, $comxc);
					
												if($user_id==$follow_userid){
				}else{
						$ea="INSERT INTO notifications(post_id,user_id,user2, timestamp,content,type,content_id) 
						 VALUES ('$post_id','$user_id','$follow_userid','$timestap','$contentr','$type','$post_id')
						";
						mysqli_query($conn, $ea) ;
						
						}
							//Get hashtags from user text
	
	$strings = $_POST['postcomment'];
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
   
		
	header("location: post.php?pid=$post_id");


      } 

else
	{
 		   $success = 'success';
header("location: post.php?pid=$post_id&success=$success");
exit();
	}
	header("location: post.php?pid=$post_id");
?><?php ob_end_flush();?>