<?php
class Registration{
    private $username,$password,$name,$validate,$image;

    public function set($user,$password,$name,$images){
        $this->username=$user;
        $this->password = $password;
        $this->name  =$name;
        $this->image=$images;
    }

    public function get(){
        $user=$this->username;
        $password=$this->password;
        $name=$this->name;

        //Create a database instance
        $db=Db::getInstance();
        if($db->_error){
            return "error";
        }

        //validate user input
        $this->username =Sanitize::emailsanitize($db,$this->username);
        $this->password =Sanitize::passwordsanitize($db,$this->password);
        $this->name     =Sanitize::namesanitiza($db,$this->name);
        $this->validate =Validation::passwordvalidation($this->password);
        if(!$this->validate){
            return false;
        }

        //check for existance of the user
        $user=new User();
        $user->set_user($db);
        $user=$user->get_user("username",$this->username);
        if($user===error){
            return "error";
        }
        if($user->get_user_count()){
         return "resub";
        }
        //image operation
          $image=new ImageOp();
          $image->setimage($this->image,true);
          $image->imageupload();

          if($image->geterrorstatus()){
              return $image->geterrorstatus();
          }

        //insert into database
        $sql = "INSERT INTO user (username, addby,password, name,image) VALUES ('".$this->username."',0,'".md5($this->password)."', '".$this->name."','".$image->getimagename()."');";
        $db->mquery($sql);
        $db->dbDisconnect();
        if($db->_error){
            return "error";
        }
        return true;
    }
}


?>