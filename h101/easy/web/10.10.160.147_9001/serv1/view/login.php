<?php View::page('header',$data["header"]); ?>
<div class="container" style="padding-top:60px">
    <h1 class="text-center">Very Basic CMS</h1>
    <h3 class="text-center">Login</h3>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <?php if( $data["error"] ){ ?>
            <div class="alert alert-danger">
                <p class="text-center">Invalid Username or Password</p>
            </div>
            <?php } ?>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Login</strong></div>
                <div class="panel-body">
                    <form method="post">
                        <div><label>Username:</label></div>
                        <div><input class="form-control" name="username"></div>
                        <div style="margin-top:7px"><label>Password:</label></div>
                        <div><input class="form-control" type="password" name="password"></div>
                        <div style="margin-top:15px"><input type="submit" class="btn btn-success pull-right" value="Login"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php View::page('footer'); ?>