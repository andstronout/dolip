<?php
// $id_pembelian = $_GET['id'];
$id_pembelian = 11;
require '../koneksi.php';
$koneksi = koneksi();
$query = $koneksi->query("SELECT * FROM pembelian INNER JOIN pembelian_produk ON pembelian.id_pembelian=pembelian_produk.id_pembelian INNER JOIN produk ON produk.id_produk=pembelian_produk.id_produk INNER JOIN pelanggan ON pelanggan.id_pelanggan=pembelian.id_pelanggan WHERE pembelian.id_pembelian=$id_pembelian");
$sql = $query->fetch_assoc();
//   echo '<pre>';
//   print_r($sql);
//   echo '</pre>';
?>


<!DOCTYPE html>
<html>

<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <style type="text/css">
    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    img {
      -ms-interpolation-mode: bicubic;
    }

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }


    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    @media screen and (max-width: 480px) {
      .mobile-hide {
        display: none !important;
      }

      .mobile-center {
        text-align: center !important;
      }
    }

    div[style*="margin: 16px 0;"] {
      margin: 0 !important;
    }
  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">


  <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    For what reason would it be advisable for me to think about business content? That might be little bit risky to have crew member like them.
  </div>

  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">

        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
          <tr>
            <td align="center" style="padding: 0px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
              <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                <tr>
                  <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                    <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                    <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                      Thank You For Your Order!
                    </h2>
                  </td>
                </tr>
                <tr>
                  <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                    <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                      Pesanan anda akan kami proses setelah anda mengirimkan bukti transfer ke WhatsApp Admin.
                    </p>
                  </td>
                </tr>
                <tr>
                  <td align="left" style="padding-top: 20px;">
                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                      <tr>
                        <td width="55%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 800; line-height: 24px; padding: 10px;">
                          Order Confirmation #
                        </td>
                        <td width="45%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 800; line-height: 24px; padding: 10px;">
                          MERCH- <?= $sql['tanggal_pembelian'] . '-' . $sql['id_pembelian']; ?>
                        </td>
                      </tr>
                      <?php
                      $query = $koneksi->query("SELECT * FROM pembelian INNER JOIN pembelian_produk ON pembelian.id_pembelian=pembelian_produk.id_pembelian INNER JOIN produk ON produk.id_produk=pembelian_produk.id_produk INNER JOIN pelanggan ON pelanggan.id_pelanggan=pembelian.id_pelanggan WHERE pembelian.id_pembelian=$id_pembelian");
                      while ($hasil = $query->fetch_assoc()) {
                      ?>
                        <tr>
                          <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            <?= $hasil['namaProduk']; ?>
                          </td>
                          <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                            <?php
                            $total = $hasil['harga'] * $hasil['jumlah'];
                            echo 'Rp.' . number_format($total) . ',-';
                            ?>
                          </td>
                        </tr>
                      <?php } ?>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td align="left" style="padding-top: 20px;">
                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                      <tr>
                        <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                          TOTAL
                        </td>
                        <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                          <?php echo 'Rp.' . number_format($sql['total_pembelian']) . ',-'; ?>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>

            </td>
          </tr>
          <tr>
            <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">
              <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                <tr>
                  <td align="center" valign="top" style="font-size:0;">
                    <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">

                      <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                        <tr>
                          <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                            <p style="font-weight: 800;">Info Pelanggan</p>
                            <p><?= $sql['nama_pelanggan']; ?><br><?= $sql['email']; ?><br><?= $sql['nomorHp']; ?></p>

                          </td>
                        </tr>
                      </table>
                    </div>
                    <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                      <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                        <tr>
                          <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                            <p style="font-weight: 800;">Konfirmasi Bukti Transfer</p>
                            <p><b>Sampai : </b>
                              <?php
                              $Date = $sql['tanggal_pembelian'];
                              echo date('d-F-Y', strtotime($Date . ' + 2 days'));
                              ?></p>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td align="center" style=" padding: 35px; background-color: #00b6a1;" bgcolor="#1b9ba3">
              <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                <tr>
                  <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                    <h2 style="font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;">
                      Konfirmasi Pesanan Anda
                    </h2>
                  </td>
                </tr>
                <tr>
                  <td align="center" style="padding: 25px 0 15px 0;">
                    <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="center" style="border-radius: 5px;">
                          <a href="https://wa.me/6281287276707?text=Halo%20min%0ASaya%20<?= $sql['nama_pelanggan']; ?>%0AMau%20info%20kalo%20udah%20beli%20barang%0AInvoicenya%20MERCH-<?= $sql['tanggal_pembelian'] . '-' . $sql['id_pembelian']; ?>" target="_blank" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #0c584f; padding: 15px 30px; border: 1px; display: block;">Konfirmasi </a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>