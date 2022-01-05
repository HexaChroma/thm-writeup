<?php
$error = false;
$ticket_created = false;
$name = '';
$email = '';
$question = '';
$file = false;
if( isset($_POST["name"],$_POST["email"],$_POST["question"],$_FILES["file"]) ){
    $chars = array_merge(range('A','Z'),range('0','9'));
    $ticket_ref = date("ymd").'_'.$chars[ rand(0,count($chars)-1) ].$chars[ rand(0,count($chars)-1) ].$chars[ rand(0,count($chars)-1) ].$chars[ rand(0,count($chars)-1) ].$chars[ rand(0,count($chars)-1) ].$chars[ rand(0,count($chars)-1) ];
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $question = htmlspecialchars($_POST["question"], ENT_QUOTES, 'UTF-8');
    if( strlen($_FILES["file"]["tmp_name"]) > 3 ){
        if( substr($_FILES["file"]["name"],-4,4) == '.jpg' ){
            if( $_FILES["file"]["type"] == 'image/jpeg' || $_FILES["file"]["type"] == 'image/jpg' ){
                $file = md5( microtime().print_r($_SERVER,true).print_r($_FILES,true) ).'.jpg';
                move_uploaded_file($_FILES["file"]["tmp_name"], getcwd().'/uploads/'.$file );
            }else{
                $error = 'Invalid content type detected';
            }
        }else{
            $error = 'File Upload needs to have a .jpg extension';
        }
    }
    if( !$error ) {
        $ticket_created = true;
    }
}
?>
<div class="container" style="padding-top:60px">
    <h1 class="text-center">Support Page</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php if( $ticket_created ){ ?>

                <div class="alert alert-success">
                    <p class="text-center">Support Ticket Created</p>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Raise Support Ticket</div>
                    <div class="panel-body">
                        <div><label>Ticket Ref:</label> <?php echo $ticket_ref; ?></div>
                        <div><label>Name:</label> <?php echo $name; ?></div>
                        <div><label>Email:</label> <?php echo $email; ?></div>
                        <div><label>Question:</label></div>
                        <div class="well well-sm"><?php echo $question; ?></div>
                        <?php if( $file ){ ?>
                            <div><label>Supporting Document:</label> <a href="/uploads/<?php echo $file; ?>" target="_blank"><?php echo $file; ?></a></div>
                        <?php } ?>
                    </div>
                </div>

            <?php }else{ ?>

                <?php if( $error ){ ?>
                <div class="alert alert-danger">
                    <p class="text-center"><?php echo $error; ?></p>
                </div>
                <?php } ?>

                <div class="alert alert-info">
                    <p class="text-center">Need help? Raise a support ticket with us here and we'll get back to you asap</p>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">Raise Support Ticket</div>
                        <div class="panel-body">
                            <div><label>Name:</label></div>
                            <div><input class="form-control" name="name" value="<?php echo $name; ?>"></div>
                            <div style="margin-top:7px"><label>Email:</label></div>
                            <div><input class="form-control" name="email" value="<?php echo $email; ?>"></div>
                            <div style="margin-top:7px"><label>Question:</label></div>
                            <div><textarea class="form-control" name="question" style="height:200px"><?php echo $question; ?></textarea></div>
                            <div style="margin-top:7px"><label>Supporting Documents: ( jpg only )</label></div>
                            <div><input type="file" class="form-control" name="file"></div>
                        </div>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success pull-right" value="Create Support Ticket">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>