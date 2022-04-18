<?php

session_start();
//cek login level penjual
if(!isset($_SESSION["login"]) || $_SESSION['level2']!='penjual'){
  header("location:verifikasi-penjual.php");
}
include "koneksi.php";
$id_sepatu = $_GET['id_sepatu'];


//SEPATU
$sql_sepatu ="DELETE FROM sepatu WHERE id_produk=$id_sepatu";
$hasil_sepatu = mysqli_query($conn, $sql_sepatu);
if(!$hasil_sepatu){
    echo "
    <script>
      alert('Anda gagal menghapus produk, silahkan coba kembali :(');
      document.location.href='edit-jualan.php';   
    </script>
    ";
}else{
    echo "
    <script>
      alert('Anda telah berhasil menghapus produk dari jualan anda');
      document.location.href='edit-jualan.php';   
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