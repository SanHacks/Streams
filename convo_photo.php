<?php ob_start(); ?>
<?php include"sessions.php"; 
$path =$_COOKIE['path'];



session_start();
$user_id = $_SESSION['user_id'];
?>
<?php
 if(!$user_id){
   header("location: index.php");
  exit;
  
?>
<!DOCTYPE html>
<html>
    <head>
	 <?php
 
 
 if($_GET['pid']!=""){

	$look= $_GET[pid];

		
   include "connect.php";
		$ui = "SELECT convo_id,content,message_id,timestamp,recepient,user_id,image,viewed
                              FROM convo
                          WHERE message_id = $look
                             ";
					$pinfo=mysqli_query($conn, $ui);
	mysqli_close($conn);

	if($pinfo){
	while ($stuff = mysqli_fetch_array($pinfo)) {
	
		$comment_id = $stuff['convo_id'];
		$comment = $stuff['content'];
		$message_id = $stuff['message_id'];
		$receipt = $stuff['recepient'];
		$timed = $stuff['timestamp'];
		$comment_user = $stuff['user_id'];
		$images = $stuff['image'];
		

		
		//Calls the time function
		  $when=  getTim($timed);
		  

	   	$comment = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$comment);
			
			 $comment = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$comment);
			 
			 //Get The Info Of The PERSON WHO COMMENTED ON THE POST
			 			include "connect.php";
		  $ey = "SELECT avatar,id,username,name FROM users WHERE id='$comment_user'"; 
		  $col=mysqli_query($conn, $ey);
				while ($wowW = mysqli_fetch_assoc($col)) {
				$imageR = $wowW['avatar'];
				$nameR = $wowW['name'];
				$usernameR = $wowW['username'];
				$identt = $wowW['id'];
					$tr="UPDATE messages
						 SET viewed = viewed + 1
						 WHERE id='$comment_id'
						";
						mysqli_query($conn, $tr);
						
						
						//UPDATE HOW MANY TIMES THE CONVERSATION HAS BEEN VIEWED/LOADED
			                          }	
													  
													  mysqli_close($conn);	
		
		
		
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
     <a href="home.php" style="color:#FFF"> <div class="center">IntelliFeed</div></a>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
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