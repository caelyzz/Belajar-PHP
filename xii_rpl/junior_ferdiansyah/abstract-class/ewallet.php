<?php

class EWallet extends Pembayaran {
    private $nomorHp;
    
    public function __construct($total, $noHp){
        parent::__construct($total);
        $this->nomorRekening = $noHp;
    }

    public function prosesTransaksi(){
        echo "Mengirimkan instruksi transfer dengan nomor Hp : " . $this->nomorRekening . "<br>";
        echo "Status : Saldo e-wallet berhasil dipotong sebesar " . number_format($this->totalBayar, 0, ',', ',');
    }
}

?>