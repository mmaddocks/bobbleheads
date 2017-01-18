<?php

    ob_start(); // Output buffering - store everything that would normally be output
    session_start(); // Store information on server for use across various pages
    require_once("dbconnect.php"); // Connect ot DB

    // If session is already set (not empty), direct user to home.php (authenticated user page). Do not allow user to visit login.php
    if (isset($_SESSION["user"])!= "" ) { 
        header("Location: home.php"); 
        exit;
    }
   

    $error = false; // Variable for error, set to false
    // Set variables to null (form input value to have no data onload, but retains input value on submit (for correcting errors))    
    $username = ""; 
    $password = "";
    $usernameError = "";
    $passwordError = "";

    // If login button is pressed
    if (isset($_POST["login"])) {
        
        // Set $_POST variables 
        $username = $_POST["yourUsername"];
        $password = $_POST["yourPassword"];
        
        // Validate if there is a value
        if (empty($username)) {
            $error = true; // If empty set $error to true
            $usernameError = "Please enter your username"; // Error message for inserting into form
        }
        
        // Validate if there is a value
        if (empty($password)) {
            $error = true; // If empty set $error to true
            $passwordError = "Please enter your password"; // Error message for inserting into form
        }
        
        // If no error (data input) continue process and validate against database
        if ($error === false) {
            // Pass SQL query into variable
            $sql = ("SELECT userID, username, userPassword FROM users WHERE username='$username'");
            // Pass database connection and SQL statement into mysqli_query() method    
            $result = mysqli_query ($connect, $sql);
            // Fetches a result row as an array
            $row = mysqli_fetch_array ($result); 
            // Returns number of rows for the result (must be 1 as user should be unique)
            $count = mysqli_num_rows ($result);
            
            // If $count == 1 result (unique) and the record ($row) password in the databse matches the password entered by the user ($password global variable from the form). 
            if ($count == 1 && $row["userPassword"] == $password ) {
                $_SESSION["user"] = $row["userID"]; // Initialise session["user"] and set to the records userID (Primary key in DB)
                header("Location: home.php"); // Direct to authenticated page once verified user has logged in
            } else {
                $errorMessage = "Incorrect credentials. Please retry..."; // Else error message to notify user
            }
        } 
    }
    

?>


<!DOCTYPE html>

<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mark Maddocks">
    <meta name="description" content="Buy collectable bobbleheads and create custom bobbleheads">

    <!-- Title & Favicon -->
    <title>BobbleShop - Custom Made</title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"><!-- Non min for dev -->
    <link rel="stylesheet" type="text/css" href="../css/style.css"><!-- main style sheet -->
    
    <!-- Picturefill.js <picture> support across browsers -->
    <script>
        // Picture element HTML5 shiv
        document.createElement( "picture" );
    </script>
    <script src="js/picturefill.js" async></script>
    
</head>

<body>
    
    <!-- Start of main content -->  
        
    <div class="login-container container-fluid">
        
        <h2 class="text-center">Sign in.</h2>
        <span class="heading-line"></span>
        
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                
                <p class="text-center">Sign in to your Bobbleshop account. <a href="../index.html">Return</a> to home page.</p>
                
                <form id="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validate();">
                    
                    <!-- If queried username and userPassword do not match (else statement in PHP is exucted - $errorMessage). Displaying at the top of the form . If $errorMessage is set by PHP, display it. -->
                    <?php
                        if (isset($errorMessage)) {
                    ?>
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    <?php echo $errorMessage; ?>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                    
                    <div id="form-group-username" class="form-group">
                        <label class="sr-only" for="username">Email</label>
                        <input id="username" class="form-control" type="text" name="yourUsername" placeholder="Username" value="<?php echo $username; ?>" >
                        <!-- JS validation -->
                        <span id="help-block1" class="help-block hidden">Please enter your username</span>
                        <!-- PHP validation (if JS turned off -->
                        <span class="text-danger"><?php echo $usernameError; ?></span>
                    </div>
                    <div id="form-group-password" class="form-group">
                        <label class="sr-only" for="password">Email</label>
                        <input id="password" class="form-control" type="password" name="yourPassword" placeholder="Password">
                        <!-- JS validation -->
                        <span id="help-block2" class="help-block hidden">Please enter your password</span>
                        <!-- PHP validation (if JS turned off -->
                        <span class="text-danger"><?php echo $passwordError; ?></span>
                    </div>
                    
                    <button type="submit" class="btn btn-default" name="login" >Sign In</button>
                </form>
                
            </div>
        </div>
    </div>
    
    <!-- End of main content -->
    
    <!-- jQuery (Necessary for Bootstrap's JavaScript plugins)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- Bootstrap development js file -->
    <script src="../js/bootstrap.js"></script>
    <!-- Form validation js file -->
    <script src="../js/validation_login.js"></script>
    
</body>
</html>

<!-- End Output buffering - Output all to client and then destroy buffer -->
<?php ob_end_flush();?> 