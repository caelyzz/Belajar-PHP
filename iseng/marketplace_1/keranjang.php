<?php

session_start();

$data = file_get_contents("data/produk.json");
$produk = json_decode($data, true);

if (!isset($_SESSION["cart"])){
    $_SESSION["cart"]=[];
}

if (isset($_POST["plus"])){
    $id = $_POST["id"];
    $_SESSION["cart"][$id]++;
    header("Location: keranjang.php");
    exit;
}

if (isset($_POST["minus"])){
    $id = $_POST["id"];
    $_SESSION["cart"][$id]--;
    if($_SESSION["cart"][$id] <= 0){
        unset($_SESSION["cart"][$id]);
    }

    header("Location: keranjang.php");
    exit;
}

if (isset($_POST["beli"])){
    $data = file_get_contents("data/produk.json");
    $produk = json_decode($data, true);

    foreach ($_SESSION["cart"] as $id => $jumlah){
        foreach ($produk as &$p){
            if ($p["id"] == $id){
                $p["stok"] -= $jumlah;
            }
        }
        unset($p); //menghapus referensi foreachny
    }

    file_put_contents(
        "data/produk.json",
        json_encode($produk, JSON_PRETTY_PRINT)
    );

    $_SESSION["cart"] = [];

    header("Location: produk.php");
    exit;
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
        <a href="produk.php"> <- kembali></a>
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
            <!-- <p>Jumlah : <?=$p["jumlah"]?></p> -->
            <form method="post">
                <input type="hidden" name="id" value="<?=$p["id"]?>">
                <button type="submit" name="minus">
                    -
                </button>

                <?= $jumlah ?>

                <button type="submit" name="plus">
                    +
                </button>
            </form>
            <p>Harga : Rp<?=number_format($subtotal)?></p>
        </div>
        <?php
                    }
                }
            }
        ?>
        <hr>
        <h2>Total : Rp<?=number_format($total)?></h2>
        <form method="post">
            <button type="submit" name="beli">
                Beli
            </button>
        </form>
        <?php
        }
        ?>
    </body>
</html>