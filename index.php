<?php include_once __DIR__.'/includes/start.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Laravel Backend</title>

    <!-- Bootstrap -->
    <link href="plugins/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="resources/main.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="resources/images/favicon.png">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">
    <header class="row">
        <div class="container">
            <div id="logo" class="pull-left">
                <a href="<?php echo $base_url; ?>"><img src="resources/images/laravel-backend-logo.png"></a>
            </div>
            <nav id="main-navigation" class="pull-right">
                <ul>
                    <li><a class="go-to" data-go-to="features" href="#">Features</a></li>
                    <li><a href="docs/1.0/?page=introduction.php">Docs</a></li>
                    <li><a target="_blank" href="https://github.com/darryldecode/laravelbackend">Github</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="row">
        <div class="container">
            <div id="landing-view">
                <h1 class="text-center">LARAVEL BACKEND</h1>
                <h3 class="text-center">Boost your Laravel 5.1~ Website/Web Application Development by providing lite and lean API-Driven backend.</h3>
                <div id="browser">
                    <img src="resources/images/ss1.png">
                </div>
            </div>
        </div>
    </div>

    <div class="row block block-1" id="features">
        <div class="container">
            <h2 class="text-center">Do you love how WordPress works? But want to use Laravel instead?</h2>
            <h4 class="text-center">Laravel Backend is designed to easily build any type of content, whether it is a Blog, Page, Product or anything you can imagine!</h4>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <h4 class="text-center">1.) CREATE YOUR CONTENT TYPE.</h4>
                    <img src="resources/images/wp1.png">
                </div>
                <div class="col-lg-4 col-md-4">
                    <h4 class="text-center">2.) ADD FIELDS ON IT.</h4>
                    <img src="resources/images/wp2.png">
                </div>
                <div class="col-lg-4 col-md-4">
                    <h4 class="text-center">3.) ADD CONTENTS TO IT! THATS IT!</h4>
                    <img src="resources/images/wp3.png">
                </div>
            </div>

            <h3 class="text-center"><a href="docs/1.0/?page=content-type-builder-component.php">learn more about content builder →</a></h3>
        </div>
    </div>

    <div class="row block block-2" id="features-2">
        <div class="container">
            <h2 class="text-center block-title">Built-in Components <i class="fa fa-cubes"></i></h2>
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div class="component-item">
                        <div class="component-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="component-description">
                            <h4>User Management with Roles & Permissions</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="component-item">
                        <div class="component-icon">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <div class="component-description">
                            <h4>Content Type Builder w/ Custom Fields (inspired from WordPress)</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="component-item">
                        <div class="component-icon">
                            <i class="fa fa-files-o"></i>
                        </div>
                        <div class="component-description">
                            <h4>Media Manager</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="component-item">
                        <div class="component-icon">
                            <i class="fa fa-align-justify"></i>
                        </div>
                        <div class="component-description">
                            <h4>Navigation Builder</h4>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="text-center">
                <h3>Want more? You can build your own custom component pretty easily! See Below:</h3>
                <div class="component-steps">
                    <img src="resources/images/component-steps.png">
                </div>
            </div>
        </div>
    </div>

    <div class="row block block-1">
        <div class="container">
            <h2 class="text-center block-title">Control Your Dashboard <i class="fa fa-th-large"></i></h2>
            <div class="text-center">
                <h3>Laravel Backend has its simple widget functionality for dashboard.</h3>
                <div class="component-steps">
                    <img src="resources/images/widget-steps.png">
                </div>
            </div>
            <br>
            <br>
            <h3 class="text-center"><a href="docs/1.0/?page=introduction.php">and more..</a></h3>
        </div>
    </div>

    <div class="row" id="go-to-docs">
        <div class="container text-center">
            <a href="docs/1.0/?page=introduction.php" class="btn btn-primary btn-lg">Get Started Now <i class="fa fa-angle-double-right"></i></a>
        </div>
    </div>

    <footer id="footer" class="row">
        <div class="container">
            <div class="pull-left">
                <p>© 2015 LARAVEL BACKEND</p>
                <p>Laravel Backend is Open-Source Software under <a target="_blank" href="http://opensource.org/licenses/MIT"><b>MIT License</b></a> made with <i class="fa fa-heart"></i> by <a target="_blank" href="https://github.com/darryldecode"><b>Darryldecode</b></a></p>
            </div>
            <div class="pull-right">
                <nav id="footer-navigation" class="pull-right">
                    <ul>
                        <li><a id="back-to-top" href="#">Back to Top</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>

</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/jquery.nicescroll.min.js"></script>
<script src="plugins/jquery.typeanimate.js"></script>
<script src="plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
<script src="resources/main.js"></script>
</body>
</html>