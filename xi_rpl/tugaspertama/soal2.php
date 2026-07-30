<?php

$siswa_1 = [
    "Nama" => "Bambang",
    "Nilai" => 87
];

$siswa_2 = [
    "Nama" => "Situy",
    "Nilai" => 76
];

$kkm = 80;

$murid = [$siswa_1, $siswa_2];

foreach ($murid as $siswa){
    $nilai = $siswa["Nilai"];

    if ($nilai >= $kkm){
        $status = "Lulus";
    }
    else{
        $status = "Tidak Lulus";
    }

    echo "Nama : ". $siswa["Nama"] . "<br>" . "Nilai : ". $siswa["Nilai"]."<br>"."Status : ". $status . "<br><br>";
}