<?php

$data_mahasiswa1 = [
    "Nama" => "Mas Amba",
    "Umur" => 21,
    "Alamat" => "Jl. Merdeka No. 10",
    "Jurusan" => "Teknik Informatika"
    ];;

$data_mahasiswa2 = [
    "Nama" => "Nina Melati",
    "Umur" => 22,
    "Alamat" => "Jl. Sudirman No. 5",
    "Jurusan" => "Ilmu Ekonomi",
];
$data_mahasiswa3 = [
    "Nama" => "Rian Saputra",
    "Umur" => 20,
    "Alamat" => "Jl. Thamrin No. 8",
    "Jurusan" => "Sistem Informasi",
];

$data_mahasiswa =[$data_mahasiswa1, $data_mahasiswa2, $data_mahasiswa3];

echo "<pre>";
print_r(value: $data_mahasiswa);
echo "</pre";