<?php

require_once "hewan.php";

$robotHewan = new RobotHewan();
$robotHewan->set_suara("meow");

echo $robotHewan->get_suara();

?>