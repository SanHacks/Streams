<?php ob_start(); 
?>
<?php include"sessions.php"; 
		$page="allowed";

?>
	<?php
	if(!$user_id){
	header("location: index.php");
	exit;
				}
		
 	if($user_id){
		include "connect.php";
		$queryh = "SELECT id,username,avatar,background,name,aboutme,hometown,followers,following,auth,facebook,pbackcolor,backcolor,stats,bback,posts,avatarpro,twitter,img,loc,email
                              FROM users 
                              WHERE id='$user_id'
                             ";
						 $query=mysqli_query($conn, $queryh);		 
							 
		mysqli_close($conn);
		$row = mysqli_fetch_assoc($query);
		//This one describes itself
		$username = $row['username'];
		$uid = $row['id'];
		$image = $row['avatar'];
		$imagepro = $row['avatarpro'];
		$back = $row['background'];
		$name = $row['name'];
		$about = $row['aboutme'];
		$followers = $row['followers'];
		$following = $row['following'];
        $hometown = $row['hometown'];
        $facebook = $row['facebook'];
        $auth = $row['auth'];
		$twitter=$row['twitter'];
		$postcolor=$row['pbackcolor'];
		$backgroundc=$row['backcolor'];
		$stats=$row['stats'];
		$bback=$row['bback'];
		$posts=$row['posts'];
		$email=$row['email'];
		$loc = $row['loc'];
				}
						  if($user_id){
  		include "connect.php";
		$birth ="SELECT id,user_id,bday,bmonth,byear,state,zodiac
                              FROM birthinfo 
                              WHERE user_id='$user_id'
                             ";
							 							$getbinfo=mysqli_query($conn, $birth);
		mysqli_close($conn);
		$rowq = mysqli_fetch_array($getbinfo);
		$byear = $rowq['byear'];
		$bday = $rowq['bday'];
		$bmonth = $rowq['bmonth'];
		$pri = $rowq['state'];
		$sign = $rowq['zodiac'];
		}
		?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>IntelliFeed</title>
		 <!-- Path to Framework7 Library CSS-->
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link rel="stylesheet" href="css/framework7.material.min.css">
		<!-- Path to your custom app styles-->
		 <link rel="stylesheet" href="css/framework7.material.colors.min">
		<link rel="stylesheet" href="css/my-app.css">	
		
    </head>
    <body <?php echo"style='background-color:$backgroundc;'"; ?>>
		
		<div class="views">
			<div class="view view-main">
				<div class="pages navbar-fixed toolbar-fixed">
					<div class="page" data-page="index">
   <div class="navbar " style="background-color:#0c56ac" >
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
      <div class="center"><?php echo"$name"; ?></div>
   
    </div>
  </div>
  					
		
	
						<div class="page-content">

						
	  <?php
	  	  echo"  <div class='card' style='background-image:url()' >
      <div class='card-content'>
        <div class='ks-grid'>
		  <div class='row no-gutter'>
          <div class='col-33'></div>
          <div class='col-33'><img src='$image' width='100%'/>
		  </div>
          <div class='col-33'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>";
		  
		  	if($auth==1){
						
						echo "		
		  <i class='icon material-icons'>verified_user</i></div>
         ";
						
					}
					else{
						
						echo "  ";
					}
			
		echo"
		 <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		</div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>$name</div>
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'><i class='icon material-icons'>account_box</i>@$username</div>
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>
		<div class='row no-gutter'>
          <div class='col-20'></div>
          <div class='col-20'></div>
          <div class='col-20'>";
		   if($hometown){
					  echo"
		  <i class='icon material-icons'>location_on</i>$hometown
		  ";}
		  
		  echo"
		  </div>
		  
          <div class='col-20'></div>
          <div class='col-20'></div>
        </div>";
			if($bday){
								if($pri==1){
								
					echo "<p style='color:black';>$bday ";
					if ($bmonth== '1') { echo ' January'; } 
					if ($bmonth== '2') { echo ' February'; } 
					 if ($bmonth== '3') { echo ' March'; }
				 if ($bmonth== '4') { echo ' April'; } 
					 if ($bmonth== '5') { echo ' May'; } 
					if ($bmonth== '6') { echo ' June'; } 
					 if ($bmonth== '7') { echo ' July'; } 
					 if ($bmonth== '8') { echo ' August'; } 
					 if ($bmonth== '9') { echo ' September'; } 
					 if ($bmonth== '10') { echo ' October'; } 
					 if ($bmonth== '11') { echo ' November'; } 
				    if ($bmonth== '12') { echo ' December'; } 
              echo " $byear</p><a href='zodiac.php?search=$sign'>";
			 
			  if($sign=="Aries"){
			  echo"<h2>♈";
			  }elseif($sign=="Taurus"){
			  echo"<h2>♉ ";
			   }elseif($sign=="Gemini"){
			   
			    echo"<h2>♊</h2>";
			   
			    }elseif($sign=="Cancer"){
				
				 echo"<h2>♋";
				 }elseif($sign=="Leo"){
				  echo"<h2>♌";
				 
				  }elseif($sign=="Virgo"){
				   echo"<h2>♍";
				  
				   }elseif($sign=="Libra"){
				   echo"<h2>♎";
				   }elseif($sign=="Scorpio"){
				   echo"<h2>♏";
				   
				   }elseif($sign=="SAGITTARIUS"){
				   echo"<h2>♐";
				   
				   }elseif($sign=="Capricorn"){
				   echo"<h2>♑ ";
				   
				   }elseif($sign=="Aquarius"){
				   echo"<h2>♒";
				   }elseif($sign=="Pisces"){
				   echo"<h2>♓";
				   }
				   
				   
				   
			  
			   echo" $sign</h2></a>";
								
										 }
						}
		if($about){
					echo "<p style='color:silver,align:center';> $about </p>";
								}
		
		echo"
		</div>
		
		
		
	
       

		
		
		
		
		
		
		
		
		
		
		
		
		
	

	
    </div>
	";
		
		 echo" 
	  <div class='list-block accordion-list'>
      <ul>
       <li>  <form enctype='multipart/form-data' id='form1' method='post' action='profileupdate-name.php'>
						
					
		 							   <div class='item-inner'>
                <div class='item-title'>Name:</div>
              </div>
						
  <p>  <input name='name' type='text' id='file' value='$name' size='20'> 
  </p>            
				
						 
							
					
							 <p class='buttons-row'> <input class='link  button button-fill' value='Save'   type='submit' name='edit11'  style='background-color:teal'>
							 
							 		<input class='link  button button-fill' value='Clear' type='reset' /></p>
							 
	  </form>
        </li>
  
      </ul>
	        <ul>
       <li>  <form enctype='multipart/form-data' id='form1' method='post' action='profileupdate-bio.php'>
						
								   <div class='item-inner'>
                <div class='item-title'>Bio:</div>
              </div>
		 				
							
  <p>  <input name='about' type='text' id='file' value='$about' size='20'> 
  </p>            
				
						 
							
					
							 <p class='buttons-row'> <input class='link  button button-fill' value='Save'   type='submit' name='edit11'  style='background-color:teal'>
							 
							 		<input class='link  button button-fill' value='Clear' type='reset' /></p>
							 
	  </form>
        </li>
  
      </ul>
	  

	
	        <ul>
       <li>  <form enctype='multipart/form-data' id='form1'>
						
					
		 					   <div class='item-inner'>
                <div class='item-title'><i class='icon f7-icons'>place</i>Contact:</div>
              </div>
					
						
  <p>  <input name='name' type='text' id='file' value='$email' size='20'> 
  </p>            
				
						 
							
					
				
							 
	  </form>
        </li>
  
      </ul>
		        <ul>
       <li>  <form enctype='multipart/form-data' id='form1' method='post' action='profileupdate-location.php'>
						
					
		 				   <div class='item-inner'>
                <div class='item-title'><i class='icon f7-icons'>place</i>Location:</div>
              </div>
							
						
  <p>  <input name='location' type='text' id='file' value='$hometown' size='20'> 
  </p>            
				
						 
							
					
							 <p class='buttons-row'> <input class='link  button button-fill' value='Save'   type='submit' name='edit11'  style='background-color:teal'>
							 
							 		<input class='link  button button-fill' value='Clear' type='reset' /></p>
							 
	  </form>
        </li>
			 
		
		";
		
  	if($hometown){
		
											if($loc==1){
					echo "
					  <div class='item-inner'>
                <div class='item-title'><i class='icon f7-icons'>place</i>Share location:</div>
              </div>
					<p class='buttons-row'><a href='undo-loc.php' class='button button-fill button-raised' style='background-color:purple' >Sharing location(on posts)</a></p>
					";

					
							}else{
							
							echo "
							
							  <div class='item-inner'>
                <div class='item-title'><i class='icon f7-icons'>place</i>Share location:</div>
              </div>
							<p class='buttons-row'><a href='share-loc.php' class='button button-fill button-raised' style='background-color:purple' >Share location(on posts)</a></p>
							
							"; 
							
				}
				}

			
    echo"  </ul>
    </div>
	
	
	";
	  	
	
		
	  
       		?>

	    <div class="list-block">
		   <div class="item-inner">
                <div class="item-title">Birth information</div>
              </div>
	  					<form  method="post" action="birth-info.php">
						
				  <div class="ks-grid">   
        <div class="row">
          <div class="col-33">	<select name="day" class="item-link smart-select">
					<option value="1"<?php if ($bday == '1') { echo ' selected'; } ?>>01</option>
					<option value="2"<?php if ($bday == '2') { echo ' selected'; } ?>>02</option>
					<option value="3"<?php if ($bday == '3') { echo ' selected'; } ?>>03</option>
					<option value="4"<?php if ($bday == '4') { echo ' selected'; } ?>>04</option>
					<option value="5"<?php if ($bday == '5') { echo ' selected'; } ?>>05</option>
					<option value="6"<?php if ($bday == '6') { echo ' selected'; } ?>>06</option>
					<option value="7"<?php if ($bday == '7') { echo ' selected'; } ?>>07</option>
					<option value="8"<?php if ($bday == '8') { echo ' selected'; } ?>>08</option>
					<option value="9"<?php if ($bday == '9') { echo ' selected'; } ?>>09</option>
					<option value="10"<?php if ($bday == '10') { echo ' selected'; } ?>>10</option>
					<option value="11"<?php if ($bday == '11') { echo ' selected'; } ?>>11</option>
					<option value="12"<?php if ($bday == '12') { echo ' selected'; } ?>>12</option>
					<option value="13"<?php if ($bday == '13') { echo ' selected'; } ?>>13</option>
					<option value="14"<?php if ($bday == '14') { echo ' selected'; } ?>>14</option>
					<option value="15"<?php if ($bday == '15') { echo ' selected'; } ?>>15</option>
					<option value="16"<?php if ($bday == '16') { echo ' selected'; } ?>>16</option>
					<option value="17"<?php if ($bday == '17') { echo ' selected'; } ?>>17</option>
					<option value="18"<?php if ($bday == '18') { echo ' selected'; } ?>>18</option> 
					<option value="19"<?php if ($bday == '19') { echo ' selected'; } ?>>19</option>
					<option value="20"<?php if ($bday == '20') { echo ' selected'; } ?>>10</option>
					<option value="21"<?php if ($bday == '21') { echo ' selected'; } ?>>11</option>
					<option value="22"<?php if ($bday == '22') { echo ' selected'; } ?>>22</option>
					<option value="23"<?php if ($bday == '23') { echo ' selected'; } ?>>23</option>
					<option value="24"<?php if ($bday == '24') { echo ' selected'; } ?>>24</option>
					<option value="25"<?php if ($bday == '25') { echo ' selected'; } ?>>25</option>
					<option value="26"<?php if ($bday == '26') { echo ' selected'; } ?>>26</option>
					<option value="27"<?php if ($bday == '27') { echo ' selected'; } ?>>27</option>
					<option value="28"<?php if ($bday == '28') { echo ' selected'; } ?>>28</option>
					<option value="29"<?php if ($bday == '29') { echo ' selected'; } ?>>29</option>
					<option value="30"<?php if ($bday == '30') { echo ' selected'; } ?>>30</option>
					<option value="31"<?php if ($bday == '31') { echo ' selected'; } ?>>31</option>
				</select>
				</div>
          <div class="col-33">		<select name="month" class="item-link smart-select">
					<option value="1"<?php if ($bmonth== '1') { echo ' selected'; } ?>>January</option>
					<option value="2"<?php if ($bmonth== '2') { echo ' selected'; } ?>>February</option>
					<option value="3"<?php if ($bmonth== '3') { echo ' selected'; } ?>>March</option>
					<option value="4"<?php if ($bmonth== '4') { echo ' selected'; } ?>>April</option>
					<option value="5"<?php if ($bmonth== '5') { echo ' selected'; } ?>>May</option>
					<option value="6"<?php if ($bmonth== '6') { echo ' selected'; } ?>>June</option>
					<option value="7"<?php if ($bmonth== '7') { echo ' selected'; } ?>>July</option>
					<option value="8"<?php if ($bmonth== '8') { echo ' selected'; } ?>>August</option>
					<option value="9"<?php if ($bmonth== '9') { echo ' selected'; } ?>>September</option>
					<option value="10"<?php if ($bmonth== '10') { echo ' selected'; } ?>>October</option>
					<option value="11"<?php if ($bmonth== '11') { echo ' selected'; } ?>>November</option>
					<option value="12"<?php if ($bmonth== '12') { echo ' selected'; } ?>>December</option>
				</select>
			</div>
          <div class="col-33">			
				<select name="year" class="item-link smart-select">
					<option value="1970"<?php if ($byear == '1970') { echo ' selected'; } ?>>1980</option>
					<option value="1971"<?php if ($byear == '1971') { echo ' selected'; } ?>>1971</option>
					<option value="1972"<?php if ($byear == '1972') { echo ' selected'; } ?>>1972</option>
					<option value="1973"<?php if ($byear == '1973') { echo ' selected'; } ?>>1973</option>
					<option value="1974"<?php if ($byear == '1974') { echo ' selected'; } ?>>1974</option>
					<option value="1975"<?php if ($byear == '1975') { echo ' selected'; } ?>>1975</option>
					<option value="1976"<?php if ($byear == '1976') { echo ' selected'; } ?>>1976</option>
					<option value="1977"<?php if ($byear == '1977') { echo ' selected'; } ?>>1977</option>
					<option value="1978"<?php if ($byear == '1978') { echo ' selected'; } ?>>1978</option>
					<option value="1979"<?php if ($byear == '1979') { echo ' selected'; } ?>>1979</option>	

					<option value="1990"<?php if ($byear == '1990') { echo ' selected'; } ?>>1980</option>
					<option value="1981"<?php if ($byear == '1981') { echo ' selected'; } ?>>1981</option>
					<option value="1982"<?php if ($byear == '1982') { echo ' selected'; } ?>>1982</option>
					<option value="1983"<?php if ($byear == '1983') { echo ' selected'; } ?>>1983</option>
					<option value="1984"<?php if ($byear == '1984') { echo ' selected'; } ?>>1984</option>
					<option value="1985"<?php if ($byear == '1985') { echo ' selected'; } ?>>1985</option>
					<option value="1986"<?php if ($byear == '1986') { echo ' selected'; } ?>>1986</option>
					<option value="1987"<?php if ($byear == '1987') { echo ' selected'; } ?>>1987</option>
					<option value="1988"<?php if ($byear == '1988') { echo ' selected'; } ?>>1988</option>
					<option value="1989"<?php if ($byear == '1989') { echo ' selected'; } ?>>1989</option>
						
					<option value="1990"<?php if ($byear == '1990') { echo ' selected'; } ?>>1990</option>
					<option value="1991"<?php if ($byear == '1991') { echo ' selected'; } ?>>1991</option>
					<option value="1992"<?php if ($byear == '1992') { echo ' selected'; } ?>>1992</option>
					<option value="1993"<?php if ($byear == '1993') { echo ' selected'; } ?>>1993</option>
					<option value="1994"<?php if ($byear == '1994') { echo ' selected'; } ?>>1994</option>
					<option value="1995"<?php if ($byear == '1995') { echo ' selected'; } ?>>1995</option>
					<option value="1996"<?php if ($byear == '1996') { echo ' selected'; } ?>>1996</option>
					<option value="1997"<?php if ($byear == '1997') { echo ' selected'; } ?>>1997</option>
					<option value="1998"<?php if ($byear == '1998') { echo ' selected'; } ?>>1998</option>
					<option value="1999"<?php if ($byear == '1999') { echo ' selected'; } ?>>1999</option>
					<option value="2000"<?php if ($byear== '2000') { echo ' selected'; } ?>>2000</option>
					<option value="2001"<?php if ($byear== '2001') { echo ' selected'; } ?>>2001</option>
					<option value="2002"<?php if ($byear== '2002') { echo ' selected'; } ?>>2002</option>
					<option value="2003"<?php if ($byear== '2003') { echo ' selected'; } ?>>2003</option>
					<option value="2004"<?php if ($byear== '2004') { echo ' selected'; } ?>>2004</option>
					<option value="2005"<?php if ($byear== '2005') { echo ' selected'; } ?>>2005</option>
					<option value="2006"<?php if ($byear== '2006') { echo ' selected'; } ?>>2006</option>
					<option value="2007"<?php if ($byear== '2007') { echo ' selected'; } ?>>2007</option>
					<option value="2008"<?php if ($byear== '2008') { echo ' selected'; } ?>>2008</option>
					<option value="2009"<?php if ($byear== '2009') { echo ' selected'; } ?>>2009</option>
					<option value="2010"<?php if ($byear== '2010') { echo ' selected'; } ?>>2010</option>
					<option value="2011"<?php if ($byear== '2011') { echo ' selected'; } ?>>2011</option>
					<option value="2012"<?php if ($byear== '2012') { echo ' selected'; } ?>>2012</option>
					<option value="2013"<?php if ($byear== '2013') { echo ' selected'; } ?>>2013</option>
					<option value="2014"<?php if ($byear== '2014') { echo ' selected'; } ?>>2014</option>
					<option value="2015"<?php if ($byear== '2015') { echo ' selected'; } ?>>2015</option>
				</select></div>
        </div>	
			</div>		
					
				
		
		
				<?php			if(!$rowq['bday']){
				echo'<input class="link  button button-fill" value="Save Birth Info" type="submit" name="birth"/>';
				}
				?>
					</form>
					</div>
      </div>
    </div>	

       		
	
					
						</div>	
	
					</div>								
				</div>					
			</div>
		</div>
		
	
    

</body>
</html>
