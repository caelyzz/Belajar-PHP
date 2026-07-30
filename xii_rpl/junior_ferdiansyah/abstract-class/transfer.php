<?php

class TransferBank extends Pembayaran {
    private $nomorRekening;
    
    public function __construct($total, $noRek){
        parent::__construct($total);
        $this->nomorRekening = $noRek;
    }

    public function prosesTransaksi(){
        echo "Mengirimkan instruksi transfer ke nomor rekening : " . $this->nomorRekening . "<br>";
        echo "Status : Menunggu transfer bank sebesar " . number_format($this->totalBayar, 0, ',', ',');
    }
}

?>