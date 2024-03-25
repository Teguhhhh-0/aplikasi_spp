<?php
require '../../config/config.php';

if ($conn->connect_error) {
    die ("Koneksi gagal: " . $conn->connect_error);
}

if (isset ($_POST['submit'])) {
    $id_petugas = $_POST['id_petugas'];
    $username = $_POST['username'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $sql = "UPDATE petugas SET username='$username', nama_petugas='$nama_petugas', level='$level' WHERE id_petugas=$id_petugas";

    if ($conn->query($sql) === TRUE) {
        echo '<script> document.location.href = "../petugas.php"; </script>';
        echo "Data berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$id_petugas = $_GET['id_petugas'];
$sql = "SELECT * FROM petugas WHERE id_petugas=$id_petugas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $nama_petugas = $row['nama_petugas'];
        $level = $row['level'];
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
            <h1 class="text-2xl font-bold mb-6 text-center">Edit Petugas</h1>
            <div class="mb-4">
                <input type="hidden" name="id_petugas" value="<?= $id_petugas; ?>">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="username" name="username" value="<?= $username; ?>">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_petugas">Nama</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="nama_petugas" name="nama_petugas" value="<?= $nama_petugas; ?>">
            </div>
            <div class="mb-4">
                <label for="level" class="block text-gray-700 text-sm font-bold mb-2">Level</label>
                <select type="text" name="level"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    id="">
                    <option>---</option>
                    <option value="admin" <?= ($level == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="petugas" <?= ($level == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                </select>
            </div>
            <button
                class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                type="submit" name="submit">Simpan</button>
        </form>
    </div>
</body>

</html>