<?php
include_once '../config/config.php';

if (isset ($_POST["submit"])) {
    if (empty ($_POST["nama_kelas"]) || empty ($_POST["kompetensi"])) {
        echo "Nama kelas dan kompetensi keahlian harus diisi.";
        exit();
    }

    $nama_kelas = $_POST["nama_kelas"];
    $kompetensi = $_POST["kompetensi"];

    $stmt = $conn->prepare("INSERT INTO kelas (nama_kelas, kompetensi_keahlian) VALUES (?, ?)");
    $stmt->bind_param("ss", $nama_kelas, $kompetensi);

    if ($stmt->execute()) {
        echo "<script>
            window.location.href = 'kelas.php';
            </script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
        exit();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body class="bg-gray-100">
    <div class="mx-auto py-8">
        <form action="" method="post" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Tambah Kelas</h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_kelas">Nama Kelas</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="nama_kelas" name="nama_kelas">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="kompetensi">Kompetensi Keahlian</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="kompetensi" name="kompetensi">
            </div>
            <button
                class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                type="submit" name="submit">Simpan</button>
        </form>
    </div>
</body>

</html>