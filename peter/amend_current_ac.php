<?php
session_start();
include '../common/db.inc.php';

date_default_timezone_set('Europe/London');
$sql = "SELECT customer.customerNumber, firstName, surname, accountHolder.accountNumber, balance, overdraftLimit 
		FROM customer, accountHolder, currentAccount
		WHERE customer.customerNumber = accountHolder.customerNumber AND accountHolder.accountNumber = currentAccount.accountNumber AND currentAccount.closed = '0' AND customer.deleted =0
		ORDER BY surname desc";

if(!$result = mysqli_query($con,$sql))
	{
		die('Error in query' . mysqli_error());
	}

echo "<select name = 'listbox' id='listbox' onclick='CustomerDetails(this)' onclick='disabled=true'";
echo "<br><option id='-1' selected disabled hidden value ='&nbsp;,&nbsp;,&nbsp;,</br>,</br>,</br>'></option>";

while($row = mysqli_fetch_array($result))
	{
		$ID= $row['customerNumber'];
		$Fname = $row['firstName'];
		$Last = $row['surname'];
		$Name = $row['surname'] . " " .$row['firstName'];
		$Account =$row['accountNumber'];
		$Bal =$row['balance'];
		$Limit =$row['overdraftLimit'];
		
		$display ="$ID, $Fname $Last,$Account, $Bal, $Limit";
		echo"<option id='$ID' value = '$display'>$Name</option>";
	}	
echo"</select>";	

mysqli_close($con);
?>
