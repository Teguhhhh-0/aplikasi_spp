<?php

require '../../config/config.php';

$nisn = $_GET['nisn'];

$hapus = mysqli_query($conn, "DELETE FROM siswa WHERE nisn = '$nisn'");

if (mysqli_affected_rows($conn)) {
    echo "<script> ;
    document.location.href = '../siswa.php';
    </script>";
} else {
    echo "<script> alert('Data Gagal di Hapus');
    document.location.href = '../siswa.php';
    </script>";
}