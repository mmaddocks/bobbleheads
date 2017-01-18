<?php

    ob_start(); // Output buffering - store everything that would normally be output
    session_start(); // Store information on server for use across various pages
    require_once("dbconnect.php"); // Connect ot DB

    // If session is not set this will redirect to login page (login.php)
    if (!isset($_SESSION["user"]) ) {
        header("Location: login.php");
        exit;
    }

    // Select the loggedin users crednetials 
    // SQL statement to query database, concatenate $_SESSION["user"]
    $sql = ("SELECT * FROM users WHERE userID=" . $_SESSION["user"]); 
    // Passing DB connection and SQL statement into $result
    $result = mysqli_query ($connect, $sql);
    // Passing result as an array into the $userRecord variable
    $userRecord = mysqli_fetch_array ($result);

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
    <title>Welcome <?php echo $userRecord["username"]; ?> - Bobbleshop, Collectable Bobbleheads</title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"><!-- Non min for dev -->
    <link rel="stylesheet" type="text/css" href="../css/style.css"><!-- main style sheet -->
    
    <!-- Google Fonts -->
    
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
                    <li><a href="custom.php">Custom Made</a></li>
                    <li><a href="#">Collections</a></li>
                    <li><a href="#">Contact</a></li>        
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="user-dropdown dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $userRecord["username"]; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="logout.php?logout">
                                    <span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out
                                </a>
                            </li>
                        </ul>
                    </li> <!-- closing .dropdown -->
                </ul>
                <!-- <a href="login.php" role="button" class="btn btn-default navbar-btn">Sign in</a> -->
            </div> <!-- closing .navbar-collapse -->
            
        </div> <!-- closing .container-fluid -->
    </nav>
    
    
    <!-- Start of main content -->  
        
    
    <section id="hero-image-container"> <!-- removed .container-fluid (padding issue) -->
        <h2 class="hidden">Hero Image</h2><!-- Validation Purposes -->
        <picture>
            <source media="(min-width: 1200px)" srcset="../images/hero_desktopXL.png">
            <source media="(min-width: 992px)" srcset="../images/hero_desktop.png">
            <source media="(min-width: 768px)" srcset="../images/hero_tablet.png">
            <img id="hero-image" src="../images/hero_mobile.png" alt="Hero image, a city landscape with Hulk">
        </picture>
    </section>
    
    <div id="collectable-title" class="container-fluid text-center">
        <h1>COLLECTABLE BOBBLEHEADS</h1>
        <h4 class="lead">Limited edition iconic collections</h4>
    </div>
    
    <div id="shop-container" class="container-fluid">
        <a class="btn btn-default btn-lg" href="shop.html" role="button" >Shop Now</a>
    </div>
    
    
    <!-- Featured products section -->
    <section id="featured-container" class="text-center">
        <h2>Featured Products.</h2>
        <span class="heading-line"></span>
        
        <h4 class="lead">Top 10 Bobbleheads on Bobbleshop</h4>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure>
                        <a href="#" class="myTooltip" title="This is a tooltip. Join the Dark Side!"><!-- ".tooltip exists in bootstrap" -->
                            <img class="img-border" src="../images/darth_vader.png" width="290" height="207" alt="Darth Vader Bobblehead">
                        </a>
                        <figcaption class="caption-border">
                            <span>#1 Darth Vader</span>
                            <button class="btn btn-default btn-sm">Add to cart</button>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure>
                        <a href="#" class="myTooltip" title="This is a tooltip. Join the Jedi!">
                            <img class="img-border" src="../images/yoda.png" width="290" height="207" alt="Yoda Bobblehead">
                        </a>
                        <figcaption class="caption-border">
                            <span>#02 Yoda</span>
                            <button class="btn btn-default btn-sm">Add to cart</button>
                        </figcaption>
                    </figure>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure>
                        <a href="#" class="myTooltip" title="This is a tooltip for R2-D2.">
                            <img class="img-border" src="../images/r2d2.png" width="290" height="207" alt="R2D2 Bobblehead">
                        </a>
                        <figcaption class="caption-border">
                            <span>#31 R2-D2</span>
                            <button class="btn btn-default btn-sm">Add to cart</button>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure>
                        <a href="#" class="myTooltip" title="This is a tooltip for C-3PO.">
                            <img class="img-border" src="../images/c3po.png" width="290" height="207" alt="C3PO Bobblehead">
                        </a>
                        <figcaption class="caption-border">
                            <span>#13 C-3PO</span>
                            <button class="btn btn-default btn-sm">Add to cart</button>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure>
                        <img class="img-border" src="../images/hulk.png" width="290" height="207" alt="Hulk Bobblehead">
                        <figcaption class="caption-border">
                            <span>#68 Hulk</span>
                            <button class="btn btn-default btn-sm">Add to cart</button>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure>
                        <img class="img-border" src="../images/captain_america.png" width="290" height="207" alt="Captain America Bobblehead">
                        <figcaption class="caption-border">
                            <span>#67 Captain America</span>
                            <button class="btn btn-default btn-sm">Add to cart</button>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure>
                        <img class="img-border" src="../images/ironman.png" width="290" height="207" alt="Ironman Bobblehead">
                        <figcaption class="caption-border">
                            <span>#66 Iron Man</span>
                            <button class="btn btn-default btn-sm">Add to cart</button>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure>
                        <img class="img-border" src="../images/thor.png" width="290" height="207" alt="Thor Bobblehead">
                        <figcaption class="caption-border">
                            <span>#69 Thor</span>
                            <button class="btn btn-default btn-sm">Add to cart</button>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-lg-offset-3">
                    <figure>
                        <img class="img-border" src="../images/spiderman.png" width="290" height="207" alt="Spiderman Bobblehead">
                        <figcaption class="caption-border">
                            <span>#45 Spider-Man</span>
                            <button class="btn btn-default btn-sm">Add to cart</button>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 col-lg-3 col-lg-offset-0">
                    <figure>
                        <img class="img-border" src="../images/wolverine.png" width="290" height="207" alt="Wolverine Bobblehead">
                        <figcaption class="caption-border"><span>#05 Wolverine</span>
                            <button class="btn btn-default btn-sm">Add to cart</button>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
        
    </section>
    <!-- End Featured products section -->
    
    <!-- Custom made section -->
    <section id="custommade-container" class="clearfix text-center">
        <h2>Custom Made Bobbleheads.</h2>
        <span class="heading-line"></span>
        <h4 class="lead">Create your own personal Booblehead.</h4>
        <a class="btn btn-default btn-lg" href="../custom.html" role="button">Create now</a>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-2">
                    <canvas id="custom-canvas" width="290" height="290"></canvas>
                </div>
                <div class="hidden-xs col-sm-6 col-md-4">
                    <canvas id="custom-canvas2" width="290" height="290"></canvas>
                </div>
            </div>
        </div>
    </section>
    <!-- End Custom made section -->
    
    <!-- News section -->
    <section id="news-container" class="clearfix text-center">
        <h2>Recent News.</h2>
        <span class="heading-line"></span>
        
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <figure class="news-main">
                        <h4 class="news-headline"><u><strong>The Avengers</strong></u></h4>
                        <p class="news-content">Lorem ipsum dolor sit amet, mea cu veri verterem, nam erant omnes an, cum ei appareat expetenda contentiones. Vel natum disputando cu, his id ferri dolorem tincidunt. Sonet iudico praesent ad vix, ornatus perfecto mei ne. Nec integre scribentur te, adipiscing voluptatum te eum, eum te graece platonem euripidis. Ut nam elit assentior. Sed ad regione impedit vituperatoribus, erant putant mollis te nec, sea an enim harum clita. Eu nostro delenit oporteat has, ne animal nonumes abhorreant his.</p>
                        <figcaption class="news-caption">
                            <p>1st October 2016</p>
                            <a href="news.html">Read More</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <figure class="news-main">
                        <h4 class="news-headline"><u><strong>Star Wars</strong></u></h4>
                        <p class="news-content">Lorem ipsum dolor sit amet, mea cu veri verterem, nam erant omnes an, cum ei appareat expetenda contentiones. Vel natum disputando cu, his id ferri dolorem tincidunt. Sonet iudico praesent ad vix, ornatus perfecto mei ne. Nec integre scribentur te, adipiscing voluptatum te eum, eum te graece platonem euripidis. Ut nam elit assentior. Sed ad regione impedit vituperatoribus, erant putant mollis te nec, sea an enim harum clita. Eu nostro delenit oporteat has, ne animal nonumes abhorreant his.</p>
                        <figcaption class="news-caption">
                            <p>1st September 2016</p>
                            <a href="news.html">Read More</a>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- End News section -->
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
                        <li><a href="../custom.html">Custom Made</a></li>
                        <li><a href="#">Collections</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    
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
    
    
    <!---------------------------------------------------------------------------------------

                                    >>> SCRIPTS <<<

    -----------------------------------------------------------------------------------------> 
    
    <!-- jQuery (Necessary for Bootstrap's JavaScript plugins)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <!-- Bootstrap development js file -->
    <script src="../js/bootstrap.js"></script>
    <!-- Canvas Script -->
    <script src="../js/canvas.js"></script>
    <!-- Tooltip for onmouseover of products -->
    <script src="../js/tooltip.js"></script>
    
    <!-- <script src="js/tooltipV2.js"></script> -->
    
    <!-- Toggles news content on click of headline -->
    <script src="../js/newsSlide.js"></script>
    
</body>
</html>

<!-- End Output buffering - Output all to client and then destroy buffer -->
<?php ob_end_flush();?> 