<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Auditores</title>
	
	<!-- core CSS -->
    <link href="View/css/bootstrap.min.css" rel="stylesheet">
    <link href="View/css/font-awesome.css" rel="stylesheet">
    <link href="View/css/animate.min.css" rel="stylesheet">
    <link href="View/css/prettyPhoto.css" rel="stylesheet">
    <link href="View/css/main.css" rel="stylesheet">
    <link href="View/css/responsive.css" rel="stylesheet">
    <link href="View/css/custom.css" rel="stylesheet">
    <script type="text/javascript" src="View/css/sweet-alert.min.js"></script>
    <link  href="View/css/sweet-alert.css" type="text/css" media="all" rel="stylesheet">
    
    <link rel="shortcut icon" href="View/images/ico/favicon.ico">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="View/js/custom.js"></script>

</head><!--/head-->
    <style type="text/css">
        body {
            overflow: hidden !important;
        }

        html {
            background: #1c2542;
        }
    </style>
<body class="homepage">
    <header id="header">
        <div class="top-bar" style="display: none;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 col-xs-2">
                        
                    </div>
                    <div class="col-sm-5 col-xs-10">
                       <div class="[ topbar1 ]">
                            
                       </div>
                    </div>
                    <div class="col-sm-5 col-xs-10">
                       <div class="[ topbar2 ]">
                            
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner" style="background: url('View/images/login_img.jpg'); background-size: cover; display: none;">
            <div class="container">                               
                <div class="">
                    <center>
                        <!--img src="View/images/logo.png" class="[ login-logo ]"-->    
                        <img src="View/images/LogoProfile.png" style="width: 235px; margin-top: 80px;" class="[ login-logo ]">    
                    </center>
                    
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->


    <div class="container-fluid" style="background: url(View/images/login_img.jpg); background-size: contain; background-position: center; /* background-position-x: initial; */ /* padding-top: 9%; */ background-size: 121%; background-position-y: inherit; height: 100%;">
        <div class="row text-center [ login-form ]">
            <center>
                        <!--img src="View/images/logo.png" class="[ login-logo ]"-->    
                        <img src="View/images/LogoProfile.png" style="width: 235px;margin-top: 100px;" class="[ login-logo ]">    
                    </center>
            <form action="../Controller/login.php" method="POST" class="[ form-inline ][ login-form ]">
                <div class="form-group ">
                    <input type="text" class="form-control" placeholder="Usuario" name="nombre">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
                </div>
                <button type="submit" class="btn btn-info">Ingresar</button><!--
                <a href="home.php">
                    <input type="button" class="btn btn-danger" value="Ingresar"></input>
                    
                </a>-->
            </form>
            <img src="View/images/browsers2.png" class="[ browsers-img ]" style="margin-top: 13%; margin-bottom: 20px;">
        </div>
    </div><!--/.container-->
    <script type="text/javascript">
        $('.login-form button').click(function(e){
            e.preventDefault();
            login();
        });
    </script>
</body>
</html>
