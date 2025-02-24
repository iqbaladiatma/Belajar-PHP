<?php

// $array = ["Dori", "Ayam", "Ikan"];
// $panjangArray = count($array);

// for ($i = 0; $i < $panjangArray; $i++) {
//   echo " Makanan Hari ini Adalah $array[$i]" . "<br>";
// }

// $array = ["Dori" => 'Ikan Enak', "Ayam" => "Daging Enak", "Ikan" => "ikan Yaa Lumayan"];
// // foreach ($array as $makanan => $value) {
// //   echo ucfirst($makanan) . '=' .  $value . "<br>";
// // }

// foreach ($array as $makanan) {
//   echo ucfirst($makanan) . "<br>";
// }

$array = ["nasi", "ayam", "krupuk", "soto"];
foreach ($array as $makanan) {
  echo "Makanan Hari ini $makanan <br>";
  if ($makanan == "ayam") {
    echo "saya makan ayam <br>";
    break;
  }
}