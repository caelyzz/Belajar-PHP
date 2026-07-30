<?php

function bilangHalo(){
    echo "Halo, selamat datang di website kami!";
}

$no_absen = 10;
$nis = 33;
function cobain($no_absen, $nis){
    $total = $no_absen + $nis;
    echo "Total absen $total";
}

cobain($no_absen, $nis); echo "<br>";

function panggilnamagw(){
    $nama = "Ambarwati";
    echo "Halo, nama gw $nama";
}

panggilnamagw();