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
				
					echo"home.php";
								 
								
								?>	
	  
	  " class="back link icon-only"><i class="icon icon-back"></i></a></div>
      <div class="center"><?php echo"@$username"; ?></div>
  
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
    <div class="toolbar-inner"><a href="#tab1" class="active tab-link"><i class="icon f7-icons">social_twitter_fill</i></a>

  <!---	<a href="#tab4" class="tab-link"><i class="icon f7-icons">social_instagram_fill</i></a> --->
	</div>
  </div>


	  <?php
	  	  echo"  <div class='card' >
  
    </div>
	
	";
	echo "  
		
	<script async src='//platform.twitter.com/widgets.js' charset='utf-8'></script>";
	?>

          			<?php 

					

		
     

	   ?>
	   
    
 
    
	<!---  <div id="tab4" class="page-content tab">
        <div class="content-block">
	 <p>This  is where instagram feed goes
        </div>
      </div> --->
	  
    
						<div class="page-content">
	<?php echo"						
<a class='twitter-timeline' href='https://twitter.com/$username'></a>
"; ?>


   					
	
       		
 
   
	  
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
