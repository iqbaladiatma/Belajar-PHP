<?php
try {
  $koneksi = mysqli_connect("localhost", "root", "", "db_warg");
  echo "koneksi berhasil";
} catch (Exception $e) {
  echo "koneksi gagal: " . $e->getMessage();
}
