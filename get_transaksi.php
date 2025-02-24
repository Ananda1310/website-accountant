<?php
include 'koneksi.php';

$result = $conn->query("SELECT * FROM transaksi ORDER BY id DESC");
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
