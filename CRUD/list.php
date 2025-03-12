<?php 
include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM tb_warga");
$terjemahan = mysqli_fetch_all($query, mode: MYSQLI_ASSOC);
// terjemahkan ke array Asosiatif


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <table border="1">
    <thead>
      <tr>
        <th>id</th>
        <th>nama</th>
        <th>umur</th>
        <th>alamat</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($terjemahan as $utama => $warga): ?>
        <tr>
          <td> <?php echo $warga + 1; ?> </td> <!-- Menampilkan nilai -->
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>