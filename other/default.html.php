<?php 
/*
* File Produced By: Tom Anderson - C00174844 - 2015
* Purpose: 			
*/
include 'verify_user.php';

$_SESSION['helptext'] = "Select an option from the menu or log out!";

include 'head.php';
?>

<script>
	var target = window.parent.document.getElementById('logout');
	target.innerHTML = "Logout <?php echo $_SESSION['username']; ?> <img src='./common/images/logout.png' alt='logout' >"	
	target.hidden = false;
</script>
<form name="" id="" method=""  action="" onsubmit="">             
    <h2>You are logged in as  <?php echo $_SESSION['username']; ?> <img src="../common/images/help-01.png" alt="Help" id="helpbtn" onmousedown="frameToggleHelp() " > </h2>          
</form>
</body>	
<?php

	if ( ISSET($_SESSION['returnMessage']) )
	{		
		echo "<SCRIPT>alert($_SESSION[returnMessage]);</SCRIPT>";
		unset($_SESSION['returnMessage']);
	}
	
?>	
</html>