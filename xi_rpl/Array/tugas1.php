<?php

$murid_andi = [
    "Nama" => "Andi",
    "Nilai" => 80
];

$murid_budi = [
    "Nama" => "Budi",
    "Nilai" => 90
];

$murid_sarah = [
    "Nama" => "Sarah",
    "Nilai" => 75
];


$kkm = 80;

$murid = [$murid_andi, $murid_budi, $murid_sarah];

//foreach ($murid as $siswa) {
//    $status = ($siswa["Nilai"] >= $kkm) ? "Lulus" : "Tidak Lulus";
//    echo "Nama: " . $siswa["Nama"] . "Nilai: " . $siswa["Nilai"] . " Status: " . $status . "<br>";
//}
foreach ($murid as $siswa) {
    $nilaiv = $siswa["Nilai"];
    if ($nilaiv >= $kkm) {
        $status = "Lulus";
    } else {
        $status = "Tidak Lulus";
    }
    echo "Nama: " . $siswa["Nama"] . " Nilai: " . $siswa["Nilai"] . " Status: " . $status . "<br>";
}

echo "<pre>";
print_r($murid);
echo "</pre>";