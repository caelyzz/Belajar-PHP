<?php

class Karakter {
    private $id_rahasia = "12345";

    public function getId() {
        return $this->id_rahasia;
    }
}

class Hero extends Karakter {
    public function cobaAkses() {
        // return $this->id_rahasia;
    }
}