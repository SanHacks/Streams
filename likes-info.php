		<?php		
					include 'connect.php';
					//CHECK IF POST IS REPOST OR ORIGINAL 
					if($rear){
						$comment_likes ="SELECT id,username
										   FROM likes 
										   WHERE post_id='$rear' AND user_id='$user_id'
										  ";
										  
					}else{
					
					$comment_likes ="SELECT id,username
										   FROM likes 
										   WHERE post_id='$comment_id' AND user_id='$user_id'
										  ";
										  
										  }
						 $queryof=mysqli_query($conn, $comment_likes);


						 
		while ($reacto = mysqli_fetch_array($queryof)) {
		
		$reactedd = $reacto['username'];
		}						

				if($rear){
				$ress ="SELECT id
										   FROM likes 
										   WHERE post_id='$rear' 
										  ";
										  }else{
							$ress ="SELECT id,username
										   FROM likes 
										   WHERE post_id='$comment_id' 
										  ";			  
										  
										  
										  }

					$press=mysqli_query($conn, $ress);


						$responsible=mysqli_num_rows($press);
		
		
		
					mysqli_close($conn);

					if(mysqli_num_rows($queryof)>=1){
					      if($reactedd){
				 echo "";
				    if($reactedd=="Sad"){
				           	  echo"	 <a href='unlike.php?pid=$comment_id' > <img src='reactions/sad.png' width=20 height=20 alt='sad' /></a>";
							  
								 }elseif($reactedd=="peace")
                    {

         echo"	 <a href='unlike.php?pid=$comment_id' > <img src='reactions/peace.png' width=20 height=20 alt='peace' /></a>";
                                     
									 }	elseif($reactedd=="smile")
							{
					echo"	 <a href='unlike.php?pid=$comment_id' > <img src='reactions/smile.png' width=20 height=20 alt='smile' /></a>";
            

					}	elseif($reactedd=="like")
								{				

			echo"	 <a href='unlike.php?pid=$comment_id' > <img src='reactions/like.png' width=20 height=20 alt='peace' /></a>";
            
		}elseif($reactedd=="star")
			{

 echo"	 <a href='unlike.php?pid=$comment_id' > <img src='reactions/star.png' width=20 height=20 alt='peace' /></a>";
            
		}elseif($reactedd=="eyes")
		{

 echo"	 <a href='unlike.php?pid=$comment_id' > <img src='reactions/eyes.png' width=20 height=20 alt='peace' /></a>";
            
			}elseif($reactedd=="what")
								{

		echo"	 <a href='unlike.php?pid=$comment_id' > <img src='reactions/what.png' width=20 height=20 alt='what ?' /></a>";
            
								}		elseif($reactedd=="nerdy")
								{

		echo"	 <a href='unlike.php?pid=$comment_id' > <img src='reactions/nerdy.png' width=20 height=20 alt='peace' /><p></p></a>";
            
								}		elseif($reactedd=="finger")
								{

		echo"	 <a href='unlike.php?pid=$comment_id' > <img src='reactions/finger.png' width=20 height=20 alt='peace' /><p></p></a>";
            
								}									 
				   }else{
						echo "<a href='unlike-home.php?pid=$comment_id' > <img  width=20 height=20 src='images/likes-after.png' alt='likes' /></a>";
					}
					}
					else{
					if($repo){
					
					echo"
				           		 <a href='like-home.php?pid=$comment_id&key=$$comment_user&post=$rear&user=$repo' > <img src='images/likes.png' alt='likes'   width=20 height=20 />";
								 
								 echo"</a>";
					}else{
						echo"
				           		 <a href='like-home.php?pid=$comment_id&key=$$comment_user' > <img src='images/likes.png' alt='likes'  width=20 height=20 />"; 
							
								 
								 echo"</a>";
								 
								 }
					}
				
				
				?>