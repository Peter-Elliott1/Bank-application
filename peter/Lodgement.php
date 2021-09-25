<?php
date_default_timezone_set("Europe/Dublin");

include '../common/db.inc.php';
$Account_data = $_POST['Accountlist'];
$Account_info = explode(",", $Account_data);
$Account_customerID = $Account_info[0];
$Account_accountID = $Account_info[1];
$Account_Balance = $Account_info[2];
$Account_Limit = $Account_info[3];
$Account_Type = $Account_info[4];
$date = date('Y-m-d');
$Amount = $_POST['Amount'];

$NewBalance = intval($Account_Balance) + intval($_POST['Amount']);

$sql = "SELECT max(transactionID) as MAXNUM
		FROM transaction";

	if(!$result = mysqli_query($con,$sql))
	{
		die('Error in query' . mysqli_error());
	}
	
	if(mysqli_affected_rows($con) == 1) 
	{
		$row= mysqli_fetch_array($result);
		$transactionId = $row['MAXNUM'] +1;
	} 
	else 
	{
		$transactionId = 1;
	}

echo $date;
$sql = "INSERT INTO transaction(transactionID, accountNumber, amount, date, balanceAfter, type)
		VALUES('$transactionId', '$Account_accountID', $Amount, '$date', '$NewBalance', '$Account_Type')";

if(!$result = mysqli_query($con, $sql))
{
	die ('Error in processing tranaction with '. $Account_Type . ' account ' . mysqli_error());
}

if($Account_Type == "Current")
{
	$WithdrawalAccount = currentaccount;
}
else if($Account_Type == "loan")
{
	$WithdrawalAccount = loanaccount;
}
else
{
	$WithdrawalAccount = depositaccount;
}

$sql = "UPDATE $WithdrawalAccount
		SET balance = $NewBalance
		WHERE accountNumber = $Account_accountID";
	
if(!$result = mysqli_query($con, $sql))
{
	die ('Error unable to create current account ' . mysqli_error());
}

mysqli_close($con);
header("location:  lodgements.html.php") ;
?>