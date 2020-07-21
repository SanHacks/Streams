<?php ob_start(); ?>
<?php 
session_start();
$user = $_SESSION['user_id'];
?>

<?php

if(!$user){

header('location:index.php');
}

		if($_POST['birth']){

    $bday  =  $_POST['day']; 
    $bmonth  =  $_POST['month']; 
    $byear  =  $_POST['year']; 
	
	//Zodiac determination
	if($bmonth==3 && $bday > 20){
	$sign="Aries";
								}
								

								if($bmonth==4 && $bday < 19){
	$sign="Aries";
								}
								
								
								if($bmonth==4 && $bday > 19){
	$sign="Taurus";
								}
								if($bmonth==5 && $bday < 20){
	$sign="Taurus";
								}
	
								if($bmonth==5 && $bday > 20){
	$sign="Gemini";
								}
								if($bmonth==6 && $bday < 20){
	$sign="Gemini";
								}
	//
	
								if($bmonth==6 && $bday > 20){
	$sign="Cancer";
								}
								if($bmonth==7 && $bday < 22){
	$sign="Cancer";
								}	
								//
	
								if($bmonth==7 && $bday > 22){
	$sign="Leo";
								}
								if($bmonth==8 && $bday < 22){
	$sign="Leo";
								}
	
								//
	
								if($bmonth==8 && $bday > 22){
	$sign="Virgo";
								}
								if($bmonth==9 && $bday < 22){
	$sign="Virgo";
								}							if($bmonth==8 && $bday > 22){
	$sign="Libra";
								}
								if($bmonth==10 && $bday < 22){
	$sign="Libra";
								}			//
	
								if($bmonth==10 && $bday > 22){
	$sign="Scorpio";
								}
								if($bmonth==11 && $bday < 21){
	$sign="Scorpio";
								}			//
	
								if($bmonth==11 && $bday > 21){
	$sign="Sagittarius";
								}
								if($bmonth==12 && $bday < 21){
	$sign="Sagittarius";
								}			//
	
								if($bmonth==12 && $bday > 21){
	$sign="Capricorn";
								}
								if($bmonth==1 && $bday < 19){
	$sign="Capricorn";
								}			//
	
								if($bmonth==1 && $bday > 20){
	$sign="Aquarius";
								}
								if($bmonth==2 && $bday < 19){
	$sign="Aquarius";
								}			//
	
								if($bmonth==2 && $bday > 19){
	$sign="Pisces";
								}
								if($bmonth==3 && $bday < 20){
	$sign="Pisces";
								}		
	
	
	$about =$_POST['about'];
          include 'connect.php';
        $sqls="UPDATE users  SET zodiac='$sign'
		WHERE id='$user'
                      ";
					  mysqli_query($conn, $sqls);
         
        $queryaw ="INSERT INTO birthinfo(user_id,bday,bmonth,byear,zodiac) VALUES
		('$user','$bday','$bmonth','$byear','$sign')";
					  		mysqli_query($conn, $queryaw);
          mysqli_close($conn);
		  header('location:about-settings.php?success=success');
		exit();
							}

?><?php ob_end_flush();?>