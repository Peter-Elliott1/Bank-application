<?php 
include "../other/verify_user.php";
$_SESSION['helptext'] = "'This is the help text that is specific to the withdrawals form'";
include 'head.php';
?>
<form name="withdrawals" id="withdrawals" method="post"  action="withdrawal.php">             
	<h2>Withdrawals <img src="../common/images/help-01.png" alt="Help" id="helpbtn" onmousedown="frameToggleHelp() " > </h2>          
	<fieldset class="fullwidth"><!--boarder-->
		<legend>Select Customer</legend></br><!--text in the boarder-->

		<label for="UserID"  >Customer Number</label>
		<input type="text" id="UserID" name="UserID" placeholder="Enter a customer ID!" pattern="[0-9]+" oninput="Withdraw(this)" title="User ID's are positive integers" required> 
		<!-- above is to enter customer ID while below is a few spaces to seperate the textbox and listbox-->
		&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="listbox">Customer Name</label>
		<?php   include 'withdrawallist.php'; ?> 
	</fieldset>
	
	<fieldset class="halfwidth"> <!--again a boarder-->
		<legend>Customer Details</legend><!--the divs are u sed to display details the breaks are to stop the div from messing up the alinement's of the labels-->
		<label for="CustomerID">Customer ID  </label><div id="CustomerID" name="CustomerID">&nbsp;</div><br>
		
		<label for="CustomerName">Name </label> <div id="CustomerName" name="CustomerName">&nbsp;</div><br>
		<label for="Home" >Address </label><div  id="Home" name="Home">&nbsp;</br></br></br></br></br></div>
	</fieldset>
	
	<fieldset class="halfwidth">
		<legend>Withdrawals</legend>
		
		<label for="Accountlist">Account type</label>
		<?php include 'account_type.php'?>
		
		<label for="AccID">Account ID</label>
		<div  id="AccID" name="AccID">&nbsp;</div>
		
		<label for="Balance">Balance </label>
		<div id="Balance" name="Balance">&nbsp;</div>
		
		<label for="AccLimit">Limit</label>
		<div id="AccLimit" name="AccLimit">&nbsp;</div>
		
		<br></br></br>
		<label for="Amount" >Withdrawal Amount </label>
		<input type="text" id="Amount" name="Amount" placeholder="Withdraws Amount" pattern="[0-9]+" title="Whole positive integer values " required>
	</fieldset>
	
	<input type="submit" id="Confirm" name="Confirm" value="Confirm" onclick="return makeWithdrawal(this)">
	<input type="reset" id="clear" name="clear" value="clear" onclick="Cleanup()"> <!--the method empty is used to clear the divs-->
</form>
</body>	
</html>