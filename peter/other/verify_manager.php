<?php 
/*
* File Produced By: Tom Anderson - C00174844 - 2015
* Purpose: 			
*/
include "../tom/verify_user.php";

if (!ISSET($_SESSION['manager']))
{
	
	header ("location: ../tom/manager_login.html.php") ;
	exit;
}


?>