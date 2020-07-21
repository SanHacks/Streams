<?php ob_start(); ?>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>
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
 $lookwf =$_GET[id];
 	if($user_id){
		include "connect.php";
		$queryh = "SELECT id,username,avatar,background,name,aboutme,hometown,followers,following,auth,facebook,pbackcolor,backcolor,stats,bback,posts,likes
                              FROM users 
                              WHERE id='$lookwf'
                             ";
						 $query=mysqli_query($conn, $queryh);		 
							 

		$row = mysqli_fetch_assoc($query);
		//This one describes itself
		$username = $row['username'];
		$uid = $row['id'];
		$image = $row['avatar'];
		$back = $row['background'];
		$name = $row['name'];
		$about = $row['aboutme'];
		$followers = $row['followers'];
		$following = $row['following'];
        $hometown = $row['hometown'];
        $facebook = $row['facebook'];
        $likes = $row['likes'];
        $auth = $row['auth'];
		$postcolor=$row['pbackcolor'];
		$backgroundc=$row['backcolor'];
		$stats=$row['stats'];
		$bback=$row['bback'];
		$jpg="jpg";
		$video="mp4";
		//$list="list";
		$list="mp3";
		$gif="gif";
		
		$posts=$row['posts'];
		
		$queryrh = "SELECT id,user_id,post,type,role
                              FROM posts 
                              WHERE user_id='$lookwf' AND  type='$jpg' OR type='$gif' 
                             ";
						 $queryv=mysqli_query($conn, $queryrh);	




						 $queryrhe = "SELECT id,user_id,post,type,role
                              FROM posts 
                              WHERE user_id='$lookwf' AND type='$video'
                             ";
						 $queryve=mysqli_query($conn, $queryrhe);		


						 $queryrhet = "SELECT id,user_id,post,type,role
                              FROM posts 
                              WHERE user_id='$lookwf' AND type='$list'
                             ";
						 $queryvem=mysqli_query($conn, $queryrhet);		
						 
						 
					//	  $queryrhetx = "SELECT id,user_id,post,type,role,roles
                       //       FROM posts 
                      //        WHERE user_id='$lookwf' AND roles='$list'
                       //      ";
					//	 $queryvemx=mysqli_query($conn, $queryrhetx);		
						 
							 
		mysqli_close($conn);
		$photos= mysqli_num_rows($queryv);
		$videos= mysqli_num_rows($queryve);
		$lists= mysqli_num_rows($queryvem);
		
		}
?>
   <?php include"sessions.php";
	$page="allowed";
	?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>Vault</title>
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
      <div class="center">Cloud9</div>

    </div>
  </div>
  
	
		
	

						<div class="page-content">

						
						
       		<div class="card">
      <div class="card-content"> 
        <div class="list-block">
          <ul>
		  <?php
		  	if($likes){
			echo"		


			  <li><a href='highlights.php?id=$lookwf' class='item-link item-content'>
                <div class='item-media'><i class='icon f7-icons'>layers_fill</i></div>
                <div class='item-inner'>
                  <div class='item-title'>Highlights</div>
				  <div class='item-after'> <span class='badge'>$posts</span></div>
                </div></a></li>


	 	
					 
					 
					 ";
					 }
					 if($likess){
			echo"		


			  <li><a href='likes.php?id=$lookwf' class='item-link item-content'>
                <div class='item-media'><i class='icon f7-icons'>layers_fill</i></div>
                <div class='item-inner'>
                  <div class='item-title'>Likes</div>
				  <div class='item-after'> <span class='badge'>$likess</span></div>
                </div></a></li>


	 	
					 
					 
					 ";
					 }
     
					  		 if($photos){
			echo"		


			  <li><a href='photos.php?id=$lookwf' class='item-link item-content'>
                <div class='item-media'><i class='icon f7-icons'>camera_fill</i></div>
                <div class='item-inner'>
                  <div class='item-title'>Photos</div>
				  <div class='item-after'> <span class='badge'>$photos</span></div>
                </div></a></li>


	 	
					 
					 
					 ";
					 }
					 					  		 if($videos){
			echo"		


			  <li><a href='videos.php?id=$lookwf' class='item-link item-content'>
                <div class='item-media'><i class='icon f7-icons'>videocam_round_fill</i></div>
                <div class='item-inner'>
                  <div class='item-title'>Videos</div>
				  <div class='item-after'> <span class='badge'>$videos</span></div>
                </div></a></li>


	 	
					 
					 
					 ";
					 }
					 					  		 if($lists){
			echo"		


			  <li><a href='audios.php?id=$lookwf' class='item-link item-content'>
                <div class='item-media'><i class='icon f7-icons'>tune_fill</i></div>
                <div class='item-inner'>
                  <div class='item-title'>Audios</div>
				  <div class='item-after'> <span class='badge'>$lists</span></div>
                </div></a></li>


	 	
					 
					 
					 ";
					 }
          ?>
          </ul>
        </div>
      </div>
    </div>

   					
	  
       		
 
   
	  
	  
      </div>
    </div>	

       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		

</body>
</html>
