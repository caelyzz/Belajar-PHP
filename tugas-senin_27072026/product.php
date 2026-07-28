<?php
require_once 'helpers/cookie_helper.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    add_recent_product($id);
} else {
    echo "produk tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>detail produk <?= $id ?></title>
</head>
<body>
    <h2>anda sedang melihat produk dengan id: <?= $id ?></h2>
    <p>deskripsi produk...</p>
    
    <br>
    <a href="index.php">kembali ke beranda</a>
</body>
</html>