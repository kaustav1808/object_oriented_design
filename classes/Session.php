<?php
class Session{

    public static function set_session($key,$value){
        $_SESSION[$key]=$value;
 }
    public static function session_end(){
        session_unset();
        session_destroy();
        $redirect=new Redirect();
        $val=array(
            "msg"=>"you are successfully logout"
        );
        $redirect->set_header("index.php",$val);
        $redirect->get_header();
    }
}

?>