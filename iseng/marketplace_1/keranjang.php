<?php

session_start();

$data = file_get_contents("data/produk.json");
$produk = json_decode($data, true);

if (!isset($_SESSION["cart"])){
    $_SESSION["cart"]=[];
}
$total = 0;

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Keranjang</title>
    </head>
    <body>
        <h1>Keranjang</h1>
        <a href="produk.php" kembali></a>
        <hr>
        <?php
        if (empty($_SESSION["cart"])){
            echo "<h3>Keranjang masih kosong</h3>";
        }
        else{
            foreach($_SESSION["cart"] as $id => $jumlah){
                foreach ($produk as $p){
                    if ($p["id"] == $id){
                        $subtotal= $p["harga"] * $jumlah;
                        $total += $subtotal;
        ?>
        <div>
            <img src="gambar/<?=$p["gambar"]?>"width="120">
            <h3><?=$p["nama"]?></h3>
            <p>Harga : <?=$p["harga"]?></p>
            <p>Jumlah : <?=$p["jumlah"]?></p>
            <p>Harga : Rp<?=number_format($subtotal)?></p>
        </div>
        <?php
                    }
                }
            }
        ?>
        <hr>
        <h2>Total : Rp<?=number_format($total)?></h2>
        <?php
        }
        ?>
    </body>
</html>