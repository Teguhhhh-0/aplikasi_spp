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
    include '../components/nav_petugas.php';
    include '../config/config.php';

    $payment_id = isset ($_GET['id_pembayaran']) ? $_GET['id_pembayaran'] : '';

    if (!empty ($payment_id)) {
        $query = mysqli_query($conn, "SELECT pembayaran.*, spp.nominal AS nominal_spp
                                   FROM pembayaran 
                                   JOIN spp ON pembayaran.id_spp = spp.id_spp 
                                   WHERE id_pembayaran = $payment_id");
        $row = mysqli_fetch_assoc($query);

        if (mysqli_num_rows($query) == 0) {
            $alert_message = 'ID Pembayaran tidak ada atau tersedia.';
        } else {
            // Calculate change
            $kembalian = $row['jumlah_bayar'] - $row['nominal_spp'];
        }
    }

    $conn->close();
    ?>

    <div class="w-full flex justify-center items-center flex-col">
        <?php
        if (isset ($_GET['pesan']) && $_GET['pesan'] == 'Sukses') {
            echo "<div class='alert alert-success' role='alert'>Pembayaran berhasil!!!</div>";
        }
        ?>
        <h3>ID Pembayaran :
            <?php echo $payment_id; ?>
        </h3>
    </div>

    <div class="w-full flex justify-end items-center flex-col bg-white shadow-md">
        <form action="" method="GET" class=" w-72 rounded px-8 pt-6 pb-8 mb-4">
            <div class="flex items-center gap-2 w-72">
                <div class="col">
                    <input type="text" name="id_pembayaran" class="w-full border-2 border-gray-300 p-2 rounded-xl"
                        placeholder="Cari ID Pembayaran" value="<?php echo $payment_id; ?>">
                </div>
                <div class="col-auto">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cari</button>
                </div>
            </div>
        </form>
        <div class="w-full flex justify-end items-end flex-col">

            <?php if (!empty ($payment_id)) {
                if (isset ($alert_message)) {
                    echo "<script> alert('ID Pembayaran Kosong') </script>";
                    echo "<div class='alert alert-danger' role='alert'>$alert_message</div>";
                } else { ?>
                    <table class="bg-slate-200 w-10/12 text-center h-20 rounded-lg">
                        <thead class="border-b-2 border-blue-600 bg-blue-400 h-10">
                            <tr>
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
                            <tr>
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
                <?php }
            } ?>
        </div>
        <div class="flex justify-center gap-7 my-10">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="pembayaran.php" role="button">Input Pembayaran Lain</a>
            <a class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="history.php"
                role="button">Cek History Lain</a>
        </div>
    </div>

</body>

</html>