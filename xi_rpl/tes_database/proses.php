<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $namaMahasiswa = $_POST['namaMahasiswa'];
    $alamat        = $_POST['alamat'];
    $noTelp        = $_POST['noTelp'];
    $email         = $_POST['email'];

    $sql = "INSERT INTO mahasiswa (nama_mahasiswa, alamat, no_telp, email)
            VALUES ('$namaMahasiswa', '$alamat', '$noTelp', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil disimpan!<br><br>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    echo "<h3>Hasil Input Data:</h3>";
    echo "Nama: $namaMahasiswa <br>";
    echo "Alamat: $alamat <br>";
    echo "No Telp: $noTelp <br>";
    echo "Email: $email <br>";
}
?>