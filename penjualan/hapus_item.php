<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['keranjang'][$_GET['id']]);
header('location:keranjang.php');
