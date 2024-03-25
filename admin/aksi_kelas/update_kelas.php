<?php
require '../../config/config.php';

if ($conn->connect_error) {
    die ("Koneksi gagal: " . $conn->connect_error);
}

if (isset ($_POST['submit'])) {
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST["nama_kelas"];
    $kompetensi = $_POST["kompetensi"];

    $sql = "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi' WHERE id_kelas=$id_kelas";

    if ($conn->query($sql) === TRUE) {
        echo '<script> document.location.href = "../kelas.php"; </script>';
        echo "Data berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$id_kelas = $_GET['id_kelas'];
$sql = "SELECT * FROM kelas WHERE id_kelas=$id_kelas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nama_kelas = $row["nama_kelas"];
        $kompetensi = $row["kompetensi_keahlian"];
    }
} else {
    echo "Data petugas tidak ditemukan";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/output.css">
</head>

<body class="bg-gray-100">
    <div class="mx-auto py-8">
        <form action="" method="post" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Edit Kelas</h1>
            <div class="mb-4">
                <input type="hidden" name="id_kelas" value="<?= $id_kelas; ?>">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_kelas">kelas</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="nama_kelas" name="nama_kelas" value="<?= $nama_kelas; ?>" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="kompetensi">Kompetensi Keahlian</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="kompetensi" name="kompetensi" value="<?= $kompetensi; ?>" required>
            </div>
            <button
                class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                type="submit" name="submit">Simpan</button>
        </form>
    </div>
</body>

</html>