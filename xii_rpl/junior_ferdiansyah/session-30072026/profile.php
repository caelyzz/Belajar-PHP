<?php
session_start();

echo 'selamat datang ' . $_SESSION['nama_user'];
?>

<form action="logout.php" method="post">
    <input type="submit" value="logout">
</form>
