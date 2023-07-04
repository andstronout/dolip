<?php
require '../koneksi.php';
$koneksi = koneksi();


if (isset($_POST['simpan'])) {
  $nama_pelanggan = $_POST['nama_pelanggan'];
  $email = $_POST['email'];
  $nomorHp = $_POST['nomorHp'];
  $password = md5($_POST['password']);
  $query = $koneksi->query("INSERT INTO pelanggan (nama_pelanggan, email, nomorHp, `password`) VALUES ('$nama_pelanggan','$email','$nomorHp','$password')");
  echo "
  <script>
  alert('Registrasi berhasil, Silahkan melakukan Login!');
  window.location.href='login.php';
  </script>
  ";
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
          <div class="col-md-7 col-lg-6 col-xl-6 offset-xl-1">
            <form method="post">
              <div class="form-outline mb-4">
                <h3>Registrasi Akun Anda</h3>
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form1Example13">Nama Lengkap</label>
                <input type="text" id="form1Example13" class="form-control form-control-lg" name="nama_pelanggan" required />
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form1Example13">Nomor Handphone</label>
                <input type="number" id="form1Example13" class="form-control form-control-lg" name="nomorHp" required />
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form1Example13">Email address</label>
                <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" required />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form1Example23">Password</label>
                <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" required />
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-outline-success" style="width: 140px;" name="simpan">Buat Akun</button>
              <a href="login.php" class="px-2">Sudah punya akun?</a>
            </form>
          </div>
          <div class="col-md-8 col-lg-5 col-xl-5">
            <img src="../image/produk/registrasi.png" class="img-fluid" alt="Phone image" width="500px">
          </div>
        </div>
      </div>
    </section>

  </div>
</body>

</html>