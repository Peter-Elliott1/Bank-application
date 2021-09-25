<?php 
/*
* File Produced By: Tom Anderson - C00174844 - 2015
* Purpose: 			
*/
include "verify_user.php";
$_SESSION['helptext'] = "'This is the help text that is specific to the lodgements form'";
include 'head.php';
?>
            <form name="lodgements" id="lodgements" method="post" onsubmit="return confirmCheck()" action="lodgements.php" >             
                <h2>Lodgements  <img src="../common/images/help-01.png" alt="Help" id="helpbtn" onmousedown="frameToggleHelp() " > </h2><?php

	
	
?>	          
			  <fieldset class="fullwidth">
			  <legend>Select Customer</legend>
			  	<label for="selectnumber">Customer Number :</label>
						<?php
						include 'cust_no_datalist.php';
						?>
						
						<label for="selectname">Customer Name :</label>
						<?php
						include 'cust_name_datalist.php';
						?>
                        
			  </fieldset>
			  
			  <fieldset class="halfwidth"> 
                		<legend>Customer Details </legend>
						<label >Name :</label>
						 <div id="normalname" name="normalname" > <br /></div> 	
                        <label >Address :</label>
                        <div id="address" name="address" /><br /><br /><br /><br /></div>
						 <label >Date of Birth :</label>
                        <div type="date" id="dob" name="dob" ><br /></div>
                        <label >Telephone :</label>
						 <div id="phone" name="phone"><br /></div>
						 </fieldset>
						 
		<fieldset class="halfwidth"> 
                	<legend> Account Details </legend>
						<br />
                        <label for="actypelist">Account :</label>
						<?php
						include "accountlist.php";
						?>
                        <br />
						<label for="balance" >Balance :</label>
                        <input type="text" id="balance" name="balance"  disabled /><br /><br />
						<label for="amount">Amount :</label>
                        <input type="text" id="amount" name="amount" disabled  required pattern="[0-9]+[.][0-9]{2}" placeholder="000.00" title="Please enter the value in euro and cent e.g 25.33, 33.00, or 0.25" oninput="activateForm()"><br /><br />
						
                      </fieldset>
					 
                <input type="submit" name="submit" id="submit" value="Save" disabled></input>
                <input type="reset" name="clear" value="Clear" onclick="resetForm()"></input>
			
   

            </form>
			
<script>

function populate(index)
{	//Check where the index came from and use the appropriate array
	if ( noarray[index] !== undefined && index == noarray[index].id) {
		var details = noarray[index];
	} else if ( namearray[index] !== undefined && index == namearray[index].sname + ", " + namearray[index].fname ){
		var details = namearray[index];
	//clear all the boxes and quit if the index is invalid
	} else {
		document.getElementById("selectnumber").value = "";
		document.getElementById("selectname").value = "";				
		document.getElementById("normalname").innerHTML = "<br />";
		document.getElementById("address").innerHTML =  "<br /><br /><br /><br />";
		document.getElementById("dob").innerHTML =  "<br />";
		document.getElementById("phone").innerHTML = "<br />";
		return 0;
	}
	//set all the outputs to the values related to the selected item
		
		document.getElementById("normalname").innerHTML = details.normalname;
		document.getElementById("address").innerHTML = details.address;
		document.getElementById("dob").innerHTML = details.dob;	
		document.getElementById("phone").innerHTML = details.phone;
		
	try {
		document.getElementById("myemail").innerHTML = details.email;
		document.getElementById("occupation").innerHTML = details.occupation;
		document.getElementById("salary").innerHTML = details.salary;
		document.getElementById("guarantor").innerHTML = details.guarantor;		
	} catch (error) {
		
	}
	document.getElementById("selectnumber").value = details.id;
	document.getElementById("selectname").value = details.sname + ", " + details.fname;	
	filterAccounts(details.id);
	
	imatchHeight() ;
	
}
//display only the accounts belonging to the selected customer - enable the select box for accounts
	function filterAccounts (id) {
		var accountList = document.getElementById("selectaccount");
		for (var i = 1; i < accountList.options.length; i++) {
			var value = accountList.options[i].value;
			var details = value.split('#');
			if (details[0] == id) {
				accountList.options[i].hidden = false;
			} else {
				accountList.options[i].hidden = true;
			}			
		}
		accountList.selectedIndex = 0;
		accountList.disabled = false;
	}
	
	function setAccount (index) {
		var accountList = document.getElementById("selectaccount");
		var value = accountList.options[index].value;
		var details = value.split('#');
		var balance = details[1];
		document.getElementById('balance').value = balance;
		document.getElementById("selectnumber").disabled = true;
		document.getElementById("selectname").disabled = true;	
		document.getElementById("amount").disabled = false;	
	
	}
	//stop the user from changing the account once they enter an amount and allow them to click the submit button
	function activateForm() {
		document.getElementById("selectaccount").disabled = false;
		document.getElementById("submit").disabled = false;
	}
//reset the disabled atributes of the inputs and clear the display of customer details 
	function resetForm() {			
		document.getElementById("normalname").innerHTML = "<br />";
		document.getElementById("address").innerHTML =  "<br /><br /><br /><br />";
		document.getElementById("dob").innerHTML =  "<br />";
		document.getElementById("phone").innerHTML = "<br />";
		document.getElementById("selectaccount").disabled = true;
		document.getElementById("submit").disabled = true;
		document.getElementById("selectnumber").disabled = false;	
		document.getElementById("selectname").disabled = false;	
		document.getElementById("amount").disabled = true;			
	}
	
//confirmation popup 
function confirmCheck()
{
	var response;
	response = confirm('Are you sure you want to lodge ' + document.getElementById("amount").value + ' in the selected account?');
	return response;

} 

</script>
<?php

	if ( ISSET($_SESSION['returnMessage']) )
	{		
		echo "<SCRIPT>alert($_SESSION[returnMessage]);</SCRIPT>";
		unset($_SESSION['returnMessage']);
	}
	
?>	
		</body>	

	</html>
	

	



	