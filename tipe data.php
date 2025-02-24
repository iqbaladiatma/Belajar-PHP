<?php

$nama = "Alif"; // string
$umur = 15; // integer
$tinggi = 170.5; // float
$isStudent = true; //boolean

echo "Nama Saya $nama dan umur <br> saya adalah $umur dan tinggi saya $tinggi
 dan saya $isStudent <b>seorang Siswa</b> Di IDN Boarding School Solo";
$namaku = "Azzam Auju";

// echo "$nama" . "$umur" . "$tinggi";
echo ("<br/>");
// function bawaan
 echo ucwords("azam");
 echo strtoupper("ada lagi");

//  function
function halo() {
  $ajan = "";
}
halo()

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ini HTML + PHP</title>
</head>

<body>
  <h1>Judul Sangat Besar Ini di HTML</h1>

  <p>Nama Saya <?php echo $namaku ?> </p>
  <p>Nama Saya <?php echo "Umar" ?> </p>
</body>

</html>