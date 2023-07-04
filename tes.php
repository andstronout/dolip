<?php
session_start();
require 'koneksi.php';
$koneksi = koneksi();
$i = $_SESSION['keranjang'];
$sq = $koneksi->query("select id_produk from produk");
while ($que = $sq->fetch_assoc()) {
  var_dump($que);
}

$a = 0;
$x = 2;

echo '<pre>';
print_r($_SESSION['keranjang']);
echo '</pre>';
while ($x > $a) {
  $a++;
}

$subharga = $hasil['harga'] * $jumlah;
$totalbayar = 0;
$totalbayar += $subharga;
echo '<pre>';
var_dump($totalbayar);
echo '</pre>';
for ($i = 0; $i < count($_SESSION['keranjang']); $i++) {
  $totalbayar += $subharga;
}
