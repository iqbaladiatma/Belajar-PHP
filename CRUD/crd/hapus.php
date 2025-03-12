<?php
include 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM warga WHERE id=$id";
    mysqli_query($koneksi, $query);
}

header("Location: index.php");
exit;
?>