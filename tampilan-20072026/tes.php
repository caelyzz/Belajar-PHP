<?php

$judul = "Cara membua slug";

$kalimat = explode(" ", $judul);

foreach ($kalimat as &$kata){
    $kata = strtolower($kata);
}

$slug = implode("-", $kalimat);

echo "doksli : " . $judul . "<br>";
echo "slug : " . $slug . "<br>";
print_r($kalimat);