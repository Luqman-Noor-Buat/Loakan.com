<?php

session_start();
//cek login level admin
if(!isset($_SESSION["login"]) || $_SESSION['level1']!='admin'){
  header("location:masuk.php");
}
include "koneksi.php";
$id_icon = $_GET['id'];

$sql ="DELETE FROM icon WHERE id_icon=$id_icon";
$hasil = mysqli_query($conn, $sql);
if(!$hasil){
    echo "
    <script>
      alert('Anda gagal menghapus data, silahkan coba kembali :(');
      document.location.href='admin.php';   
    </script>
    ";
}else{
    echo "
    <script>
      alert('Anda telah berhasil menghapus data dari tabel icon');
      document.location.href='admin.php';   
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/logo1.png" />
  <title>Menghapus Data Admin Loakan</title>
</head>
<body>
  
</body>
</html>