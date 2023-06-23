<?php
session_start();
require '../koneksi.php';
$koneksi = koneksi();

if (!isset($_SESSION["login"])) {
  header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>D-OLIP | Pelanggan</title>

  <!-- Custom fonts for this template-->
  <link href="../sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  <!-- Bootstrap Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include('../layout/sidebar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Registrasi</h1>
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <form method="post">
                <div class="mb-3">
                  <label for="exampleInputName1" class="form-label">Nama Lengkap</label>
                  <input type="nama" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Masukan nama" name="nama_pelanggan" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputemail1" class="form-label">Email</label>
                  <input type="email" class="form-control" id="exampleInputemail1" aria-describedby="emailHelp" placeholder="Masukan Nomor Pokok Mahasiswa" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputnomorHp1" class="form-label">Nomor Handphone</label>
                  <input type="nomorHp" class="form-control" id="exampleInputnomorHp1" placeholder="Masukan Nomor Handphone" name="nomorHp" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputpassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputpassword1" placeholder="Masukan Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-success col-2 " name="simpan">Simpan</button>

              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <?php
  if (isset($_POST['simpan'])) {
    $query = $koneksi->query("INSERT INTO pelanggan (nama_pelanggan, email, nomorHp, `password`) VALUES ('$_POST[nama_pelanggan]','$_POST[email]','$_POST[nomorHp]','$_POST[password]')");
    echo '
      <script type="text/javascript">
        alert("Registrasi Berhasil");
        window.location.href = "daftar-pelanggan.php";
      </script>';
  }

  ?>


  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; D-Olip Insan Pembangunan 2023</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="../sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="../sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../sbadmin/js/sb-admin-2.min.js"></script>

</body>

</html>