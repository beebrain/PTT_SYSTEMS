<!DOCTYPE html>
<html>

    <head>
        <title>Login PTT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->

        <!-- CSS Libs -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts'); ?>/bower_components/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts'); ?>/bower_components/fontawesome/css/font-awesome.min.css">

        <!-- CSS App -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts'); ?>/css/style_1.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts'); ?>/css/themes.css">
    </head>

    <body class="flat-blue login-page">
        <div class="container">
            <div class="login-box">
                <div>
                    <div class="login-form row">
                        <div class="col-sm-12 text-center login-header">
                            <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                            <h4 class="login-title">LOGIN PTT</h4>
                        </div>
                        <div class="col-sm-12">
                            <div class="login-body">
                                <form  id="login" action="<?php echo base_url("index.php/Welcome/loginProcess") ?>" method="post">
                                    <div class="control">
                                        <input type="text" id="username" name="username" class="form-control" value="" placeholder="Username"/>
                                    </div>
                                    <div class="control">
                                        <input type="password" id="password"  name="password" class="form-control" value="" placeholder="Password" />
                                    </div>
                                    <div class="control ">
                                        <label>
                                            <input type="checkbox" id="remember" name="remember" class="input-checkbox"> Remember password
                                        </label>
                                    </div>
                                    <div class="login-button text-center">
                                        <input type="submit" class="btn btn-primary" value="Login">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('asserts') ?>/bower_components/jquery/dist/jquery.js"></script>
        <script src="<?php echo base_url('asserts') ?>/js/jquery.html5-placeholder-shim.js"></script>
        <script src="<?php echo base_url('asserts') ?>/js/js.cookie.js"></script>
        <script>
            $(document).ready(function () {

                var remember = $.cookie('remember');
                if (remember == 'true')
                {
                    var username = $.cookie('username');
                    var password = $.cookie('password');
                    // autofill the fields
                    $('#username').val(username);
                    $('#password').val(password);
                }


                $("#login").submit(function () {
                    if ($('#remember').is(':checked')) {
                        var username = $('#username').val();
                        var password = $('#password').val();

                        // set cookies to expire in 14 days
                        $.cookie('username', username, {expires: 14});
                        $.cookie('password', password, {expires: 14});
                        $.cookie('remember', true, {expires: 14});
                    }
                    else
                    {
                        // reset cookies
                        $.cookie('email', null);
                        $.cookie('password', null);
                        $.cookie('remember', null);
                    }
                });
            });
        </script>
    </body>

</html>
