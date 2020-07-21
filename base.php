					 <?php
				
				$username = $_POST['username'];
       $name = $_POST['name'];
if($_POST['btn']){
  if($_POST['username']!="" && $_POST['password']!="" ){

	  include 'connect.php';

  
       $email = strtolower($_POST['email']);
	   $image = strtolower($_POST['image']);
	   				  $timestamp = time();
   $client= getenv('HTTP_USER_AGENT');  //will output what web browser is currently viewing the page
//	$REMOTE_ADDR 
	   $ip = $_SERVER['REMOTE_ADDR'];
	   
      $queryaw = "SELECT username 
                            FROM users 
                            WHERE username='$username'
                            ";
							$query=mysqli_query($conn, $queryaw) ;
      mysqli_close($conn);
      if(!(mysqli_num_rows($query)>=1)){        
          $password = md5($_POST['password']);
          include 'connect.php';
        $user="INSERT INTO users(username,name,avatar,avatarpro,email,timestamp, password) 
                       VALUES ('$username','$name','$image','$image','$email', '$timestamp', '$password')
                      ";
mysqli_query($conn, $user);
    $queryyq = "SELECT id,password,img
                          FROM users 
                          WHERE username='$username'
                          ";
		
						$queryy=mysqli_query($conn, $queryyq) ; 
    mysqli_close($conn);
      $row = mysqli_fetch_assoc($queryy);
      $images = $row['img'] ;
       $user = $row['id'];
	   
	    $gwan = $user*2000;
	   
     
	

	   session_start();
	 setcookie("img", "1", time()+86400);
	 setcookie("path", "$gwan", time()+3600*24*365);
   
    $_SESSION['user_id'] = $rows['id'];
	$_SESSION['last_active'] = time();
    $_SESSION['facebook'] = $rows['facebook'];

 

        header("location: home.php?success=welcome");
        exit;
   
      }
      else{
        header("location: home.php?success=welcome");
        exit;
      }

  }
  else{
      header("location: home.php?success=welcome");
        exit;
  }
}
?> 