<?php

class Kopi{
    public $name = "Cappucino";
    public $ice = "Normal Ice";
    public $sugar = "No Sugar";
    public $quantity = 1;
    public $price = 20000;
}

$kopi_1 = new Kopi();

$kopi_1->name = "Caffee Latte";
$kopi_1->ice = "Hot";
$kopi_1->sugar = "Less Sugar";
$kopi_1->quantity = 2;
$kopi_1->price = 25000;

$kopi_2 = new Kopi();

$kopi_2->name = "Americano";
$kopi_2->ice = "Normal Ice";
$kopi_2->sugar = "No Sugar";
$kopi_2->quantity = 3;
$kopi_2->price = 15000;

echo "List Kopi Mas Adam : <br><br>";

echo "Nama Kopi: " . $kopi_1->name . "<br>";
echo "Ice: " . $kopi_1->ice . "<br>";
echo "Sugar: " . $kopi_1->sugar . "<br>";
echo "Jumlah: " . $kopi_1->quantity . "<br>";
echo "Harga: Rp " . $kopi_1->price . "<br><br>";

echo "Nama Kopi: " . $kopi_2->name . "<br>";
echo "Ice: " . $kopi_2->ice . "<br>";
echo "Sugar: " . $kopi_2->sugar . "<br>";
echo "Jumlah: " . $kopi_2->quantity . "<br>";
echo "Harga: Rp " . $kopi_2->price . "<br><br>";


echo "<hr>";
var_dump($kopi_1);
echo "<br>";
var_dump($kopi_2);

?>