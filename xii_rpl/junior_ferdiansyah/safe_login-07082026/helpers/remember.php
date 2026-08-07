<?php

require_once __DIR__ . "../config/database.php";
require_once __DIR__ . "/auth.php";

function createRememberMe($userId){
    global $pdo;
    $selector = bin2hex(random_bytes(16));
    $validator = bin2hex(random_bytes(32));

    $validatorHash = password_hash($validator, PASSWORD_DEFAULT);

    $query = $pdo->prepare("
        UPDATE users
        set remember_selector = ?, remember_token = ?
        WHERE id = ?
    ");

    $query->execute([
        $selector,
        $validatorHash,
        $userId
    ]);

    $cookieValue = $selector . ":" . $validator;

    setcookie(
        "remember_me",
        $cookieValue,
        [
            "expires"=> time() + (30 * 24 * 60 * 60),
            "path"=> "/",
            "httponly"=> true,
            "samesite"=> "Lax"
        ]
    );
}

function autoLogin(){
    global $pdo;

    startSession();

    if(isset($_SESSION["user_id"])){
        return;
    }
    if(!isset($_COOKIE["remember_me"])){
        return;
    }
    $parts = explode(":", $_COOKIE["remember_me"]);

    if (count($parts) !== 2){
        return;
    }

    $selector = $parts[0];
    $validator = $parts[1];

    $query = $pdo->prepare("
        SELECT * FROM users WHERE remember_selector = ? LIMIT 1
    ");

    $query->execute([$selector]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user){
        return;
    }
    if (!password_verify($validator, $user["remember_token"])){
        return;
    }

    session_regenerate_id(true);

    $_SESSION["user_id"] = $user["id"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["email"] = $user["email"];
}