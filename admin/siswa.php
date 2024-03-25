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
    <div>

        <?php
        // $session_start();
        include '../components/sidebar.php' ?>
    </div>
    <div class="w-10/12">
        <div class="w-full flex md:justify-end my-10 md:mx-32 sm:-mx-10 mx-10">
            <button type="button" onclick="window.location.href='tambah_siswa.php'"
                class="bg-blue-500 w-52 h-7 rounded-lg">Tambah Siswa</button>
        </div>
        <div class="w-full md:-ml-0 sm:mx-10 mx-10">
            <table class="w-full sm:px-44 md:ml-60 text-md bg-white shadow-md rounded mb-4">
                <thead>
                    <tr class="border-b">
                        <th class="text-left sm:p-3 p-1 sm:px-5 px-1">nisn</th>
                        <th class="text-left sm:p-3 p-1 sm:px-5 px-1">nis</th>
                        <th class="text-left sm:p-3 p-1 sm:px-5 px-1">nama</th>
                        <th class="text-left sm:p-3 p-1 sm:px-5 px-1">id_kelas</th>
                        <th class="text-left sm:p-3 p-1 sm:px-5 px-1">alamat</th>
                        <th class="text-left sm:p-3 p-1 sm:px-5 px-1">no_telp</th>
                        <th class="text-left sm:p-3 p-1 sm:px-5 px-1">id_spp</th>
                        <th>aksi</th>
                </thead>
                </tr>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM siswa";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $siswa) {
                        ?>
                        <tr class="border-b hover:bg-orange-100 bg-gray-100">
                            <td class="sm:p-3 p-1 sm:px-5 px-1">
                                <?= $siswa['nisn'] ?>
                            </td>
                            <td class="sm:p-3 p-1 sm:px-5 px-1">
                                <?= $siswa['nis'] ?>
                            </td>
                            <td class="sm:p-3 p-1 sm:px-5 px-1">
                                <?= $siswa['nama'] ?>
                            </td>
                            <td class="sm:p-3 p-1 sm:px-5 px-1">
                                <?= $siswa['id_kelas'] ?>
                            </td>
                            <td class="sm:p-3 p-1 sm:px-5 px-1">
                                <?= $siswa['alamat'] ?>
                            </td>
                            <td class="sm:p-3 p-1 sm:px-5 px-1">
                                <?= $siswa['no_telp'] ?>
                            </td>
                            <td class="sm:p-3 p-1 sm:px-5 px-1">
                                <?= $siswa['id_spp'] ?>
                            </td>
                            <td class="sm:p-3 p-1 sm:px-5 px-1 flex justify-center"><a
                                    href="aksi_siswa/update_siswa.php?action=update&nisn=<?= $siswa['nisn'] ?>&nis=<?= $siswa['nis'] ?>&nama=<?= $siswa['nama'] ?>&id_kelas=<?= $siswa['id_kelas'] ?>&alamat=<?= $siswa['alamat'] ?>&no_telp=<?= $siswa['no_telp'] ?>&id_spp=<?= $siswa['id_spp'] ?>"
                                    class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">update</a>
                                <a onclick="return confirm('Anda yakin ingin menghapus siswa ?')"
                                    href="aksi_siswa/hapus.php?nisn=<?= $siswa['nisn'] ?>"
                                    class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>