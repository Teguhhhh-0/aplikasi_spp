<?php

require '../../config/config.php';

$id = $_GET['id_spp'];

$hapus = mysqli_query($conn, "DELETE FROM spp WHERE id_spp = '$id'");

if (mysqli_affected_rows($conn)) {
    echo "<script> ;
    document.location.href = '../spp.php';
    </script>";
} else {
    echo "<script> alert('data gagal dihapus');
    document.location.href = '../kelas.php';
    </script>";
}