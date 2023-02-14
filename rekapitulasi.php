<?php include "header.php" ?>

<div class="row">
    <div class=col md-12>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Pengunjung</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="" class=text-center">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input class="form-control" type="date"
                            name="tanggal1" value="<?= isset($_POST['tanggal1'])?
                            $_POST['tanggal1']: date('Y-m-d') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Hingga Tanggal</label>
                            <input class="form-control" type="date"
                            name="tanggal2" value="<?= isset($_POST['tanggal2'])?
                            $_POST['tanggal2']: date('Y-m-d') ?>" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <button class="btn btn-primary form-control"
                        name="btampilkan"><i class="fa fa-search"></i> Tampilkan</button>
                    </div>
                    
                    <div class="col-md-2">
                        <a href="daftar_tamu.php" class="btn btn-danger form-control"><i class="fa fa-backward"></i> Kembali</a>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['btampilkan'])) :
            ?>
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
                            <th>Check In</th>
                            <th>Check Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tgl1=$_POST['tanggal1'];
                        $tgl2=$_POST['tanggal2'];

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

                <center>
                    <form method="POST" action="export_excel.php">
                        <div class="col-md-4">
                            <input type="hidden" name="tanggala" value="<?= @$_POST ['tanggal1']?>">
                            <input type="hidden" name="tanggalb" value="<?= @$_POST ['tanggal2']?>">
                            
                            <button class="btn btn-success form-control"
                            name="bexport"><i class="fa fa-download"></i> Export Data</button>
                        </div>
                    </form>
                </center> 

            </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
</div>
<?php include "footer.php" ?>