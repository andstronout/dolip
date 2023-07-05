<?php
session_start();
require 'koneksi.php';
$koneksi = koneksi();


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bem Eksekutif Mahasiswa - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>D-OLIP<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#product">Product</a></li>
          <li><a href="#team">Team</a></li>
          <li class="dropdown dropstart">
            <?php
            if (!isset($_SESSION['login_pelanggan'])) {
            ?>
              <a href="#" class="px-5">Login</a>
            <?php
            } else {
            ?>
              <a href="#" class="text-end">Halo <br> <?= $_SESSION['nama_pelanggan']; ?></a>
            <?php
            }
            ?>
            <ul>
              <div class="text-end">
                <?php
                if (!isset($_SESSION['login_pelanggan'])) {
                ?>
                  <li>
                    <a href="user/login.php">Login</a>
                  </li>
                <?php
                }
                ?>
                <li>
                  <a href="penjualan/keranjang.php">Keranjang Belanja</a>
                </li>
                <li><a href="user/ubah.php">Ubah Profile</a></li>
                <li><a href="user/logout.php">Logout</a></li>
              </div>
            </ul>

          </li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to <span>D-OLIP</span></h2>
          <p>Departemen Olahraga Insan Pembangunan </p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="pendaftaran_anggota.php" class="btn-get-started">Daftar Menjadi Anggota</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/sammy-workout.gif" class="img-fluid px-5" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero Section -->

  <!-- GET WAVE  -->
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#008374" fill-opacity="1" d="M0,192L30,197.3C60,203,120,213,180,213.3C240,213,300,203,360,192C420,181,480,171,540,144C600,117,660,75,720,64C780,53,840,75,900,112C960,149,1020,203,1080,208C1140,213,1200,171,1260,181.3C1320,192,1380,256,1410,288L1440,320L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
  </svg>
  <!-- END GET WAVE -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container  py-4" data-aos="fade-up">
        <?php
        $sq = $koneksi->query("SELECT * FROM kegiatan");
        $do = $sq->fetch_assoc();
        ?>

        <div class="section-header">
          <h2>About Us</h2>
          <p>Kegiatan dan aktivitas yang di jalani Unit Kegiatan Mahasiswa Departemen Olahraga Insan Pembangunan</p>
        </div>
        <!-- Kegiatan -->
        <section id="news" style="background-color: #54bab9;">
          <div class="container">
            <?php
            $sq = mysqli_query($koneksi, "select * from kegiatan");
            while ($da = mysqli_fetch_array($sq)) {
            ?>
              <div class="card mb-3 shadow" data-aos="fade-right">
                <div class="row g-0 kegiatan mb-3 ">
                  <div class="col-md-4">
                    <img src="image/kegiatan/<?php echo $da['gambar'] ?>" class="img-fluid rounded-start" alt="<?php echo $da['namaKegiatan'] ?>" />
                  </div>
                  <div class="col-md-4">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $da['namaKegiatan'] ?></h5>
                      <p class="card-text"><?php echo $da['deskripsi'] ?></p>
                      <p class="card-text"><small class="text-muted"><?php echo $da['tanggal'] ?></small></p>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
              <path fill="#54bab9" fill-opacity="1" d="M0,160L40,138.7C80,117,160,75,240,101.3C320,128,400,224,480,224C560,224,640,128,720,80C800,32,880,32,960,69.3C1040,107,1120,181,1200,192C1280,203,1360,149,1400,122.7L1440,96L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
            </svg>
          </div>

        </section>
        <!-- /Kegiatan -->

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= product Section ======= -->
    <section id="product" class="portfolio sections-bg">
      <div class="container py-4" data-aos="fade-up">
        <div class="section-header" style="margin-bottom: -70px;">
          <h2>Our Product</h2>
        </div>
        <?php
        if (isset($_SESSION['keranjang'])) { ?>
          <div class="alert alert-info" role="alert" style="height: 50px;">
            <h6 class="text-center">Ada barang di keranjang, Silahkan dicheckout!</h6>
          </div>
        <?php } ?>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4 portfolio-container">
            <?php
            $query = $koneksi->query("SELECT * FROM produk");
            while ($hasil = $query->fetch_assoc()) {
            ?>
              <div class="col-xl-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <a href="image/produk<?= $hasil['gambar']; ?>" data-gallery="portfolio-gallery-app" class="glightbox"><img src="image/produk/<?= $hasil['gambar']; ?>" class="img-fluid" alt="" style=" background-size: cover; height: 280px;">
                  </a>
                  <div class="portfolio-info">
                    <h4><a href="portfolio-details.html" title="More Details"><?= $hasil['namaProduk']; ?></a></h4>
                    <small>Rp.<?= number_format($hasil['harga']); ?></small>
                    <p class="mb-1"><?= $hasil['deskripsi']; ?></p>
                    <form action="penjualan/temporary_cart.php?id=<?= $hasil['id_produk'] ?>" method="post">
                      <label for="jumlah">Jumlah :</label>
                      <input type="number" name="jumlah" class="form-control" style="width: 60px; display:inline;" value="1">
                      <br>
                      <input type="submit" class="btn btn-success mt-3" value="Tambah ke keranjang" name="simpan">
                    </form>
                  </div>
                </div>
              </div><!-- End Product Item -->
            <?php } ?>

          </div><!-- End Product Container -->
        </div>
      </div>
    </section><!-- End Product Section -->

    <!-- ======= Our Divisi Section ======= -->
    <section id="team" class="team ">
      <div class=" container py-3 " data-aos="fade-up">

        <div class="section-header">
          <h2>Cabang Olahraga</h2>
          <p>Cabang olahraga yang ada di D-OLIP Universitas Insan Pembangunan Indonesia</p>
        </div>

        <div class="row gy-4 d-flex justify-content-center">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="image/divisi/badminton.jpg" class="img-fluid" alt="">
              <h4>Badminton</h4>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="image/divisi/catur.jpg" class="img-fluid" alt="">
              <h4>Olahraga Catur</h4>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="image/divisi/futsal.jpg" class="img-fluid" alt="">
              <h4>Olahraga Futsal</h4>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="image/divisi/silat.jpg" class="img-fluid" alt="">
              <h4>Olahraga Silat</h4>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-md-6 d-flex d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="image/divisi/sepakbola1.jpg" class="img-fluid" alt="" style="max-height: 300px;background-size: cover;">
              <h4>Olahraga Sepak Bola</h4>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="image/divisi/taekwondo.jpg" class="img-fluid" alt="">
              <h4>Olahraga Taekwondo</h4>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="image/divisi/tenismeja.jpg" class="img-fluid" alt="" style="max-height: 300px;background-size: cover;">
              <h4>Olahraga Tenis Meja</h4>
            </div>
          </div><!-- End Team Member -->



        </div>

      </div>
    </section><!-- End Our Team Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>D-Olip</span></strong>. Universitas Insan Pembangunan
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>