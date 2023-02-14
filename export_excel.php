<?php
include "koneksi.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pengunjung.xls");
header("Pragma: no-chace");
header("Expires:0");
?>

<table border="1">
    <thead>
        <tr>
            <th colspan="6"> Rekapitulasi Data Pengunjung</th>
        </tr>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Asal</th>
            <th>Telepon</th>
            <th>Tujuan</th>
            <th>Keperluan</th>
            <th>Foto</th>
            <th>Check In</th>
            <th>Check Out</th> 
        </tr>
    </thead>

    <tbody>
        <?php
        $tgl1=$_POST['tanggala'];
        $tgl2=$_POST['tanggalb'];

        $show = mysqli_query($conn, "SELECT * FROM daftar_tamu where 
        tanggal BETWEEN '$tgl1' and '$tgl2' order by id_tamu desc");
        $no = 1;
        while ($data = mysqli_fetch_array($show)) {
        ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$data["tanggal"]?></td>
                <td><?=$data["nama"]?></td>
                <td><?=$data["asal"]?></td>
                <td><?=$data["telepon"]?></td>
                <td><?=$data["tujuan"]?></td>
                <td><?=$data["keperluan"]?></td>
                <td><?=$data["foto"]?></td>
                <td><?=$data["time_in"]?></td>
                <td><?=$data["time_out"]?></td>
            </tr>
        <?php } ?> 
    </tbody>
</table>