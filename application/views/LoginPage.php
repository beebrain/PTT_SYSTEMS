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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('asserts'); ?>/css/style.css">
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
                                <div class="progress hidden" id="login-progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        Log In...
                                    </div>
                                </div>
                                <form action="<?php echo base_url("index.php/Welcome/loginProcess") ?>" method="post">
                                    <div class="control">
                                        <input type="text"  name="username" class="form-control" value="" placeholder="Username"/>
                                    </div>
                                    <div class="control">
                                        <input type="password"  name="password" class="form-control" value="" placeholder="Password" />
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

      
    </body>

</html>
