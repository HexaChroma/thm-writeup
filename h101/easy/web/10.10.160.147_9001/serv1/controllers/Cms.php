<?php namespace Controller;


use http\Params;

class Cms
{

    private static $salt = 'cf0ab7fa70a18dc8048fd7bcd1743e1a';


    private static function getPage($page){
        include_once('../data/'.$page.'.txt');
    }

    public static function home(){
        self::getPage('home');
    }

    public static function contact(){
        self::getPage('contact');
    }

    public static function about(){
        self::getPage('about');
    }

    public static function logout(){
        if( isset($_COOKIE["token"]) ){
            setcookie('token',null,time()-3600,'/');
        }
        \View::redirect('/vbcms');
    }

    public static function edit(){
        $user = json_decode(file_get_contents('../data/user.txt'),true);
        if( isset($_COOKIE["token"]) && $_COOKIE["token"] === $user["cookie"]  ) {
            if( isset($_GET["page"]) ){
                if( $_GET["page"] === 'home' || $_GET["page"] === 'contact' || $_GET["page"] === 'about'  ){
                    $page = $_GET["page"];
                    if( isset($_POST["code"]) ){
                        $pages = json_decode( file_get_contents('../data/pages.txt'),true );
                        $pages[$page] = date("U");
                        file_put_contents('../data/pages.txt', json_encode($pages) );
                        file_put_contents('../data/'.$page.'.txt',$_POST["code"]);
                        \View::redirect('/vbcms?updated=1');
                    }
                    $error = false;
                    $data = array(
                        'header' => array(
                            'title' => 'VeryBasicCMS - Edit Page',
                        ),
                        'code'      =>  htmlspecialchars(file_get_contents('../data/'.$page.'.txt'), ENT_QUOTES, 'UTF-8'),
                        'page'      =>  $page,
                        'error'     =>  $error
                    );
                    \View::page('edit', $data);
                }else{
                    \View::redirect('/vbcms');
                }
            }else{
                \View::redirect('/vbcms');
            }
        }else{
            \View::redirect('/vbcms/login');
        }
    }


    public static function admin(){
        $user = json_decode(file_get_contents('../data/user.txt'),true);
        if( isset($_COOKIE["token"]) && $_COOKIE["token"] === $user["cookie"]  ) {
            $error = false;
            if( isset($_POST["action"]) ){
                if( $_POST["action"] === 'password' && isset($_POST["password"])  ){
                    if( strlen($_POST["password"]) >= 6  ){
                        $user["password"] = $_POST["password"];
                        $user["cookie"] = md5(self::$salt.$_POST["password"]  );
                        file_put_contents('../data/user.txt', json_encode($user)  );
                        setcookie('token',$user["cookie"],time()+3600,'/');
                        \View::redirect('/vbcms?pass_updated=1');
                    }else{
                        $error = 'Password must be 6 or more characters';
                    }
                }
            }
            $data = array(
                'header' => array(
                    'title' => 'VeryBasicCMS - Admin Area',
                ),
                'error' =>  $error,
                'updated'   =>  json_decode(file_get_contents('../data/pages.txt'),true),
            );
            \View::page('admin', $data);
        }else{
            \View::redirect('/vbcms/login');
        }
    }

    public static function login(){
        $error = false;
        if( isset($_POST["username"],$_POST["password"]) ){
            $user = json_decode(file_get_contents('../data/user.txt'),true);
            if( $_POST["username"] === $user["username"] && $_POST["password"] === $user["password"]  ){
                setcookie('token',$user["cookie"],time()+3600,'/');
                \View::redirect('/vbcms');
            }
            $error = true;
        }
        $data = array(
            'header'    =>  array(
                'title' =>  'VeryBasicCMS - Login',
            ),
            'error' =>  $error
        );
        \View::page('login',$data);
    }

}