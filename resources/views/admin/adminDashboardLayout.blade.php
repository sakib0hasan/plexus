<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Plexus - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive HTML template for Your company">
    <meta name="author" content="Oskar Żabik (oskar.zabik@gmail.com)">

    <!-- Le styles -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/typica-login.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le favicon -->
    <link rel="shortcut icon" href="favicon.ico">

</head>

<body style="background: none !important;">

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/"><img src="/logo.png" alt="Typica - Bootstrap Awesome Template!"></a>
        </div>
    </div>
</div>

<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Overview</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <?php
                    if(Auth::user()->hasRole('superAdmin')){
                        ?>
                        <li><a href="/admin/create-admin">Create Admin Account</a></li>
                        <?php
                    }
                    ?>

                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="">Nav item again</a></li>
                    <li><a href="">One more nav</a></li>
                    <li><a href="/admin/logout">Logout</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div style="margin-left: 40px;">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>



</div>


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/backstretch.min.js"></script>
{{--<script src="js/typica-login.js"></script>--}}
</body>
</html>
