function CustomerDetails(caller) 
{	//populate function for adment current account
	var Details;
	var targetID;
	var result;

	if( caller.name == "UserID")
	{
		Details = document.getElementById('listbox');
		targetID = document.getElementById(caller.value);
		
		try
		{
			result = targetID.value;
		}
		catch
		{
			Cleanup();
			return 0;
		}
		//document.getElementById('listbox').disabled =true;
	}
	else
	{
		Details = document.getElementById('listbox');
		result = Details.options[Details.selectedIndex].value;
	}
	
	var personalDetails = result.split(',');
	document.getElementById("UserID").value= personalDetails[0];
	document.getElementById("CustomerID").innerHTML = personalDetails[0];
	document.getElementById("CustomerName").innerHTML = personalDetails[1];
	document.getElementById("Home").innerHTML = personalDetails[2];
	document.getElementById("DOB").innerHTML = personalDetails[3];
	if(window.location.pathname.split("/").pop() != "open_current_ac.html.php")
	{//open_current_ac.html.php is the only page that does not use the following elements
		document.getElementById("AccID").innerHTML = personalDetails[4];
		document.getElementById('listbox').disabled =false;
		Showdetails(personalDetails[0]);//this is to pass the user ID to the account list
		document.getElementById("Accountlist").selectedIndex = -1;//sets listbox back to default
	}
}/*end of CustomerDetails*/

function Withdraw(caller) //populate function for the withdrawals page
{	Cleanup();
	var Details;
	var targetID;
	var result;
	var personalDetails;
	
	if(caller.name == "UserID")
	{
		Details = document.getElementById('listbox');
		targetID = document.getElementById(caller.value);
		document.getElementById('listbox').selectedIndex = targetID;
		try
		{
			result = targetID.value;
		}
		catch
		{
			Cleanup();
			return 0;
		}
		//.disabled = true; //if the lsitbox is not disabled it checks the list box  to the 
	}
	else
	{
		Details = document.getElementById('listbox');
		result = Details.options[Details.selectedIndex].value;
	} 

	personalDetails = result.split(',');
	document.getElementById("CustomerID").innerHTML = personalDetails[0];
	document.getElementById("UserID").value= personalDetails[0];
	document.getElementById("CustomerName").innerHTML = personalDetails[1];
	document.getElementById("Home").innerHTML = personalDetails[2] + "</br></br>";
	Showdetails(personalDetails[0]);//this is to pass the user ID to the account list
	document.getElementById("Accountlist").selectedIndex = -1;//sets listbox back to default
}/*end of Withdraw*/

function Showdetails(Customer)
{
	var accountData;
	var accountDetails;
	var checkdetails;
	
	for(let loop = 0; loop < document.getElementById('Accountlist').options.length; loop++)
	{
		accountData = document.getElementById('Accountlist').options[loop].value;
		accountDetails = accountData.split(',');
		
		if(Customer == accountDetails[0])
		{
			document.getElementById('Accountlist').options[loop].hidden = false;	
		}
		else
		{
			document.getElementById('Accountlist').options[loop].hidden = true;
			document.getElementById('Accountlist').selectedIndex.hidden =true;
			document.getElementById("AccID").innerHTML = "</br>";
			document.getElementById("Balance").innerHTML = "</br>";
			if(window.location.pathname.split("/").pop() != "lodgements.html.php")
				document.getElementById("AccLimit").innerHTML = "</br>";
		}
	}
}/* end of Showdetails */

function showBal(caller)
{//show details for customers individual accountd
	var personalDetails = caller.options[caller.selectedIndex].value.split(',');
	document.getElementById("AccID").innerHTML = personalDetails[1];//account id
	document.getElementById("Balance").innerHTML = personalDetails[2];//acoubnt balacne
	
	if(window.location.pathname.split("/").pop() != "lodgements.html.php")
	{
		if(personalDetails[3] == 0)
		{
			document.getElementById("AccLimit").innerHTML = "No limit";//account limit for deposit accounts
		}
		else	
		{
			document.getElementById("AccLimit").innerHTML =personalDetails[3];//account limit for current accounts
		}		
	}
	
	if(window.location.pathname.split("/").pop() != "withdrawals.html.php")
		document.getElementById("AccountID").value = personalDetails[1];//account id
	//Currrent account amend an close use an invisible input for post SQL queries
}/* end of showBal*/

function myCreate()
{
var reponse = confirm("Are you sure you want to proceed with this action");

	if(reponse == true)
	{	// this one is for the open current account
		alert("A new current account has been created for customer account: " + document.getElementById("UserID").value);
		return true;
	}
	else
	{	
		return false;
	}
}/* end of myCreate*/

