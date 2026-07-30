<?php

$siswa_1 = [
    "Nama" => "Joko",
    "Nilai" => 85,
    "Presentasi_Kehadiran" => 87,
    "Sertifikat" => false
];

$siswa_2 = [
    "Nama" => "Zakie",
    "Nilai" => 92,
    "Presentasi_Kehadiran" => 100,
    "Sertifikat" => true
];

$siswa_3 = [
    "Nama" => "Udin",
    "Nilai" => 78,
    "Presentasi_Kehadiran" => 80,
    "Sertifikat" => true
];

$siswa_4 = [
    "Nama" => "Ani",
    "Nilai" => 95,
    "Presentasi_Kehadiran" => 100,
    "Sertifikat" => false
];

$siswa_5 = [
    "Nama" => "Rina",
    "Nilai" => 88,
    "Presentasi_Kehadiran" => 93,
    "Sertifikat" => false
];

$daftar_siswa = [
    $siswa_1,
    $siswa_2,
    $siswa_3,
    $siswa_4,
    $siswa_5
];

$nama = $daftar_siswa[1]["Nama"];
$nilai = $daftar_siswa[1]["Nilai"];
$presentase_kehadiran = $daftar_siswa[1]["Presentasi_Kehadiran"];
$kkm = 85;

foreach ($daftar_siswa as $siswa) {
    echo "Nama: " . $siswa["Nama"] . "<br>";
    echo "Nilai: " . $siswa["Nilai"] . "<br>";
    echo "Presentasi Kehadiran: " . $siswa["Presentasi_Kehadiran"] . "%<br>";
    echo "Sertifikat: " . ($siswa["Sertifikat"] ? "punya" : "ga punya") . "<br>";
    if ($siswa["Nilai"] > $kkm && $siswa["Presentasi_Kehadiran"] == 100 || $siswa["Sertifikat"] == true) {
        echo "Status: Dapat beasiswa<br><br>";
    } else {
        echo "Status: Tidak dapat beasiswa<br><br>";
    }
}