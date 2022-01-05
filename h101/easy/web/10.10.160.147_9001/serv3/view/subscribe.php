<?php View::page('header',$data["header"]); ?>
<div class="container" style="padding-top:60px">
    <h1 class="text-center">Learn PHP with Adam</h1>
    <h3 class="text-center">Subscribe</h3>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <?php if( $data["error"] ){ ?>
            <div class="alert alert-danger">
                <p class="text-center">Problem with payment gateway</p>
            </div>
            <?php } ?>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Subscribe Now</strong></div>
                <div class="panel-body">
                    <form method="post">
                        <div><label>Name:</label></div>
                        <div><input name="name" class="form-control" placeholder="Name..."></div>
                        <div style="margin-top:7px"><label>Email:</label></div>
                        <div><input name="email" class="form-control" placeholder="name@test.com"></div>
                        <div style="margin-top:7px"><label>Credit Card Number:</label></div>
                        <div><input name="cc" class="form-control" placeholder="1234 1234 1234 1234"></div>
                        <div style="margin-top:20px">
                            <input type="submit" class="btn btn-success pull-right" value="Subscribe Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php View::page('footer'); ?>