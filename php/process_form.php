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
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"><!-- Non min for dev -->
    <link rel="stylesheet" type="text/css" href="../css/style.css"><!-- main style sheet -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

    <!-- Picturefill.js <picture> support across browsers -->
    <script>
        // Picture element HTML5 shiv
        document.createElement( "picture" );
    </script>
    <script src="../js/picturefill.js" async></script>

</head>

<body>


    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

            <!-- Logo and nav toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><img src="../images/logo.svg" width="27" height="40" alt="Boobleheads Logo"></a>
            </div> <!-- closing .navbar-header -->

            <!-- Navigation links for toggling -->
            <div id="navbar" class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="#">Shop</a></li>
                    <li class="active"><a href="custom.php">Custom Made</a></li>
                    <li><a href="#">Collections</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <a href="login.php" role="button" class="btn btn-default navbar-btn">Sign in</a>
            </div> <!-- closing .navbar-collapse -->

        </div> <!-- closing .container-fluid -->
    </nav>


    <!-- Start of main content -->

    <div class="form-container container-fluid">

        <h2 class="text-center">Custom Made.</h2>
        <span class="heading-line"></span>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

                <?php

                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST["yourName"];
                    $email = $_POST["yourEmail"];
                    $gender = $_POST["gender-radio"];
                    $select = $_POST["yourSelect"];
                    $text = $_POST["yourText"];

                    echo "<p class='text-center'>Thank you $name. Your custom bobblehead has been submitted and an email confirmation will be sent to $email.</p>";
                }

                ?>

            </div>
        </div>
    </div>

    <!-- End of main content -->

    <!-- Footer content -->
    <footer id="footer-navigation" class="clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-3 text-center">
                    <a href="home.php"><img src="../images/logo_white.svg" width="145" height="50" alt="Bobbleshop Logo"></a>
                </div>
                <div class="footer-items col-xs-12 col-sm-6">
                    <ul class="footer-nav-items">
                        <li><a href="#">Shop</a></li>
                        <li><a href="custom.php">Custom Made</a></li>
                        <li><a href="#">Collections</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <a href="login.php" role="button" class="btn btn-default btn-sm">Sign in</a>
                </div>
                <div class="col-xs-12 col-sm-3 social-icons">
                    <a href="#"><img src="../images/social_facebook.svg" width="10" height="20" alt="Bobbleshop Facebook Account"></a>
                    <a href="#"><img src="../images/social_twitter.svg" width="25" height="20" alt="Bobbleshop Twitter Account"></a>
                    <a href="#"><img src="../images/social_instagram.svg" width="20" height="20" alt="Bobbleshop Instagram Account"></a>
                </div>
            </div>
        </div>
    </footer>

    <footer id="footer-copyright" class="clearfix text-center">
        <p><small>&copy; Bobbleheads 2016<a href="privacy">Privacy Policy</a></small></p>
    </footer>


    <!-- jQuery (Necessary for Bootstrap's JavaScript plugins)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- Bootstrap development js file -->
    <script src="../js/bootstrap.js"></script>
    <!-- Form validation js file -->
    <script src="../js/validation.js"></script>

</body>
</html>
