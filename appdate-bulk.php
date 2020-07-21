<?php ob_start(); ?>
<?php include"sessions.php"; 
$path =$_COOKIE['path'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>IntelliFeed</title>
		 <!-- Path to Framework7 Library CSS-->
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
	  	 <?php
if(!$user_id){
		header (" location:index.php");
exit();
}
//I Try To Comment on my code but time ...

	?>
	  " class="back link icon-only"><i class="icon icon-back"></i></a></div>
      <div class="center">Publish photo</div>
    </div>
  </div>
  
  	
	

						<div class="page-content">

<?php

				if($user_id){
		include "connect.php";
		$gotos = "SELECT username,avatar,name,username,hometown
                              FROM users 
                              WHERE id='$user_id'
                             ";
							 	 $goto=mysqli_query($conn, $gotos);
		mysqli_close($conn);
		$rows= mysqli_fetch_assoc($goto);
		$usernames = $rows['username'];
		$imagess = $rows['avatar'];
		$names = $rows['name'];
		$location = $rows['hometown'];

		echo"				

       		  <form enctype='multipart/form-data' id='demoform-1' class='store-data list-block' role='form' action='storyupload.php' method='POST'>
      <ul>
        <li>
       
		            <div class='item-content'>
            <div class='item-media'><i class='icon f7-icons'>camera_fill</i></div>
            <div class='item-inner'> 
              <div class='item-title label'>Publish...</div>
              <div class='item-input'>
			  <input type='hidden' name='post_id' value='$look'>
           <input type='hidden' name='location' value='$location'>
			  <input type='hidden' name='story' value='Story'
                <textarea rows='8' cols='30'  placeholder='Let them know...' name='content'></textarea>
				     <p>  <input name='file' type='file' id='file' size='24'> </br>
  </p></br>
  			     <p>  <input name='files' type='file' id='files' size='24'></br> 
  </p></br>
  			     <p>  <input name='file3' type='file' id='file3' size='24'> </br>
  </p></br>
              </div>
            </div>
          </div>
        </li>
        
          <li>
		  

        </li>
      </ul>
		     <div class='ks-grid'>
			    <div class='col-20'>#Stamp<i class='icon f7-icons'>tags_fill</i>
  <label class='form-checkbox'>
                  <input type='checkbox' name='tag'   /><i></i>
                </label></div>
      <div class='content-block'>
	     <div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'><i class='icon f7-icons'>social_twitter_fill</i>
		   <label class='form-checkbox'>
                  <input type='checkbox' name='twitter' value'twitter' /><i></i>
                </label></div>
          <div class='col-20'></div>
          <div class='col-20'><i class='icon f7-icons'>social_facebook_fill</i>
  <label class='form-checkbox'>
                  <input type='checkbox'/><i></i>
                </label></div>
          <div class='col-20'></div>
        </div>
	</div>
	</div>
	      <div class='content-block'>";
		 		$strings = ",";
		$u = array('gold','teal', 'blue','#0c56ac');

		$well = $u[rand(0,4)];

    echo" <p class='buttons-row'>	<input type='submit' class='button button-fill ' name='submit' value='Publish' style='background-color:$well' ></p>";
	  
	   echo"
    </div>
    </form>";
				}
   			
?>			
	 
 
   
	  
	  
      </div>
    </div>	

       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		
		

	
    


</body>
</html>