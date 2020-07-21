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
	
		$follow_userid = $_SESSION['user_id'];
		$post_id = $_GET['pid'];
		$timestamp = time();
		include 'connect.php';
	
			include 'connect.php';
			
			
			$dely="DELETE FROM posts 
					WHERE id='$post_id'  AND   user2_id='$user_id'
						";
						mysqli_query($conn, $dely);
						
						
						$likes="DELETE FROM likes 
					WHERE post_id=' $post_id'  
						";	
                     mysqli_query($conn, $likes);


						$reply="DELETE FROM reply 
					WHERE post_id=' $post_id'  
						";	
						
						
						mysqli_query($conn, $reply);
						
								//DELETE Comments FROM DATABASE
						$ttp="DELETE FROM postcomment 
					WHERE post_id=' $post_id'  
						";
						
						mysqli_query($conn, $ttp);
						//DELETE NOTIFICATIONS FROM DATABASE
						$not="DELETE FROM notifications 
					WHERE post_id=' $post_id'  
						";
			mysqli_query($conn, $not);
		//	mysql_query("UPDATE users
			//			 SET followers = followers + 1
			//			 WHERE id='$follow_userid'
	//					");
			mysqli_close($conn);
		
		header("location: home.php");
	
}     header("location: home.php");
?><?php ob_end_flush();?>