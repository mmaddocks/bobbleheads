// Form validation for the Custom Made form > custom.html //

function validate() {
    
    // Passing users input data into variables
    var checkForm = document.getElementById("custom-form"); 
    var radios = document.getElementsByName("gender-radio");
    
    
    // Validate name is entered
    if (checkForm.yourName.value === "") {
        document.getElementById("form-group-name").classList.add("has-error"); // Add error colour
        document.getElementById("help-block1").classList.remove("hidden"); // Make text visible
        return false;
    } else {
        var nameEntered = document.getElementById("name").value;
    }
    
    // Validate email is entered
    if (checkForm.yourEmail.value === "") {
        document.getElementById("form-group-email").classList.add("has-error"); // Add error colour
        document.getElementById("help-block2").classList.remove("hidden"); // Make text visible
        return false;
    } else {
        var emailEntered = document.getElementById("email").value;
    }

    
    /* ------------------------ RADIO VALIDATION ------------------------ */
    
    // Validate radio is checked
    if ((radios[0].checked === false) && (radios[1].checked === false)) {
        document.getElementById("form-group-gender").classList.add("has-error"); // Add error
        document.getElementById("help-block3").classList.remove("hidden"); // Make text visible
        return false;
    }
    
    // Loop through radios to pass checked radio into variable (for writing into confirm() box)
    var radioChecked = "";
	for (var i = 0; i < radios.length; i++) { 	// Loops through all radios 
            if (radios[i].checked) {			// If checked do the following
                var radioChecked = radios[i].value;	// Pass "value" (from HTML) into variable
                //break; 							// Break the loop 
            }
        }
    
     /* ------------------------ SELECT VALIDATION ------------------------ */
    
    // Checking a valid bobble style is selected from <select>
    if (checkForm.yourSelect.value === "select-bobblehead") {
        document.getElementById("form-group-select").classList.add("has-error"); // Add error 
        document.getElementById("help-block4").classList.remove("hidden"); // Make text visible
        return false;
    }
    
    // Checking which bobble style is selected. If not "select-bobblehead" pass in to the variable selectChecked //
    var selectChecked = "";
    if (checkForm.yourSelect.value != "select-bobblehead") {
        var selectChecked = checkForm.yourSelect.value;
    }

    
    // Validate textarea entry
    if (checkForm.yourText.value === "") {
        document.getElementById("form-group-text").classList.add("has-error"); // Add error colour
        document.getElementById("help-block5").classList.remove("hidden"); // Make text visible
        return false;
    } else {
        var textEntered = document.getElementById("description").value;
    }
    
    // Validate file upload is attached
    if (checkForm.yourFile.value === "") {
        document.getElementById("form-group-file").classList.add("has-error"); // Add error colour
        document.getElementById("help-block6").classList.remove("hidden"); // Make text visible
        return false;
    }
    
    // Confirm diaglog box, writes out values input by user and asks to confirm. "return is necessary to return the result from the confirm()"
	else {
		return confirm("Please check your details below. Select CANCEL to make changes: \n\n" 
        + "Name: " + nameEntered + "\n\n" 
        + "Email: " + emailEntered + "\n\n" 
        + "Bobblehead Gender: " + radioChecked + "\n\n" 
        + "Bobblehead Style: " + selectChecked + "\n\n" 
        + "Description: " + textEntered);
	}
}




// Below does not work, as soon as incounters return true, form is submitted. !checked does not work with return false. 

/*
    // Radio button validation - loop through to check if checked  
    for (var i=0; i<radios.length; i++) {
        if (radios[i].checked) {
            return true;
        } 
    } // Must occur outside loop to enable loop to operate.
    document.getElementById("form-group-gender").classList.add("has-error"); // Add error
    document.getElementById("help-block3").classList.remove("hidden"); // Make text visible
    return false;	
    */