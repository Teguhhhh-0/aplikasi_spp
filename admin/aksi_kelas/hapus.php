<?php

require '../../config/config.php';

$id = $_GET['id_kelas'];

$hapus = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas = '$id'");

if (mysqli_affected_rows($conn)) {
    echo "<script> ;
    document.location.href = '../kelas.php';
    </script>";
} else {
    echo "<script> alert('data gagal dihapus');
    document.location.href = '../kelas.php';
    </script>";
}