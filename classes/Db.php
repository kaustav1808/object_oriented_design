<?php
final class Db{
    private static $_instance = null ;
    public $_conn,$_error=false,$_result,$_rows;

    private function __construct()
    {
        $this->_conn=new mysqli( config::get("mysql/host"),
                                 config::get("mysql/username"),
                                 config::get("mysql/password"),
                                 config::get("mysql/database"));
        if($this->_conn->connect_errno>0){
            $this->_error=true;
        }
    }

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance=new db();
        }
        return self::$_instance;
    }
    public function mquery($sql){

      if(!$this->_result){
          $this->_error=true;
      }
    }
    public function dbDisconnect(){
        $this->_conn->close();
    }


}