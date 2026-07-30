<?php

$data_mahasiswa1= [
    "Nama" => "Andi",
    "Umur" => 20,
    "Alamat" => "Jakarta",
    "Jurusan" => "Informatika"
];

$data = array(
    array ("Programmer Web", "Andi", 20),
    array ("Designer", "Budi", 22),
    array ("Manager IT", "Citra", 25)
);

print_r ($data);

$profilUtama = [
    "nama" => "Marwan",
    "umur" => 45,
    "kerja" => "rt"
];
$detailTambahan = [
    "hobi" => "mancing",
    "laptop" => "gaming",
];

$profilLengkap = array_merge($profilUtama, $detailTambahan);

echo "<pre>";
print_r($profilLengkap);
echo "</pre>";