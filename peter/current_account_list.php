<?php
include '../common/db.inc.php';
date_default_timezone_set('Europe/London');

$sql = "(SELECT	accountholder.customerNumber, accountholder.accountType,    currentaccount.accountNumber,
    currentaccount.balance, currentaccount.overdraftLimit
FROM
    currentaccount 
JOIN accountholder ON accountholder.accountNumber = currentaccount.accountNumber
WHERE currentAccount.closed = 0 AND accountholder.accountType = 'current')";

if(!$result = mysqli_query($con,$sql))
	{
		die('Error in query' . mysqli_error());
	}

echo "<select name='Accountlist' id='Accountlist' onclick='showBal(this)'>";
echo "<br><option id='-1' selected disabled hidden value ='</br>,</br>,</br>,</br>'></option>";
$listedID = array("-1"); //list of already used IDs to prvent dublication from query of customers with multiple accounts

while($row = mysqli_fetch_array($result))
	{
		if(in_array($row['accountNumber'], $listedID) == FALSE)
		{
			$ID= $row['customerNumber'];
			$AccountID = $row['accountNumber'];
			$Type =$row['accountType'];
			$Bal =$row['balance'];
			$Limit =$row['overdraftLimit'];

			
			$Details ="$ID, $AccountID, $Bal ,$Limit,$Type";
			echo"<option id='$ID' value ='$Details' hidden>$Type Account : $AccountID</option>";
			
			array_push($listedID, $row['accountNumber']); 
		}
	}	
echo"</select>";	
mysqli_close($con);
?>