<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah ada

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] == 'delete') {
        $id = $_POST['id'];
        $sql = "DELETE FROM transaksi WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => $conn->error]);
        }
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Akuntansi</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        let transaksi = [
            { id: 1, deskripsi: "Pendapatan Proyek", jumlah: 15000000 },
            { id: 2, deskripsi: "Biaya Operasional", jumlah: -5000000 }
        ];

        function tampilkanTransaksi() {
            let daftarTransaksi = document.getElementById("daftar-transaksi");
            daftarTransaksi.innerHTML = "";
            transaksi.forEach((item, index) => {
                let row = `<tr>
                    <td>${item.id}</td>
                    <td>${item.deskripsi}</td>
                    <td>Rp ${item.jumlah.toLocaleString()}</td>
                    <td>
                        <button onclick="editTransaksi(${index})">Edit</button>
                        <button onclick="hapusTransaksi(${index})">Hapus</button>
                    </td>
                </tr>`;
                daftarTransaksi.innerHTML += row;
            });
        }

        function tambahTransaksi() {
            let deskripsi = document.getElementById("deskripsi").value;
            let jumlah = parseInt(document.getElementById("jumlah").value);
            if (deskripsi && jumlah) {
                transaksi.push({ id: transaksi.length + 1, deskripsi, jumlah });
                tampilkanTransaksi();
            }
        }

        function editTransaksi(index) {
            let deskripsiBaru = prompt("Masukkan deskripsi baru", transaksi[index].deskripsi);
            let jumlahBaru = prompt("Masukkan jumlah baru", transaksi[index].jumlah);
            if (deskripsiBaru && jumlahBaru) {
                transaksi[index].deskripsi = deskripsiBaru;
                transaksi[index].jumlah = parseInt(jumlahBaru);
                tampilkanTransaksi();
            }
        }

        function hapusTransaksi(index) {
            transaksi.splice(index, 1);
            tampilkanTransaksi();
        }
        function tampilkanTransaksi() {
    fetch("get_transaksi.php")
        .then(response => response.json())
        .then(data => {
            let daftarTransaksi = document.getElementById("daftar-transaksi");
            daftarTransaksi.innerHTML = "";
            data.forEach(item => {
                let row = `<tr>
                    <td>${item.id}</td>
                    <td>${item.deskripsi}</td>
                    <td>Rp ${item.jumlah.toLocaleString()}</td>
                    <td>
                        <button onclick="editTransaksi(${item.id}, '${item.deskripsi}', ${item.jumlah})">Edit</button>
                        <button onclick="hapusTransaksi(${item.id})">Hapus</button>
                    </td>
                </tr>`;
                daftarTransaksi.innerHTML += row;
            });
        });
}
function hapusTransaksi(id) {
    if (confirm("Apakah Anda yakin ingin menghapus transaksi ini?")) {
        fetch('dashboard.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'action=delete&id=' + id
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Transaksi berhasil dihapus!");
                tampilkanTransaksi(); // Refresh data
            } else {
                alert("Gagal menghapus transaksi: " + data.error);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}


function tambahTransaksi() {
    let deskripsi = document.getElementById("deskripsi").value;
    let jumlah = document.getElementById("jumlah").value;

    fetch("tambah_transaksi.php", {
        method: "POST",
        body: new URLSearchParams({ deskripsi, jumlah }),
        headers: { "Content-Type": "application/x-www-form-urlencoded" }
    }).then(response => response.json()).then(() => {
        tampilkanTransaksi();
        document.getElementById("deskripsi").value = "";
        document.getElementById("jumlah").value = "";
    });
}
function formatRupiah(angka) {
    return angka.toLocaleString('id-ID');
}


function editTransaksi(id, deskripsi, jumlah) {
    let deskripsiBaru = prompt("Masukkan deskripsi baru", deskripsi);
    let jumlahBaru = prompt("Masukkan jumlah baru", jumlah);

    if (deskripsiBaru && jumlahBaru) {
        fetch("update_transaksi.php", {
            method: "POST",
            body: new URLSearchParams({ id, deskripsi: deskripsiBaru, jumlah: jumlahBaru }),
            headers: { "Content-Type": "application/x-www-form-urlencoded" }
        }).then(response => response.json()).then(() => tampilkanTransaksi());
    }
}
function hapusTransaksi(id) {
    if (confirm("Apakah Anda yakin ingin menghapus transaksi ini?")) {
        fetch("transaksi.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `action=delete&id=${id}`
        })
        .then(response => response.json())
        .then((data) => {
            if (data.success) {
                document.getElementById(`row-${id}`).remove(); // Hapus baris dari tabel langsung
            } else {
                alert("Gagal menghapus: " + data.message);
            }
            });
        }
}
let row = `<tr id="row-${item.id}">
    <td>${item.id}</td>
    <td>${item.deskripsi}</td>
    <td>Rp ${parseInt(item.jumlah).toLocaleString()}</td>
    <td>
        <button onclick="editTransaksi(${item.id}, '${item.deskripsi}', ${item.jumlah})">Edit</button>
        <button onclick="hapusTransaksi(${item.id})">Hapus</button>
    </td>
</tr>`;



document.addEventListener("DOMContentLoaded", tampilkanTransaksi);

    </script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #2C3E50;
            color: white;
            position: fixed;
            padding: 20px;
        }
        .sidebar h2 {
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px;
            cursor: pointer;
        }
        .sidebar ul li:hover {
            background: #34495E;
        }
        .main-content {
            margin-left: 270px;
            padding: 20px;
            flex-grow: 1;
        }
        .header {
            background: #2980B9;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .dashboard-cards {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #2980B9;
            color: white;
        }
    </style>
</head>
<body onload="tampilkanTransaksi()">
    <div class="sidebar">
        <h2>Akuntansi</h2>
        <ul>
            <li>Dashboard</li>
            <li>Laporan Keuangan</li>
            <li>Transaksi</li>
            <li>Analisis Keuangan</li>
            <li>Pengaturan</li>
        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Dashboard Akuntansi</h1>
        </div>
        <div class="dashboard-cards">
            <div class="card">
                <h3>Total Pendapatan</h3>
                <p>Rp 15.000.000</p>
            </div>
            <div class="card">
                <h3>Total Pengeluaran</h3>
                <p>Rp 5.000.000</p>
            </div>
            <div class="card">
                <h3>Saldo Kas</h3>
                <p>Rp 10.000.000</p>
            </div>
        </div>
        
        <h2>Kelola Transaksi</h2>
        <input type="text" id="deskripsi" placeholder="Deskripsi">
        <input type="number" id="jumlah" placeholder="Jumlah">
        <button onclick="tambahTransaksi()">Tambah</button>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="daftar-transaksi"></tbody>
        </table>
    </div>
</body>
</html>
