<?php

$nama = "junior";
$jurusan = "rpl";

function namaPanggil(){
    $GLOBALS['nama'];
    $GLOBALS['jurusan'];
}

namaPanggil();
echo $jurusan;
echo $nama;