<?php
require '../koneksi.php';
session_start();
$koneksi = koneksi();

if (isset($_SESSION['login_pelanggan'])) {
  header("location:../index.php");
}

if (isset($_POST['simpan'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = $koneksi->query("SELECT * FROM pelanggan WHERE email='$email' AND `password`='$password'");
  $query = $sql->fetch_assoc();

  if ($query != null) {
    $_SESSION['login_pelanggan'] = true;
    $_SESSION['id_pelanggan'] = $query['id_pelanggan'];
    $_SESSION['nama_pelanggan'] = $query['nama_pelanggan'];
    $_SESSION['nomorHp_pelanggan'] = $query['nomorHp'];
    $_SESSION['email_pelanggan'] = $query['email'];
    header("location:../index.php");
  } else {
    echo "
    <script>
    alert('Email atau Password salah');
    document.location.href = 'login.php';
    </script>
    ";
  }
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

<body class="bg-info">
  <div class="container">
    <section class="vh-100">
      <div class="container py-5 h-100 col-md-10">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-8 col-lg-5 col-xl-5">
            <img src="../image/produk/login.png" class="img-fluid" alt="Phone image" width="500px">
          </div>
          <div class="col-md-7 col-lg-6 col-xl-6 offset-xl-1">
            <form method="POST">
              <div class="form-outline mb-4">
                <h3>Login </h3>
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
              <button type="submit" class="btn btn-outline-success" style="width: 140px;" name="simpan">Sign in</button>
              <a href="registrasi.php" class="px-2">Belum punya akun?</a>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php


    ?>
  </div>
</body>

</html>