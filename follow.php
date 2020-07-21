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
if($_GET['userid']  && $_GET['username']){
	if($_GET['userid']!=$user_id){
		$follow_userid = $_GET['userid'];
		$follow_username = $_GET['username'];
		$timestap = time();
		$ref = $_GET['ref'];
		$name = $_GET['name'];
		$content = "Subscribed to your feed";
		$type = "follow";
		include 'connect.php';
		
			
		
		$query5 = "SELECT id
							   FROM following 
							   WHERE user1_id='$user_id' AND user2_id='$follow_userid'
							  ";
							  	$query=mysqli_query($conn, $query5);

		
		mysqli_close($conn);
		if(!(mysqli_num_rows($query)>=1)){
			include 'connect.php';
			$query4="INSERT INTO following(user1_id, user2_id) 
						 VALUES ('$user_id', '$follow_userid')
						";
						  	mysqli_query($conn, $query4);
			$query3="UPDATE users
						 SET following = following + 1
						 WHERE id='$user_id'
						";
						mysqli_query($conn, $query3);
			$query2="UPDATE users
						 SET followers = followers + 1
						 WHERE id='$follow_userid'
						";
						mysqli_query($conn, $query2);
							$query1="INSERT INTO notifications(user_id,user2, timestamp,content,type) 
						 VALUES ('$user_id','$follow_userid','$timestap','$content','$type')
						";
						mysqli_query($conn, $query1);
			mysqli_close($conn);
		}
		
		
$from_url = $_SERVER['HTTP_REFERER'];
		header('location:'.$from_url.'');
	}
}else{

{
header ("location: home.php");

}

}
?><?php ob_end_flush();?>