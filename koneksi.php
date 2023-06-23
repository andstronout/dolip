<?php
function koneksi()
{
  $conn = new mysqli('localhost', 'root', '', 'dolip') or die('Koneksi gagal');
  return $conn;
}
