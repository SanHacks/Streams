		<?php		
					include 'connect.php';
					//CHECK IF POST IS REPOST OR ORIGINAL 
					if($reply_id){
						$reply_likes ="SELECT id,username
										   FROM likes 
										   WHERE post_id='$reply_id' AND user_id='$user_id'
										  ";
										  
					}else{
					
					$reply_likes ="SELECT id,username
										   FROM likes 
										   WHERE post_id='$reply_id' AND user_id='$user_id'
										  ";
										  
										  }
						 $replyof=mysqli_query($conn, $reply_likes);


						 
		while ($reactoo= mysqli_fetch_array($replyof)) {
		
		$reacteddd = $reactoo['username'];
		}						

				if($reply_id){
				$resss ="SELECT id
										   FROM likes 
										   WHERE post_id='$reply_id' 
										  ";
										  }else{
							$resss ="SELECT id,username
										   FROM likes 
										   WHERE post_id='$reply_id' 
										  ";			  
										  
										  
										  }

					$pressing=mysqli_query($conn, $resss);


						$responsible=mysqli_num_rows($pressing);
		
		
		
					mysqli_close($conn);

					if(mysqli_num_rows($replyof)>=1){
					      if($reacteddd){
				 echo "";
				    if($reacteddd=="Sad"){
				           	  echo"	 <a href='unlike.php?pid=$reply_id' > <img src='reactions/sad.png' width=20 height=20 alt='sad' /></a>";
							  
								 }elseif($reacteddd=="peace")
                    {

         echo"	 <a href='unlike.php?pid=$reply_id' > <img src='reactions/peace.png' width=20 height=20 alt='peace' /></a>";
                                     
									 }	elseif($reacteddd=="smile")
							{
					echo"	 <a href='unlike.php?pid=$reply_id' > <img src='reactions/smile.png' width=20 height=20 alt='smile' /></a>";
            

					}	elseif($reacteddd=="like")
								{				

			echo"	 <a href='unlike.php?pid=$reply_id' > <img src='reactions/like.png' width=20 height=20 alt='peace' /></a>";
            
		}elseif($reacteddd=="star")
			{

 echo"	 <a href='unlike.php?pid=$reply_id' > <img src='reactions/star.png' width=20 height=20 alt='peace' /></a>";
            
		}elseif($reacteddd=="eyes")
		{

 echo"	 <a href='unlike.php?pid=$reply_id' > <img src='reactions/eyes.png' width=20 height=20 alt='peace' /></a>";
            
			}elseif($reacteddd=="what")
								{

		echo"	 <a href='unlike.php?pid=$reply_id' > <img src='reactions/what.png' width=20 height=20 alt='what ?' /></a>";
            
								}		elseif($reacteddd=="nerdy")
								{

		echo"	 <a href='unlike.php?pid=$reply_id' > <img src='reactions/nerdy.png' width=20 height=20 alt='peace' /><p></p></a>";
            
								}		elseif($reacteddd=="finger")
								{

		echo"	 <a href='unlike.php?pid=$reply_id' > <img src='reactions/finger.png' width=20 height=20 alt='peace' /><p></p></a>";
            
								}									 
				   }else{
						echo "<a href='unlike-home.php?pid=$reply_id' > <img  width=20 height=20 src='images/likes-after.png' alt='likes' /></a>";
					}
					}
					else{
					if($repo){
					
					echo"
				           		 <a href='like-home.php?pid=$reply_id&key=$$uuid&post=$comment_id&user=$uuid' > <img src='images/likes.png' alt='likes'   width=20 height=20 />";
								 
								 echo"</a>";
					}else{
						echo"
				           		 <a href='like-home.php?pid=$reply_id&key=$$uuid' > <img src='images/likes.png' alt='likes'  width=20 height=20 />"; 
							
								 
								 echo"</a>";
								 
								 }
					}
				
				
				?>