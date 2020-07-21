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
		$unfollow_userid = $_GET['userid'];
		$unfollow_username = $_GET['username'];
		$ref = $_GET['ref'];
		$name = $_GET['name'];
		include 'connect.php';
		$query2 = "SELECT id
							   FROM following 
							   WHERE user1_id='$user_id' AND user2_id='$unfollow_userid'
							  ";
							  $query = mysqli_query($conn, $query2);
		mysqli_close($conn);
		if(mysqli_num_rows($query)>=1){
			include 'connect.php';
			$ry="DELETE FROM following 
				WHERE user1_id='$user_id' AND user2_id='$unfollow_userid'
				";
				 $query = mysqli_query($conn, $ry);
			$querye ="UPDATE users
				SET following = following - 1
				WHERE id='$user_id'
				";
				$query = mysqli_query($conn, $querye);
			$queryr ="UPDATE users
				SET followers = followers - 1
				WHERE id='$unfollow_userid'
				";
				$query = mysqli_query($conn, $queryr);
			mysqli_close($conn);
		}
		
		
					if($ref ==3)
{
header("Location: followers.php");

}elseif($ref ==2){

header("Location: following.php");

}elseif($ref ==5){

header("Location: userfollowers.php?username=$name");

}elseif($ref ==4){

header("Location: userfollowing.php?username=$name");

}else{
header("Location: userprofile-after.php?username=$unfollow_username");
}



	}
}
?><?php ob_end_flush();?>