<?php
include_once '../config/config.php';

if (isset ($_POST["submit"])) {
    // Validasi input
    if (empty ($_POST["tahun"]) || empty ($_POST["nominal"])) {
        echo "Nama kelas dan kompetensi keahlian harus diisi.";
        exit();
    }

    $tahun = $_POST["tahun"];
    $nominal = $_POST["nominal"];

    $stmt = $conn->prepare("INSERT INTO spp (tahun, nominal) VALUES (?, ?)");
    // Bind parameter sesuai jumlah placeholder pada query
    $stmt->bind_param("ss", $tahun, $nominal);

    if ($stmt->execute()) {
        echo "<script>
            window.location.href = 'spp.php';
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
            <h1 class="text-2xl font-bold mb-6 text-center">Tambah Spp</h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="tahun">tahun</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="tahun" name="tahun">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nominal">nominal</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="nominal" name="nominal">
            </div>
            <button
                class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                type="submit" name="submit">Simpan</button>
        </form>
    </div>
</body>

</html>