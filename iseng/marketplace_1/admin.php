<?php
$data = file_get_contents("data/produk.json");
$produk = json_decode($data, true);

if (isset($_POST["tambah"])){
    $produkBaru = [
        "id" => end($produk)["id"] + 1,
        "nama" => $_POST["nama"],
        "harga" => $_POST["harga"],
        "stok" => $_POST["stok"],
        "gambar" => $_POST["gambar"]
    ];
}