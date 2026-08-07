<?php

require_once "../config/database.php";

$username = trim($_POST["username"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);
$confirmPassword = trim($_POST["confirm_password"]);

if (
    empty($username) || empty($email) ||
    empty($password) || empty($confirmPassword)
){
    die("All field must be filled");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die("Email format not valid");
}

if (strlen($password)<8){
    die("Minimal password character is 8");
}

if ($password !== $confirmPassword) {
    die("Password confirmation does not match");
}

$query = $pdo->prepare(
    "SELECT id FROM users WHERE email = ?"
);

$query->execute([$email]);

if ($query->fetch()){
    die("Email has been registered");
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$query = $pdo->prepare("
    INSERT INTO users(
        username,
        email,
        password
    )
    VALUES(
        ?, ?, ?
    )
");

if ($query->execute([
    $username,
    $email,
    $passwordHash
])) {
    echo "Register berhasil";
} else {
    print_r($query->errorInfo());
}

header("Location: ../login.php");
exit;