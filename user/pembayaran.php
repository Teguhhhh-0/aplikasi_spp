<?php
include '../config/config.php';

$sql_students = 'SELECT * FROM siswa';
$result_students = $conn->query($sql_students);

$sql_petugas = 'SELECT * FROM petugas';
$result_petugas = $conn->query($sql_petugas);

$sql_spp = "SELECT * FROM spp";
$result_spp = $conn->query($sql_spp);


$sql_payment_types = 'SELECT * FROM pembayaran';
$result_payment_types = $conn->query($sql_payment_types);

$result_students->data_seek(0);
$result_petugas->data_seek(0);
$result_spp->data_seek(0);
$result_payment_types->data_seek(0);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_petugas = $_POST['id_petugas'];
    $nisn = $_POST['nisn'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $bulan_dibayar = $_POST['bulan_dibayar'];
    $tahun_dibayar = $_POST['tahun_dibayar'];
    $id_spp = $_POST['id_spp'];
    $jumlah_bayar = $_POST['jumlah_bayar'];

    $sql_insert_transaction = "INSERT INTO pembayaran (id_petugas, nisn, tgl_bayar, bulan_dibayar, tahun_dibayar, id_spp, jumlah_bayar) VALUES ('$id_petugas', '$nisn', '$tgl_bayar', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$jumlah_bayar')";

    if ($conn->query($sql_insert_transaction) === TRUE) {
        echo "<script>alert('Pembayaran Berhasil');</script>";
        echo "<script>window.reload();</script>";
        header('location:history_pembayaran.php?pesan=Sukses');
    } else {
        echo 'Error: ' . $sql_insert_transaction . '<br>' . $conn->error;
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/output.css">
</head>

<body>
    <div>
        <div>
            <?php include '../components/nav_petugas.php'; ?>
        </div>
    </div>
    <div class="w-full flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <form action="pembayaran.php" method="POST" class="w-full mb-5">
                <div class="-mx-3 flex flex-wrap">

                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="id_petugas" class="mb-3 block text-base font-medium text-[#07074D]">
                                Petugas
                            </label>
                            <select name="id_petugas" id="id_petugas"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                <?php while ($row = $result_petugas->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id_petugas']; ?>">
                                        <?php echo $row['id_petugas'] . ' ' . $row['nama_petugas']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="nisn" class="mb-3 block text-base font-medium text-[#07074D]">
                                NISN
                            </label>
                            <select name="nisn" id="nisn"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                <?php while ($row = $result_students->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['nisn']; ?>">
                                        <?php echo $row['nisn'] . ' ' . $row['nama']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="tgl_bayar" class="mb-3 block text-base font-medium text-[#07074D]">
                        Tanggal Bayar
                    </label>
                    <input type="date" name="tgl_bayar" id="tgl_bayar"
                        class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        required />
                </div>

                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="bulan_dibayar" class="mb-3 block text-base font-medium text-[#07074D]">
                                Bulan Dibayar
                            </label>
                            <input type="text" name="bulan_dibayar" id="bulan_dibayar"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                required />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="tahun_dibayar" class="mb-3 block text-base font-medium text-[#07074D]">
                                Tahun Dibayar
                            </label>
                            <input type="text" name="tahun_dibayar" id="tahun_dibayar"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                required />
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="jumlah_bayar" class="mb-3 block text-base font-medium text-[#07074D]">
                                Jumlah Bayar
                            </label>
                            <input type="number" name="jumlah_bayar" id="jumlah_bayar"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                required />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="id_spp" class="mb-3 block text-base font-medium text-[#07074D]">
                                ID SPP
                            </label>
                            <select name="id_spp" id="id_spp"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                <?php while ($row = $result_spp->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id_spp']; ?>">
                                        <?php echo $row['id_spp'] . "'>" . $row['tahun'] . " Rp." . number_format($row['nominal']) . "</option>"; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" name="submit"
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>