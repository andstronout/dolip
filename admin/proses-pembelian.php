<?php
session_start();
$id = $_GET['id'];
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

  <title>D-OLIP | Produk</title>

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
        <h1 class="h3 mb-0 text-gray-800">Tambahkan Produk Merchandise</h1>
      </div>

      <!-- Content Row -->
      <div class="row">
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <?php
              $query = $koneksi->query("SELECT * FROM pembelian_produk INNER JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE id_pembelian_produk='$id'") or die(mysqli_error($koneksi));
              $sql = $query->fetch_assoc();
              ?>
              <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="exampleInputName1" class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" value="<?= $sql['namaProduk']; ?>" readonly>
                </div>
                <div class="mb-3">
                  <label for="exampleInputName1" class="form-label">Jumlah Pembelian</label>
                  <input type="text" class="form-control" value="<?= $sql['jumlah']; ?>" readonly>
                </div>
                <div class="mb-3">
                  <select class="form-select" aria-label="Default select example" name="status">
                    <option value="<?= $sql['status']; ?>" selected><?= $sql['status']; ?></option>
                    <option value="Sedang Diproses">Sedang Diproses</option>
                    <option value="Sudah Diproses">Sudah Diproses</option>
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
    if ($_POST['status'] != null) {
      $query = $koneksi->query("UPDATE pembelian_produk SET `status` = '$_POST[status]' WHERE id_pembelian_produk='$sql[id_pembelian_produk]'") or die(mysqli_error($koneksi));
      echo "
        <script>
        alert('Status Berhasil Diubah!');
        document.location.href='daftar-penjualan.php';
        </script>
        ";
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