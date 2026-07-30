<?php

class Produk
{
    public static $total_item = 100;

    public static function tampilkanHeader(): void
    {
        echo "Selamat Datang di Toko Kelontong XI RPL";
    }

    public static function cekStok(): int
    {
        return self::$total_item;
    }
}

Produk::tampilkanHeader();
echo "\n";
echo "Sisa stok saat ini adalah: " . Produk::cekStok() . " item.";

