<?php				if($user_id){
				if($user_id!=$id){			include 'connect.php';
			$query3s = "SELECT id
								   FROM following 
								   WHERE user1_id='$id' AND user2_id='$user_id'
								  ";
								  	 $query3=mysqli_query($conn, $query3s);
			mysqli_close($conn);
			if(mysqli_num_rows($query3)>=1){
				echo "  <i style='color:gold'>• Follows You •</i>";
				}
				}
			}	
			?>