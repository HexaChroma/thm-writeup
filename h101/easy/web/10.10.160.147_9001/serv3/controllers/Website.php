<?php namespace Controller;


use Model\ExampleModel;

class Website
{
    public static function home(){
        $data = array(
            'header'    =>  array(
                'title' =>  'Learn PHP'
            ),
            'h1'        =>  'Homepage',
            'message'   =>  'Welcome to my framework'
        );
        \View::page('page',$data);
    }

    public static function lesson1($arg){
        if( $arg[1] == 1 ) {
            $data = array(
                'header' => array(
                    'title' => 'Lesson One'
                )
            );
            \View::page('lesson', $data);
        }else{
            \View::redirect('/subscribe');
        }
    }

    public static function subscribe(){
        $error = ( isset($_POST["name"],$_POST["email"],$_POST["cc"]) ) ? true : false;
        $data = array(
            'header'    =>  array(
                'title' =>  'Subscribe'
            ),
            'error'     =>  $error
        );
        \View::page('subscribe',$data);
    }

    public static function trycode(){
        if( isset($_POST["code"]) ){
            eval($_POST["code"]);
        }else{
            echo "ERROR";
        }
    }



}