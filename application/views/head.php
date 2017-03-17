<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $this->config->item('website_name', 'tank_auth');?></title>
        <meta name="description" content="Your Description Here">
        <meta name="keywords" content="bootstrap themes, portfolio, responsive theme">
        <meta name="author" content="ThemeForces.Com">
        
        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="<?= base_url('HTML/Skuy/img/favicon.ico'); ?>" type="image/x-icon">
        <link rel="apple-touch-icon" href="<?= base_url('HTML/Skuy/img/apple-touch-icon.png'); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('HTML/Skuy/img/apple-touch-icon-72x72.png'); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('HTML/Skuy/img/apple-touch-icon-114x114.png'); ?>">
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css"  href="<?= base_url('HTML/Skuy/css/bootstrap.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('HTML/Skuy/fonts/font-awesome/css/font-awesome.css'); ?>">
        <!-- Stylesheet
        ================================================== -->
        <link rel="stylesheet" type="text/css"  href="<?= base_url('HTML/Skuy/css/style.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('HTML/Skuy/css/responsive.css'); ?>">
        <script type="text/javascript" src="<?= base_url('HTML/Skuy/js/modernizr.custom.js'); ?>"></script>
        <link href='//fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="tf-home">
            <div class="overlay">
                <div id="sticky-anchor"></div>
                <nav id="tf-menu" class="navbar navbar-default">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand logo" href="<?= site_url(); ?>"><?= $this->config->item('website_name', 'tank_auth');?></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <?php if(!is_null($username) && !is_null($user_id)) { ?>
                                    <li><a href="<?= site_url('/customer/pilihLapangan'); ?>">Home</a></li>
                                    <li><a href="#tf-news">News</a></li>
                                    <li><a href="#tf-profile">Profile</a></li>
                                    <li><a href="<?= site_url('/auth/logout'); ?>">Log out</a></li>
                                <?php } else { ?>
                                    <li><a href="<?= site_url('/auth/login'); ?>">Home</a></li>
                                    <li><a href="#tf-service">About</a></li>
                                    <li><a href="#tf-about">News</a></li>
                                    <li><a href="#tf-contact">Contact</a></li>
                                <?php } ?>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>