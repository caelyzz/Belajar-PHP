<?php 

class Siswa
{
    private $nama;
    private $kelas;
    private $jurusan;
    private $nilai;

    public function setNama($nama){
        $this->nama = $nama;
        return $this;
    }

    public function setKelas($kelas){
        $this->kelas = $kelas;
        return $this;
    }

    public function setJurusan($jurusan){
        $this->jurusan = $jurusan;
        return $this;
    }

    public function setNilai($nilai){
        $this->nilai = $nilai;
        return $this;
    }

    public function tampilkan(){
        echo "Nama : {$this->nama} <br>";
        echo "Kelas : {$this->nama} <br>";
        echo "Jurusan : {$this->nama} <br>";
        echo "Nilai : {$this->nama} <br>";
    }

}

$data_siswa = new Siswa()
            ->setNama("Amboyy")
            ->setKelas("XI RPL")
            ->setJurusan("Rekayasa Perangkat Lunak")
            ->setNilai("87")


?>