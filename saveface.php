		
			<?php 
	
	   
	    $gwan = $user*2000;
	   
     echo" $user    $images ";
	


    				  $timestamp = time();

	  

	  $ss=rand(111,999);
          $password = md5($ss);
         
          include 'connect.php';
	 $queryaw = "SELECT username,facebook_id 
                            FROM users 
                            WHERE facebook_id='$id'
                            ";
							$query=mysqli_query($conn, $queryaw) ;
      mysqli_close($conn);
      if(!(mysqli_num_rows($query)>=1)){ 
	  
          include 'connect.php';
        $userq="INSERT INTO users(username,name,avatar,avataro,timestamp,facebook_id,password) 
                       VALUES ('$name','$name','$image','$image','$timestamp','$id','$password')
                      ";
 $tr=mysqli_query($conn, $userq);


	
	header("location: fwad.php?id=$id");
	  exit;
	 
}else{

  
	
	header("location: fwad.php?id=$id");
	  exit;
}

?>