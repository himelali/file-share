<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Welcome to File Share</title>
    <meta name="generator" content="Bootstrap" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" media="all">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/fs-custome.css"); ?>" media="all">
    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
    <!-- Latest compiled and minified jQuery 3.2.0 -->
    <script src="<?php echo base_url("assets/js/jquery-3.2.0.min.js"); ?>"></script>
</head>
<body>
    <nav class="navbar navbar-bright navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav class="collapse navbar-collapse" role="navigation">
                <ul class="nav navbar-nav">
                        <li><a href="<?php echo site_url(); ?>">Home</a></li>
                    <?php if($this->session->userdata('isLogged')) { ?>
                        <li><a href="<?php echo site_url("home/logout"); ?>">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo site_url("home/signup"); ?>">Sign Up</a></li>
                        <li><a href="<?php echo site_url("home/signin"); ?>">Sign In</a></li>
                    <?php }?>
                </ul>
                <ul class="nav navbar-right navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
                        <ul class="dropdown-menu" style="padding:12px;">
                            <form class="form-inline">
                                <button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" placeholder="Search">
                            </form>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
    <div id="masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>File Share</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 text-center">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-md-10 col-sm-9">
                                <h4>Repurpose Content to Reach a Wider Audience</h4>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <h4>
                                            <span class="label label-default">97thfloor.com</span></h4><h4>
                                            <small style="font-family:courier,'new courier';" class="text-muted">2 hours ago  • <a href="#" class="text-muted">Read More</a></small>
                                        </h4>
                                    </div>
                                    <div class="col-xs-3"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <a href="#" class="btn btn-primary pull-right btnNext">More
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="footer">
        <div class="row">
            <div class="col col-sm-12">
                <h3>Follow Us</h3>
                <div class="btn-group">
                    <a class="btn btn-facebook btn-lg" href="#"><i class="fa fa-facebook"></i> Facebook</a>
                    <a class="btn btn-google-plus btn-lg" href="#"><i class="fa fa-google-plus"></i> Google+</a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline">
                        <li><i class="fa fa-facebook fa-2x"></i></li>
                        <li><i class="fa fa-google-plus fa-2x"></i></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <p class="pull-right">Developed by Himel</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>