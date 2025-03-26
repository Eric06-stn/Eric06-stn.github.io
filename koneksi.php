<?php 

// koneksi database
$server = "localhost";
$username = "root";
$password = "";
$database = "dbcrud_modal";

// koneksi
$koneksi = mysqli_connect($server, $username, $password, $database) or die (mysqli_connect_error($koneksi));

?>