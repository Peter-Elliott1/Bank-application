<?php 
/*
* File Produced By: Tom Anderson - C00174844 - 2015
* Purpose: 			
*/
include "../other/verify_user.php";

if (!ISSET($_SESSION['manager']))
{
	
	header ("location: ../other/manager_login.html.php") ;
	exit;
}


?>