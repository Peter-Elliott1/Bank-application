/*GROUP UNIT - Group A 
* By :
* Tom Anderson
* Peter Elliot
* Ciara McMahon
* Liam Maloney
*/


/*hide all menus*/
function ihideMenu() {
	var menuArray =  window.parent.document.getElementsByClassName('menu');
	for (i = 0; i < menuArray.length; i++) {
		menuArray[i].setAttribute("style","visibility: hidden");
	}
	ihideSubMenu();
}
/*hide all second level menus */
function ihideSubMenu() {
	var subMenuArray = window.parent.document.getElementsByClassName('submenu');
	for (i = 0; i < subMenuArray.length; i++) {
		subMenuArray[i].setAttribute("style","visibility: hidden");
	}
}



/*toggle the help from visble to invisible */
function frameToggleHelp () {	
	if ( window.parent.document.getElementById('help').style.visibility == "visible" ) {
			window.parent.document.getElementById('help').setAttribute("style","visibility: hidden");
	} else {
		window.parent.document.getElementById('help').setAttribute("style","visibility: visible");
	}
}

/* set the height of the halfwidth divs in matching pairs 
- it turns out we never used more than 2 on a page  but 
It  works for any even amount of divs 
also set the height of the iframe to match is contents*/

 function imatchHeight () {
	//make any pairs of divs that are side by side the same height----
	var divPairs =  document.getElementsByClassName('halfwidth');
	for (var i = 0; i < divPairs.length -1; i+=2) {
		var firstHeight = divPairs[i].clientHeight;
		var secondHeight = divPairs[i+1].clientHeight;
		var padding = parseInt(window.getComputedStyle(divPairs[i], null).getPropertyValue('padding-bottom')) + parseInt(window.getComputedStyle(divPairs[i], null).getPropertyValue('padding-top'));
		if (firstHeight > secondHeight) {
			divPairs[i+1].setAttribute("style","height:"+ (firstHeight - padding) + "px");
		} else {
			divPairs[i].setAttribute("style","height:"+ (secondHeight -  padding)+ "px");
		}
	}
	
	//make the iframe the height of its content or the window minus the header and nav if content is less   
	window.parent.document.getElementById('content').setAttribute("style","height: 0px;");

	// ---START REFERENCED CODE ---
	// http://stackoverflow.com/questions/1145850/how-to-get-height-of-entire-document-with-javascript --//
	var body = document.body,
    html = document.documentElement;
	var docHeight = Math.max( body.scrollHeight, body.offsetHeight, 
                       html.clientHeight, html.scrollHeight, html.offsetHeight );
	// ---END REFERENCED CODE ---
	// http://stackoverflow.com/questions/1145850/how-to-get-height-of-entire-document-with-javascript --//
	
	var parentHeight = parent.window.innerHeight;
	if (docHeight > (parentHeight - 91)) {  /*height of header + border + nav */
	window.parent.document.getElementById('content').setAttribute("style","height: " + docHeight + "px;");
	} else {
	window.parent.document.getElementById('content').setAttribute("style","height: " + (parentHeight - 91) + "px;");  /* 91 = height of header + border + nav */
	}
} 

/*set the contents of the help box to the string passed as an agrument */
function loadHelp(helptext){
	window.parent.document.getElementById('helptext').innerHTML = helptext;
}
 

/*set the heights when the window loads */
window.onload =  imatchHeight; 