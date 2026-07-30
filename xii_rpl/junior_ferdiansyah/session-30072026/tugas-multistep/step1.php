<?php

session_start();

if (isset($_POST['submit'])) {

    if (
        empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['telepon'])
    ) {
        $error = "semua field wajib diisi";
    } else {

        $_SESSION['nama'] = $_POST['nama'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['telepon'] = $_POST['telepon'];

        header("Location: step2.php");
    }
}

?>

<h2>step 1</h2>

<?php
if (isset($error)) {
    echo $error;
}
?>

<form method="post">
    nama
    <input type="text" name="nama"><br><br>
    email
    <input type="text" name="email"><br><br>
    telepon
    <input type="text" name="telepon"><br><br>
    <input type="submit" name="submit" value="lanjut">
</form>