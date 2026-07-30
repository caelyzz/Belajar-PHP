<?php

$nama = "Andi";
$tampilkanPesan = function(){
    global $nama;
    echo "Halo, $nama! Selamat datang di PHP.";
};

echo $tampilkanPesan();

