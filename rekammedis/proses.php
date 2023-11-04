<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    $poli = trim(mysqli_real_escape_string($con, $_POST['poli']));
    $pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));

    // Menambahkan berat badan, tinggi badan, jenis perawatan, dan biaya
    $berat_badan = trim(mysqli_real_escape_string($con, $_POST['berat_badan']));
    $tinggi_badan = trim(mysqli_real_escape_string($con, $_POST['tinggi_badan']));
    $jenis_perawatan = trim(mysqli_real_escape_string($con, $_POST['jenis_perawatan']));
    $biaya = trim(mysqli_real_escape_string($con, $_POST['biaya']));

    // Insert ke tb_rekammedis
    mysqli_query($con, "INSERT INTO tb_rekammedis (id_rm, tgl_periksa, id_poli, id_pasien, keluhan, id_dokter, diagnosa, berat_badan, tinggi_badan, jenis_perawatan, biaya) 
    VALUES ('$uuid', '$tgl', '$poli', '$pasien', '$keluhan', '$dokter', '$diagnosa', '$berat_badan', '$tinggi_badan', '$jenis_perawatan', '$biaya')") or die(mysqli_error($con));

    // Mendeklarasikan obat
    $obat = $_POST['obat'];
    foreach ($obat as $obat_id) {
        mysqli_query($con, "INSERT INTO tb_rm_obat (id_rm, id_obat) VALUES ('$uuid', '$obat_id')") or die(mysqli_error($con));
    }

    echo "<script>alert('Data berhasil ditambahkan'); window.location='data.php';</script>";
} elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    $poli = trim(mysqli_real_escape_string($con, $_POST['poli']));
    $pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));

    // Mengupdate tabel rekammedis
    mysqli_query($con, "UPDATE tb_rekammedis SET tgl_periksa = '$tgl', id_poli = '$poli', id_pasien = '$pasien', keluhan = '$keluhan', id_dokter = '$dokter', diagnosa = '$diagnosa' WHERE id_rm = '$id'") or die(mysqli_error($con));

    // Mendeklarasikan obat
    $obat = $_POST['obat'];
    mysqli_query($con, "DELETE FROM tb_rm_obat WHERE id_rm = '$id'") or die(mysqli_error($con));
    foreach ($obat as $obat_id) {
        mysqli_query($con, "INSERT INTO tb_rm_obat (id_rm, id_obat) VALUES ('$id', '$obat_id')") or die(mysqli_error($con));
    }

    // Mengupdate data berat badan, tinggi badan, jenis perawatan, dan biaya
    $berat_badan = trim(mysqli_real_escape_string($con, $_POST['berat_badan']));
    $tinggi_badan = trim(mysqli_real_escape_string($con, $_POST['tinggi_badan']));
    $jenis_perawatan = trim(mysqli_real_escape_string($con, $_POST['jenis_perawatan']));
    $biaya = trim(mysqli_real_escape_string($con, $_POST['biaya']));

    mysqli_query($con, "UPDATE tb_rekammedis SET berat_badan = '$berat_badan', tinggi_badan = '$tinggi_badan', jenis_perawatan = '$jenis_perawatan', biaya = '$biaya' WHERE id_rm = '$id'") or die(mysqli_error($con));

    echo "<script>alert('Data berhasil diubah'); window.location='data.php';</script>";
}

?>
