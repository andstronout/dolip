<?php
require '../koneksi.php';
$koneksi = koneksi();
$sql = "DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'";
?>
<script>
  if (confirm("yakin?") == true) {
    <?php
    $koneksi->query($sql);
    ?>
    document.location.href = 'daftar-pelanggan.php';
  } else {
    document.location.href = 'daftar-pelanggan.php';
  }
</script>