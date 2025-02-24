<?php

$minuman = ["coca-cola", "sprite", "air zam-zam", "fanta"];
foreach ($minuman as $minum) {
  if ($minum == "coca-cola") {
    continue;
    // skip coca-cola dan lanjut
  }
  echo "Saya Mencari $minum <br>";
}
