<?php
$judul = "cara membuat SLUG PHP";

$kalimat = explode(" ", $judul);

foreach ($kalimat as &$kata) {
    $kata = strtolower($kata);
}

$slug = implode("-", $kalimat);

echo "Judul Asli: " . $judul . "<br>";
echo "URL Slug: " . $slug;

echo "<br>";
print_r($kalimat)
?>