			<p><?php
	
			
if($user_id){
	if($_POST['content']!=""){
		$post = htmlentities($_POST['content']);
		$timestamp = time();
		include 'connect.php';
	
	$username = clean($_GET['username']);
		mysql_query("INSERT INTO posts(username, content) 
				   VALUES ('$username', '$post')
				    ");
					
					
					
					mysql_query("UPDATE users
					 SET posts = posts + 1
					 WHERE id='$user_id'
					");
		mysql_close($conn);
		header("Location:home.php");
	}  else{
    $error_msg = "All fields must be filled out";
  }
  }
  

?></p>