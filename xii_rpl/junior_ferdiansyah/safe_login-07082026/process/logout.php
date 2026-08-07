<?php

require_once "../helpers/auth.php";
require_once "../helpers/auth.php";

startSession();

if(isset($_SESSION["user_id"])){
    $query = $pdo->prepare("
        UPDATE users
        SET remember_selector = NULL, remember_token = NULL
        WHERE id = ?
    ");

    $query->execute($_SESSION["user_id"]);
}


$_SESSION = [];

session_destroy();

setcookie(
    "remember_me",
    "",
    [
        "expires"=>time() - 3600,
        "path" => "/"
    ]
);

header("Location: ../login.php");
exit;