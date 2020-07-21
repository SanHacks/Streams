<?php ob_start(); ?>
<?php include"sessions.php"; 
$path =$_COOKIE['path'];
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
    <head>
	 <?php
 
 
		
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

		

		
						<div class="page-content">
						
		
		<div data-pagination=".swiper-pagination" data-zoom="true" data-next-button=".swiper-button-next" data-prev-button=".swiper-button-prev" class="swiper-container swiper-init ks-demo-slider">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
		
          <div class="swiper-zoom-container">
	
		  
		  
		  	  <?php
				if($_GET['avi']){

	$look= $_GET[avi];
		include "connect.php";
			include "connect.php";
						 $queee	= "SELECT id,username,name,auth,loc,pbackcolor,stats,hometown,avataro
					 FROM users WHERE id='$look' 
				";
					$query=mysqli_query($conn, $queee);  
				
				while ($wow = mysqli_fetch_assoc($query)) {
				$image = $wow['avataro'];
				$name = $wow['name'];
				$username = $wow['username'];
				$ident = $wow['id'];
				$auth = $wow['auth'];
				$loc = $wow['loc'];
				$postcolor = $wow['pbackcolor'];
				$hometown = $wow['hometown'];
				$stats = $wow['stats'];
		     $url = 'http://www.hybrd.co.za/photo.php?pid=' ;
  $via = 'hybridapp_';
  mysqli_close($conn);
   echo"
		  <img width=420 src='$image'/>";
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
  </div>

					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		

    

</body>
</html>