<!DOCTYPE html><?php ob_start(); ?>
<?php 

include"sessions.php";
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
        <title>IntelliFeed</title>
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
					<div class="page" data-page="index">
<div class="navbar " style="background-color:#0c56ac" >
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
      <div class="center">Following</div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  
  		<?php include"sidemenu.php"; ?>				
		
	

						<div class="page-content">

									<?php
				$ss= $_GET[success];
				$next= $_GET[more];
				$nextt= $_GET[moref];
			//	echo"<p>$look</p>";
		
				?> 
	  <?php 


	if($user_id){
		include "connect.php";
		
		if($nextt){
		$as = "SELECT id,user1_id,user2_id
                              FROM following WHERE user1_id='$user_id' 
                         ORDER BY id DESC LIMIT 10,22
						 

                             ";	
							$pinfo=mysqli_query($conn, $as); 
									}	elseif($next){
		$as ="SELECT id,user1_id,user2_id
                              FROM following WHERE user1_id='$user_id' 
                         ORDER BY id DESC LIMIT 10,22
						 

                             ";	
							$pinfo=mysqli_query($conn, $as); 
									}
		else{
		
		
			$as = "SELECT id,user1_id,user2_id
                              FROM following WHERE user1_id='$user_id' 
                         ORDER BY id DESC LIMIT 10
						 

                             ";
			$pinfo=mysqli_query($conn, $as); 
		}
		mysqli_close($conn);
		
		
	while ($stuff = mysqli_fetch_array($pinfo)) {
	
		$comment_id = $stuff['id'];
		$receipt = $stuff['user1_id'];
		$comment_user = $stuff['user2_id'];

			 //Get The Info Of The PERSON WHO COMMENTED ON THE POST
			 			include "connect.php";
		  $sa = "SELECT avatar,id,username,name,auth FROM users WHERE id='$comment_user' 
				";
$col=mysqli_query($conn, $sa);				
				while ($wowW = mysqli_fetch_assoc($col)) {
				$imageR = $wowW['avatar'];
				$nameR = $wowW['name'];
				$usernameR = $wowW['username'];
				$identt = $wowW['id'];
				  $auth = $wowW['auth'];
}	

	  	
	echo"    <div class='list-block media-list'>
      <ul>
        <li><a href='userprofile.php?username=$usernameR'  class='item-link item-content'>
            <div class='item-media'><img src='$imageR' width='80'/></div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>$nameR</div>";
				
			  if($user_id){
				if($user_id!=$comment_user){		
				include'connect.php';
			$xx = "SELECT id
								   FROM following 
								   WHERE user1_id='$comment_user' AND user2_id='$user_id'
								  ";
								  		  $query3=mysqli_query($conn, $xx);
			mysqli_close($conn);
			if(mysqli_num_rows($query3)>=1){
				echo "  <p style='color:gold'>• Follows You •</p>";
				}
				}
			}
			
			echo"
                <div class='item-after'>	";
				if($auth==1){
						
						echo " <i class='icon material-icons'>verified_user</i>";
						
					}
					else{
						
						echo "  ";
					}
					echo"@$usernameR";
					
				echo"</div>
              </div>
              <div class='item-subtitle'></div>
			  ";

			
			
			echo"
              <div class='item-text'>	";
			  
			  
			
			
				if($user_id){                                                                                                                                                                                                                                           
				if($user_id!=$comment_user){
					include 'connect.php';
					$dds = "SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$comment_user'
										  ";
										   $query2=mysqli_query($conn, $dds); 
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
						echo "<span><a href='unfollow.php?userid=$comment_user&username=$usernameR&ref=2' class='button button-fill button-raised' style='background-color:blue'>Following</a></br></span>";
					}
					else{
						echo "<span><a href='follow.php?userid=$comment_user&username=$usernameR' class='button button-fill button-raised' style='background-color:teal'>Follow</a></br></span>";
					}
				}
			}	
			echo"</div>
            </div></a></li></ul>
			</div>";
       		
   
   	
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
		
		

    
</body>
</html>
