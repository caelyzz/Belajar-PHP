<?php

class kodok{
    public $suara = "petok petok";
    public $warna = "hijau";
    public $gerak = "lompat";
}

class KodokLoncat extends kodok{
    public function __construct(){
        $this->suara = "kruk kruk";
        echo 'halo kodok loncat ...<br>' . $this->suara . '<br>';
    }
}

$kodok1 = new KodokLoncat();

echo 'kodok berbunyi ' .  $kodok1 ->suara . ' sambil ' . $kodok1->gerak . ' dan ' . $kodok1 ->warna;