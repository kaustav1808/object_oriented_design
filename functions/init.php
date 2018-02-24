<?php

//session_start();
$GLOBALS['config']=array(
    'mysql'=>array(
        'host'=>'localhost',
        'username'=>'root',
        'password'=>'12345',
        'database'=>'kaustav'
     )
);

spl_autoload_register(function($class){
    include $_SERVER['DOCUMENT_ROOT']."/UNIVERSITY/classes/".$class.".php";

});

function baseurl(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'] ;
}