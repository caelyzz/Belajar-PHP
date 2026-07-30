<?php

class pemain{
    public $suara;
    public $berat;

    public function __construct($suara = "", $berat = 0){
        $this->suara = $suara;
        $this->berat = $berat;
    }

    public function set_suara($suara){
        $this -> suara = $suara;
    }

    public function set_berat($berat){
        $this -> berat = $berat;
    }

    public function get_berat(){
        return $this -> berat;
    }

    public function get_suara (){
        return $this -> suara;
    }
}

?>