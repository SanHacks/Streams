<html>
<?php
		require_once('/src/codebird.php');

\Codebird\Codebird::setConsumerKey("aQZaWL11hIMgYJoOTMcttTjNx", "3nvAK1HO5JhiCS4M0tFNZDD19HEWR0CF8AfqKJGzzvh6eiSBkd");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("2217127438-G759OmrTrig9mbVobiFlAweAmGx9asO7BPxHszN", "pxqxexpEyOVXcHBywKI5vKDqlbbIOA4IEGo90hpfe1M0A");
$cb->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);
//$reply = (array) $cb->statuses_homeTimeline();
$reply = $cb->statuses_homeTimeline();
$data = (array) $reply;

function timeAgo($dateStr) {
		$timestamp = strtotime($dateStr);	 
		$day = 60 * 60 * 24;
		$today = time(); // current unix time
		$since = $today - $timestamp;
		 
		 # If it's been less than 1 day since the tweet was posted, figure out how long ago in seconds/minutes/hours
		 if (($since / $day) < 1) {
		 
		 	$timeUnits = array(
				   array(60 * 60, 'h'),
				   array(60, 'm'),
				   array(1, 's')
			  );
			  
			  for ($i = 0, $n = count($timeUnits); $i < $n; $i++) { 
				   $seconds = $timeUnits[$i][0];
				   $unit = $timeUnits[$i][1];
			 
				   if (($count = floor($since / $seconds)) != 0) {
					   break;
				   }
			  }
		 
			  return "$count{$unit}";
			  
		# If it's been a day or more, return the date: day (without leading 0) and 3-letter month
		 } else {
			  return date('j M', strtotime($dateStr));
		 }	 
	}
	function formatTweet($tweet) {
		$linkified = '@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@';
		$hashified = '/(^|[\n\s])#([^\s"\t\n\r<:]*)/is';
		$mentionified = '/(^|[\n\s])@([^\s"\t\n\r<:]*)/is';
		
		$prettyTweet = preg_replace(
			array(
				$linkified,
				$hashified,
				$mentionified
			), 
			array(
				'<a href="$1" class="link-tweet" target="_blank">$1</a>',
				'$1<a class="link-hashtag" href="https://twitter.com/search?q=%23$2&src=hash" target="_blank">#$2</a>',
				'$1<a class="link-mention" href="http://twitter.com/$2" target="_blank">@$2</a>'
			), 
			$tweet
		);
		
		return $prettyTweet;
	}
	/////
	 foreach ($data as $tweet) {
		# The tweet
		//$formattedTweet = !$isRetweet ? formatTweet($tweet['text']) : formatTweet($retweet['text']);
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
		$userName = $user['name'];
		$userScreenName = $user['screen_name'];
		$userAvatarURL = stripcslashes($user['profile_image_url']);
		$userAccountURL = 'http://twitter.com/' . $userScreenName;
		
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

 
	echo" 
	  <div class='card ks-card-header-pic' style='background:$postcolor;'  >
      <div style='background:$postcolor;' valign='bottom' class='card-header color-white no-border'></div>";
	  
	  
	  
	
	  
	echo	"<a href='tprofile.php?username=$userScreenName'>
			
				 
				 
				
				
				   <div style='background-image:url($userAvatarURL)' class='message-avatar'></div>@$userScreenName</a>";
				
				
				
				
				echo"

			<a href='userprofile.php?username=$usernamex'>
				
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
		   <p class='color-orange'>$ago</p>
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
	</html>