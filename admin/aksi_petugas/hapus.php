<?php

require '../../config/config.php';

$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas = '$id'");

if (mysqli_affected_rows($conn)) {
    echo "<script> ;
    document.location.href = '../petugas.php';
    </script>";
} else {
    echo "<script> alert('data gagal dihapus');
    document.location.href = '../petugas.php';
    </script>";
}