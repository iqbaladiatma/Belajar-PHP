<?php
try{
$koneksi = mysqli_connect('127.0.0.1', 'root', '', 'db_todo');
} catch (Exception $hyp) {
    echo "gagal :". $hyp->getMessage();
}

?>