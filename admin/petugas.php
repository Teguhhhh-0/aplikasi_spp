<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/output.css">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body class="w-full">
    <?php
    session_start();
    include '../config/config.php';
    // include_once '../auth/login_proses.php';
    ?>
    <nav class="w-full bg-indigo-950 h-10 flex">
        <div class="flex w-full justify-end items-center mx-auto">
            <div class="flex items-center mr-10 text-white">
                <img src="../public/image/user.svg" alt="" class="w-6 h-6 bg-indigo-800/50 rounded-full mr-2">
                <h1>admin</h1>
            </div>
        </div>
    </nav>
    <div class="w-full flex justify-start">
        <div class="none sm:block sm:h-screen sm:w-1/6 bg-indigo-950 rounded-br-lg rounded-bl-lg">
            <div class="flex flex-col justify-center items-center">
                <div class="border-b-2 border-slate-400 py-5 w-52 my-10">
                    <img src="../public/image/logo17.png" alt="" class="w-14 h-14 mx-auto">
                </div>
                <ul class="flex flex-col w-full justify-start items-center gap-5">
                    <li><a href="home.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">home</a></li>
                    <ul class="flex flex-col w-full justify-start items-center gap-5">
                        <li><a href="siswa.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">user
                                siswa</a></li>
                        <li><a href="petugas.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">user
                                petugas</a></li>
                        <li><a href="kelas.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">user
                                kelas</a></li>
                        <li><a href="spp.php" class="text-white my-5 shadow-lg text-center rounded-lg py-1">user
                                spp</a></li>
                    </ul>
            </div>
            <div class="text-white flex justify-center items-center content-between my-72">
                <button class="flex items-center gap-2 bg-blue-900/50 w-28 h-8 rounded-lg justify-center">
                    <img src="../public/image/logout.svg" alt="" srcset="" class="w-5 h-5">
                    <a href="#">logout</a>
                </button>
            </div>
        </div>
        <div class="w-10/12">
            <div class="w-full flex justify-end my-10 -mx-10">
                <button type="button" id="tambah" class="bg-blue-500 w-52 h-7 rounded-lg">Tambah Petugas</button>
            </div>
            <div>
                <table class="w-full text-md bg-white shadow-md rounded mb-4">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-3 px-5">Id</th>
                            <th class="text-left p-3 px-5">username</th>
                            <th class="text-left p-3 px-5">nama</th>
                            <th class="text-left p-3 px-5">password</th>
                            <th class="text-left p-3 px-5">Role</th>
                            <th>aksi</th>
                    </thead>
                    </tr>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM petugas";
                        $result = mysqli_query($conn, $sql);
                        foreach ($result as $user) {
                            ?>
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">
                                    <?= $user['id_petugas'] ?>
                                </td>
                                <td class="p-3 px-5">
                                    <?= $user['username'] ?>
                                </td>
                                <td class="p-3 px-5">
                                    <?= $user['nama_petugas'] ?>
                                </td>
                                <td class="p-3 px-5">
                                    <?= $user['password'] ?>
                                </td>
                                <td class="p-3 px-5">
                                    <?= $user['level'] ?>
                                </td>
                                <td class="p-3 px-5 flex justify-center"><a
                                        href="aksi_petugas/update_petugas.php?action=update&id_petugas=<?= $user['id_petugas']; ?>&username=<?= $user['username']; ?>&nama_petugas=<?= $user['nama_petugas']; ?>&level=<?= $user['level']; ?>"
                                        class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">update</a>
                                    <a onclick="return confirm('Anda yakin ingin menghapus petugas ?')"
                                        href="aksi_petugas/hapus.php?id=<?= $user['id_petugas'] ?>"
                                        class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="absolute left-32 top-32 container">
                <?php require "tambah_petugas.php" ?>
            </div>
        </div>
    </div>
    <script src="../js/index.js"></script>
</body>

</html>