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

  <title>D-OLIP | Penjualan</title>

  <!-- Custom fonts for this template-->
  <link href="../sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- dataTable URL -->
  <link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.css" rel="stylesheet" />
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include('../layout/sidebar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Penjualan Merchandise</h1>
      </div>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Pembelian</th>
                  <th>Nama Pembeli</th>
                  <th>Nomor Handphone</th>
                  <th>Tanggal Pembelian</th>
                  <th>Total Harga Pembelian</th>
                  <th width=20%>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = $koneksi->query("SELECT * FROM pembelian INNER JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan ORDER BY id_pembelian DESC");
                $no = 1;
                while ($data = $sql->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td>MERCH-<?= $data['tanggal_pembelian'] . '-' . $data['id_pembelian']; ?></td>
                    <td><?= $data['nama_pelanggan']; ?></td>
                    <td><?= $data['nomorHp']; ?></td>
                    <td><?= $data['tanggal_pembelian']; ?></td>
                    <td><?= $data['total_pembelian']; ?></td>
                    <td>
                      <a href="detail-pembelian.php?id=<?= $data['id_pembelian']; ?>" class="btn btn-info btn-icon-split btn-sm">
                        <span class="icon text-white-50">
                          <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Lihat Detail Pembelian</span>
                      </a>
                    </td>
                  <?php } ?>
                  </tr>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

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

  <!-- Page level plugins -->
  <script src="../sbadmin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../sbadmin/js/demo/chart-area-demo.js"></script>
  <script src="../sbadmin/js/demo/chart-pie-demo.js"></script>

  <!-- dataTable -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            title: 'Data Penjualan',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5]
            }
          },
          {
            extend: 'pdfHtml5',
            title: 'Data Penjualan',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5]
            }
          }
        ]
      });
    });
  </script>

</body>

</html>