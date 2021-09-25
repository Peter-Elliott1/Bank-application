<?php 
/*
* File Produced By: Tom Anderson - C00174844 - 2015
* Purpose: 			
*/
session_start();
$_SESSION['helptext'] = 'You are not logged in, please refresh your browser or select a menu item to continue';
include 'head.php';
?>
<script> 
	var target = window.parent.document.getElementById('logout');
	target.innerHTML = ""	
	target.hidden = true; 
</script>

<form name="" id="" method=""  action="" onsubmit="">    
    <h2>You Are Not Logged In ! <img src="../common/images/help-01.png" alt="Help" id="helpbtn" onmousedown="frameToggleHelp() " /> </h2>          
</form>

</body>	
<?php

	if ( ISSET($_SESSION['returnMessage']) )
	{		
		echo "<SCRIPT>alert($_SESSION[returnMessage]);</SCRIPT>";
		unset($_SESSION['returnMessage']);
		
	}

	session_destroy();
		
?>	
</html>
