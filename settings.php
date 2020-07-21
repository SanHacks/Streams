<?php ob_start(); 
?>
<?php include"sessions.php"; 
		$page="allowed";

?>
	<?php
	if(!$user_id){
	header("location: index.php");
	exit;
				}
		
 	if($user_id){
		include "connect.php";
		$queryh = "SELECT id,username,avatar,background,name,aboutme,hometown,followers,following,auth,facebook,pbackcolor,backcolor,stats,bback,posts,avatarpro,twitter,img
                              FROM users 
                              WHERE id='$user_id'
                             ";
						 $query=mysqli_query($conn, $queryh);		 
							 
		mysqli_close($conn);
		$row = mysqli_fetch_assoc($query);
		//This one describes itself
		$username = $row['username'];
		$uid = $row['id'];
		$image = $row['avatar'];
		$imagepro = $row['avatarpro'];
		$back = $row['background'];
		$name = $row['name'];
		$about = $row['aboutme'];
		$followers = $row['followers'];
		$following = $row['following'];
        $hometown = $row['hometown'];
        $facebook = $row['facebook'];
        $auth = $row['auth'];
		$twitter=$row['twitter'];
		$postcolor=$row['pbackcolor'];
		$backgroundc=$row['backcolor'];
		$stats=$row['stats'];
		$bback=$row['bback'];
		$posts=$row['posts'];
				}
						  if($user_id){
  		include "connect.php";
		$birth ="SELECT id,user_id,bday,bmonth,byear,state,zodiac
                              FROM birthinfo 
                              WHERE user_id='$user_id'
                             ";
							 							$getbinfo=mysqli_query($conn, $birth);
		mysqli_close($conn);
		$rowq = mysqli_fetch_array($getbinfo);
		$byear = $rowq['byear'];
		$bday = $rowq['bday'];
		$bmonth = $rowq['bmonth'];
		$pri = $rowq['state'];
		$sign = $rowq['zodiac'];
		}
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
    <body <?php echo"style='background-color:$backgroundc;'"; ?>>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index" <?php echo"style='background-color:$backgroundc;'"; ?> >
   <div class="navbar " style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
	} 
 
 ?>" >
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
      <div class="center"><?php echo"$name"; ?></div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  		<?php include"sidemenu.php"; ?>				
		
	
						<div class="page-content">

						
	  <?php
	  	  echo"  <div class='card' style='background-image:url($back)' >
      <div class='card-content'>
        <div class='ks-grid'>
		  <div class='row no-gutter'>
          <div class='col-33'></div>
          <div class='col-33'><img src='$image' width='100%'/>
		  </div>
          <div class='col-33'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>";
		  
		  	if($auth==1){
						
						echo "		
		  <i class='icon material-icons'>verified_user</i></div>
         ";
						
					}
					else{
						
						echo "  ";
					}
			
		echo"
		 <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		</div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>$name</div>
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'><i class='icon material-icons'>account_box</i>@$username</div>
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>";
		   if($hometown){
					  echo"
		  <i class='icon material-icons'>location_on</i>$hometown
		  ";}else{
						  echo "<a href='about-settings.php' <p>Where do you stay?</p></a>";
							}
		  
		  echo"
		  </div>
		  
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>";
			if($bday){
								if($pri==1){
								
					echo "<p style='color:black';>$bday ";
					if ($bmonth== '1') { echo ' January'; } 
					if ($bmonth== '2') { echo ' February'; } 
					 if ($bmonth== '3') { echo ' March'; }
				 if ($bmonth== '4') { echo ' April'; } 
					 if ($bmonth== '5') { echo ' May'; } 
					if ($bmonth== '6') { echo ' June'; } 
					 if ($bmonth== '7') { echo ' July'; } 
					 if ($bmonth== '8') { echo ' August'; } 
					 if ($bmonth== '9') { echo ' September'; } 
					 if ($bmonth== '10') { echo ' October'; } 
					 if ($bmonth== '11') { echo ' November'; } 
				    if ($bmonth== '12') { echo ' December'; } 
              echo " $byear</p><a href='zodiac.php?search=$sign'>";
			 
			  if($sign=="Aries"){
			  echo"<h2>♈";
			  }elseif($sign=="Taurus"){
			  echo"<h2>♉ ";
			   }elseif($sign=="Gemini"){
			   
			    echo"<h2>♊</h2>";
			   
			    }elseif($sign=="Cancer"){
				
				 echo"<h2>♋";
				 }elseif($sign=="Leo"){
				  echo"<h2>♌";
				 
				  }elseif($sign=="Virgo"){
				   echo"<h2>♍";
				  
				   }elseif($sign=="Libra"){
				   echo"<h2>♎";
				   }elseif($sign=="Scorpio"){
				   echo"<h2>♏";
				   
				   }elseif($sign=="SAGITTARIUS"){
				   echo"<h2>♐";
				   
				   }elseif($sign=="Capricorn"){
				   echo"<h2>♑ ";
				   
				   }elseif($sign=="Aquarius"){
				   echo"<h2>♒";
				   }elseif($sign=="Pisces"){
				   echo"<h2>♓";
				   }
				   
				   
				   
			  
			   echo" $sign</h2></a>";
								
										 }
						}else{
						  echo "<a href='about-settings.php' <p>Enter Birth Info</p></a>";
						}
		
		if($about){
					echo "<p style='color:silver,align:center';> $about </p>";
								}else{
						  echo "<a href='about-settings.php' <p>Enter A Short Bio About You</p></a>";
							}
		
		echo"
		</div>
		
		
		
	
       

		
		
		
		
		
		
		
		
		
		
		
		
		
	

	
    </div>
	";
		
		 echo" 
	  <div class='list-block accordion-list'>
      <ul>
	    <li> 
	  	<a href='about-settings.php' >	  <p class='buttons-row'> <p class='button button-fill'  style='background-color:$well'>  <i class='icon f7-icons'>person</i>About me
			  </p></a>
			  
	  </li>
        <li class='accordion-item'><a href='#' class='item-link item-content'>
       			  <p class='buttons-row'><i class='icon f7-icons'>linked_camera</i> <p class='button button-fill'  style='background-color:$well'> Change profile picture
			  </p>
			  </p>
			 </a>
          <div class='accordion-item-content'>
            <div class='content-block'>
                 <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>"; ?>
       <form enctype="multipart/form-data" id="form04" method="post" action="profilepicture.php">
						
					
		 				
							<p class="attach">Source:</p>
						
  <p>  <input name="file" type="file" id="file" size="20"> 
  </p> <br />              
					
					<p id="but"><br />
						 
							
					
							 <p class='buttons-row'> <input class='link  button button-fill' value='Save'   type='submit' name='submit'  style='background-color:teal'>
							 
							 		<input class='link  button button-fill' value="Clear" type="reset" /></p>
							 </p>
	  </form>
       <?php echo"</div>
	</div>
	</div>
            </div>
          </div>
        </li>
  
      </ul>
    </div>";
		 echo" 
	  <div class='list-block accordion-list'>
      <ul>
        <li class='accordion-item'><a href='#' class='item-link item-content'>
			  <p class='buttons-row'> <i class='icon f7-icons'>camera_enhance</i><p class='button button-fill'  style='background-color:$well'> Change background picture
			  </p>
			  </p>
			 </a>
          <div class='accordion-item-content'>
            <div class='content-block'>
                 <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>"; ?>
       <form enctype="multipart/form-data" id="form05" method="post" action="profilebackground.php">
						
					
		 				
							<p class="attach">Source:</p>
						
  <p>  <input name="file" type="file" id="file" size="20"> 
  </p> <br />              
					
					<p id="but"><br />
						 
							
					
							 <p class='buttons-row'> <input class='link  button button-fill' value='Save'   type='submit' name='submit'  style='background-color:teal'>
							 
							 		<input class='link  button button-fill' value="Clear" type="reset" /></p>
							 </p>
	  </form>
       <?php echo"</div>
	</div>
	</div>
            </div>
          </div>
        </li>
  
      </ul>
    </div>";
	  	 echo" 
	  <div class='list-block accordion-list'>
      <ul>
        <li class='accordion-item'><a href='#' class='item-link item-content'>
          
			 
			  <p class='buttons-row'> <i class='icon f7-icons'>network_locked</i><p class='button button-fill'  style='background-color:$well'> Data saver
			  </p>
			  </p>
			 </a>
          <div class='accordion-item-content'>
            <div class='content-block'>
			
                 <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>";
		 
		 				if($imgs==1){
							echo "<p class='buttons-row'><a href='undo-img.php' class='button button-fill button-raised' style='background-color:teal' >Turn Off Images(on newsfeed)</a></p>";

															}
							if($imgs==0){
							
							echo "<p class='buttons-row'><a href='img.php' class='button button-fill button-raised' style='background-color:teal' >Turn On Images(on newsfeed)</a></p>"; 
							
											}
				
		 
		 
	   
	   
	   echo"
	   
	   
        </div>
	
	
	</div>
	</div>
	
	
	
	
	
	
            </div>
          </div>
        </li>

      </ul>
    </div>
	  <div class='list-block accordion-list'>
      <ul>
	  
  
	    <li> 
	  		<a href='themes.php' >	  <p class='buttons-row'> <p class='button button-fill'  style='background-color:$well'>  <i class='icon f7-icons'>layers</i>Themes
			  </p></a>
			  
	  </li>
	    <li> 
	  		 	<a href='passwords.php' > <p class='buttons-row'><p class='button button-fill'  style='background-color:$well'> <i class='icon f7-icons'>lock</i> Privacy & passwords
			  </p></a>
			  
	  </li>

  
      </ul>
    </div>
	

	
	";
	
		
	  
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
