<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "indo"
);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>