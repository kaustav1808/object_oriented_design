<?php

class Login
{
    public $validate;
    private $username, $password;

    public function set($user, $password)
    {
        $this->username = $user;
        $this->password = $password;
    }

    public function get()
    {
        $user = $this->username;
        $password = $this->password;
        $db = Db::getInstance();
        if ($db->_error) {
            return "error";
        }
        $this->username = Sanitize::emailsanitize($db, $this->username);
        $this->password = Sanitize::passwordsanitize($db, $this->password);
        $this->validate = Validation::passwordvalidation($this->password);
        if (!$this->validate) {
            return false;
        }
        $sql = "SELECT id,image FROM user WHERE username='" . $user . "' AND password='" . md5($password) . "' ;";
        $db->mquery($sql);
        $db->dbDisconnect();
        if ($db->_error) {
            return "error";
        } else {
            $db->_rows = $db->_result->fetch_assoc();
            $db->_rows['id']=(int)$db->_rows["id"];
            Session::set_session("id",$db->_rows["id"]);
            Session::set_session("image",$db->_rows["image"]);
            return $db->_result->num_rows;
        }
    }
}

?>