<?php
require '../koneksi.php';
$koneksi = koneksi();
session_start();
$kosong = [];
// echo '<pre>';
// print_r($tanggal);
// echo '</pre>';


if (!isset($_SESSION['login_pelanggan'])) {
  echo '
  <script>
    alert("Silahkan login terlebih dahulu!");
    document.location.href = "../user/login.php";
  </script>
  ';
} else if ($_SESSION['keranjang'] == $kosong) {
  echo '
  <script>
    alert("Keranjang Kosong, pilih barang terlebih dahulu!");
    document.location.href = "..//index.php#product";
  </script>
    ';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Belanja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body style="background-color: #eee;">
  <section class="container ">
    <section class="h-100">
      <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
              <h3 class="fw-normal mb-0 text-black">Keranjang Belanja</h3>
            </div>
            <?php
            $totalbayar = 0;
            foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :
              $sq = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
              $hasil = $sq->fetch_assoc();
              $subharga = $hasil['harga'] * $jumlah;
              $totalbayar += $hasil['harga'] * $_SESSION['keranjang'][$id_produk];

            ?>
              <div class="card rounded-3 mb-4">
                <div class="card-body p-4">
                  <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img src="../image/produk/<?= $hasil['gambar']; ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2"><?= $hasil['namaProduk']; ?></p>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3" style="display: inline;">
                      <p class="lead fw-normal mb-2">Qty : <?= $jumlah; ?></p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h5 class="mt-0 ">Total Harga :</h5>
                      <h6 class="mb-0">Rp.<?= number_format($subharga); ?></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="hapus_item.php?id=<?= $hasil['id_produk']; ?>" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            endforeach;
            ?>
            <div class="card mb-4">
              <div class="card-body p-4">
                <div>
                  <div class="alert alert-info" role="alert">
                    <h4 class="text-end">Total Pembayaran : Rp. <?= number_format($totalbayar); ?>,-</h4>
                    Lakukan pembayaran secara transfer pada :
                    <br> BNI : <b>123123123</b>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <a href="../index.php" class="btn btn-info btn-block ">Kembali Ke Menu Utama</a>
                <form action="" method="post">
                  <button type="submit" class="btn btn-warning btn-block " name="simpan">Proceed to Pay</button>
                </form>
              </div>
            </div>
            <?php
            if (isset($_POST['simpan'])) {
              $id_pelanggan = $_SESSION['id_pelanggan'];
              $tanggal_pembelian = date("y-m-d");
              $total_pembelian = $totalbayar;
              // simpan tabel pembelian
              $koneksi->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,total_pembelian) VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian')");

              // simpan tabel pembelian produk
              $id_pembelian = $koneksi->insert_id;
              foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
                $koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah, `status`) VALUES ('$id_pembelian','$id_produk','$jumlah','Belum Diproses')");
              }
              echo
              '<script>
              alert("Pembelian Sukses");
              </script>';
              echo "
              <script>
              window.location.href='checkout.php?id=$id_pembelian';
              </script>";

              unset($_SESSION['keranjang']);
            }

            ?>

          </div>
        </div>
      </div>
    </section>
  </section>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>