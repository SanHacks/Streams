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

	if($_GET['tribe']!=$user_id){
		$follow_userid = $_GET['tribe'];
		$name = $_GET['name'];
	
		include 'connect.php';
		$sql ="SELECT member_id
							   FROM tribemems 
							   WHERE user_id='$user_id' AND tribe_id='$follow_userid'
							  ";
	$query=mysqli_query($conn, $sql);

		mysqli_close($conn);
		if(!(mysqli_num_rows($query)>=1)){
			include 'connect.php';
			$se="INSERT INTO tribemems(user_id, tribe_id) 
						 VALUES ('$user_id', '$follow_userid')
						";
						$queryr=mysqli_query($conn, $se);
			$yi ="UPDATE tribes
						 SET members = members + 1
						 WHERE id='$follow_userid'
						";
    $com=mysqli_query($conn, $yi);

			mysqli_close($conn);
		}
		header("Location: tribe.php?tribe=$follow_userid&name=$name");
	}

?><?php ob_end_flush();?>