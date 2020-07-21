<?php

if($user_id){
	
	
	
		echo"
    <div class='toolbar toolbar-bottom' style='background-color:";
	if($menu){
		echo"$menu";
	}elseif($poses){
		echo"$stats";
	}elseif($stats){
		echo"$stats";
	}
	else{
		echo"#3966a2";
	} echo"
	' >
    <div class='toolbar-inner'><a href='home.php' class='link'><i class='icon material-icons'>dashboard</i></a>";
						include "connect.php"; 			
$user = $_SESSION['user_id'];
$vieweddd = 0;
$resulttte = "SELECT * FROM notifications WHERE user2='$user' AND viewed='$vieweddd'   ";
 $resulttt=mysqli_query($conn, $resulttte);

	$numberOfRowsss = mysqli_num_rows($resulttt);	
	
		if($numberOfRowsss > 0){
	
	echo"<a href='notifications.php' class='link' style='color:#d7e242'><i class='icon f7-icons'>bell_fill</i> 
	
	<p style='color:#d7e242'>$numberOfRowsss</p></a>
	
	";

		 
		  }else{
	
	echo"<a href='notifications.php' class='link' ><i class='icon f7-icons'>bell</i></a>";
		  }
	
	
	
										 
$user = $_SESSION['user_id'];
$vieweddda = 0;

 $resultttews = "SELECT id,content,recipientid,userid,timestamp,viewed,viewed2 FROM messages WHERE recipientid='$user' 
 AND viewed2='$vieweddda'   ";
 $resultttas=mysqli_query($conn, $resultttews);
  $resultttewsw = "SELECT * FROM convo WHERE recepient='$user' AND viewed2='$vieweddda'   ";
 $resultttass=mysqli_query($conn, $resultttewsw);
 
	mysqli_close($conn);
	;	
	$numberOfRowsssat = mysqli_num_rows ($resultttas);	
	$numberOfRowsssata = mysqli_num_rows ($resultttass);	
	
	$numberOfRow=$numberOfRowsssat + $numberOfRowsssata;
	
		if($numberOfRow > 0){
	
	echo"
	<a href='converse.php' class='link'  style='color:#d7e242'><i class='icon f7-icons'>email</i><p style='color:#d7e242'>$numberOfRow</p></a>";

		 
		  }else{
	echo"
	<a href='converse.php' class='link'><i class='icon f7-icons'>email</i></a>";
		  }
	
	echo"
	<a href='appdate.php' class='link'><i class='icon f7-icons'>paper_plane</i></a>
	
	
	
	<a href='profile.php' class='link'><i class='icon f7-icons'>person</i></a>
	
			</div>
	</div>";
  
  
		}
  ?>