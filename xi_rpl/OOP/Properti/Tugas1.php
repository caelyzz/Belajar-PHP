<?php

class laptop {
    public $merk = ["Asus", "Victus", "Lenovo"];
    public $warna = "Hitam";
}

$laptop_saya = new laptop;

echo "Laptop saya merk " . $laptop_saya->merk[1] . " warnanya adalah " . $laptop_saya->warna;