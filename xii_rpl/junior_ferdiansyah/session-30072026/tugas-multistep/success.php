<?php
session_start();

$pesan = $_SESSION['pesan_sukses'] ?? 'sukses!';
unset($_SESSION['pesan_sukses']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>sukses</title>
</head>
<body>
    <h1>berhasil!</h1>
    <p style="color: green;"><?php echo $pesan; ?></p>
    <a href="step1.php">back to step 1</a>
</body>
</html>
\