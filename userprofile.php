<?php 

include "sessions.php";

	if($_GET[username]){
		include 'connect.php';
		$look =$_GET[username];
		$queryuser ="SELECT id,avatar,background,name,username,aboutme,hometown,followers,following,auth,posts,facebook,pbackcolor,backcolor,stats,bback,posts,avatarpro,twitter,zodiac
			FROM users 
			WHERE username='$look'
			";
				 $query=mysqli_query($conn, $queryuser);
							 
		mysqli_close($conn);
					while ($row = mysqli_fetch_array($query)) {
		$id = $row['id'];
		$uid = $row['id'];
		$postsss = $row['posts'];
				$username = $row['username'];
		$image = $row['avatar'];
		$imagepro = $row['avatarpro'];
		$back= $row['background'];
		$name = $row['name'];;
		$about = $row['aboutme'];
		$followers = $row['followers'];
		$following = $row['following'];
		$hometown = $row['hometown'];
		$postcolor=$row['pbackcolor'];
		$user_twitter=$row['twitter'];
		$user_facebook=$row['facebook'];
		$background=$row['backcolor'];
		$auth = $row['auth'];
		$menus=$row['stats'];
		$bback=$row['bback'];
		$posts=$row['posts'];
		$zodi=$row['zodiac'];
		}
		}
				  if($user_id){
  		include "connect.php";
		$birth ="SELECT id,user_id,bday,bmonth,byear,state,zodiac
                              FROM birthinfo 
                              WHERE user_id='$id'
                             ";
							 							$getbinfo=mysqli_query($conn, $birth);
		mysqli_close($conn);
		$rowq = mysqli_fetch_assoc($getbinfo);
		$byear = $rowq['byear'];
		$bday = $rowq['bday'];
		$bmonth = $rowq['bmonth'];
		$pri = $rowq['state'];
		$sign = $rowq['zodiac'];
		}
		 if(!$id){
   header("location: home.php");
  exit;
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title><?php echo"$name"; ?></title>
		 <!-- Path to Framework7 Library CSS-->
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link rel="stylesheet" href="css/framework7.material.min.css">
		<!-- Path to your custom app styles-->
		 <link rel="stylesheet" href="css/framework7.material.colors.min">
		<link rel="stylesheet" href="css/my-app.css">	
		
    </head>
    <body <?php echo"style='background-color:$backgroundc;'"; ?> >
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index" <?php echo"style='background-color:$backgroundc;'"; ?> >
   <div class="navbar " style="background-color:<?php 
     	if($menus){
		echo"$menus";
	}elseif($menu){
		
echo"	$menu";	
	
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
      <div class="center"><?php echo"$name"; ?></div>
  
    </div>
  </div>
  
  		<?php include"bottom.php"; ?>				
			<!---  <div class='speed-dial'><a href='#' class='floating-button'><i class='icon icon-plus'></i><i class='icon icon-close'></i></a>
    <div class='speed-dial-buttons'><a href='#'><i class='icon material-icons'>email</i></a><a href='#'><i class='icon material-icons'>today</i></a><a href='#'><i class='icon material-icons'>file_upload</i></a></div>
  </div></br></br></br> --->
  
  
					  <div class="toolbar tabbar" style="background-color:<?php 
     	if($menus){
		echo"$menus";
	}elseif($menu){
		
echo"	$menu";	
	
	}else{
		echo"#0c56ac";
	} 
 
 ?>">
    <div class="toolbar-inner"><a href="#tab1" class="active tab-link">Profile</a><a href="#tab2" class="tab-link"><i class="icon f7-icons">social_twitter_fill</i></a><a href="#tab3" class="tab-link"><i class="icon f7-icons">social_facebook_fill</i></a>
  <!---	<a href="#tab4" class="tab-link"><i class="icon f7-icons">social_instagram_fill</i></a> --->
	</div>
  </div>
  <div class="tabs-swipeable-wrap">
    <div class="tabs">
      <div id="tab1" class="page-content tab active hide-bars-on-scroll">
	  <?php
	  	  echo"  <div class='card' >
      <div class='card-content' style='background-image:url($back)' >
        <div class='ks-grid'>
		  <div class='row no-gutter'>
          <div class='col-33'></div>
          <div class='col-33'><a href='avi.php?avi=$id'> <img src='$image' width='100%'/></a>
		  </div>
          <div class='col-33'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>";
		  
		  	if($auth==1){
						
						echo "		
		  <i class='icon material-icons'>verified_user</i></div>
         ";
						
					}
					else{
						
						echo "  ";
					}
			
		echo"
		 <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		</div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>$name</div>
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'><i class='icon material-icons'>account_box</i>@$username</div>
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>";
		 
			if($uid==$user_id){
		 if($hometown){
					  echo"
		  <i class='icon material-icons'>location_on</i>$hometown
		  ";
		  
		  
		  }else{
						  echo "<a href='about-settings.php' <p>Where do you stay?</p></a>";
							}
							}
		  
		  echo"
		  </div>
		  
          <div class='col-20'></div>
          <div class='col-20'>";
		 
		  
		  echo"</div>
        </div>";
			if($bday){
								if($pri==1){
								
					echo "<p style='color:black';>$bday ";
					if ($bmonth== '1') { echo ' January'; } 
					if ($bmonth== '2') { echo ' February'; } 
					 if ($bmonth== '3') { echo ' March'; }
				 if ($bmonth== '4') { echo ' April'; } 
					 if ($bmonth== '5') { echo ' May'; } 
					if ($bmonth== '6') { echo ' June'; } 
					 if ($bmonth== '7') { echo ' July'; } 
					 if ($bmonth== '8') { echo ' August'; } 
					 if ($bmonth== '9') { echo ' September'; } 
					 if ($bmonth== '10') { echo ' October'; } 
					 if ($bmonth== '11') { echo ' November'; } 
				    if ($bmonth== '12') { echo ' December'; } 
              echo " $byear</p><a href='zodiac.php?search=$zodi'>";
			 
			
				   
			  	if($sign){
				   	  if($sign=="Aries"){
			  echo"<h2>♈";
			  }elseif($sign=="Taurus"){
			  echo"<h2>♉ ";
			   }elseif($sign=="Gemini"){
			   
			    echo"<h2>♊</h2>";
			   
			    }elseif($sign=="Cancer"){
				
				 echo"<h2>♋";
				 }elseif($sign=="Leo"){
				  echo"<h2>♌";
				 
				  }elseif($sign=="Virgo"){
				   echo"<h2>♍";
				  
				   }elseif($sign=="Libra"){
				   echo"<h2>♎";
				   }elseif($sign=="Scorpio"){
				   echo"<h2>♏";
				   
				   }elseif($sign=="SAGITTARIUS"){
				   echo"<h2>♐";
				   
				   }elseif($sign=="Capricorn"){
				   echo"<h2>♑ ";
				   
				   }elseif($sign=="Aquarius"){
				   echo"<h2>♒";
				   }elseif($sign=="Pisces"){
				   echo"<h2>♓";
				   }
	
			  
			   echo" $sign</h2></a>";
							}else{
								if($zodi=="Aries"){
			  echo"<h2>♈";
			  }elseif($zodi=="Taurus"){
			  echo"<h2>♉ ";
			   }elseif($zodi=="Gemini"){
			   
			    echo"<h2>♊</h2>";
			   
			    }elseif($zodi=="Cancer"){
				
				 echo"<h2>♋";
				 }elseif($zodi=="Leo"){
				  echo"<h2>♌";
				 
				  }elseif($zodi=="Virgo"){
				   echo"<h2>♍";
				  
				   }elseif($zodi=="Libra"){
				   echo"<h2>♎";
				   }elseif($zodi=="Scorpio"){
				   echo"<h2>♏";
				   
				   }elseif($zodi=="SAGITTARIUS"){
				   echo"<h2>♐";
				   
				   }elseif($zodi=="Capricorn"){
				   echo"<h2>♑ ";
				   
				   }elseif($zodi=="Aquarius"){
				   echo"<h2>♒";
				   }elseif($zodi=="Pisces"){
				   echo"<h2>♓";
				   }
	
			  
			   echo" $zodi</h2></a>";
								
								
							}	
								
								
								
								
										 }
						}
		
		if($about){
					echo "<p style='color:silver,align:center';> $about </p>";
								}else{
									if($uid==$user_id){
						  echo "<a href='about-settings.php' <p>Enter A Short Bio About You</p></a>";
							}
								}
								                                
				if($user_id!=$uid){
					include 'connect.php';
					$dds = "SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$uid'
										  ";
										   $query2=mysqli_query($conn, $dds); 
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
						echo "<span><a href='unfollow.php?userid=$comment_user&username=$usernameR&ref=2' class='button button-fill button-raised' style='background-color:teal'>Subscribed</a></br></span>";
					}
					else{
						echo "<span><a href='follow.php?userid=$comment_user&username=$usernameR' class='button button-fill button-raised' style='background-color:teal'>Subscribe</a></br></span>";
					}
				}
		  
		
		echo"
		</div>
		
	    <div class='ks-grid'>
		  <div class='row no-gutter'>
          <div class='col-50'>
		  
		  	  	       <a href='userfollowers.php?username=$username'>		     <div class='chip'>
        <div class='chip-media bg-blue'><i class='icon material-icons'>directions_run</i></div>
        <div class='chip-label'>Subscribers($followers)</div>
      </div>
	  </a>  
		 
		  
		  
		  
		  </div>
      
          <div class='col-50'>
		  
		  
		  
			  	       <a href='userfollowing.php?username=$username'>		     <div class='chip'>
        <div class='chip-media bg-blue'><i class='icon material-icons'>directions_walk</i></div>
        <div class='chip-label'>Subscribed($following)</div>
      </div>
	  </a>  </div>
      
	  
	  </div>
		
		
		
		
			    <p class='buttons-row'><a href='library.php?id=$id' class='button button-fill button-raised' style='background-color:teal' >Library($posts)<i class='icon f7-icons'>drawers_fill</i></br></a></p>

	<div class='list-block accordion-list'>
      <ul>
        <li class='accordion-item'><a href='#' class='item-link item-content'>
          
			 
			  <p class='buttons-row'> <i class='icon f7-icons'>email</i><p class='button button-fill'  style='background-color:$well'> Send a message
			  </p>
			  
			  </p>
			 </a>
          <div class='accordion-item-content'>
            <div class='content-block'>
			
                 <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>";
		echo" <form action='send.php' method='POST'>
           <input type='hidden' name='receipt' value='$uid'>
	<textarea rows='2' cols='30'  placeholder='Converse...' name='content'></textarea>
	<p>
	 <input class='link  button button-fill' value='Send Message'   type='submit' name='post'  style='background-color:teal'>
	</p>
	</form>";
		 
		 
	   
	   
	   echo"
	   
	   
        </div>
	
	
	</div>
	</div>
	</div>
	
	
	
	
	
            </div>
          </div>
        </li>

      </ul>
    </div>
    </div>
	  
	";
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


	if($_GET[username]){
		include "connect.php";
		
		
		if($next) {
		
				$userp = "SELECT id,post,user_id,timestamp,likes,comments,views,image,type,user2_id,tribe_id,role,op,repuser,roles,value1,value2,value1a,value2a,post_id
                              FROM posts
                           WHERE user_id= $id OR user2_id= $id
						   ORDER BY timestamp DESC
						   LIMIT 7,14
                             ";
			
					 $query=mysqli_query($conn, $userp);
		
		
		 }elseif($nxt) {
		
				$userp = "SELECT id,post,user_id,timestamp,likes,comments,views,image,type,user2_id,tribe_id,role,op,repuser,roles,value1,value2,value1a,value2a,post_id
                              FROM posts
                           WHERE user_id= $id OR user2_id= $id
						   ORDER BY timestamp DESC
						   LIMIT 16,26
                             ";
		
			 $query=mysqli_query($conn, $userp);
		 }
		 
		 
		 else{
		$userp = "SELECT id,post,user_id,timestamp,likes,comments,views,image,type,user2_id,tribe_id,role,op,repuser,roles,value1,value2,value1a,value2a,post_id
                              FROM posts
                           WHERE user_id= $id OR user2_id= $id
						   ORDER BY timestamp DESC
						   LIMIT 6
                             ";
							 
							 	 $query=mysqli_query($conn, $userp);
						 }	 
							 
		mysqli_close($conn);
		while ($row = mysqli_fetch_array($query)) {
		$t_time = $row['timestamp'];
		$content = $row['post'];
		$imagess = $row['image'];
		$type = $row['type'];
		$id = $row['id'];
		$userwho = $row['user_id'];
		$userwhoid = $row['user2_id'];
		$tribed = $row['tribe_id'];
		$views = $row['views'];
		$likes = $row['likes'];
		$comments = $row['comments'];
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
		$post_id = $row['post_id'];
					include "connect.php";
		  $useri = "SELECT avatar,id,username,name FROM users WHERE id='$userwho' 
				"; 
				
					 $cool=mysqli_query($conn, $useri);
				while ($wow = mysqli_fetch_assoc($cool)) {
				$image = $wow['avatar'];
				$name = $wow['name'];
				$username = $wow['username'];
					$userd = $wow['id'];
				
}		
		mysqli_close($conn);	
				//Get User Info Of The Recepient
if($userwhoid)
{				include "connect.php";
		  $cooled = "SELECT avatar,id,username,name FROM users WHERE id='$userwhoid' 
				"; 
					 $cools=mysqli_query($conn, $cooled);
				while ($wow = mysqli_fetch_assoc($cools)) {
				$imagex = $wow['avatar'];
				$namex = $wow['name'];
				$usernamex = $wow['username'];
					$userdx = $wow['id'];
				
}		

				mysqli_close($conn);	
				}
				//Get Tribe Info 
				if($tribed)
{				include "connect.php";
		  $coolse ="SELECT avatar,id,name FROM tribes WHERE id='$tribed' 
				"; 
					 $cools=mysqli_query($conn, $coolse);
				while ($wow = mysqli_fetch_assoc($cools)) {
				$imagex = $wow['avatar'];
				$namexs = $wow['name'];
					$tribex = $wow['id'];
				
}		

				mysqli_close($conn);	
				}elseif($repo)
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
       $ago=  getTime($t_time);
		
			        	   //This converts everything with @ and # to a clickable link 
	   			   	$content = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$content);
			
			 $content = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$content);	
			 		 //Replace www. with a link https:
			 
		 $content = preg_replace ("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $content);
        
				include "timeline.php";
           }



		   } 
	   ?>
	   </div>
    
      <div id="tab2" class="page-content tab">
        <div class="content-block">
		
		<?php
			if($user_twitter){
		
		echo"
         <a class='twitter-timeline' href='https://twitter.com/$user_twitter'></a> <script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>";	}
	else
	{  

	echo"<div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>social_twitter_fill</i><a href='t.php' target='_blank' class='button button-fill button-raised'  >User Not Connected</a></p>
    </div> ";
	 echo"<a class='twitter-timeline' href='https://twitter.com/intellifeed_'></a> <script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>";
	}
     
		  ?>
        </div>
      </div>
      <div id="tab3" class="page-content tab">
        <div class="content-block">
     <?php 
	 			if(!$facebook){ 
							echo "
				   <div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>social_facebook_fill</i><a href='f.php' target='_blank' class='button button-fill  button-raised' style='background-color:#1a4e95'>User Not Connected</a></p>
    </div>	
			";	
							 
					  }else{
						"<div id='fb-root'></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
			js.src = '//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=212076269150594';
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>";  
						  echo"
  <div class='fb-page' data-href='https://www.facebook.com/$user_facebook' data-tabs='timeline' data-small-header='false' data-adapt-container-width='true' data-hide-cover='True' data-width='500' data-show-facepile='True'></div>";
			   } ?>
        </div>
      </div>
	<!---  <div id="tab4" class="page-content tab">
        <div class="content-block">
	 <p>This  is where instagram feed goes
        </div>
      </div> --->
	  
    </div>
  </div>
						<div class="page-content">

						


   					
	  
       		
 
   
	  
	  
      </div>
    </div>	

       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		
	
    
</body>
</html>
