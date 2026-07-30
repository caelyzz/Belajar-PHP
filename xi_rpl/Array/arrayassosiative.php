<?php

$profilUtama = array (
    "nama" => "Marwan",
    "umur" => "45",
    "kerja" => "rt"
);

$detailTambahan = array (
    "hobi" => "mancing",
    "laptop" => "gaming",
);

$profilLengkap = array_merge($profilUtama, $detailTambahan);



echo "<br>";
print_r($profilLengkap);
echo "<br>";

$labelaja = array_keys($profilLengkap);

echo "<br>";
print_r($labelaja);
echo "<br>";

$nilaiaja = array_values($profilLengkap);
echo "<br>";
print_r($nilaiaja);
echo "<br>";

