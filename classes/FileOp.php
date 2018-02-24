<?php

class FileOp
{
    private $files,$ext=0;

    public function setfilename($filename)
    {
        $this->files = $filename;
    }

    public function filemove($path)
    {
        $bool = move_uploaded_file($this->files["image"]["tmp_name"], $path);
        if ($bool) {
         return true;
        }
        else{
            return false;
        }
    }
    public function filesizevalidate($size){
        if($size<$this->files["image"]["size"]){
            return false;
        }
        else{
            return true;
        }
    }
    public function fileextcheck($arr){
        $ext=explode("/",$this->files["image"]["type"]);
      if(in_array($ext[1],$arr)){
          $this->ext=$ext[1];
          return true;
      }
      else{
          return false;
      }
    }
    public function filerename($type){
        $rnd_name = $type.'_'.uniqid(mt_rand(10, 15)).'_'.time().".".$this->ext;
        return $rnd_name;
    }
    public function getfileattr($string){
        return $this->files["image"][$string];
    }
    public function getfileext(){
        return $this->ext;
    }
}
?>