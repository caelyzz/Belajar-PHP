<?php

$produk1 = [
    "Nama Barang" => "Sabu sabu<br>",
    "Harga" => 200000,
    "Merk" => "Kapal Api",
    "Garansi" => "1 Tahun"
];

print_r($produk1);

$produk2 = [
    "Nama Barang" => "Indomie",
    "Harga" => 3000,
    "Merk" => "Indomie Goreng",
    "Garansi" => "YTTA"
];
print_r($produk2);

$produk3 = [
    "Nama Barang" => "Beras",
    "Harga" => 120000,
    "Merk" => "Ramos",
    "Garansi" => "Ada"
];

print_r($produk3);

$produk4 = [
    "Nama Barang" => "Minyak Goreng",
    "Harga" => 150000,
    "Merk" => "Tropical",
    "Garansi" => "basi"
];
print_r($produk4);

$data = array_merge($produk1, $produk2, $produk3, $produk4);
foreach ($data as $key => $value) {
    echo "Key: " . $key . "<br>";
    echo "Value: " . $value . "<br><br>";
}