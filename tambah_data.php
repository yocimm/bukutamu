<?php include 'header.php'?>
<div class="container">
<div class="row mt-5 ">
    <!-- INPUT DATA -->
    <div class= "col-md-8 col-xs-12 ">

        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Identitas Tamu</h1>
        </div>
        <form class="user" method="POST" action="">
            <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="asal" placeholder="Asal" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="telepon" placeholder="Nomor Telepon" required>
            </div>
            <div class="form-group">
                <select name="tujuan" placeholder="Tujuan" class="form-control form-select" required>
                    <option value="" disabled selected hidden>Tujuan</option>
                    <option value="Internal Audit">Internal Audit</option>
                    <option value="CORPLAN">CORPLAN</option>
                    <option value="CBP">CBP</option>
                    <option value="HCS">HCS</option>
                    <option value="IT">IT</option>
                    <option value="JLI">JLI</option>
                    <option value="RQM">RQM</option>
                    <option value="PFA">PFA</option>
                    <option value="EPG">EPG</option>
                    <option value="JTT">JTT</option>
                    <option value="JNT">JNT</option>
                    <option value="Direksi">Direksi</option>
                    <option value="STO">STO</option>
                    <option value="CCO">CCO</option>
                    <option value="HCD">HCD</option>
                    <option value="CORPIN">CORPIN</option>
                    <option value="OMM">OMM</option>
                    <option value="LCO">LCO</option>
                    <option value="ATA">ATA</option>
                    <option value="BDG">BDG</option>
                </select>
            </div>
            <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keperluan" placeholder="Keperluan" required></textarea>
            </div>
    </div>

    <!--KAMERA-->
    <div class= "col-md-4 col-xs-12">
        <div class="card-body">
        <div class="text-center">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div id="my_camera"></div>
                </div>
            </div>
            <!-- Configure a few settings and attach camera -->
            <script language="JavaScript">
                Webcam.set({
                    width: 350,
                    height: 350,
                    image_format: 'jpeg',
                    jpeg_quality: 90,
                    flip_horiz: true
                });

                Webcam.set('constraints',{
                facingMode: "environment"
                });
            
                Webcam.attach('#my_camera');
            </script>
            <script type="text/javascript">
                // saat dokumen selesai dibuat jalankan fungsi update
                $(document).ready(function () {
                    update();
                });

                // jalankan aksi saat tombol register disubmit
                $(".bsimpan").click(function () {
                    event.preventDefault();

                    // membuat variabel image
                    var foto = '';

                    //mengambil data username dari form di atas dengan id name
                    var tgl = $('#tgl').val();
                    var nama = $('#nama').val();
                    var asal = $('#asal').val();
                    var telepon = $('#telepon').val();
                    var tujuan = $('#tujuan').val();
                    var keperluan = $('#keperluan').val();
                    var time_in = $('#time_in').val();
                    var time_out = $('#time_out').val();

                    //memasukkan data gambar ke dalam variabel image
                    Webcam.snap(function (data_uri) {
                        foto = data_uri;
                    });

                    //mengirimkan data ke file action.php dengan teknik ajax
                    $.ajax({
                        url: 'action.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            foto : foto,
                            tgl : tgl,
                            nama: nama,
                            asal : asal,
                            telepon: telepon,
                            tujuan: tujuan,
                            keperluan: keperluan,
                            time_in: time_in,
                            time_out: time_out
                        },
                        success: function () {
                            alert('input data berhasil');
                            // menjalankan fungsi update setelah kirim data selesai dilakukan 
                            update()
                        }
                    })
                });

            </script>
            </div>
        </div>
        </div>
    </div>
    <?php include 'simpan_data.php'?>
    <button type="submit" name="bsimpan" class="btn btn-primary btn-user-block">Simpan Data</button>
</div>
</div>
</body>
</html>
