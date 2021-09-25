/*Group UNIT - Group A 
* By :
* Tom Anderson
* Peter Elliot
* Ciara McMahon
* Liam Maloney
*/
function ihideMenu() {
	var menuArray =  window.parent.document.getElementsByClassName('menu');
	for (i = 0; i < menuArray.length; i++) {
		menuArray[i].setAttribute("style","visibility: hidden");
	}
	ihideSubMenu();
}

function ihideSubMenu() {
	var subMenuArray = window.parent.document.getElementsByClassName('submenu');
	for (i = 0; i < subMenuArray.length; i++) {
		subMenuArray[i].setAttribute("style","visibility: hidden");
	}
}




function frameToggleHelp () {	
	if ( window.parent.document.getElementById('help').style.visibility == "visible" ) {
			window.parent.document.getElementById('help').setAttribute("style","visibility: hidden");
	} else {
		window.parent.document.getElementById('help').setAttribute("style","visibility: visible");
	}
}


 function imatchHeight () {
	//make any pairs of divs that are side by side the same height
	alert("Foo");
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
	
} 


function loadHelp(helptext){
	window.parent.document.getElementById('helptext').innerHTML = helptext;
}
 


window.onload =  imatchHeight; 