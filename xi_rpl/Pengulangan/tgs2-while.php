<?php

$src_usn = ["user1", "user2", "user3", "admin1", "admin"];

$benar_usn = "admin";
$benar_pw  = "12345";

$percobaan = 1;
$max = 5;

$pw_coba = "";

while ($percobaan <= $max) {

    $usn_coba = $src_usn[$percobaan - 1];

    $pw_coba .= $percobaan;

    echo "percobaan ke-$percobaan<br>";
    echo "username: $usn_coba<br>";
    echo "password: $pw_coba<br>";

    if ($usn_coba == $benar_usn && $pw_coba == $benar_pw) {
        echo "<b>login berhasil<br>";
        break; 
    } else {
        echo "login gagal<br><br>";
    }

    $percobaan++;
}

?>
