<?php
require '../koneksi.php';
$koneksi = koneksi();
$sql = "DELETE FROM anggota WHERE id_anggota='$_GET[id]'";
?>
<script>
  if (confirm("yakin?") == true) {
    <?php
    $koneksi->query($sql);
    ?>
    document.location.href = 'daftar-anggota.php';
  } else {
    document.location.href = 'daftar-anggota.php';
  }
</script>