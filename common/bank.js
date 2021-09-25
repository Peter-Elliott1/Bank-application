 var mStartx;
var mStarty;
var wStartx;
var wStarty;

 function setMouse (event) {
	mStartx = event.pageX;
	mStarty = event.pageY;
	helpWindow =  document.getElementById('help');
	wStartx = helpWindow.getBoundingClientRect().left;
	wStarty = helpWindow.getBoundingClientRect().top;
	
 }

  function dragHelp(event){
	helpWindow =  document.getElementById('help');
	var scrollOffset = document.body.scrollTop;
    var cordx = wStartx + event.pageX - mStartx;
    var cordy = wStarty + event.pageY - mStarty + scrollOffset;

	var height = document.body.scrollHeight;
	var width = document.body.scrollWidth;
	 if (event.pageX && event.pageY) {
	 	var cssString ="visibility: visible; ";
		if ((cordx + helpWindow.offsetWidth) < width) {
			cssString += "left: " + cordx + "px;";
		} else {
			cssString += "left: " + helpWindow.style.left + ";";
		}
		
		if ((cordy  ) < height) {
			cssString += "top: " + cordy +"px;"; 
		} else {
			cssString += "top: " + helpWindow.style.top + ";"; 
		}	
		helpWindow.style.cssText = cssString;		 
   }
  }

  function toggleHelp () {	
	if (document.getElementById('help').style.visibility == "visible") {
			document.getElementById('help').setAttribute("style","visibility: hidden");
	} else {
		document.getElementById('help').setAttribute("style","visibility: visible");
	
	}
}

function hideMenu() {
	var menuArray =  document.getElementsByClassName('menu');
	for (i = 0; i < menuArray.length; i++) {
		menuArray[i].setAttribute("style","visibility: hidden");
	}
	hideSubMenu();
}

function hideSubMenu() {
	var subMenuArray = document.getElementsByClassName('submenu');
	for (i = 0; i < subMenuArray.length; i++) {
		subMenuArray[i].setAttribute("style","visibility: hidden");
	}
}

function showSubMenu(menuId) {
	hideSubMenu();
	document.getElementById(menuId).setAttribute("style","visibility: visible");
}
	
function toggleMenu(menuId) {
	var targetMenu = document.getElementById(menuId);
	if (targetMenu.style.visibility != "visible") {		
				hideMenu();
				document.getElementById(menuId).setAttribute("style","visibility: visible");
			} else {
				hideMenu();			
			}
}



function checkMenu(event) {
	if (event.target.tagName != 'A') {
		hideMenu();
	}	
}

 function setContent (contentScript) {
	hideMenu();
	 request = new XMLHttpRequest(contentScript);
	 request.onreadystatechange = function () {
		 if (request.readyState == 4 ) {
			document.getElementById('content').innerHTML = request.responseText;
			matchHeight ();
		}
	 }
	 request.open("POST",contentScript,true);
     request.send();
 }

 function logout() {
	 document.getElementById('content').src = "./other/logout.html.php";
	 }
