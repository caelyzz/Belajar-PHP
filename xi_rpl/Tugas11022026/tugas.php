<?php
$hargaBarang = 15000;
$persenPajak = 0.1;

function hitungTotalBelanja(){
    $hb = $GLOBALS['hargaBarang'];
    $pp = $GLOBALS['persenPajak'];
    $hargaPajak = $hb * $pp;
    return $hb + $hargaPajak;
}

echo hitungTotalBelanja();