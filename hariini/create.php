<?php
include "koneksi.php";

$task = $_POST['task'];


$tambah = mysqli_query($koneksi, "INSERT INTO tb_todo (task) VALUES ('$task')");

header("location:list.php");
exit();
