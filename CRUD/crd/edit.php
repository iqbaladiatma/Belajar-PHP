<?php
include 'config/koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM warga WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    
    $query = "UPDATE warga SET nama='$nama', alamat='$alamat', telepon='$telepon' WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Warga</title>
    <style>
        .form-group { margin-bottom: 15px; }
        input, textarea { width: 100%; max-width: 300px; padding: 5px; }
        .btn { padding: 5px 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 3px; }
    </style>
</head>
<body>
    <h2>Edit Warga</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama:</label><br>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat:</label><br>
            <textarea name="alamat" required><?php echo $data['alamat']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Telepon:</label><br>
            <input type="text" name="telepon" value="<?php echo $data['telepon']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn">Update</button>
        <a href="index.php" class="btn">Kembali</a>
    </form>
</body>
</html>