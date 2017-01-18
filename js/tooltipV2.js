// Load function(s) on window.onload - invoked by anonymous function.
window.onload = function() {
    listenerFunction();
    // additional functions();
};


// Pass image class into image variable, pass "hidden" tooltipText variable text
var image = document.getElementsByClassName("productImage");
var text = document.getElementsByClassName("tooltipText");

// Listen for mouseover and mouseout on image variable. Passing add and remove functions as parameter of the event listener. 

function listenerFunction() {
    
    for (var i = 0; i < image.length; i++) {
        image[i].addEventListener("mouseover", addClass, false);
        image[i].addEventListener("mouseout", removeClass, false);
    }
}

// Add ".ShowTipText" class to variable text (".toolTipText" class)
function addClass() {
    
    for (var x = 0; x < text.length; x++ ) {
            text[x].classList.add("showTipText"); 
    }       
}

// Remove ".ShowTipText" class to variable text (".toolTipText" class)
function removeClass() {
    
    for (var x = 0; x < text.length; x++ ) {
        text[x].classList.remove("showTipText"); 
    }       
}



/* Necessary markup for the above script 

<a href="#">
    <span class="tooltipText">Tool tip text for yoda.</span>
    <img class="img-border productImage" src="images/yoda.png" width="290" height="207" alt="Yoda Bobblehead">
</a>


Necessary Style for tooltipV2.js

.tooltipText {
    visibility: hidden;
    position: absolute;
    top: 100px;
    left:0px;
    right: 0px;
    width: 100%;
    background-color: #fff;
    outline: 1px solid gray;
}

    .tooltipText.showTipText {
        visibility: visible;
    }

*/

