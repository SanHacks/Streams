<!DOCTYPE html><?php ob_start(); ?>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>
<?php
 if(!$user_id){
   header("location: index.php");
  exit;
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
    <body>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
													<div class="page "  <?php echo"style='background-color:$backgroundc;'"; ?>>
					   

 <div class="navbar" style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
	} 
 
 ?>">
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
      <div class="center">Following</div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  
  		<?php include"side.php"; ?>				
		
	

						<div class="page-content">

							
		<?php
				$ss= $_GET[success];
				$next= $_GET[more];
				$nextt= $_GET[moref];
			//	echo"<p>$look</p>";
		
				?> 
    <?php
				$ss= $_GET[search];
			//	echo"<p>$look</p>";
		
				?>
	  <?php 



	if($user_id){
		include "connect.php";
		
		$sql ="SELECT username,avatar,name,aboutme,hometown,followers,following
                              FROM users 
                              WHERE id='$user_id'
                             ";
 	 $querty=mysqli_query($conn, $sql);

		$rotw = mysqli_fetch_assoc($querty);
		//This one describes itself
        $hometown = $rotw['hometown'];
        $aab = $rotw['aboutme'];
		
		$sqls = "SELECT username,avatar,name,aboutme,hometown,id,auth
                              FROM users WHERE hometown LIKE'%$hometown%' 
                             ORDER BY id ASC LIMIT 15
                             ";
			 $query=mysqli_query($conn, $sqls);				 
		mysqli_close($conn);
		while ($row = mysqli_fetch_array($query)) {
		$username = $row['username'];
		$image = $row['avatar'];
		$name = $row['name'];
		$about = $row['aboutme'];
		$hometown = $row['hometown'];
		$id = $row['id'];
                    $auth = $row['auth'];
			


	  if($user_id!=$id){
   include 'connect.php';
					$dds ="SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$id'
										  ";
										  $query2=mysqli_query($conn, $dds); 
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
					
					}
					else{
					
					
 echo " 
 
 
 
 <div class='list-block media-list'>
      <ul>
        <li><a href='userprofile.php?username=$username'  class='item-link item-content'>
            <div class='item-media'><img src='$image' width='80'/></div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>$name</div>
                <div class='item-after'>	
				
				


";
	     	if($auth==1){
						
						echo "<i class='icon material-icons'>verified_user</i>";
						
					}
					else{
						
						echo "  ";
					}
    
			if($user_id){
				if($user_id!=$id){			include 'connect.php';
			$xx = "SELECT id
								   FROM following 
								   WHERE user1_id='$id' AND user2_id='$user_id'
								  ";
								  $query3=mysqli_query($conn, $xx); 
			mysqli_close($conn);
			if(mysqli_num_rows($query3)>=1){
				echo "  <p style='color:gold'>• Subscribed You •</p>";
				}
				}
			}
					if($user_id){
				if($user_id!=$id){
				
					if(mysqli_num_rows($query2)>=1){
						echo "<span><a href='unfollow.php?userid=$id&username=$username&ref=4&name=$look' class='button button-fill button-raised' style='background-color:teal'>Following</a></br></span>";
					}
					else{
						echo "<span><a href='follow.php?userid=$id&username=$username&ref=4&name=$id' class='button button-fill button-raised' style='background-color:teal'>Follow</a></br></span>";
					}
				}
			}
			echo"</div>
            </div></a></li></ul>
			</div>";
       		
           }



	}  } 
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
