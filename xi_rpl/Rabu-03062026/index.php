<?php 

class Mahasiswa
{
    public function isiNama($nama)
    {
        echo "Nama: $nama <br>";
        return $this;
    }

    public function isiKelas($kelas)
    {
        echo "Kelas: $kelas <br>";
        return $this;
    }

    public function isiJurusan($jurusan)
    {
        echo "Jurusan: $jurusan <br>";
        return $this;
    }
}

$mhs = new Mahasiswa();
    $mhs-> isiNama("Reyhan")
        -> isiKelas("XI AK 1")
        -> isiJurusan("Akutansi")


?>
