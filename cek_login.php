<?php

//aktifkan session
session_start();

//panggil koneksi database
include "koneksilogin.php";

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * from users WHERE username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
    // print_r("sukses");
    header('location:tambah_data.php');
	// header("location:admin/index.php");
}else{
    echo"<script>alert('Login Gagal, harap periksa Username dan Password Anda');
    document.location='index.php';
    </script>";
}
?>