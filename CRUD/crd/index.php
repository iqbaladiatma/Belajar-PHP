<?php
include 'koneksi.php';

// Variabel untuk pencarian
$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>List Warga</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border-radius: 3px;
        }
        .btn-hapus {
            background-color: #dc3545;
        }
        .search-form {
            margin: 10px 0;
        }
        .search-form input[type="text"] {
            padding: 5px;
            width: 200px;
        }
    </style>
</head>
<body>
    <h2>List Warga</h2>
    <a href="tambah.php" class="btn">Tambah Warga</a>
    
    <!-- Form Pencarian -->
    <div class="search-form">
        <form method="GET">
            <input type="text" name="keyword" placeholder="Cari nama atau telepon" value="<?php echo $keyword; ?>">
            <button type="submit" class="btn">Cari</button>
            <?php if ($keyword): ?>
                <a href="index.php" class="btn">Reset</a>
            <?php endif; ?>
        </form>
    </div>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Query dengan pencarian
        if ($keyword) {
            $query = "SELECT * FROM warga WHERE nama LIKE '%$keyword%' OR telepon LIKE '%$keyword%'";
        } else {
            $query = "SELECT * FROM warga";
        }
        
        $result = mysqli_query($koneksi, $query);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['telepon'] . "</td>";
                echo "<td>
                    <a href='edit.php?id=" . $row['id'] . "' class='btn'>Edit</a>
                    <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-hapus' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Data tidak ditemukan</td></tr>";
        }
        ?>
    </table>
</body>
</html>