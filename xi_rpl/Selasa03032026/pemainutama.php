<?php

require_once "pemain.php";

$pemain1 = new pemain('yes, belajar coding', 6);
$pemain2 = new pemain('aku main game', 3);

// $pemain1 -> $set_suara('yes, belajar coding');
// $pemain1 -> $set_berat(6);
echo 'Pemain 1 bersuara ' . $pemain1->get_suara() . 'selama ' . $pemain1->get_berat() . '<br>';

// $pemain2 ->$set_suara('aku main game');
// $pemain2 ->$set_berat('3 jam');
echo 'Pemain 2 bersuara ' . $pemain2->get_suara() . 'selama' . $pemain2->get_berat();

?>