<?php		
if($_GET['pid']) {
	
		if($user_id){
	
		include "connect.php";
		$gotosx = "SELECT username,avatar,name,hometown
                              FROM users 
                              WHERE id='$user_id'
                             ";
													 	 $goto=mysqli_query($conn, $gotosx);	
														 
														 
					mysqli_close($conn);
		$rows= mysqli_fetch_assoc($goto);
		$usernames = $rows['username'];
		$imagess = $rows['avatar'];
		$names = $rows['name'];
		$locatiano = $rows['location'];
	    $attach= $_GET[attach];
		$sound= $_GET[sound];
			$strings = ",";
		$u = array('#d7052a','#40a64d', '#5540a6','#549bfe');

		$well = $u[rand(0,4)];
		if($attach)
		{
			echo"
		<div class='toolbar messagebar'>
		<form enctype='multipart/form-data'  action='commentpost-image.php' method='POST' class='store-data list-block'>
		         <input type='hidden' name='post_id' value='$look'>
		   <input type='hidden' name='user' value='$ident'>
	<input type='hidden' name='username' value='$usernames '>
	<input type='hidden' name='name' value='$names'>
	<input type='hidden' name='picture' value='$imagess'>
	<input type='hidden' name='userid' value='$ident'>
	<input type='hidden' name='location' value='$locatiano'>
    <div class='toolbar-inner'>
				
		<p>  <input name='file' type='file' id='file' size='24'> 
		</p>
      <textarea placeholder='Comment'></textarea>
	  
	  
		
	
	 <p class='buttons-row'> <input class='link send-message button button-fill' value='Comment'   type='submit' name='submit'  style='background-color:$well'></p>
	  </form>
    </div>
  </div>
		
		
		";
		}elseif($sound)
		{
			echo"
		<div class='toolbar messagebar'>
		<form enctype='multipart/form-data'  action='commentpost-audio.php' method='POST' class='store-data list-block'>
		         <input type='hidden' name='post_id' value='$look'>
		   <input type='hidden' name='user' value='$ident'>
	<input type='hidden' name='username' value='$usernames '>
	<input type='hidden' name='name' value='$names'>
	<input type='hidden' name='picture' value='$imagess'>
	<input type='hidden' name='userid' value='$ident'>
	<input type='hidden' name='location' value='$locatiano'>
    <div class='toolbar-inner'>
				
		<p>  <input name='file' type='file' id='file' size='24'> 
		</p>
      <textarea placeholder='Comment'></textarea>
	  
	  
		
	
	 <p class='buttons-row'> <input class='link send-message button button-fill' value='Comment'   type='submit' name='submit'  style='background-color:$well'></p>
	  </form>
    </div>
  </div>
		
		
		";
		}else{
			
		echo"
		<div class='toolbar messagebar'>
		<form action='commentpost.php' method='POST' class='store-data list-block'>
		           <input type='hidden' name='post_id' value='$look'>
		   <input type='hidden' name='user' value='$ident'>
	<input type='hidden' name='username' value='$usernames '>
	<input type='hidden' name='name' value='$names'>
	<input type='hidden' name='picture' value='$imagess'>
	<input type='hidden' name='userid' value='$ident'>
	<input type='hidden' name='location' value='$locatiano'>
    <div class='toolbar-inner'>
	<a href='post.php?pid=$look&attach=photo#postcomment' class='link icon-only'><i class='icon icon-camera'></i></a>
				<!--- <a href='post.php?pid=$look&sound=photo#postcomment' class='link icon-only'><i class='material-icons'>mic</i></a> --->

      <textarea placeholder='Comment' name='postcomment'></textarea>
	  
	  
	
	 <p class='buttons-row'> <input class='link send-message button button-fill' value='Comment'   type='submit' name='post'  style='background-color:$well'></p>
	  </form>
    </div>
  </div>";
		
		
		
		}
			
			
			
		}else{
			
			
		echo"<div class='toolbar messagebar'>
     <p class='buttons-row'><i class='icon f7-icons'>person</i><a href='join.php' class='button button-fill button-raised' style='background-color:teal' >Join IntelliFeed</a></p>
		</div>";	
		}
		
		
		
		
		
		
		}

  ?>