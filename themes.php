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
      <div class="center"><?php echo"$name"; ?></div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  		<?php include"side.php"; ?>				
		
	
						<div class="page-content">
    <div class="content-block-title">Choose Layout Theme</div>
    <div class="content-block">
	  
		   <div class="row">
         <a href="profileupdate-color.php?color=.." style="background-color:">   <div class="col-33">default</div></a>
           <a href="profileupdate-color.php?color=teal" style="background-color:teal"> <div class="col-33">Teal</div></a>
          <a href="profileupdate-color.php?color=black" style="background-color:black">  <div class="col-33">Black</div></a>
       
		
    </div>
	
	
	
    <div class="content-block-title">Choose Tab Color </div>
    <div class="content-block">
     <div class="block block-strong">
      <a href="profileupdate-stats.php?color=red" >  <div class="chip color-red">
         	   <div class="chip-label" style="color:red">Red</div>
        </div></a>
        <div class="chip color-green">
          <div class="chip-label">Green Chip</div>
        </div>
        <div class="chip color-blue">
          <div class="chip-label">Blue Chip</div>
        </div>
        <div class="chip color-orange">
          <div class="chip-label">Orange Chip</div>
        </div>
        <div class="chip color-pink">
          <div class="chip-label">Pink Chip</div>
        </div>
        <div class="chip chip-outline color-red">
          <div class="chip-label">Red Chip</div>
        </div>
        <div class="chip chip-outline color-green">
          <div class="chip-label">Green Chip</div>
        </div>
        <div class="chip chip-outline color-blue">
          <div class="chip-label">Blue Chip</div>
        </div>
        <div class="chip chip-outline color-orange">
          <div class="chip-label">Orange Chip</div>
        </div>
        <div class="chip chip-outline color-pink">
          <div class="chip-label">Pink Chip</div>
        </div>
      </div>
	        <div class="row">
		  <a href="profileupdate-stats.php?color=red" style="background-color:red">	 <div class="col-20 ks-color-theme"  >red</div></a> 
		  <a href="profileupdate-stats.php?color=pink" style="background-color:pink">
			 <div class="col-20  ks-color-theme" >pink</div>
			 </a>
			  <a href="profileupdate-stats.php?color=purple" style="background-color:purple">
			 <div class="col-20   ks-color-theme" >purple</div>
			 </a>
          <a href="profileupdate-stats.php?color=purple" style="background-color:purple"> <div class="col-20  ks-color-theme " style="background-color:deeppurple">deeppurple</div></a>
     <a href="profileupdate-stats.php?color=indigo" style="background-color:indigo">      <div class="col-20 ks-color-theme "  data-theme="dark" style="background-color:indigo">indigo</div>
        </div>
	  </br></br>
	        <div class="row">
			 <a href="profileupdate-stats.php?color=blue" style="background-color:blue"> <div class="col-20" style="background-color:blue">blue</div></a>
		 <a href="profileupdate-stats.php?color=lightblue" style="background-color:lightblue">	 <div class="col-20" style="background-color:lightblue">lightblue</div></a>
			 <a href="profileupdate-stats.php?color=cyan" style="background-color:cyan"> <div class="col-20" style="background-color:cyan">cyan</div></a>
           <a href="profileupdate-stats.php?color=teal" style="background-color:teal"><div class="col-20" style="background-color:teal">teal</div></a>
           <a href="profileupdate-stats.php?color=green" style="background-color:green"><div class="col-20"  data-theme="dark" style="background-color:green">green</div></a>
       

	   </div>
	  	  </br></br>
	        <div class="row">
			 <a href="profileupdate-stats.php?color=lightgreen" style="background-color:lightgreen"> <div class="col-20" style="background-color:lightgreen">lightgreen</div></a>
		 <a href="profileupdate-stats.php?color=lime" style="background-color:lime">	 <div class="col-20" style="background-color:lime">lime</div></a>
			 <a href="profileupdate-stats.php?color=yellow" style="background-color:yellow"> <div class="col-20" style="background-color:yellow">yellow</div></a>
           <a href="profileupdate-stats.php?color=amber" style="background-color:amber"><div class="col-20" style="background-color:amber">amber</div></a>
           <a href="profileupdate-stats.php?color=orange" style="background-color:orange"><div class="col-20"  data-theme="dark" style="background-color:orange">orange</div></a>
       

	   </div>
     	  </br></br>
	        <div class="row">
			 <a href="profileupdate-stats.php?color=deeporange" style="background-color:deeporange"> <div class="col-20" style="background-color:deeporange">deeporange</div></a>
		 <a href="profileupdate-stats.php?color=brown" style="background-color:brown">	 <div class="col-20" style="background-color:brown">brown</div></a>
			 <a href="profileupdate-stats.php?color=gray" style="background-color:gray"> <div class="col-20" style="background-color:gray">gray</div></a>
           <a href="profileupdate-stats.php?color=black" style="background-color:black"><div class="col-20" style="background-color:black">black</div></a>
           <a href="profileupdate-stats.php?color=ocean" style="background-color:ocean"><div class="col-20"  data-theme="dark" style="background-color:ocean">ocean</div></a>
       

	   </div>
    </div>
    <div class="content-block-title">Choose (Profile) Post Color </div>
    <div class="content-block">
 
	        <div class="row">
		  <a href="profileupdate-post.php?color=red" style="background-color:red">	 <div class="col-20 ks-color-theme"  >red</div></a> 
		  <a href="profileupdate-post.php?color=pink" style="background-color:pink">
			 <div class="col-20  ks-color-theme" >pink</div>
			 </a>
			  <a href="profileupdate-post.php?color=purple" style="background-color:purple">
			 <div class="col-20   ks-color-theme" >purple</div>
			 </a>
          <a href="profileupdate-post.php?color=purple" style="background-color:purple"> <div class="col-20  ks-color-theme " style="background-color:deeppurple">deeppurple</div></a>
     <a href="profileupdate-post.php?color=indigo" style="background-color:indigo">      <div class="col-20 ks-color-theme "  data-theme="dark" style="background-color:indigo">indigo</div>
        </div>
	  </br></br>
	        <div class="row">
			 <a href="profileupdate-post.php?color=blue" style="background-color:blue"> <div class="col-20" style="background-color:blue">blue</div></a>
		 <a href="profileupdate-post.php?color=lightblue" style="background-color:lightblue">	 <div class="col-20" style="background-color:lightblue">lightblue</div></a>
			 <a href="profileupdate-post.php?color=cyan" style="background-color:cyan"> <div class="col-20" style="background-color:cyan">cyan</div></a>
           <a href="profileupdate-post.php?color=teal" style="background-color:teal"><div class="col-20" style="background-color:teal">teal</div></a>
           <a href="profileupdate-post.php?color=green" style="background-color:green"><div class="col-20"  data-theme="dark" style="background-color:green">green</div></a>
       

	   </div>
	  	  </br></br>
	        <div class="row">
			 <a href="profileupdate-post.php?color=lightgreen" style="background-color:lightgreen"> <div class="col-20" style="background-color:lightgreen">lightgreen</div></a>
		 <a href="profileupdate-post.php?color=lime" style="background-color:lime">	 <div class="col-20" style="background-color:lime">lime</div></a>
			 <a href="profileupdate-post.php?color=yellow" style="background-color:yellow"> <div class="col-20" style="background-color:yellow">yellow</div></a>
           <a href="profileupdate-post.php?color=amber" style="background-color:amber"><div class="col-20" style="background-color:amber">amber</div></a>
           <a href="profileupdate-post.php?color=orange" style="background-color:orange"><div class="col-20"  data-theme="dark" style="background-color:orange">orange</div></a>
       

	   </div>
     	  </br></br>
	        <div class="row">
			 <a href="profileupdate-post.php?color=brown" style="background-color:brown"> <div class="col-20" style="background-color:brown">brown</div></a>
		 <a href="profileupdate-post.php?color=brown" style="background-color:brown">	 <div class="col-20" style="background-color:brown">brown</div></a>
			 <a href="profileupdate-post.php?color=gray" style="background-color:gray"> <div class="col-20" style="background-color:gray">gray</div></a>
           <a href="profileupdate-post.php?color=black" style="background-color:black"><div class="col-20" style="background-color:black">black</div></a>
           <a href="profileupdate-post.php?color=gold" style="background-color:gold"><div class="col-20"  data-theme="dark" style="background-color:ocean">gold</div></a>
       

	   </div>
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
