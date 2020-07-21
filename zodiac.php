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
	      <?php
				$ss= $_GET[search];
			//	echo"<p>$look</p>";
		
				?>
	  " class="back link icon-only"><i class="icon icon-back"></i></a></div>
	  	  <form action='searchusers.php' method='GET'
							  data-search-in="searchusers.php" class="searchbar "  style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
	} 
 
 ?>" >
    <div class="searchbar-input">
      <input type="search" placeholder="<?php if($ss){
		  
		echo"$ss";  
	  }else{
		  
		  echo"Search";
	  }
	  
	  ?>"  name='search'/><a href="#" class="searchbar-clear"></a>
    </div>
  </form>
    
      <div class="center"></div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  		<?php
				$ss= $_GET[success];
				$next= $_GET[more];
				$nextt= $_GET[moref];
				$zodi= $_GET[zodiac];
			//	echo"<p>$look</p>";
		
				?> 
    <?php
				$ss= $_GET[search];
			//	echo"<p>$look</p>";
		
				?>
  		<?php include"side.php"; ?>				
		
	

						<div class="page-content">

							  <div class="toolbar tabbar" style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
	} 
 
 ?>">
    <div class="toolbar-inner"><a href="#tab1" class="tab-link">Zodiac</a><a href="searchusers.php?search=<?php echo"$ss"; ?>" class="tab-link">Posts</a><a href="zodiac.php?search=<?php echo"$ss"; ?>" class="tab-link">Location</a></div>
  </div>


	  <?php 



	if($user_id){
		include "connect.php";
		
		
		$sqls = "SELECT username,avatar,name,aboutme,hometown,id,auth
                              FROM users WHERE username LIKE '$%ss%' OR name LIKE '%$ss% OR zodiac LIKE '%$zodi'
                             ORDER BY id ASC LIMIT 25
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
