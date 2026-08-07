<?php

require_once "config/database.php";
require_once "helpers/auth.php";
require_once "helpers/remember.php";

autoLogin();
requiredLogin();

$query = $pdo->prepare("
    SELECT * FROM users WHERE id = ?
");

$query->execute([$_SESSION["user_id"]]);

$user = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
    </head>
    <body>
        <h2>Profile</h2>
        <?php
        if(!empty($user["avatar"])){
        ?>

        <img src="assets/uploads/avatars/<?= htmlspecialchars($user["avatar"])?>"
        width="150" >

        <?php } else { ?>
        <P>Not yet had photo profile</P>
        <?php } ?>

        <P>Username : <b><?= htmlspecialchars($user["username"])?></b></P>
        <p>Email : <?= htmlspecialchars($user["email"])?></b></p>
        <hr>

        <h3>Upload Avatar</h3>
        <form action="process/upload_avatar.php" method="post" enctype="multipart/form-data">
            <input type="file" name="avatar" accept=".jpg,.png,.jpeg,.webp,.gif" required>
            <br><br>
            <button type="submit">Upload</button>
        </form>

        <a href="home.php">Back</a>
    </body>
</html>