<?php
$harga = 10000;
$beli=3;
$pembelian = 1;

while ($pembelian <=10) {
    $total = $harga * $beli;
    echo "Pembelian ke $pembelian : Rp. $total <br>";
    $pembelian++;
}
$pembelian1 = $pembelian - 1;
$harga1beli = $harga * $beli;
$totalsemua = $harga1beli * $pembelian1;
echo "total pembelian adalah Rp. " . ($totalsemua);