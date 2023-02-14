<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "buku_tamu";

$conn = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($conn));