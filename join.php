<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>IntelliFeed</title>
		 <!-- Path to Framework7 Library CSS-->
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/framework7.material.min.css">
		<link rel="stylesheet" href="css/framework7.material.colors.min.css">
		<!-- Path to your custom app styles-->
		<link rel="stylesheet" href="css/my-app.css">	
		<SCRIPT type="text/javascript">

pic1 = new Image(16, 16); 
pic1.src = "loader.gif";

$(document).ready(function(){

$("#username").change(function() { 

var usr = $("#username").val();

if(usr.length >= 3)
{
$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

    $.ajax({  
    type: "POST",  
    url: "check.php",  
    data: "username="+ usr,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#username").removeClass('object_error'); 
		$("#username").addClass("object_ok");
		$(this).html('&nbsp;<i class='icon material-icons'>beenhere</i>');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); 
		$("#username").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#status").html('<font color="red">The username should have at least <strong>3</strong> characters.</font>');
	$("#username").removeClass('object_ok'); 
	$("#username").addClass("object_error");
	}

});

});

//-->
</SCRIPT>
    </head>
    <body>
		
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
      <div class="center">Join Intellifeed</div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>									
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
	 setcookie("img", "$images", time()+86400);
	 setcookie("path", "$gwan", time()+3600*24*365);
   
    $_SESSION['user_id'] = $rows['id'];
	$_SESSION['last_active'] = time();
    $_SESSION['facebook'] = $rows['facebook'];

 

        header("location: settings.php?success=welcome");
        exit;
   
      }
      else{
        $error_msg="Username already taken !";
      }

  }
  else{
      $error_msg="All fields must be filled out";
  }
}
?>					
						<div class="page-content">
			<?php											 if($error_msg){
       
   	echo "
		<div class='list-block media-list'>
							  <ul>
					
							
													<li>
										   <div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>paper</i><a href='#' class='button button-fill button-raised' style='background-color:teal' >$error_msg<a></p>
    </div>
								</li>		
							  </ul>
							</div>	
	
	";	} ?>
						<?php include"signup-form.php"; ?>
	 <div class="content-block">
      <p class="buttons-row"><i class="icon f7-icons">social_facebook_fill</i><a href="f.php" class="button button-fill  button-raised" style="background-color:#1a4e95">Facebook Connect</a></p>
    </div>
					
						</div>								
					</div>								
				</div>					
			</div>
		</div>
		
		

    </body>
</html>