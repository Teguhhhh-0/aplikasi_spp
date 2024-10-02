<?php
require '../../config/config.php';

$sql_kelas = 'SELECT * FROM kelas';
$result_kelas = $conn->query($sql_kelas);

$sql_spp = 'SELECT * FROM spp';
$result_spp = $conn->query($sql_spp);

$result_kelas->data_seek(0);
$result_spp->data_seek(0);

if ($conn->connect_error) {
    die ("Koneksi gagal: " . $conn->connect_error);
}

if (isset ($_POST['submit'])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = !empty($_POST["id_kelas"]) ? $_POST["id_kelas"] : null;
    $alamat = $_POST["alamat"];
    $no_telp = $_POST["no_telp"];
    $id_spp = $_POST["id_spp"];

    if ($id_kelas === null) {
        echo "Error: ID Kelas harus dipilih.";
    } else {
        $sql = "UPDATE siswa SET nis=?, nama=?, id_kelas=?, alamat=?, no_telp=?, id_spp=? WHERE nisn=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisssi", $nis, $nama, $id_kelas, $alamat, $no_telp, $id_spp, $nisn);

        if ($stmt->execute()) {
            echo '<script> document.location.href = "../siswa.php"; </script>';
            echo "Data Berhasil di Update";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$nisn = $_GET['nisn'];
$sql = "SELECT * FROM siswa WHERE nisn=$nisn";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nisn = $row['nisn'];
        $nis = $row['nis'];
        $nama = $row['nama'];
        $id_kelas = $row["id_kelas"];
        $alamat = $row["alamat"];
        $no_telp = $row["no_telp"];
        $id_spp = $row["id_spp"];
    }
} else {
    echo "Data petugas tidak ditemukan";
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
</head>

<body>

    <div class="w-full flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[550px]">
            <form action="" method="POST" class="w-full mb-5">
                <div class="-mx-3 flex flex-wrap">

                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="nisn" class="mb-3 block text-base font-medium text-[#07074D]">
                                NISN
                            </label>
                            <input type="number" name="nisn" id="nisn"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="<?= $nisn ?>" required/>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="nis" class="mb-3 block text-base font-medium text-[#07074D]">
                                NIS
                            </label>
                            <input type="number" name="nis" id="nis"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="<?= $nis ?>" required/>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="alamat" class="mb-3 block text-base font-medium text-[#07074D]">
                        ALAMAT
                    </label>
                    <input type="text" name="alamat" id="alamat"
                        class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="<?= $alamat ?>" required/>
                </div>

                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="id_kelas" class="mb-3 block text-base font-medium text-[#07074D]">
                                KELAS
                            </label>
                            <select name="id_kelas" id="id_kelas"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
                                <option disabled selected>Select your option</option>
                <?php while ($row = $result_kelas->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id_kelas']; ?>">
                                        <?php echo $row['nama_kelas'] . ' ' . $row['kompetensi_keahlian']; ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="nama" class="mb-3 block text-base font-medium text-[#07074D]">
                                NAMA
                            </label>
                            <input type="text" name="nama" id="nama"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="<?= $nama ?>"
                                required />
                        </div>
                    </div>
                </div>
                <div class="-mx-3 flex flex-wrap">
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="no_telp" class="mb-3 block text-base font-medium text-[#07074D]">
                                NOMOR TELEPON
                            </label>
                            <input type="text" name="no_telp" id="no_telp"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="<?= $no_telp ?>"
                                required />
                        </div>
                    </div>
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="id_spp" class="mb-3 block text-base font-medium text-[#07074D]">
                                ID SPP
                            </label>
                            <select name="id_spp" id="id_spp"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
                                <?php while ($row = $result_spp->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id_spp']; ?>">
                                        <?php echo $row['id_spp'] . ' ' . $row['nominal'] . ' ' . $row['tahun']; ?>
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