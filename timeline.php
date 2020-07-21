 <?php
 		include"connect.php";
		$que	= "UPDATE posts
					 SET views = views + 1
					 WHERE id= $id  LIMIT 5
					";
					$queryx=mysqli_query($conn, $que); 
 
 
	echo" 
	  <div class='card ks-card-header-pic' style='background:$postcolor;'  >
      <div style='background:$postcolor;' valign='bottom' class='card-header color-white no-border'></div>";
	  
	  
	  
	
	   if($repo){
	echo	"<a href='userprofile.php?username=$repname'>
			
				 
				 
				
				
				   <div style='background-image:url($imagexrep)' class='message-avatar'></div>@$repname</a>";
				
				
				}else{
		if($user_id ==$userwhoidd){		
				echo"

			<a href='profile.php'>
				
				   <div style='b  ackground-image:url($image)' class='message-avatar'></div>$name
				   <br>@$username
				   </a>";
				
							
				}else{
						
		echo"

			<a href='userprofile.php?username=$username'>
				
				   <div style='background-image:url($image)' class='message-avatar'></div>$name
				   <br>@$username
				   </a>";

						}
				}
				
			if($userwhoid)	
				{
						if($userdx==$user_id)	
													{



				echo"

			<a href='profile.php'>
				
				   <div style='background-image:url($imagex)' class='message-avatar'></div>$name
				   <br>@$usernamex
				   </a>";
				
				
				
				
				
				}else{
				echo"

			<a href='userprofile.php?username=$usernamex'>
				
				   <div style='background-image:url($imagex)' class='message-avatar'></div>$name
				   <br>@$usernamex
				   </a>";
				
				}
				}
				
				
				if($tribed)	
				{
	echo
"		
			<i class='icon f7-icons'>chevron_right</i>
			<a href='tribe.php?tribe=$tribex'  style='text-transform: capitalize;'>
			<img height=30 width=30 SRC=' $imagex '/>
				 
				 
				 
				 
				 
				
				<h6 style='color:white'>$namexs</h6></a>"; 
				
				
				
				}elseif($repo)	
				{
	echo
	"		
			<i class='icon material-icons'>autorenew</i>
			<a href='userprofile.php?username=$username'  style='text-transform: capitalize;'>
			<img height=30 width=30 SRC=' $image '/>
				 
				 
			"; 
					
	
					
					
				}
	   		$string     = $content;
$search     = '/www.youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
$replace    = "
<iframe  width='100%' src='https://youtube.com/embed/$1' frameborder='0' allowfullscreen></iframe>
<br>

<iframe style='width:100%;height:60px;border:0;overflow:hidden;' scrolling='no' src='//www.convertmp3.io/widget/button/?video=https://www.m.youtube.com/watch?v=$1' color=c91818>

