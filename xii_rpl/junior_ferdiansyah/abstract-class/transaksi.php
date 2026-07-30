<?php

require_once 'pembayaran.php';
require_once 'transfer.php';
require_once 'ewallet.php';

echo "<h3>Transaksi 1</h3>";
$transaksiBank = new TransferBank(15000000, "123-456-7890");
$transaksiBank->tampilkanNota();
$transaksiBank->prosesTransaksi();

echo "<hr><h3>Transaksi 2 : </h3>";
$transaksiOvo = new EWallet(50000, "08871902047");
$transaksiOvo->tampilkanNota();
$transaksiOvo->prosesTransaksi();

?>