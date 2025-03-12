<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan username MySQL Anda
$pass = "";     // Sesuaikan dengan password MySQL Anda
$db = "db_warg";

$koneksi = mysqli_connect("localhost", "root", "", "db_warg");

if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