";   
	   
	   echo"
      <div class='card-content'  >
	  
        <div class='card-content-inner' > ";
		  //Find if post is a comment or reply on another post
    if($role=="comment"){
 
 
		echo " 
				<a HREF='post.php?pid=$post_id' ><i class='icon material-icons'>mode_comment</i>Post commented on</a>
				
				";	}
  elseif($role=="reply"){
 
 
echo " 
				<a HREF='post.php?pid=$post_id' ><i class='icon material-icons'>comment</i>Post replied on</a>
				
				";
  
  }
                 if($roles=="list"){
 
 
   echo " <img  width=30 height=30  src='images/audio.png' />
<p style='color:#333335;'>$content</p>
  ";
  }elseif($type=="mp3"){
    echo  " <img  width=30 height=30  src='images/audio.png' />
           
			<audio controls  preload=metadata width='100%' poster='$image'> <source src='$imagess' type='audio/$type '> </audio>		
          ";
  
   }
   //Checks if post consist of an image
   if($imagess)				{
  if($type==gif){
				echo "<a HREF='post.php?pid=$id' ><H1> View Photo(GIF) </H1></a>";
					}
				elseif($type==mp4){
  
						
						echo"
				
	  <div class='players' id='player1-container'>

    

            <div class='media-wrapper'>
             <a href='photo.php?pid=$id' data-popup='.demo-popup'>   <video id='player1' width='100%' height='100%'  poster='$imagesso' preload='none' controls playsinline webkit-playsinline>
                    <source src='$imagess' type='video/$type'>
                  
                </video></a>
            </div>
            <br>

				
			";	}elseif($type==webm){
  
						
							echo"
						<style>

     
        #container {
            padding: 0 20px 50px;
        }
        .error {
            color: red;
        }
        a {
            word-wrap: break-word;
        }

        code {
            font-size: 0.8em;
        }

        #player2-container .mejs__time-buffering, #player2-container .mejs__time-current, #player2-container .mejs__time-handle,
        #player2-container .mejs__time-loaded, #player2-container .mejs__time-hovered, #player2-container .mejs__time-marker, #player2-container .mejs__time-total {
            height: 2px;
        }

        #player2-container .mejs__time-total {
            margin-top: 9px;
        }
        #player2-container .mejs__time-handle {
            left: -5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #ffffff;
            top: -5px;
            cursor: pointer;
            display: block;
            position: absolute;
            z-index: 2;
            border: none;
        }
        #player2-container .mejs__time-handle-content {
            top: 0;
            left: 0;
            width: 12px;
            height: 12px;
        }
    </style>
	  <div class='players' id='player1-container'>

      

            <div class='media-wrapper'>
             <a href='photo.php?pid=$id' data-popup='.demo-popup'>   <video id='player1' width='100%' height='100%'  poster='$imagesso' preload='none' controls playsinline webkit-playsinline>
                    <source src='$imagess' type='video/$type'>
                  
                </video></a>
            </div>
            <br>

				
			";
		
								}else{
				//Assumes the file is an image (jpg,png)
				
              		if($type=="mp3"){
							
						}else{
							
						if($imgs==0){
  
									
											echo "<a HREF='post.php?pid=$id' ><h1> View Image</h1></a>";	
								}else{
				
  
										echo "<a href='photo.php?pid=$id' data-popup='.demo-popup'>
										
										<img src='$imagess' width='100%'/></a>
	  
										";	
						}
									}
						
						
					}
				}
         echo" <p  ";
		 
		 if($postcolor){
		 echo "style='background-color:#FFF'";
		 }
		 
		echo" >$content</p>
		   <p class='color-orange'>$ago</p>
        </div>
      </div>
 
	  

	  
	";
	 	 echo" 
	  <div class='list-block accordion-list'>
      <ul>
        <li class='accordion-item'><a href='#' class='item-link item-content'>
            <div class='item-inner'> 
              <div class='item-title'> <img height=30 width=30  SRC=' reactions/like.png '  alt='like'  />	
			  <img height=30 width=30  SRC=' reactions/star.png '  alt='star'  />
			  <img height=30 width=30  SRC=' reactions/finger.png '  alt='finger'  />
			  ";	

 
	
	
	echo"</div>
            </div></a>
          <div class='accordion-item-content'>
            <div class='content-block'>
                 <div class='ks-grid'>
      <div class='content-block'>
	     <div class='row no-gutter'>
          <a href='like.php?pid=$id&key=$uid&type=smile' ><div class='col-20'><img height=30 width=30  SRC=' reactions/smile.png '  alt='peace' /></div></a>
         <a href='like.php?pid=$id&key=$uid&type=like'>  <div class='col-20'>
		 <img height=30 width=30  SRC=' reactions/like.png '  alt='like'  /></div></a>
        <a href='like.php?pid=$id&key=$uid&type=star'>  <div class='col-20'>
		<img height=30 width=30  SRC=' reactions/star.png '  alt='star'  /></div></a>
       <a href='like.php?pid=$id&key=$uid&type=eyes'>   <div class='col-20'>
	   <img height=30 width=30  SRC=' reactions/eyes.png '  alt='eyes'  /></div></a>
       <a href='like.php?pid=$id&key=$uid&type=finger'>   <div class='col-20'>
	   <img height=30 width=30  SRC=' reactions/finger.png '  alt='finger'  /></div></a>
        </div>
	</div>
	</div>
            </div>
          </div>
        </li>
  
      </ul>
    </div>";
	
	 echo" 
	   <div class='row no-gutter' style='background-color:$stats'>
          <div class='col-25'>	";
	echo"		  <a href='post.php?pid=$id' >	";
	
								 echo"<i class='icon material-icons'>mode_comment<sup>";
	 
								 echo"</sup></i></a></div>
          <div class='col-25'><a href='post.php?pid=$id' ><img src='images/views.png' alt='views' height=30 width=30 /></a></div>
          <div class='col-25'> ";
							
if($user_id==$uid){
									echo"
<a href='#' class='blue'><img src='images/rep.png' alt='Repost'  height=30 width=25/></a>	";
			
			}elseif($user_id==$repo){
			
											echo"
<a href='#' ><img height=30 width=30 src='images/rep.png' alt='Repost' /></a>	";	
			}
			
			elseif($roles=="poll"){
			
											echo"
<a href='#' class='blue'><img height=30 width=30 src='images/rep.png' alt='Repost' /><p> $reposts</p></a>	";	
			}elseif($roles=="list"){
			
											echo"
<a href='#' class='blue'><img  height=30 width=30  src='images/rep.png' alt='Repost' /><p> $reposts</p></a>	";	
			}elseif($repo){

 echo"<a href='rep.php?pid=$look&key=$uid&name=$name' ><img src='images/rep.png' alt='Repost' height=30 width=30 /></a>	";
   
						}else{
					include 'connect.php';
					$query2eq = "SELECT id
										   FROM repost 
										   WHERE post_id='$look' AND user_id='$user_id'
										  ";
										  	
				$query2ew=mysqli_query($conn, $query2eq);  
				
					mysqli_close($conn);
              

					if(mysqli_num_rows($query2ew)>=1){
						echo "<a href='delete.php?pid=$look&post_id=$look'><img src='images/repa.png' alt='Repost' /><p> </p></a>";
					}
			
					else{
						
						
					if($realp){



						echo"
		<a href='rep.php?pid=$look&key=$uid&post=$realp&user=$repo&name=$name' class='blue'><img height=30 width=30  src='images/rep.png' alt='Repost' /><p></p></a>	";
					}else{
						echo"
		<a href='rep.php?pid=$look&key=$uid&name=$name' ><img  
		height=30 width=30 
		src='images/rep.png' alt='Repost' /><p></p></a>	";

					}

			}
					}
		echo"

		  
		  </div>
          <div class='col-25'>";
		  include"like-info.php";
		  echo"</div>
		  
					</div>
						  <div class='row no-gutter' ";
		 
		 if($postcolor){
		 echo "style='background-color:#FFF'";
		 }
		 
		echo">
          <div class='col-25'>";
		  
		   if($comments=="0"){
								 }else{
								 echo"$comments";
								 }
		  
		  echo"</div>
          <div class='col-25'>";
		    if($views=="0"){
								 }else{
								 echo"$views";
								 }
		
		  echo"</div>
          <div class='col-25'>$reposts</div>
          <div class='col-25'>";
		  if($responses=="0"){
								 }else{
								 echo"$responses";
								 }
								 echo"</div>
        </div>
						</div>
					
						
						
						";
	
	?>