<?php include 'header.php'?>
    <div class="card-body">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tamu Hari ini [<?= date('d-m-Y')?>]</h6>
        </div>
        <div class="card-body">
            <a href="rekapitulasi.php" class="btn btn-success mb-3"><i class="fa fa-table"></i> Rekapitulasi Tamu</a>
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Asal</th>
                            <th>Telepon</th>
                            <th>Tujuan</th>
                            <th>Keperluan</th>
                            <th>Foto</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tgl = date('Y-m-d');
                        $show = mysqli_query($conn, "SELECT * FROM daftar_tamu where tanggal like '%$tgl%' order by id_tamu desc");
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
                                <form action="out.php" method="post">
                                <td><button class= "btn btn-danger" type="submit">Keluar</button></td>
                                </form>
                            </tr>
                        <?php } ?>    
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    </div>

<?php include 'footer.php'?>