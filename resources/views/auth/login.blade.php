<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="A Components Mix Bootstarp 3 Admin Dashboard Template">
<meta name="author" content="Westilian">
<title>WalkIn App Admin</title>
  <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/animate.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/waves.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/layout.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/components.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/plugins.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/common-styles.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/pages.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo url('resources/assets/admin/css') ?>/matmix-iconfont.css" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,500italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" type="text/css">
</head>
<body class="login-page">
    <div class="page-container">
      <div class="login-branding">
           <!--   <a href="index.html"><img src="<?php echo url('resources/assets/admin/images') ?>/logo-large.png" alt="logo"></a>-->
        </div>
        <div class="login-container">
            <img class="login-img-card" src="<?php echo url('resources/assets/admin/images') ?>/avatar/jaman-01.jpg" alt="login thumb" />
            <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
			  {{ csrf_field() }}
			     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" name="email" id="inputEmail" class="form-control floatlabel " placeholder="Email Address" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
								   </div>
								     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" id="inputPassword" class="form-control floatlabel " placeholder="Password" required>
								@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif   
  </div>								
			   <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" class="switch-mini" /> Remember Me
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-signin" type="submit">Sign In</button>
            </form>
		
         
        </div>
     

        <div class="login-footer">
            <a href="#"> WalkIn App Admin </a>

        </div>

    </div>
    <script src="<?php echo url('resources/assets/admin/js') ?>/jquery-1.11.2.min.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/jRespond.min.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/bootstrap.min.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/nav-accordion.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/hoverintent.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/waves.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/switchery.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/jquery.loadmask.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/icheck.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/bootbox.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/animation.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/colorpicker.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/bootstrap-datepicker.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/floatlabels.js"></script>

    <script src="<?php echo url('resources/assets/admin/js') ?>/smart-resize.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/layout.init.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/matmix.init.js"></script>
    <script src="<?php echo url('resources/assets/admin/js') ?>/retina.min.js"></script>
</body>

</html>