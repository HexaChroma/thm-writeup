<?php View::page('header',$data["header"]); ?>
<div class="container" style="padding-top:60px">
    <h1 class="text-center">Learn PHP with Adam</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Why learn PHP?</div>
                <div class="panel-body">
                    <p>PHP is one of the most commonly used scripting languages on the internet!</p>
                    <p>PHP has the following benefits over other languages:</p>
                    <ul>
                        <li>No History of security problems</li>
                        <li>Strict Type Casting</li>
                        <li>An abundance of code on the internet that you can copy and paste into your own projects</li>
                        <li>And much more!</li>
                    </ul>
                </div>
            </div>
            <a href="/lesson/1" class="btn btn-info">Try Free Lesson</a>
            <a href="/subscribe" class="btn btn-success pull-right">Sign Me Up</a>
        </div>
    </div>
</div>
<?php View::page('footer'); ?>