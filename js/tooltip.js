// Load function(s) on window.onload - invoked by anonymous function.
window.onload = function() {
    tooltip();
    // additional functions();
};


function tooltip() {
    
    var links = document.getElementsByClassName("myTooltip");
	
	for (var i = 0; i < links.length; i++) { // loop through all the links
		var title = links[i].getAttribute("title");
		
		if (title && title.length > 0) { // if title assign set up event listeners 
			links[i].onmouseover = showTipListener; // show rich tool tip
			links[i].onfocus = showTipListener; // for keyboard users
			links[i].onmouseout = hideTipListener; // hide rich tooltip
			links[i].onblur = hideTipListener; // for keyboard users
		} 
	}
}

// Before building a new tooltip with DOM methods, call hideTip to make sure that any existing tooltip has been removed.

function hideTip(link) {
	
	if (link.showMyTooltip) {
		link.title = link.showMyTooltip.childNodes[0].nodeValue;
		link.removeChild(link.showMyTooltip);
		link.showMyTooltip = null;
	}
}

function showTip(link) {
	
	var tip = document.createElement("span");
	
	tip.className = "showMyTooltip";
	
	var tipText = document.createTextNode(link.getAttribute("title"));
	tip.appendChild(tipText);
	link.appendChild(tip);
	link.showMyTooltip = tip;
	link.title = "";
}

// showTipListener calls showTip(link), the method that will actually display the tooltip, passing it a reference to the hyperlink that has been moused over. If it returns false to keep the browser from displaying a tooltip of its own in response to the event.

function showTipListener(event) {
	
	var link = this;
	this.timer = setTimeout(function(){
		
		showTip(link);
	}, 250);
	return false;
}

function hideTipListener(event){
	clearTimeout(this.timer);
	hideTip(this);
}



