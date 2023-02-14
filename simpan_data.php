<?php
include "koneksi.php";
//uji jika tombol diklik
date_default_timezone_set("Asia/Jakarta");
if (isset($_POST['bsimpan'])){
    $tgl=date('Y-m-d');
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $asal = htmlspecialchars($_POST['asal'], ENT_QUOTES);
    $telepon = htmlspecialchars($_POST['telepon'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $keperluan = htmlspecialchars($_POST['keperluan'], ENT_QUOTES);            
    $time_in = date('H:i:s');
    $time_out = $_POST['out'];
    $foto = $_POST['foto'];

    define('UPLOAD_DIR', 'upload/');

    //menangkap variabel
    $foto        = str_replace('data:image/png;base64,', '', $foto);
    $foto        = str_replace(' ', '+', $foto);

    //resource gambar diubah dari encode
    $data       = base64_decode($foto);
    $file       = $nama."-".$asal. '.png';
    
    //memindahkan file ke folder upload
    file_put_contents(UPLOAD_DIR.$file, $data);

    $simpan = mysqli_query($conn, "INSERT INTO daftar_tamu VALUES ('','$tgl', '$nama', '$asal', '$telepon', '$tujuan', 
                                                                    '$keperluan', '$file', '$time_in', '$time_out')");


    //uji jika simpan data sukses
    if($simpan) {
        echo "<script>alert('Simpan Data Berhasil');
            document.location='daftar_tamu.php'</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');
            document.location='?'</script>";
    }
}
?>