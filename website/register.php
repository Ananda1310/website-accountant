<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan! Silakan pilih username lain.'); window.location.href='register.php';</script>";
    } else {
        // Masukkan data jika username belum ada
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        
        if ($stmt->execute()) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan. Coba lagi nanti.');</script>";
        }
    }
    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url("./background/Situs\ Web\ Hitam\ dan\ Putih\ Fotografis\ Layanan\ Akuntansi.jpg");
            backdrop-filter: blur(5px);
        }
        .container {
            width: 420px;
            padding: 20px;
            height: 450px;
            background: white;
            border-radius: 8px;
            box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 18px;
            cursor: pointer;
        }
        h2 {
            margin-bottom: 40px;
            margin-top: 20px;
            font-size: 2rem;
        }
        input {
            width: 100%;
            padding: 15px;
            margin: 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 30px;
            background: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: darkblue;
        }
        .close-btn {
            background: transparent;
            color: black;
            font-size: 1.5rem;
        }
        .close-btn:hover {
            color: red;
            background: transparent;
        }
        .register-link {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 15px;
        }
        .register-link a {
            text-decoration: none;
            color: blue;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">

        <h2>Register</h2>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <div class="register-link">
            <span>Sudah punya akun?</span>
            <a href="login.php">Login di sini</a>
        </div>
    </div>
</body>
</html>