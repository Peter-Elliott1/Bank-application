<?php 
/*
* File Produced By: Tom Anderson - C00174844 - 2015
* Purpose: 			
*/
session_start();
$_SESSION['helptext'] = "This is the help text that is specific to the manager login form";
include 'head.php';
?>
             
			 
<form name="managerlogin" id="managerlogin" method="post"  action="manager_login.php" >           
                
	<h2>Manager Login  <img src="../common/images/help-01.png" alt="Help" id="helpbtn" onmousedown="frameToggleHelp()"> </h2>          
				
				
				<fieldset id="login">
						 <label for="password"  <?php echo $_SESSION['username'] ?>">Password for <?php echo $_SESSION['username'] ?> : </label>
		
						<input type="password" name="password" id="sname" required   title="Please enter your password" />  <br />
						
				</fieldset>
				  <input type="submit" name="submit" id="submit" value="Login" input>
                <input type="reset" name="clear" value="Clear" ></input>
            </form>
<?php

	if ( ISSET($_SESSION['returnMessage']) )
	{		
		echo "<SCRIPT>alert($_SESSION[returnMessage]);</SCRIPT>";
		unset($_SESSION['returnMessage']);
	}
	
?>	
		</body>	

	</html>
			