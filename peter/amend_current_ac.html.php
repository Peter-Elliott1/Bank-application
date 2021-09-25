<?php 
$_SESSION['helptext'] = "'This is the help text that is specific to the Amend Current Account form'";
include 'head.php';
?>
<form name="amend_current_ac" id="amend_current_ac" method="post"  action="amend_current.php" onsubmit="return myUpdate()">             
    <h2>Amend Current Account <img src="../common/images/help-01.png" alt="Help" id="helpbtn" onmousedown="frameToggleHelp() " > </h2>          
	<fieldset class="fullwidth"><!--boarder-->
		<legend>Select Customer</legend></br><!--text in the boarder-->
		<label for="listbox">Customer Name</label>
		<?php   include 'current_account_details.php'; ?>
		
		<label>Account</label>
		<?php include 'current_account_list.php'?>

		<label for="UserID">Customer Number</label>
		<input type="text" id="UserID" name="UserID" placeholder="Enter a customer ID!" pattern="[0-9]+" oninput="CustomerDetails(this)" title="User ID's are positive integers"> 
		<!-- above is to enter customer ID while below is a few spaces to seperate the textbox and listbox-->
		
		<input  type="hidden"  id="AccountID" name="AccountID" placeholder="Enter a current account ID!" pattern="[0-9.]+" oninput="showBal(this)" hidden title="Account ID's are positive integers"> 	
		<!--The above text box is hidden to passs along the account ID when submitting the SQL -->
	</fieldset>
	
	<fieldset class="halfwidth"> <!--again a boarder-->
		<legend>Customer Details</legend>
		<!--the divs are used to display details the breaks are to stop the div from messing up the alinement's of the labels-->
		<label>Customer ID  </label><div id="CustomerID" name="CustomerID">&nbsp;</div><br>
		<label>Name </label> <div id="CustomerName" name="CustomerName">&nbsp;</div><br>
		<label>Address </label><div  id="Home" name="Home">&nbsp;</div><br></br></br></br></br></br>
		<label>Date of Birth </label><div id="DOB" name="DOB">&nbsp;</div><br>
	</fieldset>
	
	<fieldset class="halfwidth">
		<legend>Overdraft</legend>
		<label>Account ID </label><div  id="AccID" name="AccID">&nbsp;</div><br></br>
		<label>Balance </label><div id="Balance" name="Balance">&nbsp;</div><br>
		<label>Current Limit </label><div id="AccLimit" name="AccLimit">&nbsp;</div>
		</br></br>
		<label>New Overdraft Limit </label><input type="text" id="Limit" name="Limit" placeholder="Account limit" pattern="[0-9]+" title="Whole positive integer values " required></input >
		</br></br></br>
	</fieldset>
	
	<input type="submit" id="Confirm" name="Confirm" value="Confirm">
	<input type="reset" id="clear" name="clear" value="clear" onclick="Cleanup()">
	
</form>
</body>	
</html>