<?php
include 'koneksi.php';

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM transaksi WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

echo json_encode(["message" => "Transaksi berhasil dihapus"]);
if ($action == 'delete') {
    $id = $_POST['id'];
    $sql = "DELETE FROM transaksi WHERE id=$id";
    $result = $conn->query($sql);
    echo json_encode(['success' => $result]);
}


?>
