<?php

$nilaisaya = 90;
$kkm = 80;

if ($nilaisaya == $kkm) {
    echo "<h1>Selamat Anda Lulus";
} else if ($nilaisaya < $kkm) {
    echo "<h1><marquee>semangat belajar";
}
else {
    echo "<h1><marquee behavior=alternate>Selamat anda mendapatkan nilai terbaik";
}