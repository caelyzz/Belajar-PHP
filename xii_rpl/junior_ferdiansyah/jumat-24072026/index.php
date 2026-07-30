<?php
$user = 'hilman';
$password = '123';

if (isset($_POST['submit'])) {
    if ($_POST['nama'] == $user && $_POST['password'] == $password) {
        setcookie('nama_user', $_POST['nama'], time() + 120);
        header('Location: profile.php?nama=' . $user);
    } else {
        echo 'login gagal!';
    }
}
?>

<form method="post">
    <input type="text" name="nama">
    <input type="password" name="password">
    <input type="submit" name="submit">
</form>