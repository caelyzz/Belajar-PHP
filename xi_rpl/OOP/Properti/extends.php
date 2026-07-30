<?php

class Hewan {
    public $nama;

    public function suara() {
        echo "hewan i bersuara";
    }
}

class Kucing extends Hewan {
    public function suara() {
        echo " maow maow";
    }
}

$kucing = new Kucing();
$kucing->nama = "faris";

echo $kucing->nama; 
$kucing->suara();   

class Robot{
    public $suara;
    public $berat;

    public function __construct(){
    echo 'halo robot ...<br>';
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