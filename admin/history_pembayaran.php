<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body class="w-full">

    <?php
    include '../components/sidebar.php';
    include '../config/config.php';

    $search_term = isset ($_GET['search']) ? $_GET['search'] : '';

    $query = "SELECT pembayaran.*, spp.nominal AS nominal_spp
              FROM pembayaran 
              JOIN spp ON pembayaran.id_spp = spp.id_spp 
              WHERE pembayaran.id_pembayaran LIKE '%$search_term%' 
              OR pembayaran.nisn LIKE '%$search_term%'";

    $result = mysqli_query($conn, $query);

    $conn->close();
    ?>

    <div class="w-full flex justify-center items-center flex-col">
        <?php
        if (isset ($_GET['pesan']) && $_GET['pesan'] == 'Sukses') {
            echo "<div class='alert alert-success' role='alert'>Pembayaran berhasil!!!</div>";
        }
        ?>
        <h3>History Pembayaran</h3>
    </div>

    <div class="w-full flex justify-end items-center flex-col bg-white shadow-md">
        <form action="" method="GET" class="flex gap-4 w-72 rounded px-8 pt-6 pb-8 mb-4">
            <div class="col">
                <input type="text" name="search" class="w-full border-2 border-gray-300 p-2 rounded-xl"
                    placeholder="Cari berdasarkan ID Pembayaran atau NISN" value="<?php echo $search_term; ?>">
            </div>
            <div class="col-auto">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cari</button>
            </div>
        </form>
        <div class="w-full flex justify-end items-end flex-col">
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="bg-slate-200 w-10/12 text-center h-20 rounded-lg">
                    <thead class="border-b-2 border-blue-600 bg-blue-400 h-10">
                        <tr>
                            <th scope="col">ID Pembayaran</th>
                            <th scope="col">ID Petugas</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Tanggal Bayar</th>
                            <th scope="col">Bulan Bayar</th>
                            <th scope="col">Tahun Bayar</th>
                            <th scope="col">ID SPP</th>
                            <th scope="col">Nominal SPP</th>
                            <th scope="col">Jumlah Bayar</th>
                        </tr>
                    </thead>
                    <tbody class="border-b-2 border-blue-600 bg-blue-300 h-10">
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td>
                                    <?php echo $row['id_pembayaran']; ?>
                                </td>
                                <td>
                                    <?php echo $row['id_petugas']; ?>
                                </td>
                                <td>
                                    <?php echo $row['nisn']; ?>
                                </td>
                                <td>
                                    <?php echo $row['tgl_bayar']; ?>
                                </td>
                                <td>
                                    <?php echo $row['bulan_dibayar']; ?>
                                </td>
                                <td>
                                    <?php echo $row['tahun_dibayar']; ?>
                                </td>
                                <td>
                                    <?php echo $row['id_spp']; ?>
                                </td>
                                <td>
                                    <?php echo $row['nominal_spp']; ?>
                                </td>
                                <td>
                                    <?php echo $row['jumlah_bayar']; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-warning" role="alert">
                    Data tidak ditemukan.
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>