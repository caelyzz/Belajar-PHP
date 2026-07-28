<?php
$page = $_GET['page'] ?? 'home';

if ($page == 'home') {
    include 'pages/home.php';
} elseif ($page == 'about') {
    include 'pages/about.php';
} elseif ($page == 'contact') {
    include 'pages/contact.php';
} else {
    include 'pages/home.php';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website</title>
</head>
<body>

<header>
    <h1>website</h1>
</header>

<nav>
    <a href="?page=home">Home</a>
    <a href="?page=about">About</a>
    <a href="?page=contact">Contact</a>
</nav>

<?php include $pages[$page]; ?>

<footer>
    <p>tes</p>
</footer>

</body>
</html>