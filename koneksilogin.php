<?php 
$koneksi = mysqli_connect("localhost","root","","buku_tamu");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>