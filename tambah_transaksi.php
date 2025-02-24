<?php
include 'koneksi.php';

$deskripsi = $_POST['deskripsi'];
$jumlah = $_POST['jumlah'];

$stmt = $conn->prepare("INSERT INTO transaksi (deskripsi, jumlah) VALUES (?, ?)");
$stmt->bind_param("si", $deskripsi, $jumlah);
$stmt->execute();

echo json_encode(["message" => "Transaksi berhasil ditambahkan"]);
?>
