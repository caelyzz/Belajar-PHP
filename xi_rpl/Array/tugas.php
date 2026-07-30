<?php

$boot_ijul = [
    "Nama Barang" => "Jus Ijul",
    "Harga" => 5000,
    "Penjual" => "Ijul",
    "Varian" => "Mangga"
];

$boot_pakde = [
    "Nama Barang" => "Es Pakde",
    "Harga" => 5000,
    "Penjual" => "Pakde",
    "Varian" => "Teh"
];

$boot_roti = [
    "Nama Barang" => " Roti Bakar",
    "Harga" => 10000,
    "Penjual" => "Ade",
    "Varian" => "Coklat"
];

function hitungHarga ($harga_barang, $jumlah_beli) {
    return $harga_barang * $jumlah_beli;
}


$harga_ijul = hitungHarga($boot_ijul["Harga"], 3);
$harga_pakde = hitungHarga($boot_pakde["Harga"], 2);
$harga_roti = hitungHarga($boot_roti["Harga"], 1);

$diskon = 0.1;
$total_semua = $harga_ijul + $harga_pakde + $harga_roti;
$total = $total_semua * $diskon;

$barang_dibeli = [
    $boot_ijul,
    $boot_pakde,
    $boot_roti
];

echo "<h1>Total Belanja</h1>";
echo $barang_dibeli[0]["Nama Barang"] . " sebanyak 3 gelas harganya Rp. " . $harga_ijul . "<br>";
echo $barang_dibeli[1]["Nama Barang"] . " sebanyak 2 gelas harganya Rp. " . $harga_pakde . "<br>";
echo $barang_dibeli[2]["Nama Barang"] . " sebanyak 1 porsi harganya Rp. " . $harga_roti . "<br><br>";
echo "Diskon = " . ($diskon * 100) . "% <br>";
echo "Total harga semuanya jadi : Rp. " . $total;