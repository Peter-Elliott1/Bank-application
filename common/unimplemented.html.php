<?php 
/*GROUP UNIT - Group A 
* By :
* Tom Anderson
* Peter Elliot
* Ciara McMahon
* Liam Maloney
*/
include '../other/verify_user.php';

$_SESSION['helptext'] = "'Please select a different menu option!! '";

include '../other/head.php';
?>

<script>
	var target = window.parent.document.getElementById('logout');
	target.innerHTML = "Logout <?php echo $_SESSION['username']; ?> <img src='./common/images/logout.png' alt='logout' >"	
	target.hidden = false;
</script>
<form name="" id="" method=""  action="" onsubmit="">             
    <h2>This Feature is Unimplemented<img src="../common/images/help-01.png" alt="Help" id="helpbtn" onmousedown="frameToggleHelp() " > </h2>          
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