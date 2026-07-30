<?php

// $a = 45;
// $b = 50;

// function menghitung(){
//     global $a, $b;
//     echo "Hasil dari penjumlahan $a + $b = " . ($a + $b);
// };

// echo menghitung();

function berteriak($panggilulang){
    call_user_func($panggilulang);
    echo "Nama saya Dedi!";
}

$panggil = function(){
    echo "Panggil saya! <br>";
};

berteriak($panggil);