function myUpdate()
{// this one is for the open current account
var reponse = confirm("Are you sure you want to proceed with this action");

	if(reponse == true)	{	
		alert("Account " + document.getElementById("AccountID").value + " has been updated");
		return true;
	}
	else{	
		return false;
	}
}/* end of myUpdate*/

function myDelete()
{
var reponse = confirm("Are you sure you want to proceed with this action");

	if(reponse == true)
	{	// this one is for the admend & close current account pages
		alert("Account " + document.getElementById("AccID").innerHTML + " has been closed");
		return true;
	}
	else
	{	
		return false;
	}
}/* end of myDelete*/

function makeWithdrawal(caller)
{
	var AccountWithdrawal = document.getElementById("Accountlist").value.split(',');
	
	if((parseInt(document.getElementById("Amount").value, 10) > parseInt(AccountWithdrawal[3], 10)) && AccountWithdrawal[4] == "Current")
	{//if account type is current and amount being withdrawn is greather then Limit alert and return  false
		alert("The amount of " + document.getElementById("Amount").value + " is greater then the " +
				AccountWithdrawal[3] + " Limit allowed for current account " + AccountWithdrawal[1]);
		return false;
	}
	else if(parseInt(document.getElementById("Amount").value, 10) > parseInt(AccountWithdrawal[2], 10))
	{//stops user from taking out more moeny then they have
		alert("The amount of " + document.getElementById("Amount").value + " is greater then the account balance of " +
				AccountWithdrawal[4] + " account " + AccountWithdrawal[1]);
		return false;
	}	
	var reponse = confirm("Are you sure you want to proceed with this action");
	
	if(reponse == true)
	{	// this one is for the admend & close current account pages
		
		alert("Customer account " + AccountWithdrawal[0] + " has withdrawn " +
				document.getElementById("Amount").value + " from " +	
				AccountWithdrawal[4] + " account " + AccountWithdrawal[1] );
		return true;
	}
	else
	{	
		return false;
	}
}/* end of makeWithdrawal*/

function makeLodgement(caller)
{
	var AccountWithdrawal = document.getElementById("Accountlist").value.split(',');
	var reponse = confirm("Are you sure you want to proceed with this action");
	
	if(reponse == true)
	{	// this one is for the admend & close current account pages
		alert("Customer account " + AccountWithdrawal[0] + " has made a lodgement of " +
				document.getElementById("Amount").value + " into " +	
				AccountWithdrawal[4] + " account " + AccountWithdrawal[1] );
		return true;
	}
	else
	{	
		return false;
	}
}/* end of makeWithdrawal*/

function Cleanup(caller)
{ //this function is used to clear the divs for the customer detail breaks are used to keep everything the same size
	if(window.location.pathname.split("/").pop() != "open_current_ac.html.php")
	{//The open account is the only page where the listbox for all account owned by all customs
		for(let loop = 1; loop < document.getElementById('Accountlist').options.length; loop++)
		{
			document.getElementById('Accountlist').options[loop].hidden = true;	
		}
	}
	/*Below is a list of common ID used in many of the pages for this project*/
	document.getElementById("CustomerID").innerHTML = "</br>";	
	document.getElementById("CustomerName").innerHTML = "</br>";
	document.getElementById("Home").innerHTML = "</br></br></br></br>";

	/*Below is a set lists of un ID used in one of the page of this project*/
	if(window.location.pathname.split("/").pop() == "withdrawals.html.php")
	{
		document.getElementById("Balance").innerHTML = "</br>";
		document.getElementById("AccID").innerHTML = "</br>";
		document.getElementById("AccLimit").innerHTML = "</br>";
		document.getElementById('Accountlist').selectedIndex = -1;
	}
	else if(window.location.pathname.split("/").pop() == "lodgements.html.php")
	{
		document.getElementById("AccID").innerHTML = "</br>";
		document.getElementById("Balance").innerHTML = "</br>";
	}
	else if(window.location.pathname.split("/").pop() == "open_current_ac.html.php")
	{	
		document.getElementById("DOB").innerHTML = "</br>";
	}
	else if(window.location.pathname.split("/").pop() == "close_current_ac.html.php")
	{
		document.getElementById("AccountID").value = "";
		document.getElementById("AccID").innerHTML = "</br>";
		document.getElementById("AccLimit").innerHTML = "</br>";
		document.getElementById("DOB").innerHTML = "</br>";
		document.getElementById("Balance").innerHTML = "</br>";
	}
	else if(window.location.pathname.split("/").pop() == "amend_current_ac.html.php")
	{
		document.getElementById("DOB").innerHTML = "</br>";
		document.getElementById("AccountID").value = "";
		document.getElementById("AccID").innerHTML = "</br>";
		document.getElementById("AccLimit").innerHTML = "</br>";
		document.getElementById("Balance").innerHTML = "</br>";
	}
}/*end of Cleanup*/