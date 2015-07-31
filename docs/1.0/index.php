<?php include_once '../../includes/start.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>1.0 Documentation | LARAVEL BACKEND</title>

    <!-- Bootstrap -->
    <link href="../../plugins/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../plugins/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../resources/main.css" rel="stylesheet">

    <!-- rainbow -->
    <link href="../../plugins/rainbow-master/themes/twilight.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">
    <?php include_once __DIR__.'/header.php'; ?>

    <div class="row big-title">
        <div class="container">
            1.0 DOCUMENTATION
        </div>
    </div>

    <div id="documentaion-content" class="row">
        <div class="container">
            <div class="documentation-wrap">
                <div class="col-lg-3">
                    <?php include_once __DIR__.'/nav.php'; ?>
                </div>
                <div class="col-lg-9">
                    <div class="documentation-right">
                        <?php $page = isset($_GET['page']) ? $_GET['page'] : false; ?>

                        <?php if( ! $page ): ?>
                            <?php include_once __DIR__.'/pages/introduction.php'; ?>
                        <?php elseif( $page && (file_exists(__DIR__.'/pages/'.$page)) ): ?>
                            <?php include_once __DIR__.'/pages/'.$page; ?>
                        <?php else: ?>
                            <div class="alert alert-danger">Page not found.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once __DIR__.'/footer.php'; ?>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../../plugins/jquery.nicescroll.min.js"></script>
<script src="../../plugins/jquery.typeanimate.js"></script>
<script src="../../plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
<script src="../../plugins/rainbow-master/js/rainbow.min.js"></script>
<script src="../../plugins/rainbow-master/js/language/generic.js"></script>
<script src="../../plugins/rainbow-master/js/language/php.js"></script>
<script src="../../resources/main.js"></script>
</body>
</html>