 <?php
 echo"
 <div class='list-block media-list'>
      <ul>
        <li><a href='userprofile.php?username=$usernames'  class='item-link item-content'>
            <div class='item-media'><img src='$images' width='80'/></div>
            <div class='item-inner'>
              <div class='item-title-row'>
                <div class='item-title'>$names</div>
                <div class='item-after'>	
				
				


";
	     	if($auth==1){
						
						echo "<i class='icon material-icons'>verified_user</i>";
						
					}
					else{
						
						echo "  ";
					}
include 'iffollow.php';
		if($user_id){
				if($user_id!=$idd){
					include 'connect.php';
					$dds ="SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$idd'
										  ";
										     $query2=mysqli_query($conn, $dds); 
					mysqli_close($conn);
			if(mysqli_num_rows($query3)>=1){
				echo "  <p style='color:gold'>• Follows You •</p>";
				}
				}
			}
			
					if($user_id){                                                                                                                                                                                                                                           
				if($user_id!=$idd){
					include 'connect.php';
					$dds = "SELECT id
										   FROM following 
										   WHERE user1_id='$user_id' AND user2_id='$idd'
										  ";
										   $query2=mysqli_query($conn, $dds); 
					mysqli_close($conn);
					if(mysqli_num_rows($query2)>=1){
						echo "<span><a href='unfollow.php?userid=$idd&username=$usernames&ref=2' class='button button-fill button-raised' style='background-color:teal'>Following</a></br></span>";
					}
					else{
						echo "<span><a href='follow.php?userid=$idd&username=$usernames' class='button button-fill button-raised' style='background-color:teal'>Follow</a></br></span>";
					}
				}
			}	
			echo"</div>
            </div></a></li></ul>
			</div>";
       		?>