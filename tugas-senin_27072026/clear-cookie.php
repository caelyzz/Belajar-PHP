<?php
setcookie('theme', '', time() - 3600, '/');
setcookie('lang', '', time() - 3600, '/');
setcookie('recent_products', '', time() - 3600, '/');

header("Location: index.php");
exit;
?>