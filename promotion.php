	<?php
	if($id){

				$attach= $_GET[photo];
			//	echo"<p>$look</p>";
		
		
		} 
				?>
					<?php	
		//Metadata variables
		$jpg="jpg";
		$video="mp4";
		$au="mp3";
		$web="webm";
		$list="list";
		$gif="png";
   //Ads Space           
	include"connect.php";
	if($type==mp4){
	$queryhqs = "SELECT id,post,user_id,timestamp,image,type,user2_id,post_id
                       					   FROM posts
                           WHERE user_id= $uid AND type='$video' OR type='$web'  ORDER BY Rand() DESC  LIMIT  2
                             ";
	}elseif($type==webm){
		$queryhqs = "SELECT id,post,user_id,timestamp,image,type,user2_id,post_id
                       					   FROM posts
                           WHERE user_id= $uid AND type='$web' OR type='$video'  ORDER BY Rand() DESC  LIMIT  2
                             ";
		
		
	}
	elseif($type==mp3){
		$queryhqs = "SELECT id,post,user_id,timestamp,image,type,user2_id,post_id
                       					   FROM posts
                           WHERE user_id= $uid AND type='$au' OR type='$au'  ORDER BY Rand() DESC  LIMIT  2
                             ";
		
		
	}
	else{
		
		$queryhqs = "SELECT id,post,user_id,timestamp,image,type,user2_id,post_id
                       					   FROM posts
                           WHERE user_id= $uid AND type='$jpg' OR type='$gif'  ORDER BY Rand() DESC  LIMIT  2
                             ";
		
	}
	 $queryt=mysqli_query($conn, $queryhqs);

							 
		mysqli_close($conn);
		while ($rowe = mysqli_fetch_array($queryt)) {
	
		
		//$postsss = $row['posts'];
		$imagessx = $rowe['image'];
		$suggestedpid = $rowe['id'];
		$imagetype = $rowe['type'];
		}
		
		if($views > 5 ){
	if($user_id==$uid ){
	}else{
	if($imagessx){
	if($suggestedpid==$id){
	
	
	}else{
		
echo "  <div data-effect='cube' class='swiper-container swiper-init ks-demo-slider ks-cube-slider'>
     
      <div class='swiper-wrapper'>";
 		
 
  

	 //echo"<p>More From $name(@$username)</p>";

	echo "<div class='swiper-slide'>
	<p>More media from $name(@$username)</p>
	<div style='background-image:url($imagessx)' class='swiper-zoom-container'>";
		if($imagetype==gif){
				echo "<a HREF='photo.php?pid=$suggestedpid' ><p> View Photo(GIF) </p></a></br></div>";
					}elseif($imagetype==mp4){
						
						echo"
				<a href='photo.php?pid=$suggestedpid' data-popup='.demo-popup'>	<video controls  preload=metadata width=45%  poster='$imagesso'> <source src='$imagessx' type='video/$type '> </video>	</a>	
			";
	  
					}elseif($imagetype==webm){
					
						echo"
				<a href='photo.php?pid=$suggestedpid' data-popup='.demo-popup'>	<video controls  width=40%  poster='$imagesso'> <source src='$imagessx' type='video/$type '> </video>	</a>	
			";
	  
					}
					
					else{
		echo"
 <a HREF='photo.php?pid=$suggestedpid' ><img class='lazy lazy-fadeIn ks-demo-lazy'  src='$imagessx'	height='25%' width='25%'/> </a>
		";
	  
					}				



			
echo"</div></div>

         </div>
		 
	  
		 
    </div>
";  
							}
				}
			}
		}else{

if(date("Hi") < "1400") {

	
	echo" <!-- Begin BidVertiser code 
<SCRIPT SRC='http://bdv.bidvertiser.com/BidVertiser.dbm?pid=626169&bid=1856249' TYPE='text/javascript'></SCRIPT>
 End BidVertiser code --> ";

}elseif(date("Hi") > "1400" && date("Hi") <"1700" ){
	
	echo" <!-- Begin BidVertiser code 
<SCRIPT SRC='http://bdv.bidvertiser.com/BidVertiser.dbm?pid=626169&bid=1856249' TYPE='text/javascript'></SCRIPT>
 End BidVertiser code --> ";

}else{

}
}







?>
