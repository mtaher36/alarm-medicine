<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "alarm";

$koneksi = mysqli_connect($host, $username, $password, $dbname);
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
