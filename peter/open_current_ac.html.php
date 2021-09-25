<!--Coder:Peter Elliott
	N.B Please use google chrome to view website please-->

<?php 
include "../other/verify_user.php";
$_SESSION['helptext'] = "'To open a current account for a <b>existing customer</b></br></br>Step 1:Select the customer to whom the account will be assigned by entering the Customer Number or by selecting the Customer name from the list of customer provided once selected the details will display</br></br> Step 2: Once the correct customer is selected enter the Overdraft limit in the box to the right remember whole integer numbers</br></br>Step 3: Once a Overdraft Limit has been entered click confirm to create the Current Account else click cancel to clear details'";
include 'head.php';
?>
<form name="open_current_ac" id="open_current_ac" method="post"  action="add_current.php" onsubmit="return myCreate()">             
    <h2>Open Current Account <img src="../common/images/help-01.png" alt="Help" id="helpbtn" onmousedown="frameToggleHelp() " > </h2>          
	<fieldset class="fullwidth"><!--boarder-->
		<legend>Select Customer</legend></br><!--text in the boarder-->

		<label>Customer Number</label>
		<input type="text" id="UserID" name="UserID" placeholder="Enter a customer ID!" pattern="[0-9]+" oninput="CustomerDetails(this)" title="User ID's are positive integers" required> 
		<!-- above is to enter customer ID while below is a few spaces to seperate the textbox and listbox-->
		&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="listbox">Customer Name</label>
		<?php   include 'open_current_ac.php'; ?> 
	</fieldset>
	
	<fieldset class="halfwidth"> <!--again a boarder-->
		<legend>Customer Details</legend><!--the divs are used to display details the breaks are to stop the div from messing up the alinement's of the labels-->
		<label>ID  </label><div id="CustomerID" name="CustomerID">&nbsp;</div><br>
		<label>Name </label> <div id="CustomerName" name="CustomerName">&nbsp;</div><br>
		<label>Address </label><div  id="Home" name="Home">&nbsp;</div><br></br></br></br></br></br>
		<label>Date of Birth </label><div id="DOB" name="DOB">&nbsp;</div><br>
	</fieldset>
	
	<fieldset class="halfwidth">
		<legend>Overdraft</legend>		</br></br></br>
		<label>Overdraft Limit </label>
		<input type="text" id="Limit" name="Limit" placeholder="Account limit" pattern="[0-9.]+" title="Whole positive integer values " required>
		<br></br></br></br></br>
	</fieldset>
	
	<input type="submit" id="Confirm" name="Confirm" value="Confirm">
	<input type="reset" id="clear" name="clear" value="clear" onclick="Cleanup()"> <!--the method empty is used to clear the divs-->
</form>
</body>	
</html>