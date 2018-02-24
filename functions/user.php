<?php
include_once "init.php";

function getusercount($type,$val)
{
    $db = Db::getInstance();
    $user = new User();
    $user->set_user($db);
    $stat = $user->get_user($type, $val);
    if ($stat === "error") {

        $val = array(
            "msg" => "Sorry!!we can't show you now"
        );
        $location = "userlisting.php";
        $redirect = new Redirect();
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    } else {
//        $result = array();
//        while ($row = $stat->fetch_array()) {
//            array_push($result, $row);
//        }
        return $user->get_user_count();
    }
}

function edituser($input, $files)
{
    foreach ($input as $key => $value) {
        if (empty($input[$key])) {
            unset($input[$key]);
        }
    }

    $id = array_pop($input);
    $image="";
    if (!$files["image"]["error"]) {
        $image = new ImageOp();
        $image->setimage($files,0);
        $image->imageupload();
        if ($image->geterrorstatus()) {
            $redirect = new Redirect();
            $location = "userlisting.php";
            $val = array(
                "msg" => "Image Does'nt uploaded"
            );
            $redirect->set_header($location, $val,true);
            $redirect->get_header();
        }
        $image = $image->getimagename();
    }

    $db = Db::getInstance();
    $user = new User();
    $user->set_user($db);
    $stat = $user->edituser($id, $input,$image);

    if ($stat === "error") {
        $redirect = new Redirect();
        $location = "userlisting.php";
        $val = array(
            "msg" => "There is a problem"
        );
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    } else {
        $redirect = new Redirect();
        $location = "userlisting.php";
        $val = array(
            "msg2" => "User is successfully edited",
            "page" =>0
        );
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    }
}

function deleteuser($id){
    $db = Db::getInstance();
    $user = new User();
    $user->set_user($db);
    $stat = $user->delete_user("id",$id);

    if ($stat === "error") {
        $redirect = new Redirect();
        $location = "userlisting.php";
        $val = array(
            "msg" => "There is a problem"
        );
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    } else {
        $redirect = new Redirect();
        $location = "userlisting.php";
        $val = array(
            "msg2" => "User is successfully deleted",
            "page" =>0
        );
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    }
}

function adduser($input,$files){

    $image="default.jpg";
    $input["addby"]=(int)$input["addby"];
    if (!$files["image"]["error"]) {
        $image = new ImageOp();
        $image->setimage($files,0);
        $image->imageupload();
        if ($image->geterrorstatus()) {
            $redirect = new Redirect();
            $location = "userlisting.php";
            $val = array(
                "msg" => "Image Does'nt uploaded"
            );
            $redirect->set_header($location, $val,true);
            $redirect->get_header();
        }
        $image = $image->getimagename();
    }

    $db = Db::getInstance();
    $user = new User();
    $user->set_user($db);
    $stat = $user->adduser($input,$image);

    if ($stat === "error") {
        $redirect = new Redirect();
        $location = "userlisting.php";
        $val = array(
            "msg" => "There is a problem"
        );
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    } else {
        $redirect = new Redirect();
        $location = "userlisting.php";
        $val = array(
            "msg2" => "User is successfully added",
            "page" =>0
        );
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    }
}

function limituser($type,$val,$page){
    $db = Db::getInstance();
    $user = new User();
    $user->set_user($db);
    $stat = $user->get_limit_user($type, $val,$page);
    if ($stat === "error") {

        $val = array(
            "msg" => "Sorry!!we can't show you now"
        );
        $location = "userlisting.php";
        $redirect = new Redirect();
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    } else {
        $result = array();
        while ($row = $stat->fetch_array()) {
            array_push($result, $row);
        }
        return $result;
    }
}
function getuser($type,$val){
    $db = Db::getInstance();
    $user = new User();
    $user->set_user($db);
    $stat = $user->get_user($type, $val);
    if ($stat === "error") {

        $val = array(
            "msg" => "Sorry!!we can't show you now"
        );
        $location = "userlisting.php";
        $redirect = new Redirect();
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    } else {
        $result = array();
        while ($row = $stat->fetch_array()) {
            array_push($result, $row);
        }
        return $result;
    }
}
function getusercountonsearch($type,$val,$tag){
    $db = Db::getInstance();
    $user = new User();
    $user->set_user($db);
    $stat = $user->get_usercount_on_search($type, $val,$tag);
    if ($stat === "error") {

        $val = array(
            "msg" => "Sorry!!we can't show you now"
        );
        $location = "userlisting.php";
        $redirect = new Redirect();
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    } else {
        $result=$stat->fetch_assoc();
        return $result["result"];
    }
}
function limituseronsearch($type,$val,$page,$tag){
    $db = Db::getInstance();
    $user = new User();
    $user->set_user($db);
    $stat = $user->get_limit_user_on_search($type, $val,$page,$tag);
    if ($stat === "error") {

        $val = array(
            "msg" => "Sorry!!we can't show you now"
        );
        $location = "userlisting.php";
        $redirect = new Redirect();
        $redirect->set_header($location, $val,true);
        $redirect->get_header();
    } else {
        $result = array();
        while ($row = $stat->fetch_array()) {
            array_push($result, $row);
        }
        return $result;
    }
}
?>