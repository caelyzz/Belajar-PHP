<!DOCTYPE html>
<html>
<head>
    <title>Tugas PHP</title>
</head>
<body>

<form action="" method="post">
    nama: <input type="text" name="nama"><br>
    email: <input type="text" name="email"><br>
    komentar: <textarea name="komentar"></textarea><br>
    <input type="submit" value="kirim">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n = $_POST["nama"];
    $e = $_POST["email"];
    $k = $_POST["komentar"];

    $panjang_awal_n = strlen($n);
    $panjang_awal_e = strlen($e);
    $panjang_awal_k = strlen($k);

    $n_bersih = strip_tags($n);
    $e_bersih = strip_tags($e);
    $k_bersih = strip_tags($k);

    $n_final = trim($n_bersih);
    $e_final = trim($e_bersih);
    $k_final = trim($k_bersih);

    $waktu = date("d-m-y");

    echo "<br>tanggal: $waktu";
    echo "<br>nama: $n_final";
    echo "<br>email: $e_final";
    echo "<br>komen: $k_final";

    echo "<br><br>";

    echo "perbandingan karakter nama: $panjang_awal_n jadi " . strlen($n_final) . "<br>";
    echo "perbandingan karakter email: $panjang_awal_e jadi " . strlen($e_final) . "<br>";
    echo "perbandingan karakter komentar: $panjang_awal_k jadi " . strlen($k_final) . "<br>";
}
?>

</body>
</html>