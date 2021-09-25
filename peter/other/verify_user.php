<?php 
/*
* File Produced By: Tom Anderson - C00174844 - 2015
* Purpose: 			
*/
session_start();
date_default_timezone_set('Europe/London');
if (!ISSET($_SESSION["username"])) 								//No user logged in. redirect to login page
{
	header ("location: ../tom/login.html.php") ;
	exit;
} else 
{
$_SESSION["iframePage"] = $_SERVER["REQUEST_URI"];			  //set the page that this file in now included in as session variable for refresh
}

?>