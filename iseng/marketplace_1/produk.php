<?php

session_start();

$data = file_get_contents("data/produk.json");
$produk = json_decode($data, true);

if (isset($_POST["tambah"])){
    $id = $_POST["id"];

    if (!isset($_SESSION["cart"][$id])){
        $_SESSION["cart"][$id] = 1;
    }
    else{
        $_SESSION["cart"][$id]++;
    }

    header("Location: produk.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>
            Marketplace Halal
        </title>
    </head>
    <body>
        <h1>Daftar Produk</h1>
        <a href="keranjang.php">Keranjang</a>
        <?php foreach ($produk as $p){ ?>
            <div style="border: 1px solid black; width: 220px; padding: 10px; margin-bottom: 15px;">
                <img src="gambar/<?=$p['gambar'];   ?>" width="150">
                <h3><?=$p['nama'];?></h3>
                <P>Harga : Rp<?= number_format($p['harga']); ?></P>
                <p>Stok : <?=$p['stok']; ?></p>
                <form method="POST">
                    <input
                    type="hidden"
                    name="id"
                    value="<?=$p["id"]?>"
                    >
                    <button
                    type="submit"
                    name="tambah"
                    >
                    Tambah ke keranjang</button>
                </form>
            </div>
        <?php } ?>
    </body>
</html>