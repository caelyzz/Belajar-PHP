<?php

session_start();

if (!isset($_SESSION['nama'])) {
    header("Location: step1.php");
    exit;
}

if (isset($_POST['submit'])) {

    $_SESSION['tiket'] = $_POST['tiket'];

    if (isset($_POST['workshop'])) {
        $_SESSION['workshop'] = $_POST['workshop'];
    } else {
        $_SESSION['workshop'] = [];
    }

    header("Location: step3.php");
    exit;
}

?>

<h2>step 2</h2>

<form method="post">

tipe tiket <br>
<input type="radio" name="tiket" value="Regular" required> regular
<input type="radio" name="tiket" value="VIP"> vip
<br><br>
workshop
<br>
<input type="checkbox" name="workshop[]" value="PHP security">
PHP security
<br>

<input type="checkbox" name="workshop[]" value="laravel masterclass">
laravel masterclass
<br>

<input type="checkbox" name="workshop[]" value="database optimization">
database optimization
<br><br>

<input type="submit" name="submit" value="lanjut">

</form>