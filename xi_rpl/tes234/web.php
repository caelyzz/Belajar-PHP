<?php

Route::get('/hitung/{a}/{b}', function ($a, $b) {
    $hasil = $a + $b;
    return view('belajar', ['n1' => $a, 'n2' => $b, 'jumlah' => $hasil]);
});