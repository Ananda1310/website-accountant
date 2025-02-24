<?php
$host = "localhost";
$user = "root"; // Ganti sesuai user MySQL
$pass = ""; // Ganti sesuai password MySQL
$db = "akuntansi_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
