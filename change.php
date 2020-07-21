<?php ob_start(); ?>
<?php include"sessions.php"; 
$path =$_COOKIE['path'];
$new =$_GET['new'];
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


  


  
   function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_escape_string($str);
	}
    $usernamew = $_POST['username'];
		$keypass= $_GET['code'];

    include "connect.php";
    $gotos = "SELECT id,password,img,backcolor,stats,pbackcolor,passkey
                          FROM users 
                          WHERE passkey='$keypass'
                          ";
		$query=mysqli_query($conn, $gotos);
						 
    mysqli_close($conn);
    if(mysqli_num_rows($query)>=1){
      $password = md5($_POST['password']);
      $rows = mysqli_fetch_assoc($query);
	     
		
	  
      if($keypass==$rows['passkey']){
	    $timestamp = time();
       $images = $rows['img'] ;
       $user = $rows['id'];
	   $color = $rows['backcolor'];
	   $post = $rows['pbackcolor'];
	   $menu = $rows['stats'];
	    $gwan = $user*2000;
	   
	   
       $fingerprint = $rows['facebook'];
     
	

	   session_start();
	 setcookie("img", "$images", time()+86400);
	 setcookie("path", "$gwan", time()+3600*24*365); 
	  setcookie("backcolor", "$color", time()+86400);
	  setcookie("menu", "$menu", time()+86400*30);
	  setcookie("postcolor", "$post", time()+886400);
	  
    $_SESSION['user_id'] = $rows['id'];
	$_SESSION['last_active'] = time();
    $_SESSION['facebook'] = $rows['facebook'];

  
   
        header("location: changepass.php");
        exit;
      }
      else{
        $error_msg = "Incorrect username or password";
      }
    }
				else{
      $error_msg = "Account with the username does not exist ";
					}
														
						
?> 				<?php
		if($path){
		 session_start();
		 
		 $ui  =round( $path / 2000 );
	    
		
	   $_SESSION['user_id'] = $ui;
	   
		header("location: changepass.php");
		exit;
				}
			?>

	<?php
		if($path){
		 session_start();
		 
		 $ui  =round( $path / 2000 );
	    
		
	   $_SESSION['user_id'] = $ui;
	   
		header("location: change.php");
		exit;
				}
			?>
