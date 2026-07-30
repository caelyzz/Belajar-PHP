<?php

require_once 'hewan.php';

class RobotHewan extends Robot {
    public $suara;

    public function set_suara($suara) {
        $this->suara = $suara;
    }

    public function get_suara() {
        return $this->suara;
    }
}