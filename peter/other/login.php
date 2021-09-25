<?php
/*
* File Produced By: Tom Anderson - C00174844 - 2015
* Purpose: 			
*/
session_start();
include '../common/db.inc.php';
if (! ISSET($_SESSION["attempts"]))
{
	$_SESSION["attempts"] = 3;
}

$_SESSION["attempts"]--;

$sql = "SELECT password , userName
		FROM password
		WHERE userName = '$_POST[username]'";
		
	if (!$result = mysql_query($sql, $con))
{
	die ('Error in querying the database, query 1' . mysql_error());
}
	
if (mysql_affected_rows() == 1 ) 
{
	
	$result = mysql_fetch_array($result);
	if ($result['password'] == $_POST['password'])
	{
		$_SESSION["username"] = $result['userName'];
		unset ($_SESSION["attempts"]);
		$_SESSION['returnMessage'] = "'You are logged in as $_SESSION[username].'";
		header("Location: default.html.php");
		exit;
	} 
	
}	
		
	if ($_SESSION["attempts"] <= 0) 
	{
		UNSET($_SESSION['attempts']);
		$_SESSION['returnMessage'] = "'Login failed, no attempts remaining!!.'";
		header("Location: logout.html.php");
		exit();
	}


$_SESSION['returnMessage'] = "'Login failed, $_SESSION[attempts] attempt(s) remaining.'";
	header("Location: login.html.php");

?>