 <?php
 
 

	 foreach ($data as $tweet) {
		# The tweet
		$formattedTweet = !$isRetweet ? formatTweet($tweet['text']) : formatTweet($retweet['text']);
		$id = $tweet['id'];
		$thetext = $tweet['text'];
		$thetextn = $tweet['name'];
		//$nam = $tweet['screen_name'];
		$the = $tweet['profile_background_image_url_https'];
		$retweet = $tweet['retweeted_status'];
		$isRetweet = !empty($retweet);
		
		# Retweet - get the retweeter's name and screen name
		$retweetingUser = $isRetweet ? $tweet['user']['name'] : null;
		$retweetingUserScreenName = $isRetweet ? $tweet['user']['screen_name'] : null;
		
		# Tweet source user (could be a retweeted user and not the owner of the timeline)
		$user = !$isRetweet ? $tweet['user'] : $retweet['user'];	
		$userNamee = $user['name'];
		$userScreenName = $user['screen_name'];
		$userAvatarURL = stripcslashes($user['profile_image_url']);
		$userAccountURL = 'tprofile.php?username=' . $userScreenName;
		
		# The tweet
		
		$formattedTweet = !$isRetweet ? formatTweet($tweet['text']) : formatTweet($retweet['text']);
		$statusURL = 'http://twitter.com/' . $userScreenName . '/status/' . $id;
		$date = timeAgo($tweet['created_at']);
		
		# Reply
		$replyID = $tweet['in_reply_to_status_id'];
		$isReply = !empty($replyID);

		# Tweet actions (uses web intents)
		$replyURL = 'https://twitter.com/intent/tweet?in_reply_to=' . $id;
		$retweetURL = 'https://twitter.com/intent/retweet?tweet_id=' . $id;
		$favoriteURL = 'https://twitter.com/intent/favorite?tweet_id=' . $id;
// $userAvatarURL = stripcslashes($user['profile_image_url']);

	   		$stringer     = $formatTweet;
$searchs     = '/https://t\.co\([a-zA-Z0-9]+)/smi';
$replacer    = "





		

<img src='https://pic.twitter.com/$1' width='100%'/>
<br>

$formatTweet = preg_replace($searchs,$replacer,$stringer);
"; 


	echo" 
	  <div class='card ks-card-header-pic' style='background:$thecolor;'  >
      <div style='background:$thecolor;' valign='bottom' class='card-header color-white no-border'></div>";
	  
	  
	  
				
				
				
				
				echo"

			<a href='tprofile.php?username=$userScreenName' class='link external'>
				
				   <div style='background-image:url($userAvatarURL)' class='message-avatar'></div>$userNamee
				   <br>@$userScreenName
				   </a>";
			
				
				
			

	   
	   echo"
      <div class='card-content'  >
	  
        <div class='card-content-inner' > ";
		  //Find if post is a comment or reply on another post

         
   //Checks if post consist of an image

         echo" <p  ";
		 
		 if($postcolor){
		 echo "style='background-color:#FFF'";
		 }
		 
		echo" >$formattedTweet</p>
		   <p class='color-orange'>$date</p>
        </div>
      </div>
 
	  

	  
	";
	

 
	
	

	
	 echo" 
	   <div class='row no-gutter' style='background-color:'>
          <div class='col-25'>	";
	echo"		  <a href='$replyURL' >	";
	
								 echo"<i class='icon material-icons'>mode_comment<sup>";
	 
								 echo"</sup></i></a></div>
        <!--  <div class='col-25'><a href='post.php?pid=$id' ><img src='images/views.png' alt='views' height=30 width=30 /></a></div> -->
          <div class='col-25'> ";
							

									echo"
<a href='$retweetURL' class='blue'><img src='images/rep.png' alt='Repost'  height=30 width=25/></a>	";
		
		echo"

		  
		  </div>";
          echo"<div class='col-25'>";
		 	echo"
				           		 <a href='$favoriteURL' > <img src='images/likes.png' alt='likes' />"; 
		  echo"</div>
		  
					</div>
		
						</div>";
				
 }
	
	?>