<?php ob_start();
 session_start();
 ?>
<?php  
				error_reporting(0);
				$username = $_POST['username'];
       $name = $_POST['name'];
       $id = $_POST['id'];
		$secret = $_POST['token'];
  if($_POST['username']!="" && $_POST['password']!="" ){

	  include 'connect.php';

  echo"$id";
       $email = strtolower($_POST['email']);
	   $image = strtolower($_POST['image']);
	   				  $timestamp = time();
   $client= getenv('HTTP_USER_AGENT');  //will output what web browser is currently viewing the page
//	$REMOTE_ADDR 
	   $ip = $_SERVER['REMOTE_ADDR'];
	   
      $queryaw = "SELECT username 
                            FROM users 
                            WHERE facebook_id='$id'
                            ";
							$query=mysqli_query($conn, $queryaw) ;
      mysqli_close($conn);
      if(!(mysqli_num_rows($query)>=1)){        
          $password = md5($_POST['password']);
          include 'connect.php';
        $user="INSERT INTO users(facebook_id,username,name,avatar,avatarpro,email,timestamp, password,oauth_token) 
                       VALUES ('$id','$username','$name','$image','$image','$email', '$timestamp', '$password','$secret')
                      ";
mysqli_query($conn, $user);
    $queryyq = "SELECT id,password,img
                          FROM users 
                          WHERE facebook_id='$id'  ";
		
						$queryy=mysqli_query($conn, $queryyq) ; 
    mysqli_close($conn);
      $row = mysqli_fetch_assoc($queryy);
      $images = $row['img'] ;
       $userx = $row['id'];
	   $gwan = $userx*2000;
	    
     
	

			session_start();
				setcookie("img", "$images", time()+86400);
				setcookie("path", "$gwan", time()+3600*24*365);
   
   
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['last_active'] = time();
				$_SESSION['facebook'] = $row['facebook'];

 

			header("location: home.php?success=welcome&new=$username");
				exit;
   
      }
      else{
	  
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
	 setcookie("img", "$images", time()+86400);
	 setcookie("path", "$gwan", time()+3600*24*365);
   
    $_SESSION['user_id'] = $rows['id'];
	$_SESSION['last_active'] = time();
    $_SESSION['facebook'] = $rows['facebook'];


        header("location: login.php?success=welcome&new=$username");
        exit;
      }

  }
  else{
      $error_msg="All fields must be filled out";
  }

?>
<?php ob_end_flush();?>