<?php

require_once 'helpers/auth.php';

requiredLogin();
startSession();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <body>
        <h2>Home</h2>

        <p>Welcome,
            <b><?= htmlspecialchars($_SESSION["username"]) ?></b>
        </p>
        <p>
            Email : <?= htmlspecialchars($_SESSION["email"])?>
        </p>
        <br>
        <a href="process/logout.php">Logout</a>
        <a href="profile.php">Profile</a>
    </body>
</html>