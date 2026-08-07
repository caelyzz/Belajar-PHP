<?php

require_once "../config/database.php";
require_once "../helpers/auth.php";

requiredLogin();

if ($_FILES["avatar"]["error"] !== UPLOAD_ERR_OK) {
    die("Upload gagal.");
}


$maxSize = 2 * 1024 * 1024;

if ($_FILES["avatar"]["size"] > $maxSize) {
    die("Ukuran maksimal 2 MB.");
}


$finfo = finfo_open(FILEINFO_MIME_TYPE);

$mime = finfo_file(
    $finfo,
    $_FILES["avatar"]["tmp_name"]
);

$allowed = [

    "image/jpeg" => "jpg",
    "image/png" => "png",
    "image/webp" => "webp"

];

if (!isset($allowed[$mime])) {
    die("Format gambar tidak didukung.");
}


$fileName =
bin2hex(random_bytes(16))
. "."
. $allowed[$mime];

$destination =
"../assets/uploads/avatars/"
. $fileName;

move_uploaded_file(
    $_FILES["avatar"]["tmp_name"],
    $destination
);


$stmt = $pdo->prepare("
UPDATE users
SET avatar = ?
WHERE id = ?
");

$stmt->execute([
    $fileName,
    $_SESSION["user_id"]
]);

header("Location: ../profile.php");

exit;