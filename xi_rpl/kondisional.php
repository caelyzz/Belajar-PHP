<?php


$suhu = 37;
if ($suhu >= 38) {
    echo "gabole masuk";
} elseif ($suhu == 37) {
    echo "jaga kesehatan";
} elseif ($suhu == 0) {
    echo "jangan masuk kedinginan";
} elseif ($suhu == 36) {
    echo "Hati-hati bisa masuk angin";
} else {
    echo "Masuk aja";
}