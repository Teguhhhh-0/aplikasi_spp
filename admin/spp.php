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
    include '../config/config.php';
    ?>
    <div>
        <?php include '../components/sidebar.php' ?>
    </div>
    <div class="w-10/12">
        <div class="w-full flex md:justify-end my-10 md:mx-32 sm:-mx-10 mx-10">
            <button type="button" id="buttonTambah" class="bg-blue-500 w-52 h-7 rounded-lg">Tambah Spp</button>
        </div>
        <div class="w-full md:-ml-0 sm:mx-10 mx-10">
            <table class="w-full sm:px-44 md:ml-60 text-md bg-white shadow-md rounded mb-4">
                <thead>
                    <tr class="border-b">
                        <th class="text-left sm:p-3 p-1 sm:px-5 px-1">Id</th>
                        <th class="text-left sm:p-3 p-1 sm:px-5 px-1">tahun</th>
                        <th class="text-left sm:p-3 p-1 sm:px-5 px-1">nominal</th>
                        <th>aksi</th>
                </thead>
                </tr>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM spp";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $spp) {
                        ?>
                        <tr class="border-b hover:bg-orange-100 bg-gray-100">
                            <td class="sm:p-3 p-1 sm:px-5 px-1">
                                <?= $spp['id_spp'] ?>
                            </td>
                            <td class="sm:p-3 p-1 sm:px-5 px-1">
                                <?= $spp['tahun'] ?>
                            </td>
                            <td class="sm:p-3 p-1 sm:px-5 px-1">
                                <?= "Rp" . number_format($spp['nominal'], 0, ',', '.') ?>
                            </td>
                            <td class="sm:p-3 p-1 sm:px-5 px-1 flex justify-center"><a
                                    href="aksi_spp/update_spp.php?action=update&id_spp=<?= $spp['id_spp']; ?>&tahun=<?= $spp['tahun']; ?>&nominal=<?= $spp['nominal']; ?>"
                                    class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">update</a>
                                <a onclick="return confirm('Anda yakin ingin menghapus petugas ?')"
                                    href="aksi_spp/hapus.php?id_spp=<?= $spp['id_spp'] ?>"
                                    class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="absolute sm:left-32 left-5 bottom-5 p-12 px-1 container">
            <?php require "tambah_spp.php" ?>
        </div>
    </div>
    </div>
    <script src="../js/index.js"></script>
</body>

</html>