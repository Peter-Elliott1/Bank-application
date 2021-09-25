<script src="Current_Account_Javascript.js" ></script><!--Please take note all script will be stored in "Current_Account_Javascript.js"-->
<?php
include '../common/db.inc.php';

date_default_timezone_set('Europe/London');
$sql = "Select customerNumber, firstName, surname, address1, address2, address_town ,address_county, birthDate 
		FROM customer";

if(!$result = mysqli_query($con, $sql))
	{
		die('Error in query' . mysqli_error());
	}

echo "<select name='listbox' id='listbox' onclick='CustomerDetails(this)'";
echo "<br><option id='-1' selected disabled hidden value ='&nbsp;,</br>,</br></br></br></br>,</br>'></option>";

while($row = mysqli_fetch_array($result))
	{
		$ID= $row['customerNumber'];
		$Fname = $row['firstName'];
		$Sname = $row['surname'];
		$dob = $row['birthDate'];
		$dob = date("d-m-y", strtotime($dob));
		$Home = $row['address1'] ."<br>" . $row['address2']  ."<br>" . $row['address_town'] ."<br>" . $row['address_county'];
		$display ="$ID, $Fname $Sname ,$Home ,$dob";
		echo"<option id='$ID' value = '$display'>$Sname $Fname</option>";
	}	
echo"</select>";	

mysqli_close($con);
?>