<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    
    $query = "INSERT INTO warga (nama, alamat, telepon) VALUES ('$nama', '$alamat', '$telepon')";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Warga</title>
    <style>
        .form-group { margin-bottom: 15px; }
        input, textarea { width: 100%; max-width: 300px; padding: 5px; }
        .btn { padding: 5px 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 3px; }
    </style>
</head>
<body>
    <h2>Tambah Warga</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama:</label><br>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label>Alamat:</label><br>
            <textarea name="alamat" required></textarea>
        </div>
        <div class="form-group">
            <label>Telepon:</label><br>
            <input type="text" name="telepon" required>
        </div>
        <button type="submit" name="simpan" class="btn">Simpan</button>
        <a href="index.php" class="btn">Kembali</a>
    </form>
</body>
</html>