<?php
//public function jumlahkan ($a, $b)
{
    $hasil = $a + $b;
    return view('belajar_hitung',[
        'n1' => $a,
        'n2' => $b,
        'jumlah' => $hasil
    ]);
}