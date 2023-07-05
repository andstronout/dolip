<?php
session_start();
require 'koneksi.php';
$koneksi = koneksi();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>D-OLIP | Anggota</title>

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

    <!-- Begin Page Content -->
    <div class="container-fluid col-md-8">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4 py-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pendaftar Anggota Baru</h1>
      </div>

      <!-- Content Row -->
      <div class="row" style="margin-top: -30px;">
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <form action="pendaftaran_oke.php" method="post">
                <div class="mb-3">
                  <label for="exampleInputName1" class="form-label">Nama Lengkap</label>
                  <input type="nama" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Masukan nama" name="nama" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputnpm1" class="form-label">Nomor Pokok Mahasiswa</label>
                  <input type="npm" class="form-control" id="exampleInputnpm1" aria-describedby="npmHelp" placeholder="Masukan Nomor Pokok Mahasiswa" name="npm" required>
                </div>
                <div class="mb-3">
                  <label for="select-barang" class="form-label">Jurusan</label><br>
                  <select class="form-select" aria-label=".form-select-lg example" id="select-jurusan" placeholder="-- Pilih Jurusan --" name="jurusan">
                    <option selected disabled>-- Pilih Jurusan --</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Akutansi">Akutansi</option>
                    <option value="Manajemen">Manajemen</option>
                    <option value="Sistem Informasi Akutansi">Sistem Informasi Akutansi</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputnomorhp1" class="form-label">Nomor Handphone</label>
                  <input type="nomorhp" class="form-control" id="exampleInputnomorhp1" placeholder="Masukan Nomor Handphone" name="nomorhp" required>
                </div>
                <div class="mb-3">
                  <label for="select-barang" class="form-label">Cabang Olahraga</label><br>
                  <select class="form-select" aria-label=".form-select-lg example" id="select-cabor" placeholder="-- Pilih Cabang Olahraga --" name="cabor">
                    <option selected disabled>-- Pilih Cabang Olahraga --</option>
                    <option value="Sepak Bola">Sepak Bola</option>
                    <option value="Basket">Basket</option>
                    <option value="Silat">Silat</option>
                    <option value="Futsal">Futsal</option>
                    <option value="Badminton">Badminton</option>
                  </select>
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
    $sql = $koneksi->query("SELECT * FROM anggota");
    $hasil = $sql->fetch_assoc();
    $npm = $hasil['npm'];
    if ($npm == $_POST['npm']) {
      echo '
      <script type="text/javascript">
        alert("Data anda sudah teregistrasi");
        window.location.href = "pendaftaran_anggota.php";
      </script>';
    } else {
      $query = $koneksi->query("INSERT INTO anggota (nama, npm, jurusan, cabor, nomorhp) VALUES ('$_POST[nama]','$_POST[npm]','$_POST[jurusan]','$_POST[cabor]','$_POST[nomorhp]')");
      echo '
      <script type="text/javascript">
        alert("Data anggota Berhasil Disimpan");
        window.location.href = "pendaftaran_oke.php";
      </script>';
    }
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