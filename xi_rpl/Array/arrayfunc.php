<?php

function asek(){
    echo "asek mang<br>";
}

//====================================
function print_text($text){
    $text = "gedung" . $text;
    echo "========> " ;
    echo $text;
    echo "========> ";
}

function jarak(){
    echo "<br>";
}

print_text ("koding");
jarak();
print_text("php");
jarak();
?>
