<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="admin_asset/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="admin_asset/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="admin_asset/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="admin_asset/css/style.css" rel="stylesheet" />
        <link href="admin_asset/css/style-responsive.css" rel="stylesheet" />
        <link href="admin_asset/css/style-default.css" rel="stylesheet" id="style_color" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="lock">
        <div class="lock-header">
            <!-- BEGIN LOGO -->
            <h1 style="color:green;"><b>Admin Panel Authorization</b></h1>
            <!-- END LOGO -->
        </div>
        <h2 style="color:red; text-align:center;">
            <?php
            echo Session::get('exception');
            echo Session::put('exception', '');
            ?>
        </h2>
        <h2 style="color:red; text-align:center;">
            <?php
            echo Session::get('message');
            echo Session::put('message', '');
            ?>
        </h2>
        <div class="login-wrap">
            <div class="metro single-size red">
                <div class="locked">
                    <i class="icon-lock"></i>
                    <span>Login</span>
                </div>
            </div>
            <div class="metro double-size green">
                {!! Form::open(array('url' => 'admin-login', 'method' => 'post' )) !!}
                <div class="input-append lock-input">
                    <input type="text" class="" name="admin_email_address" placeholder="email">
                </div>

            </div>
            <div class="metro double-size yellow">

                <div class="input-append lock-input">
                    <input type="password" class="" name="admin_password" placeholder="Password">
                </div>

            </div>
            <div class="metro single-size terques login">

                <button type="submit" class="btn login-btn">
                    Login
                    <i class=" icon-long-arrow-right"></i>
                </button>
                {!! Form::close() !!}
            </div>


            <div class="login-footer">
                <div class="remember-hint pull-left">
                    <input type="checkbox" id=""> Remember Me
                </div>
                <div class="forgot-hint pull-right">
                    <a id="forget-password" class="" href="javascript:;">Forgot Password?</a>
                </div>
            </div>
        </div>
    </body>
    <!-- END BODY -->
</html>