<html>
<head>
<link rel="stylesheet" href="css/tweet.css">	
</head>
<?php
require_once('/src/codebird.php');

\Codebird\Codebird::setConsumerKey("aQZaWL11hIMgYJoOTMcttTjNx", "3nvAK1HO5JhiCS4M0tFNZDD19HEWR0CF8AfqKJGzzvh6eiSBkd");
$cb = \Codebird\Codebird::getInstance();
$cb->setToken("2217127438-G759OmrTrig9mbVobiFlAweAmGx9asO7BPxHszN", "pxqxexpEyOVXcHBywKI5vKDqlbbIOA4IEGo90hpfe1M0A");
$cb->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);
$reply = (array) $cb->statuses_homeTimeline();
//$reply = $cb->account_verifyCredentials();

$data = (array) $reply;
 //$time=[url] =>;


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
		$thecolor = $tweet['profile_background_color'];
		# Reply
		$replyID = $tweet['in_reply_to_status_id'];
		$isReply = !empty($replyID);

		# Tweet actions (uses web intents)
		$replyURL = 'https://twitter.com/intent/tweet?in_reply_to=' . $id;
		$retweetURL = 'https://twitter.com/intent/retweet?tweet_id=' . $id;
		$favoriteURL = 'https://twitter.com/intent/favorite?tweet_id=' . $id;
// $userAvatarURL = stripcslashes($user['profile_image_url']);
 echo"<img src='$the' /> the twitter id = $id  $thetext $thetextn";
 

	echo"<div class='tweet-info'>
				<div class='user-info'>
					<a class='user-avatar-link' href='$userAccountURL'>
						<img class='user-avatar' src='$userAvatarURL'>
					</a>
					<p class='user-account'>
						<a class='user-name' href='$userAccountURL'><strong>$userName</strong></a>
						<a class='user-screenName' href='$userAccountURL'>@$userScreenName</a>
					</p>
				</div>";
					echo "<p>$formattedTweet </p>"; 
				 	if ($isReply) {
						echo '
							<a class="link-reply-to permalink-status" href="http://twitter.com/' . $tweet['in_reply_to_screen_name'] . '/status/' . $replyID . '">
								In reply to...
							</a>
						';
					}
		echo "<a class='link-details permalink-status' href='$statusURL' target='_blank'>Details</a></p>";
 echo"<div class='tweet-actions'>
				<a class='action-reply' href='$replyURL'>Reply</a>
				<a class='action-retweet' href='$retweetURL'>Retweet</a>
				<a class='action-favorite' href='$favoriteURL'>Favorite</a>
			</div>";
	
	}
?>
</html>