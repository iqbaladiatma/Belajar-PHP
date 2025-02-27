<?php 
$orang = ["nama", "umur","alamat", "pekerjaan"];
$manusia = [
  "nama" => "Azam",
  "umur" => 17,
  "alamat" => "Solo",
  "pekerjaan" => "Mahasiswa",
];

echo $orang[2];
echo "<br>";
echo $manusia["pekerjaan"];
// perkenalan
echo "<br>";
echo "Nama Saya $manusia[nama] dan umur saya $manusia[umur] dan saya tinggal di $manusia[alamat] dan saya seorang $manusia[pekerjaan]";

?>