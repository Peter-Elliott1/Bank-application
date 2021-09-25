<?php
/*GROUP UNIT - Group A 
* By :
* Tom Anderson
* Peter Elliot
* Ciara McMahon
* Liam Maloney
*/
	session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bank</title>
    <script type="text/javascript" src="./common/bank.js">
    </script>
    <link rel="stylesheet" type="text/css" href="./common/menu.css">
    <link rel="stylesheet" type="text/css" href="./common/style.css">
</head>
<body  onmousedown="checkMenu(event)" >
				<div id="help" draggable="true" >
				<h1  ondragstart="setMouse(event)" ondrag="dragHelp(event)" draggable="true"> Help</h1>
				<img src="./common/images/close.png" alt="close" onclick="toggleHelp()"><div id="helptext"> <br />This is the Default help text. <br /></div><!-- END HELPTEXT -->
				</div>
             <!-- END HELP -->
    <div id="header">

	<div id="wrapper">
		<a href="https://bank.candept.com:8443/"  target="_blank">Parallels Login Page</a>
	<div id="logout" onclick="logout()" <?php if (!ISSET( $_SESSION['username'])) echo "hidden"; ?> >
	<img src="./common/images/logout.png" alt="logout" >
	<?php if (ISSET( $_SESSION['username'])) echo "Logout $_SESSION[username]"; ?>
	</div>
	<!--- END LOGOUT DIV (contains username  and logout button)-->
	</div>
	<!-- END WRAPPER DIV (places logout div) -->
    </div>
    <!-- END HEADER-->
<div id="nav">
 <!-- ----------------  DROPDOWN MENU START  --------------------------------- -->
        <ul class="dropmenu">
            <li><a onclick="toggleMenu('menu1')">Transactions</a>
            </li>
            <ul class="menu" id="menu1">
                <li><a href="./peter/lodgements.html.php" target="content" >Lodgements</a>
                </li>
                <li><a href="./peter/withdrawals.html.php" target="content"  >Withdrawals</a>
                </li>
            </ul>
            <li><a onclick="toggleMenu('menu2')">Accounts</a>
            </li>
            <ul class="menu" id="menu2">
                <li><a onmouseenter="showSubMenu('submenu1')">Current Accounts</a>
                </li>
                <ul class="submenu" id="submenu1">
                    <li><a href="./peter/open_current_ac.html.php" target="content">Open</a>
                    </li>
                    <li><a href="./peter/close_current_ac.html.php" target="content">Close</a>
                    </li>
                    <li><a href="./peter/amend_current_ac.html.php" target="content">Amend/View</a>
                    </li>
                </ul>
                <li><a onmouseenter="showSubMenu('submenu2')">Deposit Accounts</a>
                </li>
                <ul class="submenu" id="submenu2">
                    <li><a href="./common/unimplemented.html.php" target="content">Open</a>
                    </li>
                    <li><a href="./common/unimplemented.html.php" target="content">Close</a>
                    </li>
                    <li><a href="./common/unimplemented.html.php" target="content">View</a>
                    </li>
                </ul>
                <li><a onmouseenter="showSubMenu('submenu3')">Loan Accounts</a>
                </li>
                <ul class="submenu" id="submenu3">
                    <li><a href="./common/unimplemented.html.php" target="content" > Open</a>
                    </li>
                    <li><a href="./common/unimplemented.html.php" target="content" >Close</a>
                    </li>
                    <li><a href="./common/unimplemented.html.php" target="content" >Amend/View</a>
                    </li>
                </ul>
            </ul>
            <li><a onclick="toggleMenu('menu3')">Customers</a>
            </li>
            <ul class="menu" id="menu3">
                <li><a href="./common/unimplemented.html.php" target="content">Add</a>
                </li>
                <li><a href="./common/unimplemented.html.php" target="content" >Delete</a>
                </li>
                <li><a href="./common/unimplemented.html.php" target="content" >Amend/View</a>
                </li>
            </ul>
            <li><a onclick="toggleMenu('menu4')">Quotes</a>
            </li>
            <ul class="menu" id="menu4">
                <li><a  href="./common/unimplemented.html.php" target="content"  >Current Ac Rate</a>
                </li>
                <li><a href="./common/unimplemented.html.php" target="content"  >Deposit Ac Rate</a>
                </li >
                <li><a href="./common/unimplemented.html.php" target="content"  >Loan Ac Rate</a>
                </li>
                <li><a href="./common/unimplemented.html.php" target="content"  >Loan Repayments</a>
                </li>
            </ul>
            <li id="reportsitem"><a onclick="toggleMenu('menu5')">Reports</a>
            </li>
            <ul class="menu" id="menu5">
                <li><a  href="./common/unimplemented.html.php" target="content" >Current Ac History</a>
                </li>
                <li><a href="./common/unimplemented.html.php" target="content">Deposit Ac History</a>
                </li>
                <li><a  href="./common/unimplemented.html.php" target="content">Loan Ac History</a>
                </li>
                <li><a href="./common/unimplemented.html.php" target="content"  >Customer Report</a>
                </li>
            </ul>
            <li id="managmentItem"><a onclick="toggleMenu('menu6')">Management</a>
            </li>
            <ul class="menu" id="menu6">
               
                <li><a onmouseenter="showSubMenu('submenu4')">Calculate Interest</a>
                </li>
                <ul class="submenu" id="submenu4">
                    <li><a href="./common/unimplemented.html.php" target="content">Current Account</a>
                    </li>
                    <li><a href="./common/unimplemented.html.php" target="content"  >Loan Account</a>
                    </li>
                    <li><a href="./common/unimplemented.html.php" target="content" >Deposit Account</a>
                    </li>
				
                </ul>
                <li><a onmouseenter="showSubMenu('submenu5')">Charge Interest</a ></li>
<ul class="submenu" id="submenu5">
				<li><a href="./common/unimplemented.html.php" target="content" >Current Account</a>
                </li>
                <li><a href="./common/unimplemented.html.php" target="content"  >Loan Account</a>
                </li>
                <li><a href="./common/unimplemented.html.php" target="content"  >Deposit Account</a>
                </li>
            </ul>
				 <li onmouseover="hideSubMenu()"><a   href="./common/unimplemented.html.php" target="content"  >Change Rates</a>
                </li>
        </ul>
        <li id="password" onmouseover="hideMenu()"><a href="./common/unimplemented.html.php" target="content" target="content" >Password</a>
        </li>
        </ul>
        <!-- ----------------   DROPDOWN MENU END  --------------------------------- -->
</div>
<!-- END NAV-->
    <div id="container">
       

        <iframe id="content" scrolling ="no" name="content" seamless="seamless"
		<?php
		
			if (!ISSET($_SESSION["username"]))
			{
				echo "src='./other/login.html.php'";
			} else if (ISSET($_SESSION["iframePage"]))
			{
				echo "src='".$_SESSION["iframePage"]."'";
			} else 
			{
				echo "src='./other/default.html.php'";
			}
		?>
		
		>
            </iframe>

        </div>
        <!-- END CONTENT -->

    </div>
    <!--END CONTAINER-->
	
</body>

</html>



