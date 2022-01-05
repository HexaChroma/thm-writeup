<?php
if( isset($_GET["page"]) ){
    $tmp_page = preg_replace('/([^a-zA-Z0-9])/','',$_GET["page"]);
    if( strlen($tmp_page) == 0 ){
        $_GET["page"] = md5(microtime());
    }
    $page = '404.php';
    if( $_GET["page"] == 'index.php' ){
        header("Location: /?page=home.php");
        exit();
    }
    if( file_exists(getcwd().'/'.$_GET["page"] ) ) {
        if(  substr( realpath(  getcwd().'/'.$_GET["page"] ),0,strlen(getcwd())) == getcwd() ) {
            $page = $_GET["page"];
        }
    }
    if( $page == '404.php' ){
        header("HTTP/1.0 404 Not Found");
    }
    include_once('header.php');
    include_once($page);
    include_once('footer.php');
}else{
    header("Location: /?page=home.php");
    exit();
}