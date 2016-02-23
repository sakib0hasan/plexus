<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Plexus - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML template for Your company">
    <meta name="author" content="Oskar Żabik (oskar.zabik@gmail.com)">

    <!-- Le styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/typica-login.css">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le favicon -->
    <link rel="shortcut icon" href="favicon.ico">

</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/"><img src="logo.png" alt="Typica - Bootstrap Awesome Template!"></a>
        </div>
    </div>
</div>

<div class="container">

    @yield('content')

</div>

<footer class="white navbar-fixed-bottom">
    Don't have an account yet? <a href="register" class="btn btn-black">Register</a>
</footer>


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/backstretch.min.js"></script>
<script src="js/typica-login.js"></script>

</body>
</html>
