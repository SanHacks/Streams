<?php ob_start(); ?>
<?php  	error_reporting(0);		?>
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
 if($_POST['content']!="" ){

 }else{
     $succes = 'empty';
header("location: appdate.php?empty=$succes");
exit();
 }
include("connect.php");
 //function clean($str) {
	//	$str = @trim($str);
	//	if(get_magic_quotes_gpc()) {
	//		$str = stripslashes($str);
	//	}
//		return mysql_real_escape_string($str);
//	}
 
$content = $_POST['content'];
$contento = $_POST['content'];
$post_id =$_POST['post_id'];
$location =$_POST['location'];
$sec =$_POST['section'];
$timestamp = time();
 $twiplish = $_POST['twitter'];




 
//Get hashtags from user text
	
	$strings = $_POST['content']; $result = explode('#',$strings);
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
  $gotosms = "SELECT post,user_id
                          FROM posts 
                          WHERE post='$content'
                          ";
		$querym=mysqli_query($conn, $gotosms);
						 
    
    if(mysqli_num_rows($querym)<1){
$e="INSERT INTO posts(post,user_id,timestamp,location)
VALUES
('$content','$user_id','$timestamp ','$location')";
$sqls=mysqli_query($conn, $e);
$com=  	"UPDATE users
				 SET posts = posts + 1
			 WHERE id='$user_id'
					";
		$goto=mysqli_query($conn, $com);
	
// require codebird
require_once('/src/codebird.php');

\Codebird\Codebird::setConsumerKey("aQZaWL11hIMgYJoOTMcttTjNx", "3nvAK1HO5JhiCS4M0tFNZDD19HEWR0CF8AfqKJGzzvh6eiSBkd");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("2217127438-G759OmrTrig9mbVobiFlAweAmGx9asO7BPxHszN", "pxqxexpEyOVXcHBywKI5vKDqlbbIOA4IEGo90hpfe1M0A");

$params = array(
	'status' => "$content via @intellifeed_"
);
$reply = $cb->statuses_update($params);

		}else{
header("location: home.php?duplicate=fail");
exit;
}
		//Check for mentions e.g @san and then notifies the user if the account exists
	 $stringse = $_POST['content'];
 $resulte = explode('@',$stringse);
 array_shift($resulte);
 
 
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
			 
				
  $gotosmss = "SELECT id,user_id
                          FROM posts 
                          WHERE user_id='$user_id' ORDER BY timestamp DESC
                          ";
		$queryme=mysqli_query($conn, $gotosmss);
						 
    

     
      $rowse = mysqli_fetch_assoc($queryme);
	  
	  
	 $pp = $rowse['id'];


		
	   $success = 'success';
header("location: home.php?username=$name&success=$success&pull=$pp");
			 
	
   $success = 'success';
header("location: home.php?success=$success&pull=$pp");
exit();

mysqli_close($conn)

?><?php ob_end_flush();?>