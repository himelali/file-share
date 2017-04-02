<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css"); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/AdminLTE.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/custom-style.css"); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/skins/_all-skins.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"); ?>">

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url("assets/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
    <!-- Notify JS -->
    <script src="<?php echo base_url("assets/dist/js/notify.min.js"); ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <div id="center-loading"></div>
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url("dashboard"); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>H</b>BD</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Here</b> BD</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
                            <span class="hidden-xs"><?php echo $userInfo->username; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <?php if($userInfo->user_image != NULL) { ?>
                                <img src="<?php echo site_url("files/$userInfo->user_image"); ?>" class="img-circle" alt="<?php echo $userInfo->full_name; ?>">
                                <?php } else { ?>
                                    <i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>
                                <?php } ?>
                                <p>
                                    <?php echo $userInfo->full_name; ?>
                                    <small>Member since <?php echo $userInfo->user_registration; ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#<?php echo site_url("dashboard/profile"); ?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo site_url("dashboard/logout"); ?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?php if($userInfo->user_image != NULL) { ?>
                        <img src="<?php echo site_url("files/$userInfo->user_image"); ?>" class="img-circle" alt="<?php echo $userInfo->full_name; ?>">
                    <?php } else { ?>
                        <i class="fa fa-user-circle fa-4x" aria-hidden="true"></i>
                    <?php } ?>
                </div>
                <div class="pull-left info">
                    <p><?php echo $userInfo->full_name; ?></p>
                    <i class="fa fa-circle text-success"></i> Online
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="post" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li<?php if($uri['segment1'] == 'dashboard') { echo ' class="active"'; } ?>><a href="<?php echo site_url("dashboard/"); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li<?php if($uri['segment1'] == 'contents') { echo ' class="active"'; } ?>><a href="#<?php echo site_url("contents"); ?>"><i class="fa fa-file"></i> <span>Contents</span></a></li>
                <li<?php if($uri['segment1'] == 'products') { echo ' class="active"'; } ?>><a href="<?php echo site_url("products"); ?>"><i class="fa fa-product-hunt"></i> <span>All Products</span></a></li>
                <li<?php if($uri['segment1'] == 'categories') { echo ' class="active"'; } ?>><a href="<?php echo site_url("categories"); ?>"><i class="fa fa-list"></i> <span>All Categories</span></a></li>
                <li<?php if($uri['segment1'] == 'orders') { echo ' class="active"'; } ?>><a href="#<?php echo site_url("orders"); ?>"><i class="fa fa-bars"></i> <span>All Orders</span></a></li>
                <li<?php if($uri['segment1'] == 'users') { echo ' class="active"'; } ?>><a href="#<?php echo site_url("users"); ?>"><i class="fa fa-users"></i> <span>All Users</span></a></li>
                <li class="header">All Reports</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Todays</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Last 7 Days</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Current Months</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> <span>Last Months</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-blue"></i> <span>All Times</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php include_once $page.'.php'; ?>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>Copyright &copy; 2016 - <?php echo date("Y"); ?>
            <a target="_blank" href="<?php echo config_item('dev_url'); ?>">
            <?php echo config_item('dev_name'); ?>
            </a>.
        </strong> All rights reserved.
        <div class="pull-right hidden-xs">
            <b>Version</b> Beta 1.0
        </div>
    </footer>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php if($error || $notification || $warning || $success || $exception) { ?>
    <script type="text/javascript">
        $( document ).ready( function() {
            <?php
            if($error)
                echo '$.notify("'.$error.'", "error");';
            if($notification)
                echo '$.notify("'.$notification.'", "notification");';
            if($warning)
                echo '$.notify("'.$warning.'", "warning");';
            if($success)
                echo '$.notify("'.$success.'", "success");';
            if($exception)
                echo '$.notify("'.$exception.'", "exception");';
            ?>
        });
    </script>
<?php } ?>

<!-- SlimScroll -->
<script src="<?php echo base_url("assets/plugins/slimScroll/jquery.slimscroll.min.js"); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url("assets/plugins/fastclick/fastclick.js"); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url("assets/dist/js/app.min.js"); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url("assets/dist/js/demo.js"); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"); ?>"></script>
<script>
    $(function () {
        $("textarea").wysihtml5();
    });
</script>

</body>
</html>