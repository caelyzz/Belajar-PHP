<?php

$text = "ini adalah input user";

echo " sebelum " . $text . " disini  <br>";
echo " sesudah " . trim($text) . " disini  <br>";

$text2 = "<script> alert('halo mas')</script>";
$text3 = "<b> Halo </b> semuanya";
echo strip_tags($text3, 'b');

?>