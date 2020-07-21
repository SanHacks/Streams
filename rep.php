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
if($_GET['pid']){
	
		$follow_userid = $_GET['key'];
		$post_id = $_GET['pid'];
		$timestamp = time();
		$timestap = time();
        $post = $_GET['post'];
		$user = $_GET['user'];
		$repname = $_GET['name'];
		
			include 'connect.php';
			$likes = likes + 1;
			$content = "Reposted your post";
			$type = "repost";
			$role = "repost";
if($post){
				$queryyxx = "SELECT id,user_id,post,location,image
                              FROM posts
							WHERE  id = $post";
							}else{
			  $queryyxx = "SELECT id,user_id,post,location,image
                              FROM posts
							WHERE  id = $post_id";
							}
							 $queryy=mysqli_query($conn, $queryyxx);
		
		while ($rows = mysqli_fetch_assoc($queryy)) {
		$contenta = $rows['post'];
		$uif = $rows['user_id'];
		$pi = $rows['id'];
		$location = $rows['location'];
		$image = $rows['image'];
	 //Save Repost as new post to database
				$notscsx="INSERT INTO posts(post,user_id, timestamp,repuser,role,op,image) 
						 VALUES ('$contenta','$user_id','$timestamp','$uif','$role','$pi','$image')
						";
						$notscs=mysqli_query($conn, $notscsx);
						if($notscs){
							//repost the post	
				$nots="INSERT INTO repost(post_id,user_id, timestamp) 
						 VALUES ('$post_id','$user_id','$timestamp')
						";
						mysqli_query($conn, $nots);
				$notsq="UPDATE posts
						 SET reposts = reposts + 1
						 WHERE id='$post_id'
						";	
						mysqli_query($conn, $notsq);			
		
			//REpost	Notification						
							if($user_id==$follow_userid){
				}else{
			$not="INSERT INTO notifications(post_id,user_id,user2, timestamp,content,type) 
						 VALUES ('$post_id','$user_id','$follow_userid','$timestap','$content','$type')
						";
						mysqli_query($conn, $not);
					}
					}else{
					
						header("location: post.php?pid=$post_id");
					}
									
						//Update original post stats
			
		//	mysql_query("UPDATE users
			//			 SET followers = followers + 1
			//			 WHERE id='$follow_userid'
	//					");
		$strings = $contenta;
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
		function softTrim($text, $count, $wrapText='...'){

    if(strlen($text)>$count){
        preg_match('/^.{0,' . $count . '}(?:.*?)\b/siu', $text, $matches);
        $text = $matches[0];
    }else{
        $wrapText = '';
    }
    return $text . $wrapText;
}
		$conto= softTrim("$contenta", 35);
						
						if($image){

												// require codebird
require_once('src/codebird.php');

\Codebird\Codebird::setConsumerKey("i90Ivgo8A6GRJRq3R9vO6laAK", "QIycnylLYA5RWX52I8sDM2Y6dNIuXuWv8WfJL660ygmUKOTuhy");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("3435122068-m1bgUzS7HRuR8ZzlT2vUGsikQwnLx9fNum7ueTo", "kuXUX1HEkI3Bvzde2djmGH41r0PSUmZoolxMZwhdjloUY");

$params = array(
	'status' => "Reposted $repname : $conto [Photo] "
);
$reply = $cb->statuses_update($params);

		

						}else{
												// require codebird//
//require_once('/src/codebird.php');

// \Codebird\Codebird::setConsumerKey("6zO3SHmUDEtMw51AwAts5HzMD", "0hQoMcccXThNFbmDcBy3HF20fxUiNRhczdbPnn6EjHfadYCUne");
//$cb = \Codebird\Codebird::getInstance();
//$cb->setToken("2217127438-G759OmrTrig9mbVobiFlAweAmGx9asO7BPxHszN", "pxqxexpEyOVXcHBywKI5vKDqlbbIOA4IEGo90hpfe1M0A");

//$params = array(
//	'status' => "Reposted $repname : $conto "
//);
//$reply = $cb->statuses_update($params);


}

	
	}

			mysqli_close($conn);
		
		header("location: post.php?pid=$post_id");
	
}else{
header("location: index.php");
}
?><?php ob_end_flush();?>