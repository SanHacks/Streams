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
