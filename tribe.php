<?php 

include "sessions.php";

				$ss= $_GET[username];
			//	echo"<p>$look</p>";
		
				?>
				<?php
		if($_GET[tribe]){
		include 'connect.php';
		$look =$_GET[tribe];
	 
	$queryas ="SELECT id,avatar,background,name,user_id,about,hometown,auth,views,members,facebook,twitter
			FROM tribes 
			WHERE id='$look'
			";
			$query=mysqli_query($conn, $queryas);
			
								 	 $visi= "UPDATE tribes
					 SET views = views + 1
					 WHERE id= $look  LIMIT 5
					";
				mysqli_query($conn, $visi);
		mysqli_close($conn);
		if(mysqli_num_rows($query)>=1){
			while ($row = mysqli_fetch_array($query)) {
		$ide = $row['id'];
		$idd = $row['user_id'];
		$postsss = $row['posts'];
				$username = $row['username'];
		$image = $row['avatar'];
		$back= $row['background'];
		$namee = $row['name'];;
		$views = $row['views'];
		$about = $row['about'];
		$members = $row['members'];
		$hometown = $row['hometown'];
		$auth = $row['auth'];
		$facebook = $row['facebook'];
		$twitter = $row['twitter'];
		}
		}
		}
		?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title><?php echo"Tribe:$namee"; ?></title>
		 <meta name="description" content=" <?php echo "$about |Members: $members ";?>" />
		 <!-- Path to Framework7 Library CSS-->
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link rel="stylesheet" href="css/framework7.material.min.css">
		<!-- Path to your custom app styles-->
		 <link rel="stylesheet" href="css/framework7.material.colors.min">
		<link rel="stylesheet" href="css/my-app.css">	
		
    </head>
    <body <?php echo"style='background-color:$backgroundc;'"; ?> >
			<?php     			 if($_GET['facebook'])
		 {  
		 
		 
		 echo "<div id='fb-root'></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = '//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=212076269150594';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>";

 }?>	
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
      <div class="center"><?php echo"$namee"; ?></div>
  
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
    <div class="toolbar-inner"><a href="#tab1" class="active tab-link">Tribe</a><a href="#tab2" class="tab-link"><i class="icon f7-icons">social_twitter_fill</i></a><a href="#tab3" class="tab-link"><i class="icon f7-icons">social_facebook_fill</i></a>
  <!---	<a href="#tab4" class="tab-link"><i class="icon f7-icons">social_instagram_fill</i></a> --->
	</div>
  </div>
 <?php 	$next= $_GET[more];
				$sc= $_GET[success];
				$succ= $_GET[fail];
     if($sc){
       
   	echo "
				  

	    		 	 <h3> Successfully Published !</h3>
					
	

	
	
	";	} ?>
  <div class="tabs-swipeable-wrap">
    <div class="tabs">
      <div id="tab1" class="page-content tab active hide-bars-on-scroll">
	  <?php
	  	  echo"  <div class='card' >
      <div class='card-content' style='background-image:url($back)' >
        <div class='ks-grid'>
		  <div class='row no-gutter'>";
		  	if($user_id) {
				if($user_id==$idd){
								echo"<div class='col-33'><a href='tribe-settings.php'><i class='icon f7-icons'>gear_fill</i></a></div>";
								
								}
								}
		  
          
		  
		  
		echo"  
          <div class='col-33'><img src='$image' width='100%'/>
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
          <div class='col-20'><i class='icon f7-icons'>persons</i>$views Visits</div>
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
	
		
		if($about){
					echo "<p style='color:silver,align:center';> $about </p>";
								}else{
									if($uid==$user_id){
						  echo "<a href='about-settings.php' <p>Enter A Short Bio About You</p></a>";
							}
								}
								                                
		  			if($user_id){
		
					include 'connect.php';
					$queryawe = "SELECT user_id
										   FROM tribemems 
										   WHERE user_id='$user_id' AND tribe_id='$ide'
										  ";
										  $query2=mysqli_query($conn, $queryawe);
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
						echo "<span><a href='go.php?tribe=$ide&name=$name' class='button button-fill button-raised' style='background-color:teal'>Member</a></br></span>";
					}
					else{
						echo "<span><a href='join-tribe.php?tribe=$ide&name=$name' class='button button-fill button-raised' style='background-color:teal'>Join Tribe</a></br></span>";
					}
				
			}	
		
		echo"
		</div>
		
	    <div class='ks-grid'>
		  <div class='row no-gutter'>
          <div class='col-50'>
		  
		  	  	       <a href='tribe_members.php?tribe=$ide'>		     <div class='chip'>
        <div class='chip-media bg-blue'><i class='icon material-icons'>people</i></div>
        <div class='chip-label'>Members($members)</div>
      </div>
	  </a>  
		 
		  
		  
		  
		  </div>
      
       
      
	  
	  </div>
		
		
		
		
			    <p class='buttons-row'><a href='library.php?id=$id' class='button button-fill button-raised' style='background-color:teal' >Library($posts)<i class='icon f7-icons'>drawers_fill</i></br></a></p>";

		 if($user_id){
if(mysqli_num_rows($query2)>=1){
$attach= $_GET[attach];
$thephoto ="photo";
$thevideo ="video";
if($attach==$thephoto){
echo "  <form enctype='multipart/form-data' id='demoform-1' class='store-data list-block' role='form' action='photolupload-tribe.php' method='POST'>
      <ul>
        <li>
       
		            <div class='item-content'>
            <div class='item-media'><i class='icon f7-icons'>paper_plane</i></div>
            <div class='item-inner'> 
              <div class='item-title label'>Publish...</div>
			  
                 <div class='item-input'>
			  <input type='hidden' name='post_id' value='$look'>
			  <input type='hidden' name='tribe' value='$ide'>
           <input type='hidden' name='location' value='$hometown'>
           <input type='hidden' name='user' value='$user_id'>
   
           <input type='hidden' name='type' value='tribe'>
                <textarea rows='2' cols='30'  placeholder='Let them know...' name='content'></textarea>
		
              </div>
            </div>
          </div>
        </li>
           <li>
		   	
		     <div class='ks-grid'>
			
      <div class='content-block'>
	     <div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'><i class='icon f7-icons'>social_twitter_fill</i>
		   <label class='form-checkbox'>
                  <input type='checkbox' name='twitter' value='twitter'/><i></i>
                </label></div>
          <div class='col-20'></div>
          <div class='col-20'><i class='icon f7-icons'>social_facebook_fill</i>
  <label class='form-checkbox'>
                  <input type='checkbox'/><i></i>
                </label></div>
          <div class='col-20'></div>
        </div>
	</div>
	</div>";
	
		  
		  	     
		  
   
	
	    echo"  <div class='content-block'>";
		 		$strings = ",";
		$u = array('gold','teal', 'blue','#0c56ac');

		$well = $u[rand(0,4)];

    echo" <p class='buttons-row'>	<input type='submit' class='button button-fill ' name='submit' value='Publish' style='background-color:$well' ></p>";
	  
	   echo"
    </div>
    </form>
	        

        </li>
      </ul>
			";
			
			}else{
			
	echo"				

       		  <form enctype='multipart/form-data' id='demoform-1' class='store-data list-block' role='form' action='tribe-post.php' method='POST'>
      <ul>
        <li>
       
		            <div class='item-content'>
            <div class='item-media'><i class='icon f7-icons'>paper_plane</i></div>
            <div class='item-inner'> 
              <div class='item-title label'>Publish...</div>
			  
                 <div class='item-input'>
			  <input type='hidden' name='post_id' value='$look'>
			  <input type='hidden' name='tribe' value='$ide'>
           <input type='hidden' name='location' value='$hometown'>
           <input type='hidden' name='user' value='$user_id'>
   
           <input type='hidden' name='type' value='tribe'>
                <textarea rows='2' cols='30'  placeholder='Let them know...' name='content'></textarea>
		
              </div>
            </div>
          </div>
        </li>
           <li>
		   	
		     <div class='ks-grid'>
			
      <div class='content-block'>
	     <div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'><i class='icon f7-icons'>social_twitter_fill</i>
		   <label class='form-checkbox'>
                  <input type='checkbox' name='twitter' value='twitter'/><i></i>
                </label></div>
          <div class='col-20'></div>
          <div class='col-20'><i class='icon f7-icons'>social_facebook_fill</i>
  <label class='form-checkbox'>
                  <input type='checkbox'/><i></i>
                </label></div>
          <div class='col-20'></div>
        </div>
	</div>
	</div>
	
		  
		  	     
		  
   
	
	      <div class='content-block'>";
		 		$strings = ",";
		$u = array('gold','teal', 'blue','#0c56ac');

		$well = $u[rand(0,4)];

    echo" <p class='buttons-row'>	<input type='submit' class='button button-fill ' name='submit' value='Publish' style='background-color:$well' ></p>";
	  
	   echo"
    </div>
    </form>
	        <div class='ks-grid'>
      <div class='content-block-title'>Attach</div>
      <div class='content-block'>

        <div class='row'>
      <a href='tribe.php?tribe=$ide&attach=photo'>    <div class='col-33'><i class='icon f7-icons'>camera_fill</i></div></a>
      <!---  <a href='tribe.php?tribe=$ide&attach=video'>    <div class='col-33'><i class='icon f7-icons'>videocam_fill</i></div><a/>
                 <a href='tribe.php?tribe=$ide&attach=audio'>     <div class='col-33'><i class='icon f7-icons'>tune_fill</i></div></a>
			--->	 
				 
        </div>
		</div>
		</div>
        </li>
      </ul>
	
	";
			
			
			
			}
			}
 }
 echo"   </div>
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


	if($_GET[tribe]){
		include "connect.php";
		
		  	 if($_GET['top'])
		 {
		if($next) {
		
				$queryx = "SELECT id,post,user_id,timestamp,likes,comments,views
                              FROM posts
                           WHERE tribe_id= $ide 
						   ORDER BY views DESC
						   LIMIT 7,14
                             ";
							 $query=mysqli_query($conn, $queryx);
		
		
		 }else{
		$queryx = "SELECT id,post,user_id,timestamp,likes,comments,views,image,imageo,type,roles,value1,value2,value1a,value2a
                              FROM posts
                           WHERE tribe_id= $ide 
						   ORDER BY views DESC
						   LIMIT 7
                             ";
							 $query=mysqli_query($conn, $queryx);
						 }	 
						 }	 else {
						 	if($next) {
		
				$queryx = "SELECT id,post,user_id,timestamp,likes,comments,views,roles,value1,value2,value1a,value2a,type
                              FROM posts
                           WHERE tribe_id= $ide 
						   ORDER BY timestamp DESC
						   LIMIT 7,14
                             ";
		$query=mysqli_query($conn, $queryx);
		
		 }else{
		$queryx = "SELECT id,post,user_id,timestamp,likes,comments,views,image,imageo,type,roles,value1,value2,value1a,value2a
                              FROM posts
                           WHERE tribe_id= $ide 
						   ORDER BY timestamp DESC
						   LIMIT 7
                             ";
							 $query=mysqli_query($conn, $queryx);
						 }	 
						 }	 
						 
							 
		mysqli_close($conn);
		while ($row = mysqli_fetch_array($query)) {
		$t_time = $row['timestamp'];
		$content = $row['post'];
		$imagess = $row['image'];
		$type = $row['type'];
		$id = $row['id'];
		$uid = $row['user_id'];
		$views = $row['views'];
		$likes = $row['likes'];
		$comments = $row['comments'];
		$t_time = $row['timestamp'];
		
					include "connect.php";
		  $coolq ="SELECT avatar,id,username,name,pbackcolor,stats FROM users WHERE id='$uid' 
				"; 
				$cool=mysqli_query($conn, $coolq);
				while ($wow = mysqli_fetch_assoc($cool)) {
				$image = $wow['avatar'];
				$name = $wow['name'];
				$username = $wow['username'];
					$userd = $wow['id'];
					$postcolor = $wow['pbackcolor'];
				$stats = $wow['stats'];
}		
		mysqli_close($conn);	
				
       $ago=  getTime($t_time);
		
			        	   //This converts everything with @ and # to a clickable link 
	   			   	$content = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$content);
			
			 $content = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$content);	
			 		 //Replace www. with a link https:
			 
		 $content = preg_replace ("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"https://\\2\" target=\"_blank\">\\2</a>", $content);
        
 include "timeline.php";


           }



		   } 
	   ?>
	   </div>
    
      <div id="tab2" class="page-content tab">
        <div class="content-block">
		
		<?php
			if($twitter){
		
		echo"
         <a class='twitter-timeline' href='https://twitter.com/$twitter'></a> <script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>";	}
	else
	{  

	echo"<div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>social_twitter_fill</i><a href='t.php' target='_blank' class='button button-fill button-raised'  >Tribe Not Connected</a></p>
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
		
	
     <!-- Path to Framework7 Library JS-->
		<script type="text/javascript" src="js/framework7.min.js"></script>
		<!-- Path to your app js-->
		<script type="text/javascript" src="js/my-app.js"></script>
</body>
</html>
