<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?> - Here Bangladesh</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/custom-style.css"); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url("assets/plugins/iCheck/square/blue.css"); ?>">
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
<body class="hold-transition login-page">
<div id="center-loading"></div>
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo site_url(); ?>"><b>Here </b>BD</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="formSubmit" action="<?php echo site_url("login/check"); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" required class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" required class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" value="1" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
    <a class="pull-right" href="#<?php echo site_url("login/forgot"); ?>">I forgot my password</a>
    <div class="clearfix"></div>
  </div>
    <br>
  <!-- /.login-box-body -->
  <footer class="text-center">Developed by
      <a target="_blank" href="<?php echo config_item('dev_url'); ?>">
          <?php echo config_item('dev_name'); ?>
      </a>
  </footer>
</div>
<!-- /.login-box -->

<!-- iCheck -->
<script src="<?php echo base_url("assets/plugins/iCheck/icheck.min.js"); ?>"></script>
<script>

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });
</script>

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

</body>
</html>
