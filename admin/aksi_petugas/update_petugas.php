<?php
require '../../config/config.php';

// Inisialisasi variabel untuk menyimpan nilai dari formulir
$id_produk = $nama = $harga = $stok = "";

// Mengelola pengiriman formulir untuk memperbarui data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memastikan data formulir tersedia dan tidak kosong
    if (isset ($_POST['submit']) && !empty ($_POST['id_petugas']) && !empty ($_POST['username']) && !empty ($_POST['nama_petugas']) && !empty ($_POST['level'])) {

        // Mengambil nilai dari formulir
        $id_petugas = $_POST['id_petugas'];
        $username = $_POST['username'];
        $nama = $_POST['nama_petugas'];
        $level = $_POST['level'];

        // Memperbarui data produk dalam database
        $stmt = $conn->prepare("UPDATE petugas SET username = ?, nama_petugas = ?, level = ? WHERE id_petugas = ?");
        $stmt->bind_param("sssi", $username, $nama, $level, $id_petugas); // Mengikat parameter ke statement

        if ($stmt->execute()) {
            echo "<p class='success-message'>Data berhasil diperbarui</p>";
            header("location: ../petugas.php"); // Redirect ke halaman produk setelah berhasil memperbarui
            exit(); // Keluar dari skrip setelah redirect
        } else {
            echo "<p class='error-message'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close(); // Tutup statement
    } else {
        echo "<p class='error-message'>Formulir tidak lengkap</p>";
        echo "<p class='error-message'>" . $conn->error . "</p>";
    }
}

// Memeriksa apakah ada nilai GET id_produk dan mengekstrak informasi produk
if (isset ($_GET['id_petugas'])) {
    $id_petugas = $_GET["id_petugas"];

    // Mengambil data produk berdasarkan id_petugas
    $query = "SELECT * FROM petugas WHERE id_petugas = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_petugas);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $nama = $row['nama_petugas'];
        $level = $_GET['level'];
    } else {
        echo "<p class='error-message'>Data tidak ditemukan dalam database</p>";
        exit(); // Setelah memberikan peringatan, keluar dari skrip untuk menghentikan eksekusi selanjutnya
    }
    $stmt->close();
}

// Menutup koneksi database
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

<body>
    <!-- component -->
    <script src="https://cdn.tailwindcss.com"></script>

    <body class="bg-gray-100">
        <div class="mx-auto py-8">
            <form action="" method="post" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
                <h1 class="text-2xl font-bold mb-6 text-center">Edit Petugas</h1>
                <div class="mb-4">
                    <input type="text" name="id_petugas" value="<?= $id_petugas; ?>">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">username</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="username" name="username" value="<?= $username; ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">nama</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="nama" name="nama" value="<?= $nama; ?>">
                    <!-- </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="password" id="password" name="password">
                </div> -->
                    <div class="mb-4">
                        <label for="level" class="block text-gray-700 text-sm font-bold mb-2">level</label>
                        <select name="level"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            id="">
                            <option value="siswa" <?= ($level == 'siswa') ? 'selected' : ''; ?>> --- </option>
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
</body>

</html>