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

		$post_id = $_GET[comment_id];
		if($post_id){
		$follow_userid = $_GET[user];
		$postd =$_GET[post];
		$comid = $_GET[comment];
		$ref =$_GET[ref];
		$timestamp = time();
		$timestap = time();
			$content = "Upvoted your Comment";
			$type = "upvote";
							include "connect.php";
						
			$sql="INSERT INTO votesup (comment_id,user_id, timestamp) 
						 VALUES ('$post_id','$user_id','$timestamp')
						";
						mysqli_query($conn, $sql);
						if($user_id==$follow_userid){
				}else{
								$unme="INSERT INTO notifications(post_id,user_id,user2, timestamp,content,type,content_id) 
						 VALUES ('$postd','$user_id','$follow_userid','$timestap','$content','$type','$comid')
						";
						mysqli_query($conn, $unme);
						
						}
			$known="UPDATE posts
						 SET votesup = votesup + 1
						 WHERE id='$post_id'
						";
						mysqli_query($conn, $known);
						//Check If The PERSON WHO IS UPVOTING HAS ALREADY DOWNVOTED
					$god = "SELECT id
										   FROM votesdown 
										   WHERE comment_id='$post_id' AND user_id='$user_id'
										  ";
				$query23 = mysqli_query($conn,$god);

					if(mysqli_num_rows($query23)>=1){
	$godly="DELETE FROM Votesdown 
					WHERE comment_id=' $post_id'  AND   user_id='$user_id'
						";
					$query23aa = mysqli_query($conn, $godly);
					
					
							$godbless="UPDATE posts
						 SET votesdown = votesdown - 1
						 WHERE id='$post_id' 
						";
					 mysqli_query($conn, $godbless);
					}

			mysqli_close($conn);

	if($ref ==13)
{
header ("location: comment.php?post=$postd&comment=$post_id ");

}else{
header ("location: post.php?pid=$postd ");
}


}else{

if($ref ==13)
{
header ("location: comment.php?post=$postd&comment=$post_id ");

}else{
header ("location: post.php?pid=$postd ");
}
}
?><?php ob_end_flush();?>