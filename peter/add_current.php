<?php
date_default_timezone_set('Europe/London');
include '../common/db.inc.php';

	$sql = "SELECT max(accountNumber) as Max FROM accountHolder";
	
	if (!$result = mysqli_query($con, $sql))
	{
		die ('Error in querying the database ' . mysqli_error($con));
	}
	
	$Rowcounter = mysqli_affected_rows($con);
	
	if($Rowcounter == 1) 
	{
		$Row= mysqli_fetch_array($result);
		$_SESSION['accountNumber'] = $Row['Max'] +1;
	}
       else 
	{
		$_SESSION['accountNumber'] = 1;
	}
	
	$Opendate = date('Y-m-d');

	$sql = "INSERT INTO currentAccount(accountNumber, balance, overdraftLimit, openDate)
			VALUES('$_SESSION[accountNumber]', '0.0', '$_POST[Limit]', '$Opendate')";
	  
	if (!$result = mysqli_query($con, $sql))
	{
		die ('Error unable to create current account ' . mysqli_error($con));
	}		
		
	$sql = "INSERT INTO accountHolder(customerNumber, accountNumber, accountType)
		VALUES('$_POST[UserID]', '$_SESSION[accountNumber]', 'Current')";	
		
	if (!$result = mysqli_query($con, $sql))
	{
		die ('Error could not inset account holder ' . mysqli_error($con));
	}	
	
	mysqli_close($con);
header ("location:  open_current_ac.html.php") ;

?>