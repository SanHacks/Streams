<?php ob_start(); ?>
<?php include"sessions.php";
	$page="allowed";
	?>
   <?php
 if(!$user_id){
   header("location: index.php");
  exit;
 }
?>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>
<?php

 
	$user_ids= $_GET[id];
		include "connect.php";
		$queryh = "SELECT id,username,avatar,background,name,aboutme,hometown,followers,following,auth,facebook,pbackcolor,backcolor,stats,bback,posts
                              FROM users 
                              WHERE id='$user_ids'
                             ";
						 $query=mysqli_query($conn, $queryh);		 
							 
		mysqli_close($conn);
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
        $auth = $row['auth'];
		$postcolor=$row['pbackcolor'];
		$backgroundc=$row['backcolor'];
		$stats=$row['stats'];
		$bback=$row['bback'];
		$posts=$row['posts'];
		$jpg="jpg";
		$video="mp4";
		$list="list";
		$gif="gif";
		$webm="webm";
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
      <div class="center"><?php if($name){
		  
		echo"$name's";  
	  }
	  
	  ?> photos</div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  
  		<?php include"side.php"; ?>				
		
	

						<div class="page-content">

     <div data-effect="cube" class="swiper-container swiper-init ks-demo-slider ks-cube-slider">
      <div class="swiper-pagination"></div>
     
      <div class="swiper-wrapper">
			 	        <?php
				
				$next= $_GET[more];
				$nxt= $_GET[nxt];
				
			//	echo"<p>$look</p>";
		
				?>

          		  <?php 

				function getTime($t_time){
		$pt = time() - $t_time;
		if ($pt>=86400)
			$p = date("F j",$t_time);
		elseif ($pt>=3600)
			$p = (floor($pt/3600))."h";
		elseif ($pt>=60)
			$p = (floor($pt/60))."m";
		else 
			$p = $pt."s";
		return $p;
	}


	if($user_ids){
		include "connect.php";
		
			if($next) {
		
				$queryhq ="SELECT id,post,user_id,timestamp,likes,comments,views,image,imageo,type,user2_id,tribe_id,role,op,repuser,roles,value1,value2,value1a,value2a,post_id
                              FROM posts
                           WHERE user_id= $user_ids AND type='$video' 
						 ORDER BY views DESC  LIMIT  31,45
                             ";
			 $query=mysqli_query($conn, $queryhq);	
		
		 }		elseif($nxt) {
		
				$queryhq = "SELECT id,post,user_id,timestamp,likes,comments,views,image,imageo,type,user2_id,tribe_id,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,post_id
                              FROM posts
                           WHERE user_id= $user_ids AND type='$video' 
						 ORDER BY views DESC  LIMIT  16,30
                             ";
		
			 $query=mysqli_query($conn, $queryhq);
		 }elseif($_GET['facebook'])
		 { 
		
				$queryhq = "SELECT id,post,user_id,timestamp,likes,comments,views,image,imageo,type,user2_id,tribe_id,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,post_id
                              FROM posts
                           WHERE user_id= $user_ids AND type='$video' 
						  ORDER BY views DESC  LIMIT  7,15
                             ";
			 $query=mysqli_query($conn, $queryhq);
		
		 }
		 
		 
		 else{
		$queryhq = "SELECT id,post,user_id,timestamp,likes,comments,views,image,imageo,type,user2_id,tribe_id,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,post_id
                              FROM posts
                           WHERE user_id= $user_ids AND type='$video'  ORDER BY views DESC  LIMIT  7
                             ";
	 $query=mysqli_query($conn, $queryhq);

							 }
		mysqli_close($conn);
		while ($row = mysqli_fetch_array($query)) {
	
		$content = $row['post'];
		//$postsss = $row['posts'];
		$imagess = $row['image'];
		$imagesso = $row['imageo'];
		$type = $row['type'];
		$id = $row['id'];
		$t_time = $row['timestamp'];
		$views = $row['views'];
			$likes = $row['likes'];
		$comments = $row['comments'];
		$userwhoid = $row['user2_id'];
		$userwhoidd= $row['user_id'];
		$tribed = $row['tribe_id'];
				$role= $row['role'];
		$realp= $row['op'];
		$repo= $row['repuser'];
		$value1= $row['value1'];
		$value2= $row['value2'];
		$value1a= $row['value1a'];
		
		$value2a= $row['value2a'];
		$value1link= $row['value1link'];
		$value2link= $row['value2link'];
		$roles= $row['roles'];
		$post_id = $row['post_id'];
      $ago=  getTime($t_time);   
	  					include "connect.php";
		  $queryhqa = "SELECT avatar,id,username,name,hometown,pbackcolor,stats FROM users WHERE id='$userwhoidd' 
				"; 
					 $cool=mysqli_query($conn, $queryhqa);
					 
				while ($wow = mysqli_fetch_assoc($cool)) {
				$image = $wow['avatar'];
				$name = $wow['name'];
				$username = $wow['username'];
				$userd = $wow['id'];
					$ident= $wow['id'];
				$hmt = $wow['hometown'];
				$postcolor=$wow['pbackcolor'];
				$stats=$wow['stats'];
				
}		

		mysqli_close($conn);	
		
					//Get User Info Of The Recepient
if($userwhoid)
{				include "connect.php";
		  $coolser ="SELECT avatar,id,username,name FROM users WHERE id='$userwhoid' 
				"; 
					 $cools=mysqli_query($conn, $coolser);
				while ($wow = mysqli_fetch_assoc($cools)) {
				$imagex = $wow['avatar'];
				$namex = $wow['name'];
				$usernamex = $wow['username'];
					$userdx = $wow['id'];
				
}		

				mysqli_close($conn);	
				}
				if($tribed)
{				include "connect.php";
		  $coolst = "SELECT avatar,id,name FROM tribes WHERE id='$tribed' 
				";

	 $cools=mysqli_query($conn, $coolst);				
				while ($wow = mysqli_fetch_assoc($cools)) {
				$imagex = $wow['avatar'];
				$namexs = $wow['name'];
					$tribex = $wow['id'];
				
}		

				mysqli_close($conn);	
				
				}
				
								if($repo)
{				include "connect.php";
		
							 $coolsah	= "SELECT avatar,id,username,name,auth FROM users WHERE id='$repo' 
				";
				$coolst=mysqli_query($conn, $coolsah);  
				
				while ($wow = mysqli_fetch_assoc($coolst)) {
				$imagexrep = $wow['avatar'];
				$repname = $wow['username'];
				
					$userdxrep = $wow['id'];
				
}		

				mysqli_close($conn);	
				}
	          	   //This converts everything with @ and # to a clickable link 
	   			   	$content = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$content);
			
			 $content = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$content);
				 //Replace www. with a link https:
			 
		 $content = preg_replace ("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $content);	 
 	 
 
echo" 
	 ";
	  
	  
	 
	   
	   
	   echo"

	  ";
 
   //Checks if post consist of an image

				//Assumes the file is an image (jpg,png)
				if($userd!=$user_ids){
              
				}else{
   
										echo "
										";
										
									
												if($type==mp4){
  
						
						echo"<div class='swiper-slide'>
					<a HREF='post.php?pid=$id' ><video controls loop preload=metadata width=100%  poster='$imagesso'> <source src='$imagess' type='video/$type '> </video>	</a></div>	
			";
		
			}
								
									
										
										
										
									
										
										
										
										echo"
										
	  
										";	
						
				}
						
						
					
				
        echo"

        
     
     ";
	
   
   
   
   
   
		}



		   } 
	   ?>  	
						
  

   					
	  
       		
 
    
	  
         </div>
		 

	  
		 
    
    </div>	

       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		
		
\
    </body>
</html>
