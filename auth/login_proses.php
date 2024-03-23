<?php
session_start();
require_once "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Mencegah SQL Injection
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Mengecek keberadaan username dan password di database
    $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        // Login berhasil
        $row = $result->fetch_assoc();
        if ($row['level'] == 'admin') {
            $_SESSION['login_admin'] = $username;
            header("location: ../admin/home.php");
            exit();
        } elseif ($row['level'] == 'petugas') {
            $_SESSION['login_petugas'] = $username;
            header("location: dashboard_petugas.php");
            exit();
        }
    } else {
        // Login gagal
        echo "Username atau password salah.";
    }
}
