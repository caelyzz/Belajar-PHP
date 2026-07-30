<?php

$panjang = 30;
$lebar = 10;

function hitungluaspersegipanjang($panjang, $lebar){
    $total = $panjang*$lebar;
    return $total;
}

echo "Luas nya adalah " . hitungluaspersegipanjang($panjang, $lebar);