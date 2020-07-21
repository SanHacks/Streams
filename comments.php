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
				function getTi($timed){
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
 
 	   include "connect.php";
		   	 if($_GET['top'])
		 {
		$pinfos ="SELECT id,user_id,post,views,comments,post_id,likes,timestamp,image,type,user2_id,tribe_id,location,reposts,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,votesup,votesdown
                              FROM posts
                          WHERE post_id = $look
					ORDER BY votesup DESC	 LIMIT 8
                             ";
							 
							 $pinfo=mysqli_query($conn, $pinfos);
							 
							 
							 }else{
			$pinfos ="SELECT id,user_id,post,views,comments,post_id,likes,timestamp,image,type,user2_id,tribe_id,location,reposts,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,votesup,votesdown
                              FROM posts
                          WHERE post_id = $look
					ORDER BY timestamp ASC	 LIMIT 8
                             ";
							 
							 $pinfo=mysqli_query($conn, $pinfos);
							 
							 }
	mysqli_close($conn);
		if($pinfo){
	while ($stuff = mysqli_fetch_array($pinfo)) {
		$comment = $stuff['post'];
		$comment_id = $stuff['id'];
		$views = $stuff['views'];
		$votesdown = $stuff['votesdown'];
		$votesup = $stuff['votesup'];
		$replies = $stuff['replies'] ;
		$lowkey = $stuff['location'] ;
		$cimages = $stuff['image'];
		$typeq = $stuff['type'];
		$comments = $stuff['comments'];
		$timed = $stuff['timestamp'];
		$comment_user = $stuff['user_id'];
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
		  $colony ="SELECT avatar,id,username,name FROM users WHERE id='$comment_user' 
				";
				

							 $col=mysqli_query($conn, $colony);
							 
				while ($wowW = mysqli_fetch_assoc($col)) {
				$imageR = $wowW['avatar'];
				$nameR = $wowW['name'];
				$usernameR = $wowW['username'];
				$identt = $wowW['id'];
				
				
}		


		$quezx	= "UPDATE posts
					 SET views = views + 1
					 WHERE id= $comment_id  LIMIT 5
					";
					$queryxzx=mysqli_query($conn, $quezx); 
		mysqli_close($conn);	
			 
	

 echo" <div id='tab1' class='page-content tab active'>
	 	    		<div class='messages messages-auto-layout' style='background-image:url($images)'>
      
				 <a href='userprofile.php?username=$usernameR'> <div class='message message-received message-with-avatar' >
	      <div style='background-image:url($imageR') class='message-avatar'></div></a>

      </div>
	  ";
	 
	  						if($user_id ==$comment_user){	
			echo "
			
			 <a href='profile.php?username=$usernameR'><div class='message-name'>$nameR</div></a>
				
          ";
		}else{	
		
		
		echo" <a href='userprofile.php?username=$usernameR'><div class='message-name'>$nameR</div></a>";
					
					
	 
			}
			echo"	
        <div class='message-text'";
		if($images){
		 echo "style='background-color:#FFF'";
		 }
		
		echo"
		
		>";
				   if($cimages)
 {
 	
	if($typeq==mp3){

	echo"	 <p><audio controls  preload=metadata width='50%' poster='$image'> <source src='$cimages' type='audio/$typeq '> </audio></p>";
	}elseif($typeq==gif){
   echo "<a HREF='photo.php?pid=$comment_id' ><H1> View Photo(GIF) </H1></a>";
  }else{
  echo "<a HREF='photo.php?pid=$comment_id' ><img   SRC='$cimages' /></a>";
  }
 }	

		echo"$comment
          <div class='message-date'>$when
		  	   <div class='card-footer'>
	  
	  <a href='post.php?pid=$comment_id' class='link'><i class='icon material-icons'>comment<sup></sup></i></a>";;
	  
	  
	  
	  
	  echo"<a href='#' class='link'>";
	  
	 include"likes-info.php";
	  
	  echo"
	  </a>";
	  
	  
	  
	  
	  if($replies > 1){
		echo"
		<li>
		<a href='post.php?pid=$comment_id'  class='red' style='font-weight:bold;font-size: 10px;color:white;'>$replies  Replies</a>
		</li>";
					}




					
					
		echo"
		
		
		
	  </div>";
	  
	     include"replies.php";
	  echo"
		  </div>
        </div>";
    
	  
	  
	  

						
    echo"  </div>   
	
    ";
		}
	}
?>