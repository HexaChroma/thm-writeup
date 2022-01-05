<?php View::page('header',$data["header"]); ?>
<div class="container" style="padding-top:60px">
    <h1 class="text-center">Very Basic CMS</h1>
    <h3 class="text-center">Admin Area | Edit</h3>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="post">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Edit Page: <?php echo $data["page"]; ?></strong></div>
                    <div class="panel-body">
                        <textarea class="form-control" name="code" style="height:400px"><?php echo $data["code"]; ?></textarea>
                    </div>
                </div>
                <div>
                    <a href="/vbcms" class="btn btn-danger">Go Back</a>
                    <input type="submit" class="btn btn-success pull-right" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
<?php View::page('footer'); ?>