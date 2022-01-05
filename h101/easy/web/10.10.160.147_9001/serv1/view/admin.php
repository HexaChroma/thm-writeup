<?php View::page('header',$data["header"]); ?>
<div class="container" style="padding-top:60px">
    <h1 class="text-center">Very Basic CMS</h1>
    <h3 class="text-center">Admin Area</h3>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <?php if( isset($_GET["pass_updated"]) ){ ?>
                <div class="alert alert-success">
                    <p class="text-center">Password Updated</p>
                </div>
            <?php } ?>

            <?php if( isset($_GET["updated"]) ){ ?>
                <div class="alert alert-success">
                    <p class="text-center">Page Updated</p>
                </div>
            <?php } ?>

            <?php if( $data["error"] ){ ?>
                <div class="alert alert-danger">
                    <p class="text-center"><?php echo $data["error"]; ?></p>
                </div>
            <?php } ?>

            <ul class="nav nav-tabs" style="margin-top:15px;margin-bottom:20px">
                <li role="presentation" class="active"><a href="#" class="section-change" data-section="pages" >Pages</a></li>
                <li role="presentation"><a href="#" class="section-change" data-section="password">Change Password</a></li>
                <li role="presentation"><a href="/vbcms/logout">Logout</a></li>
            </ul>

            <div class="section pages">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Pages</strong></div>
                    <div class="panel-body" style="padding:0">
                        <table class="table" style="margin:0">
                            <tr>
                                <th>URI</th>
                                <th>Name</th>
                                <th>Last Update</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <tr>
                                <td>/</td>
                                <td>Home Page</td>
                                <td><?php echo date("d/m/y H:i:s", $data["updated"]["home"]); ?></td>
                                <td class="text-center"><a href="/vbcms/edit?page=home" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="/" target="_blank" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-new-window"></span> View</a></td>
                            </tr>
                            <tr>
                                <td>/about</td>
                                <td>About Us</td>
                                <td><?php echo date("d/m/y H:i:s", $data["updated"]["about"]); ?></td>
                                <td class="text-center"><a href="/vbcms/edit?page=about" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="/about" target="_blank" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-new-window"></span> View</a></td>
                            </tr>
                            <tr>
                                <td>/contact</td>
                                <td>Contact Us</td>
                                <td><?php echo date("d/m/y H:i:s", $data["updated"]["contact"]); ?></td>
                                <td class="text-center"><a href="/vbcms/edit?page=contact" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <a href="/contact" target="_blank" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-new-window"></span> View</a></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

            <div class="section password hidden">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Change Password</strong></div>
                    <div class="panel-body">
                        <form method="post" action="/vbcms">
                            <input type="hidden" name="action" value="password">
                            <div><label>New Password:</label></div>
                            <div><input type="password" class="form-control" name="password"></div>
                            <div style="margin-top:15px">
                                <input type="submit" class="btn btn-success pull-right" value="Change Password">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php View::page('footer'); ?>
<script>

    $('.section-change').click( function(){


        $('.nav-tabs li').removeClass('active');
        $(this).parent().addClass('active');

        $('.section').addClass('hidden');

        $('.' + $(this).attr('data-section')  ).removeClass('hidden');



        return false;
    });


</script>
