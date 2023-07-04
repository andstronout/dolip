<?php
session_start();
require '../koneksi.php';
$koneksi = koneksi();

$id = $_GET['id'];
var_dump($id);

echo '<pre>';
print_r($_SESSION['keranjang']);
echo '</pre>';


$sql = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id'") or die(mysqli_error($koneksi));
$query = $sql->fetch_assoc();

if (!isset($_SESSION['keranjang'][$id])) {
  $_SESSION['keranjang'][$id] = $_POST['jumlah'];
}

header("location:../index.php#product");
