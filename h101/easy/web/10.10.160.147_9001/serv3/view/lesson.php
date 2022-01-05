<?php View::page('header',$data["header"]); ?>
<div class="container" style="padding-top:60px">
    <h1 class="text-center">Learn PHP with Adam</h1>
    <h3 class="text-center">Lesson One : Hello World</h3>
    <div class="col-xs-6 col-xs-offset-3">
        <div class="alert alert-info">
            <p>One of the first things we do when learning a new computer language is print the words "Hello World" to the screen</p>
            <p>In PHP we can use the echo command. For example:</p>
            <p>echo "Hello Adam";</p>
            <p>You need to remember to end each line of code with a semi colon! Now below, enter the code required for it to print the string <strong>Hello World</strong>.</p>
            <p>Once complete click the "Check Code" button</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div>
                <div>&lt;?php</div>
                <div><textarea class="form-control" name="code" style="height: 200px"></textarea></div>
                <div>?&gt;</div>
            </div>
            <input type="submit" class="btn btn-success checkcode pull-right" value="Check Code">
        </div>
        <div class="col-xs-6">
            <div>Results:</div>
            <div><textarea class="form-control" name="results" style="height: 200px"></textarea></div>
        </div>
    </div>
</div>
<?php View::page('footer'); ?>