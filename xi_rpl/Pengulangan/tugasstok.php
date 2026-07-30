<?php

$buah = ["apel", "mangga", "jeruk", "semangka", "kiwkiwi"];

echo "<b><h3>Bagian A (for) <br>";
for ($i = 0; $i < count($buah); $i++) {
    echo "$buah[$i]<br>";
}

echo "<b><h3><br>Bagian B (foreach) <br>";
foreach ($buah as $key => $value) {
    echo "$value<br>";
}