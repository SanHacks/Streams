<?php
include 'connect.php';
if(isSet($_POST['username']))
{
$username = $_POST['username'];
   

if(mysqli_num_rows($sql_check))
{
echo '<font color="red">The username<STRONG>'.$username.'</STRONG> is already taken.</font>';
}
else
{
echo 'OK';
}

}

?>