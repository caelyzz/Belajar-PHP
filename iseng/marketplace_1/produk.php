<?php

session_start();

$data = file_get_contents("produk.json");
$produk = json_decode($data, true);