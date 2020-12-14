<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Blog - B4 Template by Bootstrap Temple</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header">

        <!-- Navbar -->
        <?php require_once __DIR__ . "/../partials/navbar.view.php"; ?>

    </header>

    <!-- Hero Section-->
    <section style="background: url(img/hero.jpg); background-size: cover; background-position: center center"
        class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h1>Blog - explore the world</h1>
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']). '?action=main/blog'?>"
                        class="hero-link">Discover More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        {{content}}
    </div>

    <!-- Page Footer-->
    <footer class="main-footer">
        <div class="container">
            <div class="copyrights">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="logo">
                                <h6 class="text-white"> Blog</h6>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <p>&copy; 2017. All rights reserved. Your great site.</p>
                        </div>
                        <div class="col-md-4">
                            <p>My Account</p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/front.js"></script>
</body>

</html>