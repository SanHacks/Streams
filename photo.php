<?php ob_start(); ?>
<?php include"sessions.php"; 
$path =$_COOKIE['path'];
?>
<!DOCTYPE html>
<html>
    <head>
	 <?php
 
 
 if($_GET['pid']!=""){

	$look= $_GET[pid];

		
				include"connect.php";
$sqlCommandd="SELECT id,user_id,post,views,comments,likes,timestamp,image,type,user2_id,tribe_id,location,reposts,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,post_id
                              FROM posts
                          WHERE id = $look";
$query=mysqli_query($conn, $sqlCommandd);   
	
							 $que	= "UPDATE posts
					 SET views = views + 1
					 WHERE id= $look  LIMIT 5
					";
					$queryx=mysqli_query($conn, $que);  
		//mysqli_close($conn);
			while ($row = mysqli_fetch_array($query)) {
		$content = $row['post'];
		$contento = $row['post'];
		$id = $row['id'];
		$post_id = $row['post_id'];
		$uid = $row['user_id'];
		$views = $row['views'];
		$images = $row['image'];
		$location = $row['location'];
		
				$userwhoid = $row['user2_id'];
				$tribed = $row['tribe_id'];
		$comments = $row['comments'];
		$likes = $row['likes'];
		$t_time = $row['timestamp'];
		$look= $_GET['pid'];
		$reposts= $row['reposts'];
		$role= $row['role'];
		$realp= $row['op'];
		$repo= $row['repuser'];
			$value1= $row['value1'];
		$value2= $row['value2'];
		$value1a= $row['value1a'];
		$value2a= $row['value2a'];
		$roles= $row['roles'];
		$type = $row['type'];
		$value1link= $row['value1link'];
		$value2link= $row['value2link'];
	
		     $url = 'http://www.intellifeed.co.za/post.php?pid=' ;
  $via = 'intellifeed_';
 //   $vias = 'www.appdate.co.za';
 
 $algo=time();
	if($t_time < $algo-31536000){
			function getTime($t_time){
		$pt = time() - $t_time;
		if ($pt>=1)
			$p = date("g:i a - F j Y  ",$t_time);
		elseif ($pt>=3600)
			$p = (floor($pt/3600))."h";
		elseif ($pt>=60)
			$p = (floor($pt/60))."m";
		else 
			$p = $pt."s";
		return $p;
	}
	
	}else{
		
				function getTime($t_time){
		$pt = time() - $t_time;
		if ($pt>=1)
			$p = date("g:i a - F j  ",$t_time);
		elseif ($pt>=3600)
			$p = (floor($pt/3600))."h";
		elseif ($pt>=60)
			$p = (floor($pt/60))."m";
		else 
			$p = $pt."s";
		return $p;
	}
	
	}
	





			 
			 //Replace youtube url  with video


       $ago=  getTime($t_time);
	   
			include "connect.php";
		 
						 $queee	= "SELECT avatar,id,username,name,auth,loc,pbackcolor,stats FROM users WHERE id='$uid' 
				";
					$cool=mysqli_query($conn, $queee);  
				
				while ($wow = mysqli_fetch_assoc($cool)) {
				$image = $wow['avatar'];
				$name = $wow['name'];
				$username = $wow['username'];
				$ident = $wow['id'];
				$auth = $wow['auth'];
				$loc = $wow['loc'];
				$postcolor = $wow['pbackcolor'];
				$backgroundc = $wow['backcolor'];
				$stats = $wow['stats'];
				
}		
		mysqli_close($conn);	
if($userwhoid)
{				include "connect.php";
		
							 $coolsa	= "SELECT avatar,id,username,name,auth FROM users WHERE id='$userwhoid' 
				";
				$cools=mysqli_query($conn, $coolsa);  
				
				while ($wow = mysqli_fetch_assoc($cools)) {
				$imagex = $wow['avatar'];
				$namex = $wow['name'];
				$usernamex = $wow['username'];
					$userdx = $wow['id'];
				
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
				//Get Tribe Info 
				if($tribed)
{				include "connect.php";
		  $coolz = "SELECT avatar,id,name FROM tribes WHERE id='$tribed' 
				"; 
				
				$cools=mysqli_query($conn, $coolz);  
				
				
				while ($wow = mysqli_fetch_assoc($cools)) {
				$imagex = $wow['avatar'];
				$namexs = $wow['name'];
					$tribex = $wow['id'];
				
}		

				mysqli_close($conn);	
				}
				}
				}
 
 ?>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>IntelliFeed</title>
		 <!-- Path to Framework7 Library CSS-->
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/framework7.material.min.css">
		
		<!-- Path to your custom app styles-->
		<link rel="stylesheet" href="css/my-app.css">	
		
    </head>
    <body  style='background:<?php echo"$postcolor"; ?>';>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index" <?php echo"style='background-color:$postcolor;'"; ?>>
 <div class="navbar " style="background-color:<?php 
     	if($stats){
		echo"$stats";
	}else{
		echo"#0c56ac";
	} 
 
 
 ?>" >
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
     <a href="home.php" style="color:#FFF"> <div class="center">IntelliFeed</div></a>

    </div>
  </div>

		

			<?php include"comment-box.php"; ?>  
						<div class="page-content">
						
		
		<div data-pagination=".swiper-pagination" data-zoom="true" data-next-button=".swiper-button-next" data-prev-button=".swiper-button-prev" class="swiper-container swiper-init ks-demo-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
		
          <div class="swiper-zoom-container">
		  <?php
		  
		  if($type==mp4){
  
						
						echo"
				<a href='photo.php?pid=$id' data-popup='.demo-popup'>	<video controls  preload=metadata width=100%  poster='$imagesso'> <source src='$images' type='video/$type '> </video>	</a>	
			";
		
			}elseif($type==webm){
  
						
						echo"
					<video controls  preload=metadata width=100%   poster='$imagesso'> <source src='$images' type='video/$type '> </video>		
				";
		
								}else{
									
		 echo"
		  <img src='$images'/>";
		  
								}
								
								?>
		  
		
		  
		  
		  </div>
		 
		
				  <?php
		  
		  
		  
		  
		  		
	echo"  <div class='list-block accordion-list'>
      <ul>
       
            <div class='content-block'>
			   <div class='ks-grid'>
      <div class='content-block'>
        <div class='row'>
          <a class='link external' href='http://www.facebook.com/sharer.php?u=$url$look&t=$socialtext ' ><div class='col-25'> <i class='icon f7-icons'>social_facebook_fill</i> </div></a>
         <a class='link external' href='http://twitter.com/intent/tweet?url=$url$look&via=$via&text=$socialtext&related=hybrd'   >   <div class='col-25'><i class='icon f7-icons'>social_twitter_fill</i></div></a>
          <a  class='link external' href='https://plus.google.com/share?url=$url$look'  > <div class='col-25'><i class='icon f7-icons'>social_googleplus</i></div></a>
          <a class='link external' href='whatsapp://send?text=$what$url$look'> <div class='col-25'><i class='icon f7-icons'>phone_round_fill</i></div></a>
        </div></div></div>

		  </div>
		  </div>
        </li>
  
      </ul>
    </div>";
	?>	  

					  <?php
  include"promotion.php";
  ?>
     					
		  
   </div
   
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
		</div>
		
				 <!-- Path to Framework7 Library JS-->
		<script type="text/javascript" src="js/framework7.min.js"></script>
		<!-- Path to your app js-->
		<script type="text/javascript" src="js/my-app.js"></script>		
        <script type="text/javascript" src="cordova.js"></script>

</body>
</html>