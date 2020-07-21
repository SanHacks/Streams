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
    <body >
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index"  <?php echo"style='background-color:$backgroundc;'"; ?>>
   <div class="navbar " <?php echo"style='background-color:$tabs;'"; ?> >
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
      <div class="center"><?php echo"Tribes"; ?></div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  		<?php include"side.php"; ?>				
		
	
						<div class="page-content">
 		<?php	if($user_id){	  						    echo "  
			<div class='content-block'>
      <p class='buttons-row'><i class='icon f7-icons'>social_twitter_fill</i><a href='t.php'  class='button button-fill button-raised'  >Create Tribe</a></p>
			</div>
									";			
 } ?>
 <?php   if($user_id){
		include "connect.php";
		

	
		$queryas = "SELECT avatar,name,about,views,comments,auth,members,id
                              FROM tribes Order by Views DESC Limit 12 
                             ";
							  $query=mysqli_query($conn, $queryas);
		
		while ($row = mysqli_fetch_assoc ($query)) {
		
		$image = $row['avatar'];
		$name = $row['name'];
		$about = $row['about'];
		$hometown = $row['hometown'];
		$id = $row['id'];
                    $auth = $row['auth'];

echo"    <div class='list-block'>
      <ul>
        <li><a href='tribe.php?tribe=$id&name=$name'  class='item-link item-content'>
    
			
		                   <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>
         <div class='col-20'></div>
      <div class='col-20'>
		</div>
       <div class='col-20'>
		<img src='$image' width='95'/></div>
      <div class='col-20'>
	   </div>
       <div class='col-20'>
	   </div>
        </div>
	</div>
	</div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>$name</div>";
				
				if($user_id){
		
					include 'connect.php';
					$querym = "SELECT user_id
										   FROM tribemems 
										   WHERE user_id='$user_id' AND tribe_id='$id'
										  ";
									$query2=mysqli_query($conn, $querym);
			  
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
						echo "  <p style='color:gold'>• You're a member •</p>";
					}
					
			}
			
			echo"
                <div class='item-after'>	";
				if($auth==1){
						
						echo " <i class='icon material-icons'>verified_user</i>";
						
					}
					else{
						
						echo "  ";
					}
					//echo"@$usernameR";
					
				echo"</div>
              </div>
              <div class='item-subtitle'></div>
			  ";

			
			
			echo"
              <div class='item-text'>	";
			  
			  
			
			
				if($user_id){                                                                                                                                                                                                                                           
			
					
						echo "<span><a href='tribe.php?tribe=$comment_user&name=$usernameR' class='button button-fill button-raised' style='background-color:teal'>Join</a></br></span>";
					}
				
			echo"</div>
            </div></a></li></ul>
			</div>";
       		}

           }
		   
		   
		?>
	
	
	
	  
 <!--- <div class="content-block">
      <p class="buttons-row"><i class="icon f7-icons">social_googleplus</i><a href="google.php" class="button button-fill  button-raised" style="background-color:#1a4e95">Google+ Connect</a></p>
    </div>
	  <div class="content-block">
      <p class="buttons-row"><i class="icon f7-icons">social_linkedin_fill</i><a href="inked.php" class="button button-fill  button-raised" style="background-color:#1a4e95">LinkedIn Connect</a></p>
    </div> -->

      </div>
    </div>	

       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
</body>
</html>
