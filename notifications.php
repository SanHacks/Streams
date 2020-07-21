<!DOCTYPE html><?php ob_start(); ?>
<?php include"sessions.php"; 
		$page="allowed";

?>
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>Notifications</title>
		 <!-- Path to Framework7 Library CSS-->
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link rel="stylesheet" href="css/framework7.material.min.css">
		<!-- Path to your custom app styles-->
		 <link rel="stylesheet" href="css/framework7.material.colors.min">
		<link rel="stylesheet" href="css/my-app.css">	
		
    </head>
    <body>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
													<div class="page "  <?php echo"style='background-color:$backgroundc;'"; ?>>
					   

 <div class="navbar" style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
	} 
 
 ?>">
    <div class="navbar-inner">
      <div class="left"><a href="
	  <?php				  		
					$from_url = $_SERVER['HTTP_REFERER'];

					if($from_url){		
		echo"$from_url";
								}else{
					echo"home.php";
								 }
								
								?>	
	  
	  " class="back link icon-only"><i class="icon icon-back"></i></a></div>
      <div class="center">Notifications</div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  
  		<?php include"side.php"; ?>				
		
	

						<div class="page-content">

		
       		   
   <!---- <div class='list-block'>
      <ul>
        <li><a href='#' class='item-link item-content'>
            <div class='item-media'><img height=32 width=3  SRC=' $imageR '/><i class='icon icon-f7'></i></div>
            <div class='item-inner'> 
              <div class='item-title'>Two icons here</div>
            </div></a></li>
        <li>
          <div class='item-content'>
            <div class='item-inner'> 
              <div class='item-title'>No icons here</div>
            </div>
          </div>
          </li>
		  </ul>
    </div> --->
 
   	  <?php 

			function getTim($timed){
		$pt = time() - $timed;
		if ($pt>=86400)
			$p = date("F j",$timed);
		elseif ($pt>=3600)
			$p = (floor($pt/3600))."h";
		elseif ($pt>=60)
			$p = (floor($pt/60))."m";
		else 
			$p = $pt."s";
		return $p;
	}

	if($user_id){
		include "connect.php";
		
		if($next) {
		$e = "SELECT id,post_id,user_id,user2,timestamp,viewed,type,content,content_id
                              FROM notifications WHERE user2='$user_id' AND viewed < 1
                         ORDER BY timestamp DESC LIMIT 99
						 

                             ";
							 $pinfo=mysqli_query($conn, $e);
 }else{
							 $e = "SELECT id,post_id,user_id,user2,timestamp,viewed,type,content,content_id
                              FROM notifications WHERE user2='$user_id' 
                         ORDER BY timestamp DESC LIMIT 20
						 

                             ";	
			 $pinfo=mysqli_query($conn, $e);
				
		 }
		mysqli_close($conn);
		
		
	while ($stuff = mysqli_fetch_array($pinfo)) {
	
		$comment_id = $stuff['id'];
		$comment = $stuff['post_id'];
		$cont = $stuff['content_id'];
		$content = $stuff['content'];
		$receipt = $stuff['user2'];
		$timed = $stuff['timestamp'];
		$comment_user = $stuff['user_id'];
		$status = $stuff['viewed'];
		$type = $stuff['type'];
		$role = $stuff['role'];
		//Calls the time function
		  $when=  getTim($timed);
		  
			 
			 //Get The Info Of The PERSON WHO COMMENTED ON THE POST
			 			include "connect.php";
		  $og = "SELECT avatar,id,username,name FROM users WHERE id='$comment_user' 
				"; 
				 $col=mysqli_query($conn, $og);
				 
				while ($wowW = mysqli_fetch_array($col)) {
				$imageR = $wowW['avatar'];
				$nameR = $wowW['name'];
				$usernameR = $wowW['username'];
				$identt = $wowW['id'];
										 	$ieea="UPDATE notifications
						 SET viewed = viewed + 1
						 WHERE id='$comment_id'
						";
				 mysqli_query($conn, $ieea);
					mysqli_close($conn);
}	

	  
   
 echo " 
 <div class='column_middle'>
 <div id=' class='column_middle_grid1'>
 <span>
			<a href='userprofile.php?username=$usernameR'  style='text-transform: capitalize;'>
			<img height=48 width=48  SRC=' $imageR '/>
				 
				 
				 
				 
				 
				 <p>$nameR</p>
				<h6 style='color:teal'>@$usernameR</h6></a></span>
";

if($status==0)
{



  echo " <div class='profile_picture'><div  align='center'  class='reply'>";
   if($type=="follow"){ 
  
   echo "<a HREF='userprofile.php?username=$usernameR'><p style='color:teal;'>$content</p></a>"; 
   }elseif($type=="reply"){
    echo " <img  src='images/comments.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:teal;'>$content</p></a>"; 
   
   }elseif($type=="upvote"){
   echo " <img  src='images/uploaded.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:teal;'>$content</p></a>"; 
   
   }elseif($type=="like"){
       echo " <img  width=25 height=25  src='images/likes-after.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:teal;'>$content</p></a>"; 
   
   }elseif($type=="comment"){
     echo " <img src='images/comments.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:teal;'>$content</p></a>"; 
   
   }elseif($type=="user"){
   echo " <img  src='images/invites.png' />";
     echo "<a HREF='profile.php' ><p style='color:teal;'>$content</p></a>"; 
   
   }elseif($type=="tribe"){
   echo " <img  src='images/invites.png' />";
     echo "<a HREF='tribe.php?tribe=$cont' ><p style='color:teal;'>$content</p></a>"; 
   
   }elseif($type=="repost"){
       echo " <img  width=25 height=25  src='images/repa.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:teal;'>$content</p></a>"; 
   
   }elseif($type=="list"){
       echo " <img  width=25 height=25  src='images/audio.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:teal;'>$content</p></a>"; 
   
   }elseif($type=="mention"){
     echo " <img  width=25 height=25  src='images/handle.png' />";
     echo "<a HREF='userprofile.php?username=$usernameR' ><p style='color:teal;'>$content</p></a>"; 
   
   }

   
  
 
 echo "<div  align='center' class='profile_picture_name'>
</div>

</div>";


 }else{
 
  echo " <div class='profile_picture' style='color:gold;'><div  align='center'  class='reply'>
  
  ";
  
   if($type=="follow"){ 
  
   echo "<a HREF='userprofile.php?username=$usernameR'><p style='color:grey;'>$content</p></a>"; 
   }elseif($type=="reply"){
   echo " <img  src='images/comments.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:grey;'>$content</p></a>"; 
   
   }elseif($type=="upvote"){
   echo " <img  src='images/uploaded.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:grey;'>$content</p></a>"; 
   
   }elseif($type=="like"){
     echo " <img  width=25 height=25  src='images/likes-after.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:grey;'>$content</p></a>"; 
   
   }elseif($type=="comment"){
   echo " <img  src='images/comments.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:grey;'>$content</p></a>"; 
   
   }elseif($type=="user"){
   echo " <img  src='images/invites.png' />";
     echo "<a HREF='profile.php' ><p style='color:grey;'>$content</p></a>"; 
   
   }elseif($type=="tribe"){
   echo " <img  src='images/invites.png' />";
     echo "<a HREF='tribe.php?tribe=$cont' ><p style='color:grey;'>$content</p></a>"; 
   
   }elseif($type=="repost"){
     echo " <img  width=25 height=25  src='images/repa.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:grey;'>$content</p></a>"; 
   
   }elseif($type=="list"){
     echo " <img  width=25 height=25  src='images/audio.png' />";
     echo "<a HREF='post.php?pid=$comment' ><p style='color:grey;'>$content</p></a>"; 
   
   }elseif($type=="mention"){
     echo " <img  width=25 height=25  src='images/handle.png' />";
     echo "<a HREF='userprofile.php?username=$usernameR' ><p style='color:grey;'>$content</p></a>"; 
   
   }


echo "<div  align='center' class='profile_picture_name'>
</div>

</div>";

}

 echo"
<p style='color:gold;'>$when</p>
</div>
		

					  

	
	
		    
					  		
						
						
			
						
						 
	
</div>

";
           }



		   } 
	   ?>  
	  
				   
			
	  
	  
      </div>
    </div>	

       	<?php

	if(!$next){
		echo"
     <p class='buttons-row'><i class='icon f7-icons'>bell</i><a href='notifications.php?all=more' class='button button-fill button-raised' style='background-color:teal' >More notifications</a></p>
  ";	
				}
  
  
			?>
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>


</body>
</html>
