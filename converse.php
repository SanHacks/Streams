<?php ob_start(); ?>
<?php include"sessions.php";
	$page="allowed";
	?>

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
        <title>Converse</title>
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
  
    
      <div class="left"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
	    <div class="center">Converse</div>
    </div>
  </div>
  
  		<?php include"side.php"; ?>				
		
	

						<div class="page-content pull-to-refresh-content">
    <div class='pull-to-refresh-layer'>
      <div class='preloader'></div>
      <div class='pull-to-refresh-arrow'></div>
    </div>
		  			<?php
				$ss= $_GET[success];
				$next= $_GET[more];
			//	echo"<p>$look</p>";
		
				?>		
	  <?php 

	   ?>
	  
	      <div class='list-block media-list'>					
							
      <ul>
	<?php

		   
		   
		   

			function getTim($timed){
		$pt = time() - $timed;
		if ($pt>=86400)
			$p = date("F j",$timed);
		elseif ($pt>=3600)
			$p = (floor($pt/3600))."h";
		elseif ($pt>=60)
			$p = (floor($pt/60))."m";
		else 
			$p = $pt."s";
		return $p;
	}

	if($user_id){
		include "connect.php";
		
		
		$pinfoe ="SELECT id,content,recipientid,userid,timestamp,viewed,viewed2
                              FROM messages WHERE recipientid='$user_id' 
                         ORDER BY id DESC LIMIT 5
						 

                             ";	
					$pinfo=mysqli_query($conn, $pinfoe);	
				
		
		mysqli_close($conn);
		
		
	while ($stuff = mysqli_fetch_array($pinfo)) {
	
		$comment_id = $stuff['id'];
		$comment = $stuff['content'];
		$receipt = $stuff['recepientid'];
		$timed = $stuff['timestamp'];
		$comment_user = $stuff['userid'];
		$status = $stuff['viewed'];
		$statuses = $stuff['viewed2'];
		//Calls the time function
		  $when=  getTim($timed);
		  
	   	$comment = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$comment);
			
			 $comment = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$comment);
			 
			 //Get The Info Of The PERSON WHO COMMENTED ON THE POST
			 			include "connect.php";
		  $yi = "SELECT avatar,id,username,name FROM users WHERE id='$comment_user' 
				"; 
				$col=mysqli_query($conn, $yi);
				while ($wowW = mysqli_fetch_assoc($col)) {
				$imageR = $wowW['avatar'];
				$nameR = $wowW['name'];
				$usernameR = $wowW['username'];
				$identt = $wowW['id'];
				if($user_id==$receipt){
						$yix="UPDATE messages
						 SET viewed2 = viewed2 + 1
						 WHERE id='$comment_id'
						";
				mysqli_query($conn, $yix);
				
				$yix="UPDATE messages
						 SET status = read
						 WHERE id='$comment_id'
						";
				mysqli_query($conn, $yix);
				}
					$yisx="UPDATE messages
						 SET viewed = viewed + 1
						 WHERE id='$comment_id'
						";
				mysqli_query($conn, $yisx);
				
				
				}	

	  
  echo" <li><a href='conversation.php?con=$comment_id&name=$nameR' class='item-link item-content'>
            <div class='item-media'>";
							if($imageR)
		{
		echo"<a href='userprofile.php?username=$usernameR' style='text-transform: capitalize;'><img SRC='$imageR'  width='25'/></a>	";
				}else{
				echo"<a href='userprofile.php?username=$username' style='text-transform: capitalize;'><img SRC='$image'  width='25'/></a>";
				}
				
			
		echo"	
			</div>
            <div class='item-inner'>
              <div class='item-title-row'>
			  
			  
                <div class='item-title'>@$usernameR</div>
				
				
              
              </div>";
             echo" <div class='item-subtitle'></div>
              <div class='item-text'>";
		 if($user_id==$comment_user)
{
 if($status==0)
{

echo " <a HREF='conversation.php?con=$comment_id&name=$usernameR&id=$comment_user' > $comment</a>";
 }else{
 
 
 
  echo " <a HREF='conversation.php?con=$comment_id&name=$usernameR&id=$comment_user' >  $comment</a>
";

}
 }
 else{
 
 
if($statuses==0)
{

echo " <a HREF='conversation.php?con=$comment_id&name=$usernameR&id=$comment_user' > <p style='color:purple;'>$comment</a>";
 }else{
 
 
 
  echo " <a HREF='conversation.php?con=$comment_id&name=$usernameR&id=$comment_user' >$comment</a>
";

}

}
			  
			  echo"</div>
            </div></li>";



           }



		   } 

      
		function getTime($t_time){
		$pt = time() - $t_time;
		if ($pt>=86400)
			$p = date("F j",$t_time);
		elseif ($pt>=3600)
			$p = (floor($pt/3600))."h";
		elseif ($pt>=60)
			$p = (floor($pt/60))."m";
		else 
			$p = $pt."s";
		return $p;
	}

	if($user_id){
		include "connect.php";
		
		
		$yie = "SELECT id,content,recipientid,userid,timestamp,status,viewed,viewed2
                              FROM messages WHERE userid='$user_id' 
                         ORDER BY id DESC LIMIT 5
						 

                             ";	
						
				$query=mysqli_query($conn, $yie);
		
		mysqli_close($conn);
		
		
		while ($row = mysqli_fetch_array($query)) {
		$content = $row['content'];		
		$id = $row['id'];
		$uid= $row['userid'];
		$rece= $row['recipientid'];
		$t_time = $row['timestamp'];
		$status = $row['status'];
		$viewed = $row['viewed'];
		$viewed2 = $row['viewed2'];
		
		
		
		include "connect.php";
		
		
		
			$saan = "SELECT avatar,id,username,name FROM users WHERE id='$rece' 
				"; 
			
				$cool=mysqli_query($conn,$saan);
				
				
				while ($ww = mysqli_fetch_array($cool)) {
				$imageee = $ww['avatar'];
				$nameee = $ww['name'];
				$usernameee = $ww['username'];
			
					}	
		
		$san = "SELECT avatar,id,username,name FROM users WHERE id='$uid' 
				"; 
				
				$coolsr=mysqli_query($conn, $san);
				
				
				while ($wow = mysqli_fetch_array($coolsr)) {
				$image = $wow['avatar'];
				$name = $wow['name'];
				$username = $wow['username'];
			
														}			

	
		if($user_id==$uid){
						$yixQ="UPDATE messages
						 SET viewed = viewed + 1
						 WHERE id='$id'
						";
				mysqli_query($conn, $yixQ);
				}	if($user_id==$rece){
						$yixV="UPDATE messages
						 SET viewed2 = viewed2 + 1
						 WHERE id='$id'
						";
				mysqli_query($conn, $yixV);
				}
		mysqli_close($conn);		
       $ago=  getTime($t_time);

	   //This converts everything with @ and # to a clickable link 
	   			   	$content = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$content);	   	
			 $content = preg_replace('/#(\\w+)/','
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$content);
			 
			 //Replace www. with a link https:
			 
		 $content = preg_replace ("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"https://\\2\" target=\"_blank\">\\2</a>", $content);
			 
  

	  
  echo" <li><a href='conversation.php?con=$comment_id&name=$nameR' class='item-link item-content'>
            <div class='item-media'>";
							if($imageee)
		{
		echo"<a href='userprofile.php?username=$usernameee' style='text-transform: capitalize;'><img SRC='$imageee'  width='25'/></a>	";
				}else{
				echo"<a href='userprofile.php?username=$usernameee' style='text-transform: capitalize;'><img SRC='$imageee'  width='25'/></a>";
				}
				
			
		echo"	
			</div>
            <div class='item-inner'>
              <div class='item-title-row'>
			  
			  
                <div class='item-title'>@$usernameee</div>
				
				
              
              </div>";
             echo" <div class='item-subtitle'></div>
              <div class='item-text'>";
		 if($user_id==$comment_user)
{
 if($status==0)
{

echo " <a HREF='conversation.php?con=$id&name=$usernameee&id=$rece' > $content</a>";
 }else{
 
 
 
  echo " <a HREF='conversation.php?con=$id&name=$usernameee&id=$rece' >  $content</a>
";

}
 }
 else{
 
 
if($statuses==0)
{

echo " <a HREF='conversation.php?con=$id&name=$usernameee&id=$rece' > <p style='color:purple;'>$content</a>";
 }else{
 
 
 
  echo " <a HREF='conversation.php?con=$id&name=$usernameR&id=$comment_user' >$content</a>
";

}

}
			  
			  echo"</div>
            </div></li>";



           }



		   } 
		   
		   
	?>
	      </ul>
   </div>
<!-- end of card --->
   		
   
	  
	  
      </div>
    </div>	
       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		
		

      </div>
    </div>	
		 <!-- Path to Framework7 Library JS-->
		<script type="text/javascript" src="js/framework7.min.js"></script>
		<!-- Path to your app js-->
		<script type="text/javascript" src="js/my-app.js"></script>		
        <script type="text/javascript" src="cordova.js"></script>
</body>
</html>
<?php ob_end_flush();?>