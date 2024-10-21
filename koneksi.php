<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "user";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_error()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>
