<?php
class Karakter {
    protected $darah = 100;
}

class Hero extends Karakter {
    public function lihatDarah() {
        return $this->darah;
    }
}

$hero = new Hero();
// echo $hero->darah;