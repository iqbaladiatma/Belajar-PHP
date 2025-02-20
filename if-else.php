<?php

// $pilihan_angka = 9;

// if ($pilihan_angka > 5 && $pilihan_angka <= 10) {
//   echo "Kamu memilih angka lebih dari 5. Angka yang kamu pilih adalah: $pilihan_angka<br />";
// } elseif ($pilihan_angka < 5 && $pilihan_angka > 0) {
//   echo "Kamu memilih angka kurang dari 5. Angka yang kamu pilih adalah: $pilihan_angka<br />";
// } else {
//   echo "Angka nol atau angka lebih dari 10 tidak termasuk ya..";
// }

// $nilai = 70;
// if ($nilai == 90) {
//   echo ('benar');
// } elseif ($nilai == 70) {
//   echo ('Bagus ni');
// } else {
//   echo ('salah nih');
// }

// ganda
// salah satunya benar maka bisa
// if (true && false) {
//   echo ('Correct');
// } else {
//   echo ('salah Tuh');
// }

// $nilaiIjazah = 11;
// $sertifikat = 10;

// if ($nilaiIjazah < 70 && $sertifikat < 10) {
//   echo 'Belajar lagi uyy';
// } elseif ($nilaiIjazah >= 70 && $sertifikat >= 10) {
//   echo 'Anda Lulus Tes Masuk SAT';
// } elseif ($sertifikat <= 10 || $nilaiIjazah <= 90) {
//   echo 'Nanti Lagi aja';
// } else {
//   echo 'Jadi Marbot Aja Tuh di Masjdil Haram';
// }

// $wancara = "jelek";
// $partek = "jelek";

// if ($wancara == "kompeten") {
//   if ($partek == "kompeten") {
//     // ini kodingan ketika lulus wawancara & praktek
//     echo "Congrats,Kamu Diterima Kerja";
//   }
//   else {
//     echo "partek jelek";
//   }
// } else {
//   if ($partek == "kompeten") {
//     echo "wancaramu jelek";
//   }
//   else {
//     echo "cacad";
//   }
// }

$planet = 'Jupiter';

switch ($planet) {
  case 'Bulan':
      echo "Kita tinggal di Bulan.";
      // fungsi break,pembatas
      break;

  case 'Bumi':
      echo "Kita tinggal di Bumi.";
      break;

  case 'Jupiter':
      echo "Kita tinggal di Jupiter.";
      break;

  case 'Mars':
      echo "Kita tinggal di Mars.";
      break;

  default:
      echo "Planet tidak dikenali.";
      break;
}
