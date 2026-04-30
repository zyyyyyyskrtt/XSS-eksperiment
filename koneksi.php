<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_papan";

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi (opsional, tapi bagus buat jaga-jaga)
if (!$conn) {
    die("Koneksi gagal wkwk: " . mysqli_connect_error());
}
?>
