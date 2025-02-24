<?php 
$nama = $_POST['nama'];
// nama dalam input
if (empty($nama)) {
  echo "halo $nama";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GET, bukan untuk password</title>
</head>
<body>
  <!-- menjalankannya dimana untuk action -->
  <form action="get.php" method="post" autocomplete="off">
    <label for="nama">nama :</label>
    <input type="text" name="nama">
    <input type="submit" value="kirim">
  </form>

  <h1>Selamat datang <?php echo $nama?> </h1>
</body>
</html>