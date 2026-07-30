<?php

$buah = "apel";

$jumlah_beli = 3;

switch ($buah) {
    case "apel":
        $harga = 5000;
        break;
    case "mangga":
        $harga = 7000;
        break;
    case "pisang":
        $harga = 4000;
        break;
    case "jeruk":
        $harga = 6000;
        break;
    default:
        $harga = 0;
        break;
}

$total_harga = $harga * $jumlah_beli;
$total_harga = number_format($total_harga);
echo "Total harga untuk membeli $jumlah_beli $buah adalah Rp $total_harga";