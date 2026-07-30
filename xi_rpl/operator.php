<?php
$a = 24;
$b = 12;

$tambah = $a + $b;
$kurang = $a - $b;
$kali = $a * $b;
$bagi = $a / $b;
$sisa = $a % $b;
echo "Hasil dari penjumlahan $a + $b = $tambah";
echo "<br>";
echo "Hasil dari pengurangan $a - $b = $kurang";
echo "<br>";
echo "Hasil dari perkalian $a * $b = $kali";
echo "<br>";
echo "Hasil dari pembagian $a / $b = $bagi";
echo "<br>";
echo "Hasil dari sisa pembagian $a % $b = $sisa";

$total = $tambah + $kurang + $kali + $bagi + $sisa;
echo "<br>";
echo "Hasil dari semuanya adalah $total ";

echo "<br>";
$teks = 'Halo nama saya';
$nama = ' Zakiyah';
$gabung = $teks . $nama;
echo $gabung;