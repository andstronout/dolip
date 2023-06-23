<?php
require '../koneksi.php';
$koneksi = koneksi();
$sql = "DELETE FROM kegiatan WHERE id_kegiatan='$_GET[id]'";
?>
<script>
  if (confirm("yakin?") == true) {
    <?php
    $koneksi->query($sql);
    ?>
    document.location.href = 'daftar-kegiatan.php';
  } else {
    document.location.href = 'daftar-kegiatan.php';
  }
</script>