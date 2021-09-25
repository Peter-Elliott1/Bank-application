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

$sql = "SELECT manager , password
		FROM password
		WHERE userName = '$_SESSION[username]'";
		
	if (!$result = mysql_query($sql, $con))
{
	die ('Error in querying the database, query 1' . mysql_error());
}
	

	$result = mysql_fetch_array($result);
	if ($result['password'] == $_POST['password'])
	{	
		if ($result['manager'] == 1)
		{
			$_SESSION['returnMessage'] = "'You may now select and use the management functions.'";
			$_SESSION['manager'] = 1;
			header("Location: default.html.php");
			exit ();
		} else 
		{
			$_SESSION['returnMessage'] = "'You do not have permission use the management functions.'";
			header("Location: default.html.php");
			exit ();
		}
					
	} 
	if ($_SESSION["attempts"] <= 0) 
	{
		UNSET($_SESSION['attempts']);
		$_SESSION['returnMessage'] = "'Manager login failed, no attempts remaining!!.'";
		header("Location: logout.html.php");
		
		exit();
	}
	
	$_SESSION['returnMessage'] = "'Manager login failed, $_SESSION[attempts] attempt(s) remaining.'";
	header("Location: manager_login.html.php");
	

?>
	