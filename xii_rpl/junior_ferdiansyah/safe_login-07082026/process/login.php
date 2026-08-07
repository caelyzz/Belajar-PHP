<?php

require_once "../config/database.php";
require_once "../helpers/auth.php";
require_once "../helpers/remember.php";

$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

if (empty($email) || empty($password)){
    die("Email and password must be filled");
}

$query = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");

$query->execute([$email]);

$user = $query->fetch(PDO::FETCH_ASSOC);

if (!$user){
    die("Email or password wrong");
}

if (!password_verify($password, $user["password"])){
    die("Email or password wrong");
}

startSession();

session_regenerate_id(true);

$_SESSION["user_id"] = $user["id"];
$_SESSION["username"] = $user["username"];
$_SESSION["email"] = $user["email"];

if(isset($_POST["remember"])){
    createRememberMe($user["id"]);
}
header("Location: ../home.php");
exit;