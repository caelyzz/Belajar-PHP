<?php

session_start();

if (!isset($_SESSION['tiket'])) {
    header("Location: step1.php");
    exit;
}

if (isset($_POST['konfirmasi'])) {

    $_SESSION['flash'] = "Pendaftaran berhasil";

    session_unset();

    $_SESSION['flash'] = "Pendaftaran berhasil";

    header("Location: success.php");
    exit;
}

?>

<h2>ringkasan</h2>
<?= $_SESSION['nama']; ?>

email :
<?= $_SESSION['email']; ?>
<br><br>
telepon :
<?= $_SESSION['telepon']; ?>
<br><br>
tiket :
<?= $_SESSION['tiket']; ?>
<br><br>
<ul>

<?php
foreach ($_SESSION['workshop'] as $w) {
    echo "<li>$w</li>";
}

?>

</ul>
<form method="post">
<input type="submit" name="konfirmasi" value="konfirmasi & simpan">
</form>
<form action="reset.php">
<input type="submit" value="batal / reset">
</form>