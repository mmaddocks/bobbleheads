// Form validation for the login form login.html //
    // Validated there is data //
    // Submisson to database via PHP will validate against records //

function validate() {
    
    // Passing form element into variable
    var checkForm = document.getElementById("login-form"); 
    
    
    // Validate Username is entered
    if (checkForm.yourUsername.value === "") {
        document.getElementById("form-group-username").classList.add("has-error"); // Add error colour
        document.getElementById("help-block1").classList.remove("hidden"); // Make text visible
        return false;
    } else {
        var usernameEntered = document.getElementById("username").value;
    }
    
    // Validate password is entered
    if (checkForm.yourPassword.value === "") {
        document.getElementById("form-group-password").classList.add("has-error"); // Add error colour
        document.getElementById("help-block2").classList.remove("hidden"); // Make text visible
        return false;
    } else {
        var passwordEntered = document.getElementById("password").value;
    }
}