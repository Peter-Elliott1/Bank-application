 <!DOCTYPE HTML>
 <!--
 File Produced By: 	Tom Anderson - C00174844 - 2015
 Purpose: 			To include common elements at the beginning of some pages / files
-->
<html>

 <head>
	  <script type="text/javascript" src="../common/iframe.js"></script>
	  <script type="text/javascript" src="tom.js"></script>	 
	 <link rel="stylesheet"  href="../common/style.css">
	  <link rel="stylesheet"  href="../common/iframe.css">
 </head>
									<!-- This code  V sends the text that is set as a php session variable to our help form -->
	<body onmousedown="ihideMenu()" <?php echo "onload='loadHelp(\"$_SESSION[helptext]\")'"; ?> >
	
	
	