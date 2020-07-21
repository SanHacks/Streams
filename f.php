
<?php error_reporting(1); 
	/*
		Author: Belal Khan
		www.simplifiedcoding.net
	*/
	define('APP_ID', '2665141190391435');
	define('APP_SECRET', 'ad8969657f9e815e962da1a4753ead14');
	define('REDIRECT_URL','http://feed.audiogrid.xyz/f.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>IntelliFeed</title>
		 <!-- Path to Framework7 Library CSS-->

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
 <div class="navbar" style="background-color:#0c56ac">
    <div class="navbar-inner">
  
    
      <div class="left"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
	    <div class="center">IntelliFeed</div>
    </div>
  </div>
  
			
		
	

						<div class="page-content">
						
<?php
	/*
		Author: Belal Khan
		website: www.simplifiedcoding.net
	*/

	//INCLUDING LIBRARIES 
	require_once('lib/Facebook/FacebookSession.php');
	require_once('lib/Facebook/FacebookRequest.php');
	require_once('lib/Facebook/FacebookResponse.php');
	require_once('lib/Facebook/FacebookSDKException.php');
	require_once('lib/Facebook/FacebookRequestException.php');
	require_once('lib/Facebook/FacebookRedirectLoginHelper.php');
	require_once('lib/Facebook/FacebookAuthorizationException.php');
	require_once('lib/Facebook/FacebookAuthorizationException.php');
	require_once('lib/Facebook/GraphObject.php');
	require_once('lib/Facebook/GraphUser.php');
	require_once('lib/Facebook/GraphSessionInfo.php');
	require_once('lib/Facebook/Entities/AccessToken.php');
	require_once('lib/Facebook/HttpClients/FacebookCurl.php');
	require_once('lib/Facebook/HttpClients/FacebookHttpable.php');
	require_once('lib/Facebook/HttpClients/FacebookCurlHttpClient.php');

	//USING NAMESPACES
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\HttpClients\FacebookHttpable;
	use Facebook\HttpClients\FacebookCurlHttpClient;
	use Facebook\HttpClients\FacebookCurl;

	//STARTING SESSION
	session_start();



	FacebookSession::setDefaultApplication(APP_ID,APP_SECRET);

	$helper = new FacebookRedirectLoginHelper(REDIRECT_URL);

	$sess = $helper->getSessionFromRedirect();
	if(isset($sess)){
	
        //store the token in the php session
        $_SESSION['fb_token']=$sess->getToken();
        //create request object,execute and capture response
        $request = new FacebookRequest($sess,'GET','/me');
        // from response get graph object
        $response = $request->execute();
        $graph = $response->getGraphObject(GraphUser::classname());
        // use graph object methods to get user details
        $id = $graph->getId();
        $firstname = $graph->getFirstName();
        $lastname = $graph->getLastName();
        $mail = $graph->getEmail();
		$secrettoken = $sess->getToken();
		$accessToken = $sess->getToken();
        $name = $graph->getName();
        $email = $graph->getProperty('email');
        $image = 'https://graph.facebook.com/'.$id.'/picture?width=96&height=96';
        $userphoto = 'https://graph.facebook.com/'.$id.'/photos/uploaded';
        $loggedin  = true;





   if ($sess){ 
   
   if($id){
   	  include 'connect.php';
            $queryyq = "SELECT id,password,img
                          FROM users 
                          WHERE facebook_id='$id'  ";
		
						$queryy=mysqli_query($conn, $queryyq) ; 
    mysqli_close($conn);
      $row = mysqli_fetch_assoc($queryy);
      $images = $row['img'] ;
       $user = $row['id'];
	   $gwan = $user*2000;
	   
     
	

	   session_start();
	
    $_SESSION['user_id'] = $row['id'];
	$_SESSION['last_active'] = time();
    $_SESSION['facebook'] = $row['facebook'];

  setcookie("img", "$images", time()+86400);
	 setcookie("path", "$gwan", time()+3600*24*365);
   
  if($user){
        header("location: login.php?success=welcome");
        exit;
  }else{
	
	 include("fsignup-form.php"); 


	  
  }
		
   }
   

}
}else{
   
   ?><?php
	
		
		  echo"
 <div class='content-block'>

		  <p class='buttons-row'><a  href='";?><?php echo $helper->getLoginUrl();?><?php echo"'
								 class='button button-fill  button-raised link external' style='background-color:#1a4e95'
								>
								Facebook Sign in</a></p>
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
		</div>
		
		

		 <!-- Path to Framework7 Library JS-->
		<script type="text/javascript" src="js/framework7.min.js"></script>
		<!-- Path to your app js-->
		<script type="text/javascript" src="js/my-app.js"></script>		
        <script type="text/javascript" src="cordova.js"></script>
    

</body>
</html>
