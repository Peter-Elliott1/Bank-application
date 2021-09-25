<?php
/*GROUP UNIT - Group A 
* By :
* Tom Anderson
* Peter Elliot
* Ciara McMahon
* Liam Maloney
*/
$hostname = "localhost";
$username = "banker";
$password = "javascript";

$dbname = "bank";

$con = mysqli_connect($hostname, $username, $password);

if (!$con)
{
	die ("Could not connect : ".mysqli_error());
}

if (!mysqli_select_db($con, $dbname))
{
	die("Error in selecting the database");
} 

?>