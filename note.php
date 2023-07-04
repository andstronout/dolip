<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<?php
$id = 1;
if (isset($_POST['simpan'])) {
  echo 'ok';
  var_dump($_GET['id']);
}
?>

<body>
  <form action="note.php?id=<?= $id; ?>" method="post">
    <label>
      username
      <input type="text" name="username">
    </label>
    <input type="submit" value="simpan" name="simpan">
  </form>
</body>

</html>