		<?php		
					include 'connect.php';
					//CHECK IF POST IS REPOST OR ORIGINAL 
					if($realp){
						$query2w ="SELECT id,username
										   FROM likes 
										   WHERE post_id='$realp' AND user_id='$user_id'
										  ";
										  
					}else{
					
					$query2w ="SELECT id,username
										   FROM likes 
										   WHERE post_id='$id' AND user_id='$user_id'
										  ";
										  
										  }
						 $query2=mysqli_query($conn, $query2w);


						 
		while ($reactions = mysqli_fetch_array($query2)) {
		
		$reacted = $reactions['username'];
		}						

				if($realp){
				$res ="SELECT id
										   FROM likes 
										   WHERE post_id='$realp' 
										  ";
										  }else{
							$res ="SELECT id,username
										   FROM likes 
										   WHERE post_id='$id' 
										  ";			  
										  
										  
										  }

					$pons=mysqli_query($conn, $res);


						$responses=mysqli_num_rows($pons);
		
		
		
					mysqli_close($conn);

					if(mysqli_num_rows($query2)>=1){
					      if($reacted){
				 echo "";
				    if($reacted=="Sad"){
				           	  echo"	 <a href='unlike.php?pid=$id' > <img src='reactions/sad.png' width=30 height=30 alt='sad' /></a>";
							  
								 }elseif($reacted=="peace")
                    {

         echo"	 <a href='unlike.php?pid=$id' > <img src='reactions/peace.png' width=30 height=30 alt='peace' /></a>";
                                     
									 }	elseif($reacted=="smile")
							{
					echo"	 <a href='unlike.php?pid=$id' > <img src='reactions/smile.png' width=30 height=30 alt='smile' /></a>";
            

					}	elseif($reacted=="like")
								{				

			echo"	 <a href='unlike.php?pid=$id' > <img src='reactions/like.png' width=30 height=30 alt='peace' /></a>";
            
}elseif($reacted=="star")
{

 echo"	 <a href='unlike.php?pid=$id' > <img src='reactions/star.png' width=30 height=30 alt='peace' /></a>";
            
}elseif($reacted=="eyes")
{

 echo"	 <a href='unlike.php?pid=$id' > <img src='reactions/eyes.png' width=30 height=30 alt='peace' /></a>";
            
}	elseif($reacted=="what")
								{

		echo"	 <a href='unlike.php?pid=$id' > <img src='reactions/what.png' width=30 height=30 alt='what ?' /></a>";
            
								}		elseif($reacted=="nerdy")
								{

		echo"	 <a href='unlike.php?pid=$id' > <img src='reactions/nerdy.png' width=30 height=30 alt='peace' /><p></p></a>";
            
								}		elseif($reacted=="finger")
								{

		echo"	 <a href='unlike.php?pid=$id' > <img src='reactions/finger.png' width=30 height=30 alt='peace' /><p></p></a>";
            
								}									 
				   }else{
						echo "<a href='unlike-home.php?pid=$id' > <img  width=30 height=30 src='images/likes-after.png' alt='likes' /></a>";
					}
					}
					else{
					if($repo){
					
					echo"
				           		 <a href='like-home.php?pid=$id&key=$uid&post=$realp&user=$repo' > <img src='images/likes.png' alt='likes' />";
								 
								 echo"</a>";
					}else{
						echo"
				           		 <a href='like-home.php?pid=$id&key=$uid' > <img src='images/likes.png' alt='likes' />"; 
							
								 
								 echo"</a>";
								 
								 }
					}
				
				
				?>