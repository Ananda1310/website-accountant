<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Jasa Akuntansi</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            background: url(./preorder/foto1.jpg);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 25px;
            cursor: pointer;
            color: white;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold;
            text-decoration: none;
        }

        .close-btn:hover {
            color: red;
        }

        .container {
            display: flex;
            gap: 20px;
            text-align: center;
            opacity: 0;
            transform: scale(0.8);
            animation: showTables 0.8s ease-in-out forwards;
        }

        @keyframes showTables {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .table-box {
            width: 280px;
            height: 480px;
            background: whitesmoke;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            opacity: 0;
            transform: translateY(20px);
            animation: slideUp 0.8s ease-in-out forwards;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            background: #007BFF;
            color: white;
            margin: -20px -20px 20px -20px;
            padding: 15px;
        }

        .price {
            font-size: 22px;
            font-weight: bold;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            flex-grow: 1; 
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        .btn {
            background: #007BFF;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <a href="index.php" class="close-btn">X</a> <!-- Tombol Close di kanan atas -->

    <div class="container">
        <!-- Paket Free -->
        <div class="table-box" style="animation-delay: 0.2s;">
            <h2>Free</h2>
            <p class="price">Gratis</p>
            <table>
                <tr><td>✔ Laporan Keuangan Bulanan</td></tr>
                <tr><td>✔ Konsultasi via Email</td></tr>
                <tr><td>✖ Tidak Ada Laporan Pajak</td></tr>
                <tr><td>✖ Tidak Ada Support Prioritas</td></tr>
            </table>
            <a href="dashboard.php" class="btn">Pilih Free</a>
        </div>

        <!-- Paket Premium -->
        <div class="table-box" style="animation-delay: 0.4s;">
            <h2>Premium</h2>
            <p class="price">Rp 499.000/bulan</p>
            <table>
                <tr><td>✔ Laporan Keuangan Bulanan & Pajak</td></tr>
                <tr><td>✔ Konsultasi via Email & WhatsApp</td></tr>
                <tr><td>✔ Analisis Keuangan Dasar</td></tr>
                <tr><td>✖ Tidak Ada Laporan Audit</td></tr>
            </table>
            <a href="payment-premium.php" class="btn">Pilih Premium</a>
        </div>

        <!-- Paket Pro -->
        <div class="table-box" style="animation-delay: 0.6s;">
            <h2>Profesional</h2>
            <p class="price">Rp 999.000/bulan</p>
            <table>
                <tr><td>✔ Laporan Keuangan & Pajak Lengkap</td></tr>
                <tr><td>✔ Konsultasi Prioritas 24/7</td></tr>
                <tr><td>✔ Analisis Keuangan & Rekomendasi</td></tr>
                <tr><td>✔ Laporan Audit Lengkap</td></tr>
            </table>
            <a href="payment-pro.php" class="btn">Pilih Pro</a>
        </div>
    </div>
</body>
</html>
