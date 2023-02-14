<?php 
date_default_timezone_set('asia/jakarta');
include('koneksi.php');

$id_tamu    = $_POST['id_tamu'];
$tgl        = $_POST['tanggal'];
$nama       = $_POST['nama'];
$asal       = $_POST['asal'];
$telepon    = $_POST['telepon'];
$tujuan     = $_POST['tujuan'];
$keperluan  = $_POST['keperluan'];            
$time_in    = $_POST['time_in'];
$foto       = $_POST['foto'];
$leave      = date('H:i:s');

$keluar = mysqli_query($conn, "UPDATE daftar_tamu SET tanggal='$tgl', nama='$nama', asal='$asal', telepon='$telepon', tujuan='$tujuan', 
keperluan='$keperluan', time_in='$time_in', foto='$foto', time_out='$leave' WHERE id_tamu='$id_tamu'");
if($keluar) {
    echo "<script>alert('Check Out Berhasil');
        document.location='daftar_tamu.php'</script>";
}
else{
    echo "<script>alert('Check Out Gagal');
        document.location='daftar_tamu.php'</script>";
}

?>