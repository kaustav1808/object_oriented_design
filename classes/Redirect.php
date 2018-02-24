<?php

class Redirect
{
    private $string;

    public function set_header($location, $val,$dir)
    {   if($dir){
        $this->string = "location:" . $location;
      }else{
        $this->string = "location:../" . $location;
    }
        if (count($val)) {
            $this->string = $this->string . "?";

            foreach ($val as $key => $value) {
                $this->string .= $key . "=" . $value . "&";
            }
        }
    }

    public function get_header()
    {
        header($this->string);
    }
}

?>