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
$poses=post;
		
				include"connect.php";
$sqlCommandd="SELECT id,user_id,post,views,comments,likes,timestamp,image,type,user2_id,tribe_id,location,reposts,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,post_id,image2
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
		$image2 = $row['image2'];
		     $url = 'http://www.intellifeed.ga/post.php?pid=' ;
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
		 
						 $queee	= "SELECT avatar,id,username,name,auth,loc,pbackcolor,stats,backcolor
						 FROM users WHERE id='$uid' 
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
		<meta property="og:title" content="<?php echo'$content'; ?>">
    <meta property="og:site_name" content="IntelliFeed">
    <meta property="og:url" content="<?php echo'$url'; ?>">
    <meta property="og:image" content="<?php echo'$images'; ?>"

    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@intellifeed_">
    <meta name="twitter:creator" content="@intellifeed_">
    <meta name="twitter:card" content="summary_large_image">

    </head>
    <body  style='background:<?php echo"$postcolor"; ?>';>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index"	<?php echo"style='background-color:$backgroundc;'"; ?>>
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
						<div class="page-content hide-bars-on-scroll">
						
						<?php
		
		$string     = $content;
$search     = '/www.youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';

$replace    = "
<iframe  width='100%' height='100%' src='https://youtube.com/embed/$1' frameborder='0' allowfullscreen></iframe><a href='//www.youtubeinmp3.com/fetch/?video=https://www.youtube.com/watch?v=$1'>
<br>
 
