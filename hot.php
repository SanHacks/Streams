<!DOCTYPE html><?php ob_start(); ?>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>
<?php include"sessions.php"; 
		$page="allowed";

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
        <title>Hot topics</title>
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
	  		<?php	
  if($user_id){
		include "connect.php";
		$queryz = "SELECT trends FROM users
WHERE user_id='$user_id'

                             ";
							 	 
								 //	mysql_query("UPDATE posts
				//	 SET views = views + 1
				//	 WHERE id= $look  LIMIT 5
				//	");
							$gotoe ="SELECT trends,hometown
                              FROM users 
                              WHERE id='$user_id'
                             ";
							 $goto=mysqli_query($conn, $gotoe);
		mysqli_close($conn);
		$rows= mysqli_fetch_assoc($goto);
;
		$location = $rows['trends'];
		$homew = $rows['hometown'];
	
	

		
		}
		
		echo"<div class='center'>$location</div>";
		?>
		
      
	  
	  
	  
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  
  		<?php include"side.php"; ?>				
		
	

						<div class="page-content">

		
  <div class="page-content contacts-content">
    <div class="list-block contacts-block">
      <div class="list-group">
        <ul>
         
        
			<?php 

				echo" <li class='list-group-title'><i class='material-icons'>whatshot</i></li>";
		
				
				$timed= time();
				$maxtime= $timed - 172800;
		include "connect.php";
		
		$locationa ='World Wide';
		
		if($location==$locationa){
		
							$quefry = "SELECT tag, COUNT(*) AS magnitude
                              FROM tags WHERE timestamp < $timed  AND timestamp > $maxtime
                    GROUP BY tag 
				ORDER BY magnitude DESC
				LIMIT 10



                             ";
							 $query=mysqli_query($conn, $querfy);
							 }else{
							 
		
		$querfy = "SELECT tag, COUNT(*) AS magnitude 
                              FROM tags WHERE location LIKE '%$location%' AND timestamp < $timed  AND timestamp > $maxtime
                    GROUP BY tag 
					ORDER BY magnitude DESC
					LIMIT 10

 
                             ";
							  	 $query=mysqli_query($conn, $querfy);
							 }
				
					
		mysqli_close($conn);
			while ($row = mysqli_fetch_array($query)) {
		$content = $row['tag'];
		$id = $row['id'];
		$uid = $row['user_id'];
		$views = $row['views'];
		$comments = $row['comments'];
		$likes = $row['likes'];			
		


			 $content = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$content);	
				 






				 


		echo
	
	"
	<li>
            <div class='item-content'>
              <div class='item-inner'>
                <div class='item-title'>$content </div>
              </div>
            </div>
          </li>";
		
           }
		
	
		
		
		
			echo"<div class='toolbar messagebar'>
     <p class='buttons-row'><i class='icon f7-icons'>person</i><a href='trends_location.php' class='button button-fill button-raised' style='background-color:teal' >Change location</a></p>
  </div>";
		
		?>

		
		  
		  
        </ul>
      </div>
	</div>
	</div>
	  
      
       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		
		

		
    

</body>
</html>
