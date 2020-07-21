<?php ob_start(); ?>
<?php include"sessions.php"; 
$path =$_COOKIE['path'];
?>
<?php
	//$ip = $_SERVER['REMOTE_ADDR'];	
	//$client= getenv('HTTP_USER_AGENT');
		//	 if(!$user_id){
	//if($ip){
	//include "connect.php";
	// $userc="INSERT INTO ip(ip,cc) 
    //                   VALUES ( '$ip','$client')
            //          ";
		//mysqli_query($conn, $userc);
		//	mysqli_close($conn);
			//}
						//}
	if($_POST['login']){
		if($_POST['username']!="" && $_POST['password']!=""){
  


  
   function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_escape_string($str);
	}
    $usernamew = $_POST['username'];


    include "connect.php";
    $gotos = "SELECT id,password,img
                          FROM users 
                          WHERE username='$usernamew'
                          ";
		$query=mysqli_query($conn, $gotos);
						 
    mysqli_close($conn);
    if(mysqli_num_rows($query)>=1){
      $password = md5($_POST['password']);
      $rows = mysqli_fetch_assoc($query);
	     
 
	  
      if($password==$rows['password']){
	    $timestamp = time();
       $images = $rows['img'] ;
       $user = $rows['id'];
	   
	    $gwan = $user*2000;
	   
	   
       $fingerprint = $rows['facebook'];
     
	

	   session_start();
	 setcookie("img", "$images", time()+86400);
	 setcookie("path", "$gwan", time()+3600*24*365);
   
    $_SESSION['user_id'] = $rows['id'];
	$_SESSION['last_active'] = time();
    $_SESSION['facebook'] = $rows['facebook'];

  
   
        header("location: home.php");
        exit;
      }
      else{
        $error_msg = "Incorrect username or password";
      }
    }
				else{
      $error_msg = "Account with the username does not exist ";
					}
															}
	else{
    $error_msg = "All fields must be filled out";
		}
						}
?> 				<?php
		if($path){
		 session_start();
		 
		 $ui  =round( $path / 2000 );
	    
		
	   $_SESSION['user_id'] = $ui;
	   
		header("location: home.php");
		exit;
				}
			?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta name="theme-color" content="#2196f3">
  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
  <title>IntelliFeed</title>
  <link rel="stylesheet" href="css/framework7.material.min.css">
  <link rel="stylesheet" href="css/my-app.css">
  <link rel="apple-touch-icon" href="img/f7-icon-square.png">
  <link rel="icon" href="img/f7-icon.png">
	<link rel=icon type=image/png href=favicon-32x32.png sizes=32x32>
	<link rel=icon type=image/png href=favicon-16x16.png sizes=16x16>
	<link rel=manifest href=manifest.json>
</head>
    <body>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index">
						<div class="navbar" style="background-color:#0c56ac"
						>
							<div class="navbar-inner">
								<div class="center" >IntelliFeed</div>
							</div>						
						</div>									
												
						<div class="page-content">
	
				<p>IntelliFeed Will Cut The Barrier Consume More At Once.</p>
						
							<div class="list-block media-list">
							  <ul>
													<li >
															   <div 		class="content-block">
      <p class="buttons-row"><i class="icon f7-icons">person_fill</i> <a href="login.php" class="button button-fill button-raised" style="background-color:blue" >Login to your account</a></p>
    </div>	
								</li>
							
													<li>
										   <div class="content-block">
      <p class="buttons-row"><i class="icon f7-icons">person</i><a href="join.php" class="button button-fill button-raised" style="background-color:teal" >Join IntelliFeed</a></p>
    </div>
								</li>		
							  </ul>
							</div>
			<!---				   <div class="content-block">
      <p class="buttons-row"><i class="icon f7-icons">social_twitter_fill</i><a href="t.php" class="button button-fill button-raised"  >Twitter sign in</a></p>
    </div>
	   <div class="content-block">
      <p class="buttons-row"><i class="icon f7-icons">social_facebook_fill</i><a href="f.php" class="button button-fill  button-raised" style="background-color:#1a4e95">Facebook Sign in</a></p>
    </div>
	
	---->
							
							
									    <div data-pagination=".swiper-pagination" data-paginationHide="true" class="swiper-container swiper-init ks-demo-slider">
      <div class="swiper-pagination"></div>
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img height='100%' width='100%' src='android-chrome-512x512.png'/> </div>
        <div class="swiper-slide"><img  height='100%' width='100%' src='smash.png'/></div>
        <div class="swiper-slide"><img  height='100%' width='100%' src='flex.png'/></div>
        <div class="swiper-slide"><img height='100%' width='100%' 
		src='publish.png'/></div>
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