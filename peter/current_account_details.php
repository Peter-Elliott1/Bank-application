<?php
include '../common/db.inc.php';
date_default_timezone_set('Europe/London');

date_default_timezone_set('Europe/London');
$sql = "SELECT customer.customerNumber, firstName, surname, address1, address2, address_town ,address_county, birthDate, accountHolder.accountNumber 
		FROM customer, accountHolder, currentAccount
		WHERE customer.customerNumber = accountHolder.customerNumber AND accountHolder.accountNumber = currentAccount.accountNumber AND currentAccount.closed = '0' AND customer.deleted =0 AND accountHolder.accountType = 'Current'
		ORDER BY surname desc";

if(!$result = mysqli_query($con, $sql))
	{
		die('Error in query' . mysqli_error());
	}

echo "<select name = 'listbox' id='listbox' onclick='CustomerDetails(this)' onclick='disabled=true'";
echo "<br><option id='-1' selected disabled hidden value ='&nbsp;,&nbsp;,&nbsp;,</br>,</br>,</br>'></option>";
$listedID = array("0"); //list of already used IDs to prvent dublication from query of customers with multiple accounts

while($row = mysqli_fetch_array($result))
	{
		if(in_array($row['customerNumber'], $listedID) == FALSE)
		{
			$ID= $row['customerNumber'];
			$Fname = $row['firstName'] . $row['surname'];
			$Name = $row['surname'] . " " .$row['firstName'];
			$dob = date("d-m-y", strtotime($dob));
			$Home = $row['address1'] ."<br>" . $row['address2']  ."<br>" . $row['address_town'] ."<br>" . $row['address_county'];
			$Account =$row['accountNumber'];
			
			$display ="$ID,$Fname,$Home,$dob,$Account";
			echo"<option id='$ID' value = '$display'>$Name</option>";
			array_push($listedID, $row['customerNumber']); 
		}
	}	
echo"</select>";	

mysqli_close($con);
?>
