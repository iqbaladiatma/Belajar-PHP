<?php 
$form = "formulir";
$nama = "azam";
if (isset($form)) {
  echo "ada form";
} else {
  echo "tidak ada form";
}
// fungsi mencari yang kosong, jika ada form maka tidak kosong
if (empty($nama)) {
  echo "ada form";
} else {
  echo "tidak ada form";
}
?>