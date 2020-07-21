<?php ob_start(); 
?>
<?php include"sessions.php"; 
		$page="allowed";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>IntelliFeed</title>
		 
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/framework7.material.min.css">
		<link rel="stylesheet" href="css/framework7.material.colors.min.css">
		<!-- Path to your custom app styles-->
		<link rel="stylesheet" href="css/my-app.css">	
		
    </head>
    <body>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index">
						<div class="navbar theme-indigo">
							<div class="navbar-inner">
								<a href="index.php"><div class="center">IntelliFeed</div></a>
							</div>						
						</div>									
												
						<div class="page-content">
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
		  $client = md5($email);
          include 'connect.php';
        $user="INSERT INTO users(username,name,avatar,avatarpro,email,timestamp, password,client) 
                       VALUES ('$username','$name','$image','$image','$email', '$timestamp', '$password', '$client')
                      ";
					  
			
  
 $join=mysqli_query($conn, $user);

		  if($join){
					    //Email information
  $admin_email = "noreply@intellifeed.ga";
  
  $subject = "Thanks for joining IntelliFeed !";
  $comment = "This is a confirmation mail sent to $email ,You confirmation code is <a href='http://intellifeed.ga/pass.php?code=$client'><p>Press to confirm</p></a>";
  
  //send email
  mail($email, "$subject", $comment, "From:" . $admin_email);
  
	  }


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

 if(!$user_id){
	header("location: login.php");
	exit;
				}

        header("location: login.php?success=welcome");
        exit;
   
      }
      else{
        header("location: login.php?success=welcome");
        exit;
      }

  }
  else{
      header("location: login.php?success=welcome");
        exit;
  }
}
?> 
       		<?php include"signup-form.php"; ?>
	
					
						</div>								
					</div>								
				</div>					
			</div>
		</div>
		
		

    
</body>
</html>