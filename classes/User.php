<?php

class User
{
    private $_result,$_dbinstance;

    public function set_user($link)
    {
          $this->_dbinstance=$link;

    }

    public function get_user($key, $value)
    {
        $type = gettype($value);
        if ($type == "string") {
            $value = "'" . $value . "'";
        }
        $sql = "SELECT * from user WHERE " . $key . "=" . $value;
        $this->_dbinstance->mquery($sql);
        if ($this->_dbinstance->_error) {
            return "error";
        }
        $this->_result=$this->_dbinstance->_result;
        return $this->_dbinstance->_result;
    }

    public function get_user_count(){
        if(!isset($this->_result)){
            return "error";
        }
        else{
            $count=0;
            while($row=$this->_result->fetch_assoc()){
                $count++;
            }
            return $count;
        }
    }

    public function edituser($id,$arr,$image){

        $sql = "UPDATE user SET ";
        foreach($arr as $key=>$value){
            if($key==="password"){
                $value=md5($value);
            }

            if(gettype($arr[$key])==="string"){
                $value="'".$value."'";
            }
            $sql.=$key."=".$value." , ";
        }

        if(strlen($image)){
            $sql.=" image='".$image."'";
        }
        else{
            $arr=explode(" ",$sql);
            array_pop($arr);
            array_pop($arr);
            $sql=implode(" ",$arr);
        }

        $sql.=" WHERE id=".$id;

        $this->_dbinstance->mquery($sql);
        if ($this->_dbinstance->_error) {
            return "error";
        }
        else{
            return true;
        }
     }

     public function adduser($arr,$image){

        $sql="INSERT INTO user (";
         foreach($arr as $key=>$value){
             $sql.=$key.",";
         }
//         $arr=explode(",",$sql);
//         array_pop($arr);
//         $sql=implode(",",$arr);
         $sql.="image)VALUES(";
         foreach($arr as $key=>$value){
             if($key==="password"){
                 $value=md5($value);
             }
             if(gettype($value)==="string"){
                 $value="'".$value."'";
             }

             $sql.=$value.",";
         }
//         $arr=explode(",",$sql);
//         array_pop($arr);
//         $sql=implode(",",$arr);
         $sql.="'".$image."'".");";
        $this->_dbinstance->mquery($sql);
         if ($this->_dbinstance->_error) {
             return "error";
         }
         else{
             return true;
         }
     }

     public function delete_user($key,$val){
         $sql="DELETE FROM user WHERE ".$key."=".$val.";";
         $this->_dbinstance->mquery($sql);
         if ($this->_dbinstance->_error) {
             return "error";
         }
         else{
             return true;
         }
     }

     public function get_limit_user($key,$val,$page){
         $type = gettype($val);
         if ($type == "string") {
             $val = "'" . $val . "'";
         }
         $sql = "SELECT * from user WHERE " . $key . "=" . $val." ORDER BY id ASC LIMIT  ".$page.", 2;";
         $this->_dbinstance->mquery($sql);
         if ($this->_dbinstance->_error) {
             return "error";
         }
         $this->_result=$this->_dbinstance->_result;
         return $this->_dbinstance->_result;
     }
     public function get_usercount_on_search($key,$val,$tag){
         $type = gettype($val);
         if ($type == "string") {
             $val = "'" . $val . "'";
         }
         $sql = "SELECT count(*) as result FROM user WHERE ".$key." = ".$val." AND ( name LIKE '%".$tag."%' OR username LIKE '%".$tag."%');";
         $this->_dbinstance->mquery($sql);
         if ($this->_dbinstance->_error) {
             return "error";
         }
         else{
             $this->_result=$this->_dbinstance->_result;
             return $this->_result;
         }
     }
     public function get_limit_user_on_search($key,$val,$page,$tag){
         $typ = gettype($val);
         if ($typ == "string") {
             $val = "'" . $val . "'";
         }
         $sql = "SELECT name,username,image FROM user WHERE ".$key." = ".$val." AND ( name LIKE '%".$tag."%' OR username LIKE '%".$tag."%') ORDER BY id ASC LIMIT ".$page.", 2;";
         $this->_dbinstance->mquery($sql);
         if ($this->_dbinstance->_error) {
             return "error";
         }
         else{
             $this->_result=$this->_dbinstance->_result;
             return $this->_result;
         }
     }
}
?>