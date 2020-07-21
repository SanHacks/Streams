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
 if($_POST['content']!="" ){

 }else{
 $post_wid =$_POST['tribe'];
     $succes = 'empty';
header("location: tribe.php?tribe=$post_wid&empty=$succes");
exit();
 }
?>


<?php
//INCLUDE DATABASE CONNECTION SCRIPT

include("connect.php");
		$tribe = $_POST['tribe'];
  $gotosms = "SELECT post,user_id
                          FROM posts 
                          WHERE post='$content' AND tribe_id='$tribe'
                          ";
		$querym=mysqli_query($conn, $gotosms);
				  if(mysqli_num_rows($querym)<1){		 
    
      $content = $_POST['content'];
		$type = $_POST['type'];
		
		$user = $_POST['user'];
		$location = $_POST['location'];
        $timestamp = time();
        $timestap = time();
           $comb="INSERT INTO posts(post,user_id,type,tribe_id,timestamp,location)
             VALUES
             ('$content','$user_id','$type','$tribe','$timestamp ','$location')";
	   
					mysqli_query($conn,$comb);
  
				   $yi=  	"UPDATE users
					 SET posts = posts + 1
					 WHERE id='$user_id'
					";
					$com=mysqli_query($conn, $yi);

					
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

$comie=	"INSERT INTO tags(tag,user_id,tribe,timestamp,location) 
						 VALUES ('#$value0','$user_id','$tribe','$timestamp','$location')
						";	
						$comi=mysqli_query($conn, $comie);
						if($value1){
$comie1=	"INSERT INTO tags(tag,user_id,tribe,timestamp,location) 
						 VALUES ('#$value1','$user_id','$tribe','$timestamp','$location')
						";
						$comi1=mysqli_query($conn, $comie1);
						}
						
						if($value2){
$comie2=	"INSERT INTO tags(tag,user_id,tribe,timestamp,location) 
						 VALUES ('#$value2','$user_id','$tribe','$timestamp','$location')
						";
						$comi2=mysqli_query($conn, $comie2);
						}	

						if($value3){
$comie3=	"INSERT INTO tags(tag,user_id,tribe,timestamp,location) 
						 VALUES ('#$value3','$user_id','$tribe','$timestamp','$location')
						";
						$comi3=mysqli_query($conn, $comie3);
						}
						
						}	
//INSERT NOTIFICATION tO ALL TRIBE MEMBERS	
						
			
						// require codebird//
//require_once('/src/codebird.php');

//\Codebird\Codebird::setConsumerKey("6zO3SHmUDEtMw51AwAts5HzMD", "0hQoMcccXThNFbmDcBy3HF20fxUiNRhczdbPnn6EjHfadYCUne");
//$cb = \Codebird\Codebird::getInstance();
//$cb->setToken("2217127438-G759OmrTrig9mbVobiFlAweAmGx9asO7BPxHszN", "pxqxexpEyOVXcHBywKI5vKDqlbbIOA4IEGo90hpfe1M0A");

//$params = array(
//	'status' => "$content via @hybridapp_"
//);
//$reply = $cb->statuses_update($params);

			
	//				if (!mysql_query($not,$conn))
 // {
//die('Error: ' . mysql_error());
 //}
					 }else{
header("location: home.php?username=$name&duplicate=fail");
exit;
}	
   $success = 'success';
header("location: tribe.php?tribe=$tribe&success=$success");
exit();

mysqli_close($conn)

?><?php ob_end_flush();?>