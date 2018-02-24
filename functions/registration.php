<?php
session_start();
include_once  "init.php";



if(isset($_POST["email"])){
    $reg = new Registration();
    $reg->set($_POST["email"],$_POST["password"],$_POST["name"],$_FILES);
    $flag=$reg->get();

    if($flag === FALSE){
        $redirect=new Redirect();
        $location="registration.php";
        $val=array(
            "msg"=>"please provide correct password"
        );
        $redirect->set_header($location,$val,0);
        $redirect->get_header();
    }
    else if($flag === true){
        $redirect=new Redirect();
        $location="dashboard.php";
        $val=array();
        $redirect->set_header($location,$val,0);
        $redirect->get_header();
    }
    else if($flag === "error"){
        $redirect=new Redirect();
        $location="registration.php";
        $val=array(
            "msg"=>"oop's!!connection error"
        );
        $redirect->set_header($location,$val,0);
        $redirect->get_header();
    }
    else if($flag === "resub"){

        $redirect=new Redirect();
        $location="registration.php";
        $val=array(
            "msg"=>"user already registered"
        );
        $redirect->set_header($location,$val,0);
        $redirect->get_header();
    }
    else if($flag === "ext"){

        $redirect=new Redirect();
        $location="registration.php";
        $val=array(
            "msg"=>"please enter correct type of file"
        );
        $redirect->set_header($location,$val,0);
        $redirect->get_header();
    }
    else if($flag === "size"){

        $redirect=new Redirect();
        $location="registration.php";
        $val=array(
            "msg"=>"oops!your image size is too big"
        );
        $redirect->set_header($location,$val,0);
        $redirect->get_header();
    }
}
