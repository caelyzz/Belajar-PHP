<?php

$hargaProduk = 50000;
$biayaKirim = 10000;
$pajak = 2000;


//Metode global
function hitungTotal(){
    global $hargaProduk, $biayaKirim, $pajak;
    $total = $hargaProduk + $biayaKirim + $pajak;
    return $total;
}

echo "Total belanja versi global Anda adalah: " . hitungTotal();

//metode globals
function hitungTotalGlobal(){
    $total = $GLOBALS['hargaProduk'] + $GLOBALS['biayaKirim'] + $GLOBALS['pajak'];
    return $total;
}

echo "<br>Total belanja versi globals Anda adalah: " . hitungTotalGlobal();