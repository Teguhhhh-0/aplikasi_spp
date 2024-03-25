<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include '../components/nav_petugas.php';
    include '../config/config.php';

    $sql_id_transaksi = 'SELECT MAX(id_pembayaran) AS id_pembayaran FROM pembayaran';
    $result_id_transaksi = $conn->query($sql_id_transaksi);
    $last_transaksi_id = $result_id_transaksi->fetch_assoc()['id_pembayaran'];

    if (!empty ($last_transaksi_id)) {
        $query = $conn->prepare("SELECT pembayaran.*, spp.nominal AS nominal_spp
                             FROM pembayaran 
                             JOIN spp ON pembayaran.id_spp = spp.id_spp 
                             WHERE id_pembayaran = ?");
        $query->bind_param("i", $last_transaksi_id);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $kembalian = $row['jumlah_bayar'] - $row['nominal_spp'];
            ?>
            <div class="container mt-5">
                <?php
                if (isset ($_GET['pesan'])) {
                    if ($_GET['pesan'] == 'Sukses') {
                        echo "<div class='alert alert-success' role='alert'>Pembayaran berhasil!!!</div>";
                    }
                }
                ?>
                <h3>ID Pembayaran:
                    <?php echo $last_transaksi_id; ?>
                </h3>
            </div>

            <div class="w-full flex justify-center items-center flex-col ml-32 py-20">
                <table class="w-10/12 text-center my-20">
                    <thead class="border-b-2 border-blue-600 bg-blue-400 h-10">
                        <tr class="text-slate-100">
                            <th scope="col">ID Petugas</th>
                            <th scope="col">NISN</th>
                            <th scope="col">Tanggal Bayar</th>
                            <th scope="col">Bulan Bayar</th>
                            <th scope="col">Tahun Bayar</th>
                            <th scope="col">ID SPP</th>
                            <th scope="col">Nominal SPP</th>
                            <th scope="col">Jumlah Bayar</th>
                            <th scope="col">Kembali</th>
                        </tr>
                    </thead>
                    <tbody class="border-b-2 border-blue-600 bg-blue-300 h-10">
                        <tr class="text-slate-100">
                            <td scope="row">
                                <?php echo $row['id_petugas']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $row['nisn']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $row['tgl_bayar']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $row['bulan_dibayar']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $row['tahun_dibayar']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $row['id_spp']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $row['nominal_spp']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $row['jumlah_bayar']; ?>
                            </td>
                            <td scope="row">
                                <?php echo $kembalian; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-center gap-7">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        href="petugas/petugas_dashboard.php" role="button">Input Pembayaran Lain</a>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="history.php"
                        role="button">Cek History Lain</a>
                </div>
            </div>
            <?php
        } else {
            echo "Data pembayaran tidak ditemukan.";
        }
    } else {
        echo "Tidak ada data transaksi pembayaran.";
    }

    $conn->close();
    ?>
</body>

</html>