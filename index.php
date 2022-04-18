<?php
include "koneksi.php";

//icon
$sql = "SELECT * FROM icon";
$hasil = mysqli_query($conn, $sql);
$hasil1 = mysqli_query($conn, $sql);


  //elektronik
  $sql_elektronik = "SELECT * FROM elektronik";
  $hasil_elektronik = mysqli_query($conn, $sql_elektronik);
  //handphone
  $sql_handphone = "SELECT * FROM handphone";
  $hasil_handphone = mysqli_query($conn, $sql_handphone);
  //sepatu
  $sql_sepatu = "SELECT * FROM sepatu";
  $hasil_sepatu = mysqli_query($conn, $sql_sepatu);
  //fasion
  $sql_fasion = "SELECT * FROM fasion";
  $hasil_fasion = mysqli_query($conn, $sql_fasion);
  //hobi
  $sql_hobi = "SELECT * FROM hobi";
  $hasil_hobi = mysqli_query($conn, $sql_hobi);
  //komputer
  $sql_komputer = "SELECT * FROM komputer";
  $hasil_komputer = mysqli_query($conn, $sql_komputer);
  //pakaian
  $sql_pakaian = "SELECT * FROM pakaian";
  $hasil_pakaian = mysqli_query($conn, $sql_pakaian);
  //tas
  $sql_tas = "SELECT * FROM tas";
  $hasil_tas = mysqli_query($conn, $sql_tas);
  //per_rumah
  $sql_per_rumah = "SELECT * FROM per_rumah";
  $hasil_per_rumah = mysqli_query($conn, $sql_per_rumah);
  //olahraga
  $sql_olahraga = "SELECT * FROM olahraga";
  $hasil_olahraga = mysqli_query($conn, $sql_olahraga);
  //otomotif
  $sql_otomotif = "SELECT * FROM otomotif";
  $hasil_otomotif = mysqli_query($conn, $sql_otomotif);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Loakan | Bekas Berkualitas</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="icon" href="img/logo1.png" />
    <!--Fontawnsome-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <style>
      .produk{
        color: black;
      }
      .produk:hover{
        color: red;
        cursor: pointer;
      }
    </style>
  </head>
  <body style="background-color: rgba(188, 227, 243)">
    <!--Bagian atas-->
    <div class="text-center p-0" style="background-color: rgb(255, 255, 255)">
      <a class="text-dark" href="https://mdbootstrap.com/"><i class="fab fa-facebook"></i></a>
      <a class="text-dark" href="https://mdbootstrap.com/"><i class="fab fa-youtube"></i></a>
      <a class="text-dark me-3" href="https://mdbootstrap.com/"><i class="fab fa-instagram-square"></i></a>
      <a class="text-dark garis-bawah" href="syarat-ketentuan.html">*Syarat & Ketentuan</a>
    </div>

    <!--BAGIAN INDEX-->
    <div id="index" style="display: block">
      <!--Bagian Navbar-->
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark shadow">
        <!--Bagian navbar-->
        <div class="container">
          <a class="navbar-brand" href="index.php">
            <img src="img/logo2.png" alt="" width="120px" />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php" style="cursor: pointer">Beranda</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link" href="tentang.html" style="cursor: pointer">Tentang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn bg-white me-1" style="height: 42px; font-weight: bold; color: darkslategray" href="masuk.php"><i class="fas fa-sign-in-alt"></i> Masuk</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn bg-white me-1" style="height: 42px; font-weight: bold; color: darkslategray" href="daftar.php"><i class="fas fa-user-plus"></i> Daftar</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!--Akhir bagian Navbar-->
      <!--BAGIAN BODY-->
      <h2 class="text-center">
        <br />
        Selamat Datang di <strong>Loakan</strong>
      </h2>
      <h4 class="text-center">Disini anda akan menemukan ribuan barang bekas berkualitas dengan harga yang berkelas. <br /><br /></h4>
      <!--Kategori-->
      <div class="container bg-white">
      <div class="container bg-white text-center">
      <div class="mt-3">
          <button type="button" class="btn btn-warning mt-4"><h4 class="text-center"><strong>Berbagai jenis produk yang ada di Loakan</strong></h4></button>
      </div>
      <p><br /></p>
        <table width="99%" border="0" align="center">
          <tr>
            <?php while($row = mysqli_fetch_array($hasil)) : ?>
            <td width="11%" align="center"><img src="icon/<?= $row["gambar_icon"]; ?>" alt="" width="105px" /></td>
            <?php endwhile; ?>
          </tr>
          <tr>
            <?php while($row = mysqli_fetch_array($hasil1)) : ?>
            <td align="center"><?= $row["nama_icon"]; ?></td>
            <?php endwhile; ?>
          </tr>
        </table>
        <h5><br /></h5>
      </div>
      <!--Produk-->
      <div class="container bg-white text-center">
      <div class="mt-3">
          <button type="button" class="btn btn-warning mt-4"><h4 class="text-center"><strong>Produk</strong></h4></button>
      </div>
      <p><br /></p>

        <table width="100%" border="0" align="center">
          <tr>
            <td width="100%" align="center" >
            
            <!--KOMPUTER-->
            <?php while($row = mysqli_fetch_array($hasil_komputer)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: left;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>
            <!--PER RUMAH-->
            <?php while($row = mysqli_fetch_array($hasil_per_rumah)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: right;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>
            <!--ELEKTRONIK-->
            <?php while($row = mysqli_fetch_array($hasil_elektronik)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: left;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>
            <!--SEPATU-->
            <?php while($row = mysqli_fetch_array($hasil_sepatu)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: right;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>
            <!--HANDPHONE-->
            <?php while($row = mysqli_fetch_array($hasil_handphone)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: left;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>
            <!--PAKAIAN-->
            <?php while($row = mysqli_fetch_array($hasil_pakaian)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: right;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>
            <!--FASION-->
            <?php while($row = mysqli_fetch_array($hasil_fasion)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: left;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>
            <!--OTOMOTIF-->
            <?php while($row = mysqli_fetch_array($hasil_otomotif)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: right;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>
            <!--OLAHRAGA-->
            <?php while($row = mysqli_fetch_array($hasil_olahraga)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: left;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>
            <!--HOBI-->
            <?php while($row = mysqli_fetch_array($hasil_hobi)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: right;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>
            <!--HOBI-->
            <?php while($row = mysqli_fetch_array($hasil_tas)) : ?>
            <a onclick="produk('ya')" class="produk">
            <table width="20%" border="0" align="center" style="float: left;">
              <tr>
                <td align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" alt="" width="200px" /></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["nama_produk"]; ?></td>
              </tr>
              <tr>
                <td align="center" style="font-weight: bold;"><?= $row["harga_produk"]; ?></td>
              </tr>
            </table>
            </a>
            <?php endwhile; ?>

            </td>
          </tr>
        </table>
        
        
        <h5><br /></h5>
      </div>
    </div>
    <!--BAGIAN AKHIR INDEX-->

    <!--BAGIAN TENTANG-->

    <!--Bagian Footer-->
    <div id="tentang_kami" class="mt-4">
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
                  <a href="tentang.html" class="text-white garis-bawah" style="cursor: pointer">Tentang kami</a>
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
    </div>
    <!--Akhir Bagian Footer-->

    <!--JAVASCRIPT-->
    <script>
      // PROSES PADA HALAMAN KONTAK TO PRODUK
      function produk(key) {
        if (key == "ya") {
          alert("Upsst.., anda belum login, silahkan login dahulu untuk menikmati layanan kami :)");
          document.location.href = "masuk.php";
        }
      }
    </script>
  </body>
</html>
