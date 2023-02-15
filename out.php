<?php
date_default_timezone_set('asia/jakarta');
include('koneksi.php');

$id_tamu    = $_POST['id_tamu'];
$leave      = date('H:i:s');

$keluar = mysqli_query($conn, "UPDATE daftar_tamu SET time_out='$leave' WHERE id_tamu='$id_tamu'");
if ($keluar) {
    echo "<script>alert('Check Out Berhasil');
        document.location='daftar_tamu.php'</script>";
} else {
    echo "<script>alert('Check Out Gagal');
        document.location='daftar_tamu.php'</script>";
}
