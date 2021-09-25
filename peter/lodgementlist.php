<?php
include '../common/db.inc.php';
date_default_timezone_set('Europe/London');

$sql = "(
    SELECT
        accountholder.customerNumber,
        accountholder.accountType AS ACCOUNT,
        currentaccount.accountNumber AS Account_ID,
        currentaccount.balance AS Bal,
        currentaccount.overdraftLimit AS Overlimit,
    	customer.firstName,
        customer.surname,
        customer.address1,
        customer.address2,
        customer.address_town,
        customer.address_county
    FROM
        currentaccount
    JOIN accountholder ON accountholder.accountNumber = currentaccount.accountNumber
    JOIN customer ON customer.customerNumber = accountholder.customerNumber
    WHERE
        currentAccount.closed = 0 AND accountholder.accountType = 'current'
)
UNION
(SELECT accountholder.customerNumber, accountholder.accountType AS ACCOUNT,
	depositaccount.accountNumber AS Account_ID,	depositaccount.balance AS Bal,
	depositaccount.closed AS Overlimit,	customer.firstName,	customer.surname, 
	customer.address1,	customer.address2, customer.address_town,customer.address_county
FROM depositaccount
JOIN accountholder ON accountholder.accountNumber = depositaccount.accountNumber
JOIN customer ON customer.customerNumber = accountholder.customerNumber
WHERE depositaccount.closed = 0 AND accountholder.accountType = 'deposit')
UNION
(SELECT accountholder.customerNumber, accountholder.accountType AS ACCOUNT,
        loanaccount.accountNumber AS Account_ID, loanaccount.balance AS Bal,    
		loanaccount.closed AS Overlimit, customer.firstName, customer.surname,
        customer.address1, customer.address2, customer.address_town, customer.address_county
FROM loanaccount
JOIN accountholder ON accountholder.accountNumber = loanaccount.accountNumber
JOIN customer ON customer.customerNumber = accountholder.customerNumber
WHERE loanaccount.closed = 0 AND accountholder.accountType = 'loan')";
			
if(!$result = mysqli_query($con, $sql))
	{
		die('Error in query' . mysqli_error());
	}

echo "<select name = 'listbox' id='listbox' onclick='Withdraw(this)'";
echo "<br><option id='0' selected disabled hidden value ='&nbsp;,</br>,</br>,</br></br></br></br></br></br>'></option>";
$lastID = '0';
$listedID = array("0"); //list of already used IDs to prvent dublication from query of customers with multiple accounts
while($row = mysqli_fetch_array($result))
	{
		if(in_array($row['customerNumber'], $listedID) == FALSE)
		{
			$ID= $row['customerNumber'];
			$Name = $row['firstName'] . " " . $row['surname'];
			$Home = $row['address1'] ."<br>" . $row['address2']  ."<br>" . $row['address_town'] ."<br>" . $row['address_county'];
			$display ="$ID,$Name,$Home";
			
			echo"<option id='$ID' value = '$display'>$Name</option>";
			array_push($listedID, $row['customerNumber']); 
		}
	}
echo"</select>";	
mysqli_close($con);
?>