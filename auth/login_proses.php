<?php
session_start();
include '../config/config.php';

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($conn, "SELECT * FROM petugas WHERE username='$username' AND password='$password'");

$check = mysqli_num_rows($login);

if ($check > 0) {

    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == "admin") {

        $id = $check['id'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header("location: ../admin/home.php");

    } else if ($data['level'] == "petugas") {
        $id = $check['id'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "petugas";
        header("location:../user/petugas_dashboard.php");

    } else {

        header("location:../index.php?massage=gagal");
    }
} else {
    header("location:../index.php?massage=gagal");
}
