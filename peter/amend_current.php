<?php
include '../common/db.inc.php';

$sql = "UPDATE currentAccount 
		SET overdraftLimit = '$_POST[Limit]'
		Where accountNumber = '$_POST[AccountID]' AND closed = 0";
  
if (!$result = mysqli_query($con, $sql))
{
	die ('Error unable to create current account ' . mysqli_error($con));
}		

mysqli_close($con);
header("location:  amend_current_ac.html.php") ;
?>