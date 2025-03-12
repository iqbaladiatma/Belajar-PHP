<?php 
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM tb_todo");

$terjemahanArray = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TODO List</h1>
    <a href="form.php">Tambah Pekerjaan</a>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Pekerjaan</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($terjemahanArray as $index => $warga) :?>
                <tr>
                    <td><?php echo $warga['id']?></td>
                    <td><?php echo $warga['task']?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>