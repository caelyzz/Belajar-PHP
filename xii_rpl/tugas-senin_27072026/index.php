<?php
require_once 'helpers/cookie_helper.php';

$theme = 'light';
if (isset($_COOKIE['theme']) && in_array($_COOKIE['theme'], ['light', 'dark'])) {
    $theme = $_COOKIE['theme'];
}

$lang = 'id';
if (isset($_COOKIE['lang']) && in_array($_COOKIE['lang'], ['id', 'en'])) {
    $lang = $_COOKIE['lang'];
}

$recent_products = get_recent_products();

$bg_color = ($theme === 'dark') ? '#333' : '#fff';
$text_color = ($theme === 'dark') ? '#fff' : '#000';
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <title>toko online</title>
    <style>
        body {
            background-color: <?= $bg_color ?>;
            color: <?= $text_color ?>;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        a { color: #007bff; }
    </style>
</head>
<body>
    <h1><?= $lang === 'id' ? 'selamat datang di toko kami' : 'welcome to our store' ?></h1>
    
    <p>tema aktif: <b><?= $theme ?></b> | bahasa aktif: <b><?= $lang ?></b></p>

    <a href="settings.php">[ ubah pengaturan ]</a>
    <a href="clear-cookie.php">[ hapus riwayat & pengaturan ]</a>
    <hr>

    <h3>simulasi daftar produk:</h3>
    <ul>
        <li><a href="product.php?id=101">lihat sepatu (id: 101)</a></li>
        <li><a href="product.php?id=102">lihat baju (id: 102)</a></li>
        <li><a href="product.php?id=103">lihat topi (id: 103)</a></li>
        <li><a href="product.php?id=104">lihat tas (id: 104)</a></li>
        <li><a href="product.php?id=105">lihat jam tangan (id: 105)</a></li>
        <li><a href="product.php?id=106">lihat kacamata (id: 106)</a></li>
    </ul>

    <hr>
    <h3>terakhir dilihat (maks 5):</h3>
    <?php if (empty($recent_products)): ?>
        <p><?= $lang === 'id' ? 'belum ada produk yang dilihat.' : 'no items viewed yet.' ?></p>
    <?php else: ?>
        <ul>
            <?php foreach ($recent_products as $id): ?>
                <li>produk id: <?= $id ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</body>
</html>