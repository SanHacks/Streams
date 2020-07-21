<?php ob_start(); 
?>
<?php include"sessions.php"; 
		$page="allowed";

?>


    <?php
				$ss= $_GET[search];
			//	echo"<p>$look</p>";
		
				?>
		

   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title><?php echo "$ss"; ?></title>
		 <!-- Path to Framework7 Library CSS-->
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link rel="stylesheet" href="css/framework7.material.min.css">
		<!-- Path to your custom app styles-->
		 <link rel="stylesheet" href="css/framework7.material.colors.min">
		<link rel="stylesheet" href="css/my-app.css">	
		
    </head>
    <body>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
													<div class="page "  <?php echo"style='background-color:$backgroundc;'"; ?>>
					   

 <div class="navbar" style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
	} 
 
 ?>">
    <div class="navbar-inner">
      <div class="left"><a href="
	  <?php				  		
					$from_url = $_SERVER['HTTP_REFERER'];

					if($from_url){		
		echo"$from_url";
								}else{
					echo"home.php";
								 }
								
								?>	
	  
	  " class="back link icon-only"><i class="icon icon-back"></i></a></div>
	  			  <form action='search.php' method='GET'
							  data-search-in="search.php" class="searchbar "  style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
	} 
 
 ?>" >
    <div class="searchbar-input">
      <input type="search" placeholder="<?php if($ss){
		  
		echo"$ss";  
	  }else{
		  
		  echo"Search";
	  }
	  
	  ?>"  name='search'/><a href="#" class="searchbar-clear"></a>
    </div>
  </form>
    
      <div class="right"><a href="#" class="link open-panel icon-only"><i class="icon icon-bars"></i></a></div>
    </div>
  </div>
  
  		<?php include"side.php"; ?>				
		
	
				  <div class="toolbar tabbar" style="background-color:<?php 
     	if($menu){
		echo"$menu";
	}else{
		echo"#0c56ac";
	} 
 
 ?>">
    <div class="toolbar-inner"><a href="#tab1" class="active tab-link">Top</a><a href="searchlate.php?search=<?php echo"$ss"; ?>" class="tab-link">Latest</a>
	
	</div>
  </div>
						<div class="page-content  hide-bars-on-scroll ">

		
							 	        <?php
				
				$next= $_GET['more'];
				$nxt= $_GET['nxt'];
				
			//	echo"<p>$look</p>";
		
				?>

          		  <?php 

				function getTime($t_time){
		$pt = time() - $t_time;
		if ($pt>=86400)
			$p = date("F j",$t_time);
		elseif ($pt>=3600)
			$p = (floor($pt/3600))."h";
		elseif ($pt>=60)
			$p = (floor($pt/60))."m";
		else 
			$p = $pt."s";
		return $p;
	}

	if($_GET['search']!=""){
	$hashtag = $_GET['search'];

		
		require_once('/src/codebird.php');

\Codebird\Codebird::setConsumerKey("aQZaWL11hIMgYJoOTMcttTjNx", "3nvAK1HO5JhiCS4M0tFNZDD19HEWR0CF8AfqKJGzzvh6eiSBkd");
$cb->setToken("2217127438-G759OmrTrig9mbVobiFlAweAmGx9asO7BPxHszN", "pxqxexpEyOVXcHBywKI5vKDqlbbIOA4IEGo90hpfe1M0A");
$cb = \Codebird\Codebird::getInstance();
$cb->setReturnFormat(CODEBIRD_RETURNFORMAT_ARRAY);
//$reply = (array) $cb->statuses_homeTimeline();
$reply = $cb->search_tweets('q=twitter', true);
$data = (array) $reply;
 //$time=[url] =>;

//print_r($data);

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
	include_once"ttimeline.php";
		 



		   } else{
	echo "
		<div class='social_networks'>
		 
       
   	<ul><li><a href='index.php' class='googleplus'><i></i><span>Sorry, invalid search!</span><div class='clear'></div></a></li></ul>
			</div>	
	";
}
	   ?>  	
						
  

   					
	  
       		
 
   
	  
	  
      
    </div>	

       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		
		 <!-- Path to Framework7 Library JS-->
		<script type="text/javascript" src="js/framework7.min.js"></script>
		<!-- Path to your app js-->
		<script type="text/javascript" src="js/my-app.js"></script>		
        <script type="text/javascript" src="cordova.js"></script>

    
</body>
</html>
