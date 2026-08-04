<?php

$nama = "junior";
$jurusan = "rpl";

function namaPanggil(){
    $GLOBALS['jurusan' . 'nama'];
}

namaPanggil();
echo $jurusan;
echo $nama;