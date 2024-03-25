<?php
require '../../config/config.php';

if ($conn->connect_error) {
    die ("Koneksi gagal: " . $conn->connect_error);
}

if (isset ($_POST['submit'])) {
    $id_spp = $_POST['id_spp'];
    $tahun = $_POST["tahun"];
    $nominal = $_POST["nominal"];

    $sql = "UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp=$id_spp";

    if ($conn->query($sql) === TRUE) {
        echo '<script> document.location.href = "../spp.php"; </script>';
        echo "Data berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$id_spp = $_GET['id_spp'];
$sql = "SELECT * FROM spp WHERE id_spp=$id_spp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tahun = $row["tahun"];
        $nominal = $row["nominal"];
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
            <h1 class="text-2xl font-bold mb-6 text-center">Edit Spp</h1>
            <div class="mb-4">
                <input type="hidden" name="id_spp" value="<?= $id_spp; ?>">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tahun">Tahun</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="tahun" name="tahun" value="<?= $tahun; ?>">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nominal">nominal</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="nominal" name="nominal" value="<?= $nominal; ?>">
            </div>
            <button
                class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                type="submit" name="submit">Simpan</button>
        </form>
    </div>
</body>

</html>