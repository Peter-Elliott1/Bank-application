<?php
/*
* File Produced By: Tom Anderson - C00174844 - 2015
* Purpose: 			
*/
session_start();
date_default_timezone_set("Europe/Dublin");
include "verify_user.html.php";
include '../common/db.inc.php';


		
		
$accountDetails = strtok($_POST['selectaccount'],'#');
$customerId = $accountDetails;
$accountDetails = strtok('#');
$balance =  $accountDetails;
$accountDetails = strtok('#');
$accountType =  $accountDetails;
$accountDetails = strtok('#');
$accountNumber =  $accountDetails;
$amount = $_POST['amount'];
$transactionType = "lodgement";
$balanceAfter = $balance + $amount;
$date = date('Y-m-d');

$sql = "SELECT max(transactionID) AS MAXNUM FROM transaction ;";

	if (!$result = mysql_query($sql, $con))
	{
		die ('Error in querying the database, query 1 ' . mysql_error());
	}	
	
	$rowcount = mysql_affected_rows();
	
	if ($rowcount == 1) 
	{
		$row= mysql_fetch_array($result);
		$transactionId = $row['MAXNUM'] +1;
	} else 
	{
		$transactionId = 1;
	}



$sql = "INSERT INTO transaction ( transactionID ,accountNumber, amount,balanceAfter,date, type)
		VALUES ( $transactionId, $accountNumber,$amount,$balanceAfter,'$date','$transactionType')";

if (!$result == mysql_query($sql, $con))
{
	die ('Error in querying the database, query 2 insert' . mysql_error());
}	else 
	
	{
		$_SESSION['returnMessage'] = "' $date Added lodgement of $amount to $accountType account no $accountNumber'";
	}

	$accountTable = strtolower($accountType)."Account";
	
$sql = "UPDATE $accountTable 
		SET balance = $balanceAfter
		WHERE accountNumber = $accountNumber;";	
		
		if (!$result = mysql_query($sql, $con))
	{
		die ('Error in querying the database, query 3 update balance' . mysql_error());
	}	
		
		

	mysql_close($con);
header ("location: lodgements.html.php") ;

?>
