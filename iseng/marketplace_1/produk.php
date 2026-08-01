<?php

session_start();

$data = file_get_contents("produk.json");
$produk = json_decode($data, true);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Marketplace Halal
        </title>
    </head>
    <body>
        <h1>Daftar Produk</h1>
        <?php foreach ($produk as $p){ ?>
            <div>
                <img src="gambar/<?=$p['gambar'];   ?>" width="150">
                <h3><?=$p['nama'];?></h3>
                <P>Harga : Rp<?= number_format($p['harga']); ?></P>
                <p>Stok : <?=$p['stok']; ?></p>
            </div>
            <hr>
        <?php } ?>
    </body>
</html>