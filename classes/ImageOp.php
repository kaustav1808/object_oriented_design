<?php
class ImageOp extends FileOp{
    private $flag,$newname,$dir="";
   public function setimage($image,$flag){
    $this->setfilename($image);
    if($flag){
        $dir="../";
    }
   }
   public function imageresize(){
       $ext = $this->getfileext();

       $ext = strtolower( $ext );
       $uploaded_file = $this->getfileattr("tmp_name");
       if( $ext == "jpg" || $ext == "jpeg" )
           $source = imagecreatefromjpeg( $uploaded_file );
       else if( $ext == "png" )
           $source = imagecreatefrompng( $uploaded_file );
       else
           $source = imagecreatefromgif( $uploaded_file );

       // getimagesize() function simply get the size of an image
       $arr = getimagesize( $uploaded_file );
       $width=$arr[0];
       $height=$arr[1];

       $ratio = $height / $width;

       // new width 50(this is in pixel format)
       $nw = 200;
       $nh = ceil( $ratio * $nw );
       $dst = imagecreatetruecolor( $nw, $nh );


       imagecopyresampled( $dst, $source, 0, 0, 0,0, $nw, $nh, $width, $height );

       // rename our upload image file name, this to avoid conflict in previous upload images
       // to easily get our uploaded images name we added image size to the suffix
       $rnd_name = 'photos_'.uniqid(mt_rand(10, 15)).'_'.time().".".$ext;
       // move it to uploads dir with full quality
       if(imagejpeg( $dst, $this->dir.'profileimage/thumbnail/'.$rnd_name, 100 ))
       {
           $this->newname=$rnd_name;
           return true;
       }else{
           return false;
       }
   }

   public function imageupload(){

       $arr=array("jpg","jpeg","gif","png");
       if(!$this->fileextcheck($arr)){
           $this->flag="ext";
       }
       if(!$this->filesizevalidate(5242880)){
           $this->flag="size";
       }
       if(!$this->imageresize()){
           $this->flag="error";
       }
       if(isset($this->flag)){
           return $this->flag;
       }
       if(!$this->filemove($this->dir."profileimage/".$this->newname)){
         return true;
       }
   }
   public function geterrorstatus(){
       if(isset($this->flag)){
           return $this->flag;
       }
       else{
           return false;
       }
   }
   public function getimagename(){
       return $this->newname;
   }


}
?>