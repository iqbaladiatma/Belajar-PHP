<?php
$array = ["ayam", "soto", "nasi"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <table border="1">
    <thead>
      <tr>
        <th>Makanan</th>
        <th>Makanan</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($array as $makanan) : ?>
        <td> <?php echo $makanan ?> </td>
      <?php endforeach ?>
    </tbody>
  </table>
</body>

</html>