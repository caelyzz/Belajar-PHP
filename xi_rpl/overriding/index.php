<?php
class Karakter {
    public function serang() {
        echo "menyerang biasa";
    }
}

class Hero extends Karakter {
    public function serang() {
        echo "menyerang dengan skill!";
    }
}