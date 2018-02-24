<?php
class Sanitize{
    public static function emailsanitize($link,$string){
        $string = trim($string);
        $string = $link->_conn->real_escape_string($string);
        return $string;
    }

    public static function passwordsanitize($link,$string){
        $string = trim($string);
        $string = $link->_conn->real_escape_string($string);
        return $string;
    }
    public static function namesanitiza($link,$string){
        $string = trim($string);
        $string = $link->_conn->real_escape_string($string);
        return $string;
    }
}