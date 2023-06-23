<?php
session_start();
require '../koneksi.php';
$conn = koneksi();

if (isset($_POST['simpan'])) {

  // ambil data login
  $email = $_POST['email'];
  $password = $_POST['password'];

  echo '<pre>';
  print_r($email, $password);
  echo '</pre>';
}




// ambil data di db
$query = $conn->query("SELECT * FROM akses WHERE email='$email' AND `password`='$password'") or die(mysqli_error($conn));
$result = $query->fetch_assoc();
$id = $result['id_akses'];


if ($id != NULL) {
header("location:index.php");
} else {
echo "
<script>
  alert('No');
</script>;
";
}
