  <?php  include "connect.php";
		$colonis = "SELECT id,user_id,post,views,comments,post_id,likes,timestamp,image,type,user2_id,tribe_id,location,reposts,role,op,repuser,roles,value1,value2,value1a,value2a,value1link,value2link,votesup,votesdown
                              FROM posts
                          WHERE post_id =$comment_id 
					ORDER BY timestamp ASC	 LIMIT 2
                             ";
					 $saved=mysqli_query($conn, $colonis);	  
													 
	mysqli_close($conn);
	   
	if($saved){
	while ($raw = mysqli_fetch_array($saved)) {
	   	$reply = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$reply);
			
			 $reply = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$reply);
		
		$reply = $raw['post'];
		$reply_image = $raw['image'];
		$idd = $raw['id'];
		$uuid = $raw['user_id'];
		$reply_id = $raw['id'];
		$votesdowns = $raw['votesdown'];
		$votesups = $raw['votesup'];
		$commentss = $raw['comments'];
		$typeqs = $raw['type'];
		$timedd = $raw['timestamp'];
		//Calls the time function
		  $whenn =  getTi($timedd);
		  		include "connect.php";
		  $colonised = "SELECT avatar,id,username,name FROM users WHERE id='$uuid' 
				"; 
				 $cole=mysqli_query($conn, $colonised);	  
							
				while ($ww = mysqli_fetch_assoc($cole)) {
				$cimagee = $ww['avatar'];
				$namedd  = $ww['name'];
				$usernamedd = $ww['username'];
				$auid = $ww['id'];
				
				
}		

		$quez	= "UPDATE posts
					 SET views = views + 1
					 WHERE id= $reply_id  LIMIT 5
					";
					$queryxz=mysqli_query($conn, $quez); 
 
		mysqli_close($conn);	
		  			        	   //This converts everything with @ and # to a clickable link 
	   			   	$reply = preg_replace('/@(\\w+)/','
			
			<a href=userprofile.php?username=$1>
			
			$0</a>',$reply);
			
			 $reply = preg_replace('/#(\\w+)/','
			 
			 <a href=hashtag.php?hashtag=$1>
			 
			 $0</a>',$reply);	
			 		 //Replace www. with a link https:
			 
		 $reply = preg_replace ("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"https://\\2\" target=\"_blank\">\\2</a>", $reply);
		 
		 
 

 echo" <div id='tab1' class='page-content tab active'>
	 	    		<div class='messages messages-auto-layout' style='background-image:url($images)'>
      
				 <a href='userprofile.php?username=$usernameR'> <div class='message message-sent message-with-avatar' >
	      <div style='background-image:url($cimagee') class='message-avatar'></div></a>

      </div>
	  ";
	 
	  						if($user_id ==$auid){	
			echo "
			
			 <a href='profile.php?username=$usernameR'><div class='message-name'>$nameR</div></a>
				
          ";
		}else{	
		
		
		echo" <a href='userprofile.php?username=$usernamedd'><div class='message-name'>$namedd</div></a>";
					
					
	 
			}
			echo"	
        <div class='message-text'";
		if($images){
		 echo "style='background-color:#FFF'";
		 }
		
		echo"
		
		>";
				   if($reply_image)
 {
 	

  if($typeq==gif){
   echo "<a HREF='phoo.php?pid=$reply_id' ><H1> View Photo(GIF) </H1></a>";
  }else{
  echo "<a HREF='post.php?pid=$reply_id' ><img   SRC='$reply_image' /></a>";
  }
 }	
		
		echo"$reply
          <div class='message-date'>$whenn
		  	   <div class='card-footer'>
	  
	  <a href='post.php?pid=$reply_id' class='link'><i class='icon material-icons'>comment<sup></sup></i></a>";;
	  
	  
	  
	  
	  echo"<a href='#' class='link'>";
	  
	 include"reply-info.php";
	  
	  echo"
	  </a>";
	  
	  
	  
	  
	  if($commentss > 1){
		echo"
		<li>
		<a href='post.php?pid=$reply_id'  class='red' style='font-weight:bold;font-size: 10px;color:white;'>$replies  Replies</a>
		</li>";
					}




		echo"
	  </div>
		  </div>
        </div>";
    
	  
	  
	  
						
    echo"  </div>   ";

		
		
	}
	
	}
	
	?>