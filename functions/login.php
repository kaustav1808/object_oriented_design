<?php
session_start();
include_once  "init.php";



if(isset($_POST["email"])){
    $login = new Login();
    $login->set($_POST["email"],$_POST["password"]);
    $flag=$login->get();

    if($flag === FALSE){
        $val=array(
            "msg"=>"please provide correct password"
        );
        $location="index.php";
        $redirect=new Redirect();
        $redirect->set_header($location,$val,0);
        $redirect->get_header();
    }
    else if($flag === 1){
        $val=array();
        $location="dashboard.php";
        $redirect=new Redirect();
        $redirect->set_header($location,$val,0);
        $redirect->get_header();
    }
    else if($flag === "error"){
        $val=array(
            "msg"=>"oop's!!connection error"
        );
        $location="index.php";
        $redirect=new Redirect();
        $redirect->set_header($location,$val,0);
        $redirect->get_header();
    }
    else{
        $val=array(
            "msg"=>"Sorry!!your email or password does'nt match"
        );
        $location="index.php";
        $redirect=new Redirect();
        $redirect->set_header($location,$val,0);
        $redirect->get_header();
    }
}
