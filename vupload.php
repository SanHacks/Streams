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
if ($_FILES["file"]["type"] == "video/mp4")
{
	$ext = "mp4";
	$src = $_FILES['file']['tmp_name'];
}else if ($_FILES["file"]["type"] == "video/webm")
{
	$ext = "webm";
	$src = $_FILES['file']['tmp_name'];
}else if ($_FILES["file"]["type"] == "video/ogg")
{
	$ext = "ogg";
	$src = $_FILES['file']['tmp_name'];
}else if ($_FILES["file"]["type"] == "video/mpeg")
{
	$ext = "mp4";
	$src = $_FILES['file']['tmp_name'];
}



  	
 
    	//Check image size
 
    

	
		//Get pic info and upload pic to server
		$RandoNum = "intllfd";
		$RandomNum = rand(0, 9999999999);
		$nameof = "$RandoNum-$RandomNum-$userid";
		$nameofs = "$RandomNum-$userid";
		
		$picid = $nameof;
		$picturelocation = "userfiles/photos/$picid.$ext";
	
		//move pic
		move_uploaded_file($_FILES["file"]["tmp_name"],
      "$picturelocation");


	  
	  
		$content = $_POST['content'];
		$content = $_POST['content'];
		$typed = $_POST['type'];
		$tribe = $_POST['tribe'];
		$location = $_POST['location'];
		$type = "Tribe";
		$timestamp = time();
		include "connect.php";
		
		   $gotosms = "SELECT post,user_id
                          FROM posts 
                          WHERE post='$content'
                          ";
			$querym=mysqli_query($conn, $gotosms);
						 
    
    if(mysqli_num_rows($querym)<1){
		
		if($picturelocation){
		$sql="INSERT INTO posts(post,user_id,image,imageo,timestamp,type,location)
VALUES
('$content','$userid','$picturelocation','$picturelocations','$timestamp ','$ext','$location')";
 $result=mysqli_query($conn, $sql);
	   $yi=  	"UPDATE users
					 SET posts = posts + 1
					 WHERE id='$user_id'
					";
					$com=mysqli_query($conn, $yi);

		}
						$strings =$_POST['content'];
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
$comie1=	"INSERT INTO tags(tag,user_id,timestamp,location) 
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
				}else{
header("location: home.php?duplicate=fail");
exit;
}
					
    $gotosmss = "SELECT id,user_id
                          FROM posts 
                          WHERE user_id='$user_id' ORDER BY timestamp DESC
                          ";
		$queryme=mysqli_query($conn, $gotosmss);
						 
    

     
      $rowse = mysqli_fetch_assoc($queryme);
	  
	  
	 $pp = $rowse['id'];
	

		if($com){
			
	   $success = 'success';
header("location: home.php?username=$name&success=$success&pull=$pp");
exit();

      }else{
	
	   $success = 'success';
header("location: vupload.php?success=$success");
exit();
	}
?><?php ob_end_flush();?>