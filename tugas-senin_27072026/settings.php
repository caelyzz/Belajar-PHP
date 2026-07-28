<?php
require_once 'helpers/cookie_helper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $theme = $_POST['theme'] ?? 'light';
    $lang = $_POST['lang'] ?? 'id';

    $allowed_themes = ['light', 'dark'];
    $allowed_langs = ['id', 'en'];

    if (in_array($theme, $allowed_themes)) {
        set_secure_cookie('theme', $theme, 30);
    }
    
    if (in_array($lang, $allowed_langs)) {
        set_secure_cookie('lang', $lang, 30);
    }

    header("Location: index.php");
    exit;
}

$current_theme = $_COOKIE['theme'] ?? 'light';
$current_lang = $_COOKIE['lang'] ?? 'id';
?>

<!DOCTYPE html>
<html>
<head>
    <title>pengaturan preferensi</title>
</head>
<body>
    <h2>pengaturan tampilan & bahasa</h2>
    <form method="POST" action="">
        <label>mode tampilan:</label><br>
        <select name="theme">
            <option value="light" <?= $current_theme === 'light' ? 'selected' : '' ?>>light mode</option>
            <option value="dark" <?= $current_theme === 'dark' ? 'selected' : '' ?>>dark mode</option>
        </select><br><br>

        <label>bahasa:</label><br>
        <select name="lang">
            <option value="id" <?= $current_lang === 'id' ? 'selected' : '' ?>>bahasa indonesia</option>
            <option value="en" <?= $current_lang === 'en' ? 'selected' : '' ?>>english</option>
        </select><br><br>

        <button type="submit">simpan pengaturan</button>
    </form>
    <br>
    <a href="index.php">kembali ke beranda</a>
</body>
</html>