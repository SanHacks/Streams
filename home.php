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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>IntelliFeed</title>
		 <!-- Path to Framework7 Library CSS-->
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link rel="stylesheet" href="css/framework7.material.min.css">
		<!-- Path to your custom app styles-->
		 <link rel="stylesheet" href="css/framework7.material.colors.min">
		<link rel="stylesheet" href="css/my-app.css">	
		<link rel="stylesheet" href="css/my-app.css">
  <link rel="apple-touch-icon" href="img/f7-icon-square.png">
  <link rel="icon" href="img/f7-icon.png">
    </head>
    <body data-page="pull-to-refresh">
		
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
  
    
      <div class="left"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
							  <form action='search.php' method='GET'
							  data-search-in="search.php" class="searchbar "  style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
	} 
 
 ?>" >
    <div class="searchbar-input">
      <input type="search" placeholder="Search"  name='search'/><a href="#" class="searchbar-clear"></a>
    </div>
  </form>	
    </div>

  </div>
  

  		<?php include"side.php"; ?>				
 
    <div class="toolbar tabbar" style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
	} 
 
 ?>">
    <div class="toolbar-inner">
      <a href="#tab-1" class="tab-link tab-link-active">Home</a>
      <a href="#tab-2" class="tab-link"><i class="icon f7-icons">social_twitter_fill</i></a>
      <a href="#tab-3" class="tab-link"><i class="icon f7-icons">social_facebook_fill</i></a>
    </div>
  </div>
  <div class="tabs-swipeable-wrap">
    <div class="tabs">
      <div id="tab-1" class="page-content tab tab-active">
        	<?php
				
				$next= $_GET[more];
				$sc= $_GET[success];
				$duplicate= $_GET[duplicate];
				
				
				 if($duplicate){
       
   	echo "
		<div class='list-block media-list'>
							  <ul>
					
							
													<li>
										   <div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>paper</i><a href='#' class='button button-fill button-raised' style='background-color:teal' >You have already published that!</a></p>
    </div>
								</li>		
							  </ul>
							</div>	
	
	";	} 	
		
    if($sc){
       
   	echo "
	<div class='list-block media-list'>
							  <ul>
					
							
													<li>
										   <div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>paper_fill</i><a href='#' class='button button-fill button-raised' style='background-color:teal' >Successfully Published!</a></p>
    </div>
								</li>		
							  </ul>
							</div>	



			
	
	
	";	} ?>	
		<!---
			        <div class='content-block'>
                 <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>
         <div class='col-20'><img height=35 width=35  SRC=' reactions/smile.png '  alt='peace' /></div>
         <a href='#'>  <div class='col-20'>
		 <img height=35 width=35  SRC=' reactions/like.png '  alt='like'  /></div></a>
        <a href='#'>  <div class='col-20'>
		<img height=35 width=35  SRC=' reactions/star.png '  alt='star'  /></div></a>
       <a href='#'>   <div class='col-20'>
	   <img height=35 width=35  SRC=' reactions/eyes.png '  alt='eyes'  /></div></a>
       <a href='#'>   <div class='col-20'>
	   <img height=35 width=35  SRC=' reactions/finger.png '  alt='finger'  /></div></a>
        </div>
	</div>
	</div>
         </div> --->
	<?php

		include "connect.php";
		
		
		$er = "SELECT aboutme,avatar,hometown,facebook,twitter
                              FROM users WHERE id='$user_id' 
                 
						 

                             ";	
			$pinfooo=mysqli_query($conn, $er);	
				
		
		mysqli_close($conn);
		
		
	while ($stufff = mysqli_fetch_array($pinfooo)) {
	
		$about = $stufff['aboutme'];
		$avatar = $stufff['avatar'];
		$hometown = $stufff['hometown'];
		$user_twitter = $stufff['twitter'];
		$user_facebook = $stufff['facebook'];
		
							}
		
		$avatars ='userfiles\avatars\default.jpg';
		if($avatar==$avatars){ 
		echo"<div class='menu_box'>
 <a href='settings.php' ><h3>Please add a profile picture ,For better IntelliFeed experience</h3></a>
  <div class='menu_box_list'>
  </div>
  </div>"; 					}
  
  		if($about==Null){ 
		
		echo"<div class='social_networks'><div>
		<ul><li><a href='about-settings.php' class='googleplus'><i></i><span></span>Please Add Some Info To You Your Bio (So People Know Who They're Following)<div class='clear'></div></a></li></ul>
			</div>	"; 
						}
	

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

				$viewt= $_GET['tweets'];
			
		include "connect.php";
		
		
		
		$gotoas = "SELECT id,user1_id,user2_id
                              FROM following WHERE user1_id='$user_id' 
                         ORDER BY RAND()  DESC 
                             ";	
		 	 $pinfo=mysqli_query($conn, $gotoas);
		mysqli_close($conn);
		
		
	while ($stuff = mysqli_fetch_array($pinfo)) {
	
		$comment_id = $stuff['id'];
		$receipt = $stuff['user1_id'];
		$comment_user = $stuff['user2_id'];

			 //Get The Info Of The PERSON WHO COMMENTED ON THE POST
			 			include "connect.php";
		  $col3 ="SELECT avatar,id,username,name,hometown FROM users WHERE id='$comment_user' 
				"; 
				 $col=mysqli_query($conn, $col3);
				while ($wowW = mysqli_fetch_assoc($col)) {
				$imageR = $wowW['avatar'];
				$nameR = $wowW['name'];
				$usernameR = $wowW['username'];
				$identt = $wowW['id'];
				$hometa = $wowW['hometown'];
				
														}	
	 if($user_id){
	
	
			
		include "connect.php";
		
		$sear = $_GET['search'];
		$queryy1 ="SELECT username,avatar,name,aboutme,hometown,id,posts,auth,twitter,facebook
                              FROM users Where Auth=1
							
		ORDER BY  RAND()
		LIMIT  1
                             ";
							 
					 $queryy=mysqli_query($conn, $queryy1);		 
							 
		mysqli_close($conn);
		while ($rows = mysqli_fetch_assoc($queryy)) {
		$usernames = $rows['username'];
		$images = $rows['avatar'];
		$names = $rows['name'];
		$aboutt = $rows['aboutme'];
		$hometown = $rows['hometown'];
		$idd = $rows['id'];
		$auth = $rows['auth'];
		$tweet = $rows['twitter'];
		$book = $rows['facebook'];
		
              
	 	include 'connect.php';
					$query2x = "SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$idd'
										  ";
									$query2=mysqli_query($conn, $query2x);
					mysqli_close($conn);
					
	 if($user_id !=$idd){
	
	if(mysqli_num_rows($query2)>=1){
						
					}else{
	 if($rows) {
	 echo"	
		";
}	
			   
			   
			   
			echo"    <div data-pagination='.swiper-pagination' data-effect='coverflow' data-slidesPerView='auto' data-centeredSlides='true' class='swiper-container swiper-init ks-demo-slider ks-coverflow-slider'>
      <div class='swiper-pagination'></div>
   ";
			   
	if(!$viewt){
 echo"  
      <div class='swiper-wrapper'>
        <div class='swiper-slide'>
 <div class='list-block media-list'>
      <ul>
        <li><a href='userprofile.php?username=$usernames'  class='item-link item-content'>
            <div class='item-media'><img src='$images' width='65'/>";
			include 'iffollow.php';
		if($user_id){
				if($user_id!=$idd){
					include 'connect.php';
					$dds ="SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$idd'
										  ";
										     $query2=mysqli_query($conn, $dds); 
					mysqli_close($conn);
			if(mysqli_num_rows($query3)>=1){
				echo "  <p style='color:gold'>• Subscribed to You •</p>";
				}
				}
			}
			
					if($user_id){                                                                                                                                                                                                                                           
				if($user_id!=$idd){
					include 'connect.php';
					$dds = "SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$idd'
										  ";
										   $query2=mysqli_query($conn, $dds); 
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
						echo "<span><a href='unfollow.php?userid=$idd&username=$usernames&ref=2' class='button button-fill button-raised' style='background-color:teal'>Subscribed</a></br></span>";
					}
					else{
						echo "<span><a href='follow.php?userid=$idd&username=$usernames' class='button button-fill button-raised' style='background-color:teal'>Subscribe</a></br></span>";
					}
				}
			}	
			
			
			echo"</div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>$names";
					if($auth==1){
						
						echo "<i class='icon material-icons'>verified_user</i>";
						
					}
					else{
						
						echo "  ";
					}
				
				echo"</div>
                <div class='item-after'>	
				
				


";
	     

			echo"</div>
            </div></a></li></ul>
			</div>
			</div>

      </div>
    </div>
			";



			} 
			
			
			
			
			}	


				} 


			}
		}
		
	echo"";   
		//Suggestions Based On Location an
			
	 if($next){
	 if($user_id){
	
	
			
		include "connect.php";
		
		$sear = $_GET['search'];
		$queryyxx = "SELECT username,avatar,name,aboutme,hometown,id,posts,auth
                              FROM users
							WHERE hometown   LIKE '%$hometa%' AND posts >= 5
		ORDER BY  RAND()
		LIMIT  1
                             ";
							 $queryy=mysqli_query($conn, $queryyxx);
		mysqli_close($conn);
		while ($rows = mysqli_fetch_assoc($queryy)) {
		$usernames = $rows['username'];
		$images = $rows['avatar'];
		$names = $rows['name'];
		$aboutt = $rows['aboutme'];
		$hometown = $rows['hometown'];
		$idd = $rows['id'];
		$auth = $rows['auth'];
              
	 	include 'connect.php';
					$query2xx = "SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$idd'
										  ";
										  $query2=mysqli_query($conn, $query2xx);
					mysqli_close($conn);
	 if($user_id !=$idd){
	
	if(mysqli_num_rows($query2)>=1){
						
					}else{
	 if($rows) {
	 echo"	<div class='social_network_likes'>
		 	<ul><li><a class='googleplus' href='#'><p style='color:white' >Suggested </p></a></li><span></span>
			
			
			
			
			
			
		</div>	<div class='clear'></div>
		";
}	

	
echo " <div class='column_left'>
<div class='column_middle'> 
<div class='column_middle_grid1' style='background:$postcolor;'>
 <div class='profile_picture'>";

 
 	if($user_id ==$idd){	
	
echo"<a href='profile.php'><img  height=40 width=40  SRC='$images'  /></a>
<p style='color:white'><a href='profile.php' ></a></p>



 <div class='profile_picture_name'>";
 					if($auth==1){
						
						echo "<a href='#'><img src='images/au.png' /></a>";
						
					}
					else{
						
						echo "  ";
					}
				
 
   echo "<a href='profile.php?username=$usernames' > <h4>$names
	  </h4></a>
	  <p style='color:white'><a href='profile.php' >@$usernames</a></p>";
	  
	  }else{
	  echo"<a href='userprofile.php?username=$usernames'><img  height=40 width=40  SRC='$images'  /></a>
<p style='color:white'><a href='userprofile.php?username=$usernames' ></a></p>";

	

 echo "<div class='profile_picture_name'>";
 				if($auth==1){
						
						echo "<a href='#'><img src='images/au.png' /></a>";
						
					}
					else{
						
						echo "  ";
					}
				
 
 
   echo "<a href='userprofile.php?username=$usernames' > <h4 style='color:white'>$names
	  </h4></a>
	  <p style='color:OCEAN'><a href='userprofile.php?username=$usernames' >@$usernames</a></p>";
	  
	  }
	  
echo "<p>$aboutt</p>";
include 'iffollow.php';
		if($user_id){
				if($user_id!=$idd){
				 //IF USER FOLLOW THE SUGGESTED ACCOUNT
					if(mysqli_num_rows($query2)>=1){
						echo "<span><a href='unfollow.php?userid=$idd&username=$usernames&ref=1' class='attach'>Subscribed</a></br></span>";
					}
					else{
						echo "<span><a href='follow.php?userid=$idd&username=$usernames&ref=1' class='btn'>Subscribe</a></br></span>";
					}
				}
			}	
			
echo"
</div>
</div>
</div>
</div>
";  } } }
		}
		}
	 	include 'connect.php';
		

		
		

 
							 
							 
							 
							 
		mysqli_close($conn);
		
			include "connect.php";
		
		
		
		$query28xx = "SELECT *
                              FROM tribemems WHERE user_id='$user_id' 
                      ORDER BY  RAND() DESC  LIMIT  1

                             ";	
						
				$query28=mysqli_query($conn, $query28xx);
		
		mysqli_close($conn);
		
		
	while ($stuffed = mysqli_fetch_array($query28)) {
	
		$tid = $stuffed['tribe_id'];
	
		


				
}	
		
		
		
		
		
		

		include "connect.php";
		
					if($next) {
							 $queryfor =" SELECT id,post,user_id,timestamp,comments,views,likes,image,type,user2_id,tribe_id,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,post_id
                              FROM posts 
               
                     WHERE user_id='$comment_user' 
						 ORDER BY timestamp DESC  LIMIT  2,1

                             ";	
							 $query=mysqli_query($conn, $queryfor);
							 }else{
		$queryfor = "SELECT id,post,user_id,timestamp,comments,views,likes,image,type,user2_id,tribe_id,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,post_id
                              FROM posts 
                     WHERE user_id='$comment_user' 

					 ORDER BY timestamp DESC  LIMIT  1

                             ";	
							 	 $query=mysqli_query($conn, $queryfor);
							 }
				
		
		mysqli_close($conn);
		
		
		while ($row = mysqli_fetch_array($query)) {
	

			
	
	
		
		$content = $row['post'];
		$imagess = $row['image'];
		$id = $row['id'];
		$uid= $row['user_id'];
		$views = $row['views'];
		$likes = $row['likes'];
		$comments = $row['comments'];
		$type = $row['type'];
		$userwhoid = $row['user2_id'];
		$tribed = $row['tribe_id'];
		$t_time = $row['timestamp'];
		$role= $row['role'];
		$realp= $row['op'];
		$repo= $row['repuser'];
		$value1= $row['value1'];
		$value2= $row['value2'];
		$value1a= $row['value1a'];
		$value2a= $row['value2a'];
		$roles= $row['roles'];
		$value1link= $row['value1link'];
		$value2link= $row['value2link'];
		$post_id= $row['post_id'];
         $ago=  getTime($t_time);
			include "connect.php";
			
			
			
		  $queryfore = "SELECT avatar,id,username,name,hometown,pbackcolor,stats FROM users WHERE id='$uid' 
				"; 
				
					 $cool=mysqli_query($conn, $queryfore);
				
				
				while ($wow = mysqli_fetch_assoc($cool)) {
				$image = $wow['avatar'];
				$name = $wow['name'];
				$username = $wow['username'];
				$ident= $wow['id'];
				$hmt = $wow['hometown'];
				$postcolor=$wow['pbackcolor'];
				$stats=$wow['stats'];
}		
		mysqli_close($conn);		
									//Get User Info Of The Recipient
if($userwhoid)
{				include "connect.php";
		  $queryforex ="SELECT avatar,id,username,name,hometown FROM users WHERE id='$userwhoid' 
				"; 
				
				 $cools=mysqli_query($conn, $queryforex);
				while ($wow = mysqli_fetch_assoc($cools)) {
				$imagex = $wow['avatar'];
				$namex = $wow['name'];
				$usernamex = $wow['username'];
					$userdx = $wow['id'];
					$hm = $wow['hometown'];
				
}		

				mysqli_close($conn);	
				}
				//Get Tribe Info 	
				if($tribed)
{				include "connect.php";
		  $queryforex ="SELECT avatar,id,name FROM tribes WHERE id='$tribed' 
				"; 
				 $cools=mysqli_query($conn, $queryforex);
				
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


   	$content = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$content);	   	
			 $content = preg_replace('/#(\\w+)/','
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$content);
			 
			 //Replace www. with a link https:
			 		 $content = preg_replace ("#(^|[\n ])((www)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"https://\\2\" target=\"_blank\">\\2</a>", $content);
		     // code to display YouTube NO WWW
//(preg_match("/http:\wwwyoutube.com\/watch\?v=([0-9a-zA-Z-_]*)(.*)/i", $url, $matches))
			 
        	
	
					
		 
	
		
		
		
	
   if(!$viewt){
   
				//include "pullpost.php ";
				include "timeline.php";
				
			}

           }
		   
		   
           }
	if($next){
	
	}
	else{
		
		 if(!$viewt){
   
   
	if($user_id){
	
	
			
		include "connect.php";
		
		$sear = $_GET['search'];
		$queryydow = "SELECT username,avatar,name,aboutme,hometown,id,posts,auth
                              FROM users
							WHERE hometown   LIKE '%$hometa%' 
		ORDER BY  RAND()
		LIMIT  1
                             ";
				 $queryy=mysqli_query($conn, $queryydow);			 
		mysqli_close($conn);
		while ($rows = mysqli_fetch_assoc($queryy)) {
		$usernames = $rows['username'];
		$images = $rows['avatar'];
		$names = $rows['name'];
		$aboutt = $rows['aboutme'];
		$hometown = $rows['hometown'];
		$idd = $rows['id'];
		$auth = $rows['auth'];
              
	 	include 'connect.php';
					$qusery2 ="SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$idd'
										  ";
									$query2=mysqli_query($conn, $qusery2);	  
					mysqli_close($conn);
	 if($user_id !=$idd){
	
	if(mysqli_num_rows($query2)>=1){
						
					}else{
	 if($rows) {
	
}		
 echo"
 <div class='page-content'>
 <div class='list-block media-list'>
      <ul>
        <li><a href='userprofile.php?username=$usernames'  class='item-link item-content'>
            <div class='item-media'><img src='$images' width='80'/></div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>$names</div>
                <div class='item-after'>	
				
				


";
	     	if($auth==1){
						
						echo "<i class='icon material-icons'>verified_user</i>";
						
					}
					else{
						
						echo "  ";
					}
include 'iffollow.php';
		if($user_id){
				if($user_id!=$idd){
					include 'connect.php';
					$dds ="SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$idd'
										  ";
										     $query2=mysqli_query($conn, $dds); 
					mysqli_close($conn);
			if(mysqli_num_rows($query3)>=1){
				echo "  <p style='color:gold'>• Follows You •</p>";
				}
				}
			}
			
					if($user_id){                                                                                                                                                                                                                                           
				if($user_id!=$idd){
					include 'connect.php';
					$dds = "SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$idd'
										  ";
										   $query2=mysqli_query($conn, $dds); 
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
						echo "<span><a href='unfollow.php?userid=$idd&username=$usernames&ref=2' class='button button-fill button-raised' style='background-color:teal'>Subscribed</a></br></span>";
					}
					else{
						echo "<span><a href='follow.php?userid=$idd&username=$usernames' class='button button-fill button-raised' style='background-color:teal'>Subscribe</a></br></span>";
					}
				}
			}	
			echo"</div>
            </div></a></li></ul>
			</div>
			</div>
			";





} } }
		}
		
	}
		
		
		
		}


		   
	   ?>  </div> 
      </div>
      <div id="tab-2" class="page-content tab">
        <div class="block">
        	<?php
	if($user_twitter){
		
		echo"
         <a class='twitter-timeline' href='https://twitter.com/intellifeed_'></a> <script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>";	}
	else
	{  

	echo"<div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>social_twitter_fill</i><a href='t.php' target='_blank' class='button button-fill button-raised'  >Twitter Connect</a></p>
    </div> ";
	
	}
		echo"
         <a class='twitter-timeline' href='https://twitter.com/intellifeed_'></a> <script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>";
		  ?>
        </div>
      </div>
      <div id="tab-3" class="page-content tab">
        <div class="block">
   			<?php echo "<div id='fb-root'></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
			js.src = '//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=212076269150594';
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>";

	 ?>
     <?php 
	 
	 							if(!$facebook){ 
							echo "
				   <div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>social_facebook_fill</i><a href='f.php' target='_blank' class='button button-fill  button-raised' style='background-color:#1a4e95'>Facebook Connect</a></p>
    </div>	
			";	
	
							 
					  }else{
						  
						  echo"
  <div class='fb-page' data-href='https://www.facebook.com/$facebook' data-tabs='timeline' data-small-header='false' data-adapt-container-width='true' data-hide-cover='True' data-width='500' data-show-facepile='True'></div>";
			   } 
			   
	 echo"
	 <div class='fb-page' data-href='https://www.facebook.com/9gag' data-tabs='timeline' data-small-header='false' data-adapt-container-width='true' data-hide-cover='True' data-width='500' data-show-facepile='True'></div>";

	 ?>		
        </div>
      </div>
	  <!---
	<div id="tab4" class="page-content tab">
        <div class="content-block">
	 <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/Bfj5zjjgjjX/" data-instgrm-version="8" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/Bfj5zjjgjjX/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">#WSHH #Premiere @ImRocky.B “Rag Doll” (Cuban Doll Diss) #LiveNow #RockyBadd #RagDoll</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A post shared by <a href="https://www.instagram.com/worldstar/" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px;" target="_blank"> Worldstar Hip Hop</a> (@worldstar) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2018-02-24T01:28:37+00:00">Feb 23, 2018 at 5:28pm PST</time></p></div></blockquote> <script async defer src="//www.instagram.com/embed.js"></script>
        </div>
      </div>
	  --->
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

</body>
</html>