
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/images/logo/ms-logo.jpg" type="images/x-icon" />

    <!--====== php files Here ======-->
    <link rel="stylesheet" href="services.php">
    
    <!--====== CSS Here ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/lightcase.css">
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/odometer.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/preloader.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script type="module" src="./index.js"></script>
</head>
<body>
 
    <header class="header">

        <div class="header__bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9 col-lg-12">
                        <div class="navarea">
                            <a href="index.html" class="site-logo">
                                <img src="assets/images/logo/ms-logo.jpg" alt="LOGO">
                            </a>
                            <div class="mainmenu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li class="menu_has_children">
                                            <a href="index.php">Home</a>
                                            
                                        </li>
                                        
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="">Branding and Printing</a>
                                            <ul class="sub-menu">
                                               
                                                <li><a href="BannersAndPrinting.php">Banners and Printing</a></li>
                                                <li><a href="GiftsAndClothing.php">Gifts and Clothing</a></li>
                                                <li><a href="Signatures.php">Signature</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li><a href="services.php">Services</a></li>
                                        <li><a href="projects.php">Our work</a></li>
                                     
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
<div class="container mt-5">
    <h2 class="text-center">User Login</h2>
    <form action="login_process.php" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
    
    
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

