<?php ob_start(); ?>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>


    <?php		include"sessions.php"; 
				$ss= $_GET[hashtag];
			//	echo"<p>$look</p>";
		
				?>
		

   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>#<?php echo "$ss"; ?></title>
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
      <div class="center"><?php if($ss){
		  
		echo"#$ss";  
	  }
	  
	  ?></div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
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
     <div class="toolbar-inner"><a href="#tab1" class="active tab-link">Top</a><a href="hashtaglate.php?hashtag=<?php echo"$ss"; ?>" class="tab-link">Latest</a>
	
	</div>
  </div>
						<div class="page-content">

		
							 	        <?php
				
				$next= $_GET['more'];
				$nxt= $_GET['nxt'];
				
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

	if($_GET['hashtag']!=""){
	$hashtag = $_GET['hashtag'];
		include "connect.php";
		
		if($_GET['recent'])
		 {
		
				 
							 
					$queryxc = "SELECT id,post,user_id,timestamp,comments,views,likes,image,type,user2_id,tribe_id,role,op,repuser,value1link,value2link,post_id
                              FROM posts
                       WHERE post LIKE '%#$hashtag%'
		ORDER BY views DESC
		LIMIT  30
                             ";
							 	 	 $query=mysqli_query($conn, $queryxc);
		mysqli_close($conn);

							 
							 
					}else{
		$queryxc = "SELECT id,post,user_id,timestamp,comments,views,likes,image,type,user2_id,tribe_id,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,post_id
          FROM posts
                       WHERE post LIKE '%#$hashtag%'
		ORDER BY views DESC
		LIMIT  30
                             ";
							 $query=mysqli_query($conn, $queryxc);
			mysqli_close($conn);		}
					
		
		
		if(mysqli_num_rows($query)>0){
		while ($row = mysqli_fetch_array($query)) {
		$content = $row['post'];
		$id = $row['id'];
        $uid= $row['user_id'];
		$views = $row['views'];
		$likes = $row['likes'];
		$comments = $row['comments'];
		$imagess = $row['image'];
		$type = $row['type'];
		$userwhoid = $row['user2_id'];
		$tribed = $row['tribe_id'];
		$role= $row['role'];
		$realp= $row['op'];
		$repo= $row['repuser'];
		$value1= $row['value1'];
		$value2= $row['value2'];
		$value1a= $row['value1a'];
		$value2a= $row['value2a'];
		$roles= $row['roles'];
		$t_time = $row['timestamp'];
		$value1link= $row['value1link'];
		$value2link= $row['value2link'];
		$post_id = $row['post_id'];
		include "connect.php";
		  $queryxcs = "SELECT avatar,id,username,name,pbackcolor,stats FROM users WHERE id='$uid' 
				"; 
				 $cool=mysqli_query($conn, $queryxcs);
				while ($wow = mysqli_fetch_assoc($cool)) {
				$image = $wow['avatar'];
				$name = $wow['name'];
				$username = $wow['username'];
				$postcolor=$wow['pbackcolor'];
				$stats=$wow['stats'];
				
                                                          }		
	                       	mysqli_close($conn);		
							//Get User Info Of The Recepient
if($userwhoid)
{				include "connect.php";
		  $queryxcsw ="SELECT avatar,id,username,name FROM users WHERE id='$userwhoid' 
				"; 
				$cools=mysqli_query($conn, $queryxcsw);
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
		  $queryxcsw = "SELECT avatar,id,name FROM tribes WHERE id='$tribed' 
				"; 
					$cools=mysqli_query($conn, $queryxcsw);
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
		   else{
		echo "
				<div class='social_networks'>
		 
       
   	<ul><li><a href='index.php' class='facebook'><i></i><span>No   posts were found with #$hashtag</span><div class='clear'></div></a></li></ul>
			</div>	
			";
	}



		   } else{
	echo "
		<div class='social_networks'>
		 
       
   	<ul><li><a href='index.php' class='googleplus'><i></i><span>Sorry, invalid search!</span><div class='clear'></div></a></li></ul>
			</div>	
	";
}
	   ?>  	
						
  

   					
	  
       		
 
   
	  
	  
      
    </div>	

       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		
		

    </body>
</html>
