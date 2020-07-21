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

		
		echo"<div class='center'>Change province</div>";
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
		
			$use = $_GET[id];
  
		include "connect.php";
		$yi = "SELECT id,province,city
                              FROM location_pro Where location_id = '$use' ORDER BY province ASC Limit 20

                             ";
		$query=mysqli_query($conn, $yi);
					
		mysqli_close($conn);
	
		
		while ($row = mysqli_fetch_array($query)) {
		$content = $row['city'];
		$province = $row['province'];
		$id = $row['id'];
	
		


				 


		echo
	
	"
	<li>
            <div class='item-content'>
              <div class='item-inner'>
           <a href='pro-subscriber.php?location=$province>      <div class='item-title'>$province </div></a>
		   <a href='trends_city.php?id=$id'>more</a>
              </div>
            </div>
          </li>";
		
           }
		
	
		
		
	
		
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
