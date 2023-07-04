<?php
session_start();
require '../koneksi.php';
$koneksi = koneksi();
$id = $_SESSION['id_pelanggan'];

$sql = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$hasil = $sql->fetch_assoc();


if (isset($_POST['simpan'])) {
  $nama_pelanggan = $_POST['nama_pelanggan'];
  $email = $_POST['email'];
  $nomorHp = $_POST['nomorHp'];
  $password = md5($_POST['passwordBaru']);
  $passwordLama = md5($_POST['passwordLama']);
  $update = ("UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan',email='$email',nomorHp='$nomorHp',`password`='$password' WHERE id_pelanggan='$id'");

  if ($hasil['password'] != $passwordLama) {
    echo "
  <script>
  alert('Silahkan masukan kata sandi lama dengan benar!');
  </script>
  ";
  } else {
    if ($koneksi->query($update) or die(mysqli_error($koneksi)) === true) {
      echo "
              <script>
                alert('data berhasil diubah!');
                document.location.href = '../index.php';
              </script>
            ";
    } else {
      echo "
              <script>
                alert('data gagal diubah!');
                document.location.href = '../index.php';
              </script>
            ";
    }
  }


  // $query = $koneksi->query("INSERT INTO pelanggan (, , nomorHp, ) VALUES ('',,)");
  // echo "
  // <script>
  // alert('Registrasi berhasil, Silahkan melakukan Login!');
  // window.location.href='login.php';
  // </script>
  // ";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login user</title>
  <link rel="stylesheet" href="../assets/css/css-login.css">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container">
    <section class="vh-100">
      <div class="container py-5 h-100 col-md-10">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-7 col-lg-4 offset-xl-1">
            <form method="post">
              <div class="form-outline mb-2">
                <h3>Edit Profile Akun Anda</h3>
              </div>
              <!-- Email input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="form1Example13">Nama Lengkap</label>
                <input type="text" id="form1Example13" class="form-control form-control-lg" name="nama_pelanggan" value="<?= $hasil['nama_pelanggan']; ?>" required />
              </div>
              <!-- Email input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="form1Example13">Nomor Handphone</label>
                <input type="number" id="form1Example13" class="form-control form-control-lg" name="nomorHp" value="<?= $hasil['nomorHp']; ?>" required />
              </div>
              <!-- Email input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="form1Example13">Email address</label>
                <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" value="<?= $hasil['email']; ?>" required />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="form1Example23">Password Lama</label>
                <input type="password" id="form1Example23" class="form-control form-control-lg" name="passwordLama" required />
              </div>
              <!-- Password input -->
              <div class="form-outline mb-2">
                <label class="form-label" for="form1Example23">Password Baru</label>
                <input type="password" id="form1Example23" class="form-control form-control-lg" name="passwordBaru" required />
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-outline-success" style="width: 140px;" name="simpan">Ubah Akun</button>
            </form>
          </div>
          <div class="col-md-8 col-lg-5 ">
            <img src="../image/produk/registrasi.png" class="img-fluid" alt="Phone image" width="500px">
          </div>
        </div>
      </div>
    </section>

  </div>
</body>

</html>