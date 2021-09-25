<?php
include "../other/verify_user.php";
include '../common/db.inc.php';

$sql = "UPDATE currentAccount 
		SET closed = '1'
		Where accountNumber = '$_POST[AccountID]' ";
  
if (!$result = mysqli_query($con,$sql))
{
	die ('Error unable to create current account ' . mysqli_error($con));
}		

mysqli_close($con);
header ("location: close_current_ac.html.php");
?>
