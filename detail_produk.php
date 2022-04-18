<?php
  session_start();
  if(!isset($_SESSION["login"]) || $_SESSION['level1']!='pembeli'){
    header("location:masuk.php");
  }

  include "koneksi.php";
  //$id_user = $_SESSION['id_user'];
  $id_produk = $_GET['id'];

  if($id_produk >= 100000000 && $id_produk <200000000){
    //elektronik
    $sql_elektronik = "SELECT * FROM elektronik WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_elektronik);
    $row1 = mysqli_fetch_array($hasil);
  }else if($id_produk >= 200000000 && $id_produk <300000000){
    //komputer
    $sql_komputer = "SELECT * FROM komputer WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_komputer);
    $row1 = mysqli_fetch_array($hasil);
  }else if($id_produk >= 300000000 && $id_produk <400000000){
    //handphone
    $sql_handphone = "SELECT * FROM handphone WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_handphone);
    $row1 = mysqli_fetch_array($hasil);
  }else if($id_produk >= 400000000 && $id_produk <500000000){
    //pakaian
    $sql_pakaian = "SELECT * FROM pakaian WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_pakaian);
    $row1 = mysqli_fetch_array($hasil);
  }else if($id_produk >= 500000000 && $id_produk <600000000){
    //sepatu
    $sql_sepatu = "SELECT * FROM sepatu WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_sepatu);
    $row1 = mysqli_fetch_array($hasil);
  }else if($id_produk >= 600000000 && $id_produk <700000000){
    //tas
    $sql_tas = "SELECT * FROM tas WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_tas);
    $row1 = mysqli_fetch_array($hasil);
  }else if($id_produk >= 700000000 && $id_produk <800000000){
    //fasion
    $sql_fasion = "SELECT * FROM fasion WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_fasion);
    $row1 = mysqli_fetch_array($hasil);
  }else if($id_produk >= 800000000 && $id_produk <900000000){
    //per_rumah
    $sql_per_rumah = "SELECT * FROM per_rumah WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_per_rumah);
    $row1 = mysqli_fetch_array($hasil);
  }else if($id_produk >= 900000000 && $id_produk <1000000000){
    //hobi
    $sql_hobi = "SELECT * FROM hobi WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_hobi);
    $row1 = mysqli_fetch_array($hasil);
  }else if($id_produk >= 1000000000 && $id_produk <1100000000){
    //olahraga
    $sql_olahraga = "SELECT * FROM olahraga WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_olahraga);
    $row1 = mysqli_fetch_array($hasil);
  }else if($id_produk >= 1100000000 && $id_produk <1200000000){
    //otomotif
    $sql_otomotif = "SELECT * FROM otomotif WHERE id_produk='$id_produk'";
    $hasil = mysqli_query($conn, $sql_otomotif);
    $row1 = mysqli_fetch_array($hasil);
  }

  $sql_user = "SELECT * from user_loakan where id_user = $row1[1]";
  $hasil_user = mysqli_query($conn, $sql_user);
  $row2 = mysqli_fetch_array($hasil_user);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Penjualan | Loakan</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="icon" href="img/logo1.png" />
    <!--Fontawnsome-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  </head>
  <body style="background-color: rgba(188, 227, 243)">
    <!--Bagian atas-->
    <div class="text-center p-0" style="background-color: rgb(255, 255, 255)">
      <a class="text-dark" href="https://mdbootstrap.com/"><i class="fab fa-facebook"></i></a>
      <a class="text-dark" href="https://mdbootstrap.com/"><i class="fab fa-youtube"></i></a>
      <a class="text-dark me-3" href="https://mdbootstrap.com/"><i class="fab fa-instagram-square"></i></a>
      <a class="text-dark garis-bawah" href="syarat-ketentuan-after.php">*Syarat & Ketentuan</a>
    </div>

    <!--Bagian Navbar-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark shadow">
      <!--Bagian navbar-->
      <div class="container">
        <a class="navbar-brand" href="index-after.php">
          <img src="img/logo2.png" alt="" width="120px" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index-after.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="verifikasi-penjual.php">Penjualan</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link" href="tentang-after.php">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn bg-white me-1" style="height: 42px; font-weight: bold; color: darkslategray" href="akun.php"><i class="fas fa-user-alt"></i> Akun</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn bg-white me-1" style="height: 42px; font-weight: bold; color: darkslategray" href="logout.php"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Akhir bagian Navbar-->

    <!--BAGIAN BODY-->
    <h2 class="mt-5 text-center"><strong>Produk Detail</strong></h2>
    <!--Tampil produkK-->

    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
    <p><br /></p>
    <table width="65%" border="0"  align="center">
      <tr>
        <td rowspan="7" width="29%" align="center"><img src="img_usr/<?= $row1["foto_produk"]; ?>" width="450px" alt=""></td>
        <td rowspan="7" width="1%">&nbsp;</td>
        <td width="35%" align="left"><h3><strong><?= $row1["nama_produk"]; ?></strong></h3></td>
      </tr>
      <tr>
        <td align="left"><h4><strong><?= $row1["harga_produk"]; ?></strong></h4></td>
      </tr>
      <tr>
        <td align="left"><strong>Nama Penjual :</strong><br> <?= $row2["nama_lengkap"]; ?></td>
      </tr>
      <tr>
        <td align="left"><strong>Alamat Penjual :</strong><br> <?=$row2["nama_jalan"].' '.$row2["rt"].'/'.$row2["rw"].' '.$row2["kelurahan"].' '.$row2["kecamatan"].' '.$row2["kabupaten"].' '.$row2["provinsi"]?></td>
      </tr>
      <tr>
        <td align="left"><strong>Keterangan Produk :</strong><br> <?= $row1["keterangan_produk"]; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">
        <a href="https://wa.me/<?=$row2['no_wa'];?>" style="text-decoration: none;" onclick="return confirm('Ingin membeli <?=$row['nama_produk']?>? Anda akan diarahkan ke whatsApp');">
              <div class="text-center">
                <button type="button" class="btn btn-primary" style="width: 150px;"><h5><strong>Beli Sekarang</strong></h5></button>
              </div>
            </a>
        </td>
      </tr>
    </table>
    <p><br /></p>
    </div>


    <p class="mt-5"></p>

    <!--Bagian Footer-->
    <section class="">
      <!-- Footer -->
      <footer class="text-white text-center">
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase"><img src="img/logo2.png" alt="" width="120px" /></h5>
              <ul class="list-unstyled mb-0">
                <br />
                <li>
                  <a href="tentang-after.php" class="text-white garis-bawah">Tentang kami</a>
                </li>
                <li>
                  <a href="#!" class="text-white garis-bawah">Kontak kami</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase mb-0">Sosial Media</h5>
              <ul class="list-unstyled">
                <br />
                <li>
                  <a href="#!" class="text-white garis-bawah"><i class="fab fa-facebook"></i> Loakan</a>
                </li>
                <li>
                  <a href="#!" class="text-white garis-bawah"><i class="fab fa-youtube"></i> Loakan</a>
                </li>
                <li>
                  <a href="#!" class="text-white garis-bawah"><i class="fab fa-instagram-square"></i> loakan</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h5 class="text-uppercase">Kontak</h5>
              <ul class="list-unstyled mb-0">
                <br />
                <li>
                  <a href="#!" class="text-white garis-bawah">
                    <strong><i class="fas fa-map-marker-alt"></i> Alamat </strong>: Desa Bakung Kecamatan Mijen Kabupaten Demak
                  </a>
                </li>
                <li>
                  <a href="#!" class="text-white garis-bawah">
                    <strong><i class="fab fa-whatsapp"></i> WhatsApp </strong>: 082328882434
                  </a>
                </li>
                <li>
                  <a href="#!" class="text-white garis-bawah">
                    <strong><i class="fas fa-envelope"></i> Email </strong>: luqmannurbuat@gmail.com
                  </a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2022 By :
          <a class="text-white" href="https://github.com/Luqman-Noor-Buat/">Luqman Noor Buat</a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->
    </section>
    <!--Akhir Bagian Footer-->
  </body>
</html>
