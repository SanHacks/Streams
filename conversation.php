<?php ob_start(); ?>
<?php 
session_start();
$user_id = $_SESSION['user_id'];
?>
<?php
 if(!$user_id){
   header("location: index.php");
  exit;
  
  	  		
			
 }
 
 	$conversee= $_GET['name'];
			$thefile=$_GET['id'];
		
			
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
		<link rel="stylesheet" href="css/framework7.material.colors.min.css">
		<!-- Path to your custom app styles-->
		<link rel="stylesheet" href="css/my-app.css">	
		
    </head>
    <body>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index">
					
					
 <div class="navbar" style='background-color:#0c56ac' >
    <div class="navbar-inner">
      <div class="left"><a href="converse.php" class="back link icon-only"><i class="icon icon-back"></i></a></div>
      <div class="center"><?php 
	  if($conversee){
	  echo"$conversee";  
	  }else{
		  echo"Converse";
	  }
	  
	  
	  ?></div>
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
   <?php
  
  
  
				$ss= $_GET[success];
				$next= $_GET[con];
			//	echo"<p>$look</p>";
		 echo"";
		
		 $attach= $_GET[attach];
		 $audios= $_GET[audio];
			
			$strings = ",";
		$u = array('#d7052a','#40a64d', '#5540a6','#0c56ac');

		$well = $u[rand(0,4)];
			if($audios)
		{
			echo"
		<div class='toolbar messagebar'>
		<form enctype='multipart/form-data'  action='send_audio.php' method='POST' class='store-data list-block'>
		          <input type='hidden' name='receipt' value='$thefile'>
           <input type='hidden' name='message' value='$next'>
    <div class='toolbar-inner'>
				
		<p>  <input name='file' type='file' id='file' size='24'> 
		</p>
      <textarea placeholder='Message..' name='content'></textarea>
	  
	  
		
	
	 <p class='buttons-row'> <input class='link send-message button button-fill' value='Send'   type='submit' name='submit'  style='background-color:$well'></p>
	  </form>
    </div>
  </div>
		
		
		";
		}elseif($attach)
		{
			echo"
		<div class='toolbar messagebar'>
		<form enctype='multipart/form-data'  action='send_convo.php' method='POST' class='store-data list-block'>
		          <input type='hidden' name='receipt' value='$thefile'>
           <input type='hidden' name='message' value='$next'>
    <div class='toolbar-inner'>
				
		<p>  <input name='file' type='file' id='file' size='24'> 
		</p>
      <textarea placeholder='Message..' name='content'></textarea>
	  
	  
		
	
	 <p class='buttons-row'> <input class='link send-message button button-fill' value='Send'   type='submit' name='submit'  style='background-color:$well'></p>
	  </form>
    </div>
  </div>
		
		
		";
		}else{
			
		echo"
		<div class='toolbar messagebar'>
		<form action='send-convo.php' method='POST' class='store-data list-block'>
		            <input type='hidden' name='receipt' value='$thefile'>
           <input type='hidden' name='message' value='$next'>
    <div class='toolbar-inner'>
	<a href='conversation.php?con=$next&attach=photo#postcomment' class='link icon-only'><i class='icon icon-camera'></i></a>
	<a href='conversation.php?con=$next&audio=photo#postcomment' class='link icon-only'><i class='material-icons'>mic</i></a>
				

      <textarea placeholder='Message' name='content'></textarea>
	  
	  
	
	 <p class='buttons-row'> <input class='link send-message button button-fill' value='Send'   type='submit' name='post'  style='background-color:$well'></p>
	  </form>
    </div>
  </div>";
		
		}
		
		
		
				?>   	<?php
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
				function getTi($timed){
		$pt = time() - $timed;
		if ($pt>=86400)
			$p = date("F j",$timed);
		elseif ($pt>=3600)
			$p = (floor($pt/3600))."h";
		elseif ($pt>=60)
			$p = (floor($pt/60))."m";	
			
			elseif ($pt>=0)
			$p = (floor($pt/0))."Now";
		else 
			$p = $pt."s";
		return $p;
	}

		   include "connect.php";
		$ui = "SELECT convo_id,content,message_id,timestamp,recepient,user_id,image,viewed,type,viewed2
                              FROM convo
                          WHERE message_id = $next
					ORDER BY convo_id ASC	LIMIT 20
                             ";
					$pinfo=mysqli_query($conn, $ui);
	mysqli_close($conn);

	if($pinfo){
	while ($stuff = mysqli_fetch_array($pinfo)) {
	
		$comment_id = $stuff['convo_id'];
		$comment = $stuff['content'];
		$message_id = $stuff['message_id'];
		$receipt = $stuff['recepient'];
		$timed = $stuff['timestamp'];
		$comment_user = $stuff['user_id'];
		$cimages = $stuff['image'];
		$ext = $stuff['type'];
		$viewed= $stuff['viewed2'];
		if($user_id ==$comment_user){	
			
					$tr="UPDATE convo
						 SET viewed2 = viewed2 + 1
						 WHERE message_id='$next'
						";
						mysqli_query($conn, $tr);
						
				}else{
				
					
							
							$tr="UPDATE convo
						 SET viewed = viewed + 1
						 WHERE message_id='$next'
						";
						mysqli_query($conn, $tr);
								
				}			  
					
		

		
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
		  $ey = "SELECT avatar,id,username,name FROM users WHERE id='$comment_user'"; 
		  $col=mysqli_query($conn, $ey);
				while ($wowW = mysqli_fetch_assoc($col)) {
				$imageR = $wowW['avatar'];
				$nameR = $wowW['name'];
				$usernameR = $wowW['username'];
				$identt = $wowW['id'];
			
						//UPDATE HOW MANY TIMES THE CONVERSATION HAS BEEN VIEWED/LOADED
			                          }	
											
												  mysqli_close($conn);	
		
		
		
				
		
			 
	            echo"
	
 	          			
 	          		<div class='page-content messages-content  '>

    <div class='messages messages-auto-layout'>	
						
		      		";
				
				



   

				
$user_id = $_SESSION['user_id'];

 
		
if($user_id){						
						if($user_id ==$comment_user){	
			echo "
			
						
						
						
					
	    <div class='message message-sent message-with-avatar'>
        <div class='message-name'></div>
		
		
        <div class='message-text'>$comment";
		if($cimages)
		 {
			 
			 if($ext==mp3){
				 
			echo"<p><audio controls  preload=metadata width='50%'> <source src='$cimages' type='audio/$ext'> </audio></p>";
			 }else{
					 
	echo "  <a href='convo-photo.php?pid=$comment_id' ><img width=100%    SRC='$cimages'  /></a>";
			 }
				}	
				
      echo"    <div class='message-date'>$when";
	  	if($user_id ==$comment_user){	
      
	  if($viewed==0){
	echo"  <i class='material-icons' height='25%' width='25%'>done</i>
	  
	  ";}else{
		  	echo"  <i class='material-icons'>done_all</i>";
	  
		  
	  }
		}else{
			
			
		}
	  echo"</div>
        </div>
		
		
		
     <a href='profile.php?username=$usernameR' >   <div style='background-image:url($imageR)' class='message-avatar'></div></a>
      </div>

          ";
}else{





			
		echo "
			
			
						
					
	    <div class='message message-received message-with-avatar'>
        <div class='message-name'>$nameR</div>";
		

			echo"<div class='message-text'>$comment";
			


		if($cimages)
		 {
			 
	 if($ext==mp3){
				 
			echo"	 <p><audio controls  preload=metadata width='50%' poster='$image'> <source src='$cimages' type='audio/$ext '> </audio></p>";
			 }else{
					 
	echo "  <a href='convo-photo.php?pid=$comment_id' ><img width=100%    SRC='$cimages'  /></a>";
			 }
 }	
      echo"    <div class='message-date'>$when</div>
        </div>
		
		
		
     <a href='userprofile.php?username=$usernameR' >   <div style='background-image:url($imageR)' class='message-avatar'></div></a>
      </div>

          ";

			}
				
				
				
				
				}	
	}
	}
	

?>

  									
			
	
									
			</div>
		</div>
</body>
</html>