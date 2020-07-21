<?php
include 'connect.php';
if(isSet($_POST['username']))
{
$username = $_POST['username'];
         $queryaw = "SELECT username                             FROM users                             WHERE username='$username'                            ";							$sql_check =mysqli_query($conn, $queryaw) ;

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