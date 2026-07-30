<?php

class Buku{
    public $judul;
    public $penulis;
    public $terbit;
    
    public function __construct($judul, $penulis, $terbit){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->terbit = $terbit;
    }

    public function __tostring(){
        return "Buku berjudul " . $this->judul . " ditulis oleh " . $this->penulis . " diterbitkan tahun " . $this->terbit;
    }
}

$buku1 = new Buku("Istriku 3 Takdirku Gila", "Habibi", 2026);
$buku2 = new Buku("Kapal Karam", "Fuad", 1998);
echo $buku1 . "</br>" . $buku2;

?>