";    
$content = preg_replace($search,$replace,$string);
$ur = preg_replace($search,$replace,$string);
	

				$content = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$content);
			
			 $content = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$content);	

			 $content = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$content);
			 
			 		 $content = preg_replace ("#(^|[\n ])((www|http://)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $content);
						 $content = preg_replace ("#(^|[\n ])((http://)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $content);
		echo" 
	  <div class='card ks-card-header-pic'  style='background-color:$postcolor;' >
      <div style='background:$backgroundc;' valign='bottom' class='card-header color-white no-border'></div>";
	  
	  
	  
	
	   if($repo){
	echo	"<a href='userprofile.php?username=$repname'>
			
				 
				 
				
				
				   <div style='background-image:url($imagexrep)' class='message-avatar'></div>@$repname</a>";
				
				
				}else{
		if($user_id ==$userwhoidd){		
				echo"

			<a href='profile.php'>
				
				   <div style='background-image:url($image)' class='message-avatar'></div>$name
				   <br>@$username
				   </a>";
				
					           
				if($user_id!=$userwhoidd){
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
				}else{
						
		echo"

			<a href='userprofile.php?username=$username'>
				
				   <div style='background-image:url($image)' class='message-avatar'></div>$name
				   <br>@$username
				   </a>";
		           
				if($user_id!=$uid){
					include 'connect.php';
					$dds = "SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$uid'
										  ";
										   $query2=mysqli_query($conn, $dds); 
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
			
					}
					else{
						echo "<span><a href='follow.php?userid=$idd&username=$usernames' class='button button-fill button-raised' style='background-color:teal'>Subscribe</a></br></span>";
					}
				}
					}
				}
				
			if($userwhoid)	
				{
						if($userdx==$user_id)	
													{



				echo"

			<a href='profile.php'>
				
				   <div style='background-image:url($imagex)' class='message-avatar'></div>$name
				   <br>@$usernamex
				   </a>";
				
				
								           
				if($user_id!=$uid){
					include 'connect.php';
					$dds = "SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$uid'
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
				
				
				}else{
				echo"

			<a href='userprofile.php?username=$usernamex'>
				
				   <div style='background-image:url($imagex)' class='message-avatar'></div>$name
				   <br>@$usernamex
				   </a>";
				
				}
				}
				
				
				if($tribed)	
				{
	echo
"		
			<i class='icon f7-icons'>chevron_right</i>
			<a href='tribe.php?tribe=$tribex'  style='text-transform: capitalize;'>
			<img height=25 width=25 SRC=' $imagex '/>
				 
				 
				 
				 
				 
				
				<h6 style='color:white'>$namexs</h6></a>"; 
				
				
				
				}elseif($repo)	
				{
	echo
	"		
			<i class='icon material-icons'>autorenew</i>
			<a href='userprofile.php?username=$username'  style='text-transform: capitalize;'>
			<img height=25 width=25 SRC=' $image '/>
				 
				 
			"; 
					
	
					
					
				}
	   
	   
	   echo"
      <div class='card-content'  >
	  
        <div class='card-content-inner' > ";
		    if($role=="comment"){
 
 
		echo " 
				<a HREF='post.php?pid=$post_id' ><i class='icon material-icons'>mode_comment</i>Post commented on</a>
				
				";	}
  elseif($role=="reply"){
 
 
echo " 
				<a HREF='post.php?pid=$post_id' ><i class='icon material-icons'>comment</i>Post replied on</a>
				
				";
  
  }
                 if($roles=="list"){
 
 
   echo " <img  width=35 height=35  src='images/audio.png' />
<p style='color:#333335;'>$content</p>
  ";
  }elseif($type=="mp3"){
    echo  " <img  width=35 height=35  src='images/audio.png' />
            <p style='color:#333335;'>$content</p>
			<audio controls loop preload=metadata width=100%  poster='$image'> <source src='$images' type='audio/$type '> </audio>		
          ";
  
   }
   //Checks if post consist of an image
   if($images)				{
  if($type==gif){
				echo "<a href='photo.php?pid=$id' class='ks-pb-popup-dark'>
										
										<img src='$images' width='100%'/></a>
										";
					}
				elseif($type==mp4){
  
			echo"
					 <video id='player1' width='100%' height='100%'  poster='$imagesso' preload='none' controls playsinline webkit-playsinline>
                    <source src='$images' type='video/$type'>
                  
                </video>		
				";
  
			}elseif($type==webm){
  
						
						echo"
					<video controls t loop preload=metadata   poster='$imagesso'> <source src='$images' type='video/$type '> </video>		
				";
		
								}
				else{
				//Assumes the file is an image (jpg,png)
				
              if($role==story){
					echo " 
								
	    <div data-effect='cube' class='swiper-container swiper-init demo-swiper demo-swiper-cube'>
      <div class='swiper-wrapper'>
        <div style='background-image:url($images)' class='swiper-slide'><img src='$images' width='100%'/></a>1/2</div>
        <div style='background-image:url($image2)' class='swiper-slide'><img src='$image2' width='100%'/></a>2/2</div>
     
      </div>
	  
    </div>
	
  <!----  <div data-effect='flip' class='swiper-container swiper-init demo-swiper demo-swiper-cube'>
      <div class='swiper-wrapper'>
        <div style='background-image:url($images)' class='swiper-slide'><img src='$images' width='100%'/>1/2</div>
        <div style='background-image:url($image2)' class='swiper-slide'><img src='$image2' width='100%'/>2/2</div>
       
      </div>
    </div>
---->
	";		
										
			  }else{
				  
				  
					
										echo "<a href='photo.php?pid=$id' class='ks-pb-popup-dark'>
										
										<img src='$images' width='100%'/></a>
	  
										";	
			  }
						
						
					}
				}
              echo" <p  ";
		 
		 if($postcolor){
		 echo "style='background-color:#FFF'";
		 }
		 
		echo" >$content</p>
		 
		 
		   <p class='color-orange'>$ago</p>";
		   			if($loc==1){	
			if($location){	
			echo "
	
			
           <a href='location.php?search=$location'>		     <div class='chip'>
        <div class='chip-media bg-blue'><i class='icon material-icons'>location_on</i></div>
        <div class='chip-label'>$location </div>
      </div>
	  
	  </a>

          ";
}
}
		if($user_id){	
			if($user_id ==$uid){	
			echo "
			
			     <a href='delete_.php?pid=$look'>		     <div class='chip'>
        <div class='chip-media bg-blue'><i class='icon f7-icons'>delete_round_fill</i></div>
        <div class='chip-label'>Delete </div>
      </div>
	  
	  </a>
          ";
								}
					}
        echo"</div>
      </div>";
	  
	  
   	 echo" 
	  <div class='list-block accordion-list'>
      <ul>
        <li class='accordion-item'><a href='#' class='item-link item-content'>
            <div class='item-inner'> 
              <div class='item-title'> <img height=25 width=25  SRC=' reactions/like.png '  alt='like'  />	
			  <img height=25 width=25  SRC=' reactions/star.png '  alt='star'  />
			  <img height=25 width=25  SRC=' reactions/finger.png '  alt='finger'  />
			  ";	

 
	
	
	echo"</div>
            </div></a>
          <div class='accordion-item-content'>
            <div class='content-block'>
                 <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>
          <a href='like.php?pid=$id&key=$uid&type=smile' ><div class='col-20'><img height=35 width=35  SRC=' reactions/smile.png '  alt='peace' /></div></a>
         <a href='like.php?pid=$id&key=$uid&type=like'>  <div class='col-20'>
		 <img height=35 width=35  SRC=' reactions/like.png '  alt='like'  /></div></a>
        <a href='like.php?pid=$id&key=$uid&type=star'>  <div class='col-20'>
		<img height=35 width=35  SRC=' reactions/star.png '  alt='star'  /></div></a>
       <a href='like.php?pid=$id&key=$uid&type=eyes'>   <div class='col-20'>
	   <img height=35 width=35  SRC=' reactions/eyes.png '  alt='eyes'  /></div></a>
       <a href='like.php?pid=$id&key=$uid&type=finger'>   <div class='col-20'>
	   <img height=35 width=35  SRC=' reactions/finger.png '  alt='finger'  /></div></a>
        </div>
	</div>
	</div>
            </div>
          </div>
        </li>
  
      </ul>
    </div>";
	
	
	
	  echo" <div class='row no-gutter' style='background-color:$stats'>
          <div class='col-25'>	";
	echo"		  <a href='post.php?pid=$id' >	";
	
								 echo"<i class='icon material-icons'>mode_comment<sup>";
	 
								 echo"</sup></i></a></div>
          <div class='col-25'><a href='post.php?pid=$id' ><img src='images/views.png' alt='views' /></a></div>
          <div class='col-25'> ";
							
if($user_id==$uid){
									echo"
<a href='#' class='blue'><img src='images/rep.png' alt='Repost' /></a>	";
			
			}elseif($user_id==$repo){
			
											echo"
<li><a href='#' class='blue'><img src='images/rep.png' alt='Repost' /></a></li>	";	
			}
			
			elseif($roles=="poll"){
			
											echo"
<a href='#' class='blue'><img src='images/rep.png' alt='Repost' /><p> $reposts</p></a>	";	
			}elseif($roles=="list"){
			
											echo"
<a href='#' class='blue'><img src='images/rep.png' alt='Repost' /><p> $reposts</p></a>	";	
			}elseif($repo){

 echo"<a href='rep.php?pid=$look&key=$uid&name=$name' class='blue'><img src='images/rep.png' alt='Repost' /></a>	";
   
						}else{
					include 'connect.php';
					$query2eq = "SELECT id
										   FROM repost 
										   WHERE post_id='$look' AND user_id='$user_id'
										  ";
										  	
				$query2ew=mysqli_query($conn, $query2eq);  
				
					mysqli_close($conn);
              

					if(mysqli_num_rows($query2ew)>=1){
						echo "<a href='delete.php?pid=$look&post_id=$look' class='blue'><img src='images/repa.png' alt='Repost' /><p> </p></a>";
					}
			
					else{
					if($realp){



						echo"
		<a href='rep.php?pid=$look&key=$uid&post=$realp&user=$repo&name=$name' class='blue'><img src='images/rep.png' alt='Repost' /><p></p></a>	";
					}else{
						echo"
		<a href='rep.php?pid=$look&key=$uid&name=$name' ><img src='images/rep.png' alt='Repost' /><p></p></a>	";

					}

			}
					}
		echo"

		  
		  </div>
          <div class='col-25'>";
		  
		  
		  
		  
		  include"like-post.php";
		  
		  
		  
		  
		  
		  echo"</div>
		  
					</div>
						  <div class='row no-gutter'>
          <div class='col-25'>";
		  
		   if($comments=="0"){
								 }else{
								 echo"$comments";
								 }
		  
		  echo"</div>
          <div class='col-25'>$views</div>
          <div class='col-25'>$reposts</div>
          <div class='col-25'>";
		  if($responses=="0"){
								 }else{
								 echo"$responses";
								 }
								 echo"</div>
        </div>
		
		
	  <div class='list-block accordion-list'>
      <ul>
        <li class='accordion-item'><a href='#' class='item-link item-content'>
       			  <p class='buttons-row'><i class='icon material-icons'>share</i> Share
			  
			  </p>
			 </a>
          <div class='accordion-item-content'>
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
			 

	echo"			</div>";
	 
	
	?>	  		        <?php
  include"promotion.php";
  ?>

	
						  <div class="toolbar tabbar" style="background-color:<?php echo"$stats"; ?>">
    <div class="toolbar-inner"><a href="#tab1" class="active tab-link">Comments</a>
	<!--- <a href="#tab2" class="tab-link"><i class="icon f7-icons">social_facebook_fill</i></a> --->
	
	</div>
  </div>


  <div class="tabs-swipeable-wrap">
    <div class="tabs">
		<?php include"comments.php"; ?>
		 </div>
		  </div>

     <div id='tab2' class='page-content tab'>
        <div class='content-block'>
		<?php echo "
		<!---
		<div id='fb-root'></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
			js.src = '//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=212076269150594';
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				--->
				";

	 ?>

	<?php   echo"
	<!--	<p> <div class='fb-comments'      data-width='450'   data-href='www.intellifeed.ga?pid=$look' data-numposts='5'></p> ---> "; ?>
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