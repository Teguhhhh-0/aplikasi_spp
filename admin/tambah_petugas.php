<?php

include '../config/config.php';

if (isset ($_POST["submit"])) {
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $stmt = $conn->prepare("INSERT INTO petugas (username, nama_petugas, password, level) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $nama, $password, $role);

    if ($stmt->execute()) {
        echo "<script>
            window.location.href = 'petugas.php';
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
    <title>Document</title>
    <link rel="stylesheet" href="../../css/output.css">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <body class="bg-gray-100">
        <div class="mx-auto py-8">
            <form action="" method="post" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
                <h1 class="text-2xl font-bold mb-6 text-center">Tambah Petugas</h1>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">username</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="username" name="username">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">nama</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="nama" name="nama">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="password" id="password" name="password">
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-sm font-bold mb-2">role</label>
                    <select name="role"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        id="">
                        <option value="siswa"> --- </option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
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