<?php 

include "sessions.php";

	if($_GET[username]){
		include 'connect.php';
		$username =$_GET[username];
	
		}
			
		 if(!$username){
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
  
    </div>
	  
	";
	?>
	

          			<?php 

					

	if($username){
		
		echo"
         <a class='twitter-timeline' href='https://twitter.com/$username'></a> <script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>";	}

     

	   ?>
	   </div>
    
      <div id="tab2" class="page-content tab">
        <div class="content-block">
		
		<?php
		
		  ?>
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
