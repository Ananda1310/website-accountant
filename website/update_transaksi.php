<?php
include 'koneksi.php';

$id = $_POST['id'];
$deskripsi = $_POST['deskripsi'];
$jumlah = $_POST['jumlah'];

$stmt = $conn->prepare("UPDATE transaksi SET deskripsi=?, jumlah=? WHERE id=?");
$stmt->bind_param("sii", $deskripsi, $jumlah, $id);
$stmt->execute();

echo json_encode(["message" => "Transaksi berhasil diperbarui"]);
?>
