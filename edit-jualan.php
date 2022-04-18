<?php
  session_start();
  if(!isset($_SESSION["login"]) || $_SESSION['level2']!='penjual'){
    header("location:verifikasi-penjual.php");
  }

  include "koneksi.php";
  $id_user = $_SESSION['id_user'];

  //elektronik
  $sql_elektronik = "SELECT * FROM elektronik WHERE id_user='$id_user'";
  $hasil_elektronik1 = mysqli_query($conn, $sql_elektronik);

  //komputer
  $sql_komputer = "SELECT * FROM komputer WHERE id_user='$id_user'";
  $hasil_komputer1 = mysqli_query($conn, $sql_komputer);

  //handphone
  $sql_handphone = "SELECT * FROM handphone WHERE id_user='$id_user'";
  $hasil_handphone1 = mysqli_query($conn, $sql_handphone);

  //pakaian
  $sql_pakaian = "SELECT * FROM pakaian WHERE id_user='$id_user'";
  $hasil_pakaian1 = mysqli_query($conn, $sql_pakaian);

  //sepatu
  $sql_sepatu = "SELECT * FROM sepatu WHERE id_user='$id_user'";
  $hasil_sepatu1 = mysqli_query($conn, $sql_sepatu);

  //tas
  $sql_tas = "SELECT * FROM tas WHERE id_user='$id_user'";
  $hasil_tas1 = mysqli_query($conn, $sql_tas);

  //fasion
  $sql_fasion = "SELECT * FROM fasion WHERE id_user='$id_user'";
  $hasil_fasion1 = mysqli_query($conn, $sql_fasion);

  //per_rumah
  $sql_per_rumah = "SELECT * FROM per_rumah WHERE id_user='$id_user'";
  $hasil_per_rumah1 = mysqli_query($conn, $sql_per_rumah);

  //hobi
  $sql_hobi = "SELECT * FROM hobi WHERE id_user='$id_user'";
  $hasil_hobi1 = mysqli_query($conn, $sql_hobi);

  //olahraga
  $sql_olahraga = "SELECT * FROM olahraga WHERE id_user='$id_user'";
  $hasil_olahraga1 = mysqli_query($conn, $sql_olahraga);

  //otomotif
  $sql_otomotif = "SELECT * FROM otomotif WHERE id_user='$id_user'";
  $hasil_otomotif1 = mysqli_query($conn, $sql_otomotif);


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
              <a class="nav-link" aria-current="page" href="index-after.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="verifikasi-penjual.php">Penjualan</a>
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
    <h4 class="mt-5 text-center"><strong>Mengedit Jualan</strong></h4>
    <!--ELETRONIK-->
    <?php while($row = mysqli_fetch_array($hasil_elektronik1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_elektronik.php?id_elektronik=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_elektronik.php?id_elektronik=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
    <!--KOMPUTER-->
    <?php while($row = mysqli_fetch_array($hasil_komputer1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_komputer.php?id_komputer=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_komputer.php?id_komputer=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
    <!--HANDPHONE-->
    <?php while($row = mysqli_fetch_array($hasil_handphone1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_handphone.php?id_handphone=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_handphone.php?id_handphone=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
    <!--PAKAIAN-->
    <?php while($row = mysqli_fetch_array($hasil_pakaian1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_pakaian.php?id_pakaian=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_pakaian.php?id_pakaian=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
    <!--SEPATU-->
    <?php while($row = mysqli_fetch_array($hasil_sepatu1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_sepatu.php?id_sepatu=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_sepatu.php?id_sepatu=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
    <!--TAS-->
    <?php while($row = mysqli_fetch_array($hasil_tas1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_tas.php?id_tas=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_tas.php?id_tas=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
    <!--FASION-->
    <?php while($row = mysqli_fetch_array($hasil_fasion1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_fasion.php?id_fasion=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_fasion.php?id_fasion=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
    <!--PER_RUMAH-->
    <?php while($row = mysqli_fetch_array($hasil_per_rumah1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_per_rumah.php?id_per_rumah=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_per_rumah.php?id_per_rumah=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
    <!--HOBI-->
    <?php while($row = mysqli_fetch_array($hasil_hobi1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_hobi.php?id_hobi=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_hobi.php?id_hobi=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
    <!--OLAHRAGA-->
    <?php while($row = mysqli_fetch_array($hasil_olahraga1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_olahraga.php?id_olahraga=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_olahraga.php?id_olahraga=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
    <!--OTOMOTIF-->
    <?php while($row = mysqli_fetch_array($hasil_otomotif1)) : ?>
    <div class="container mt-2 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <p><br /></p>
      <table width="96%" border="0" align="center">
        <tr>
          <td width="16%" align="center"><img src="img_usr/<?= $row["foto_produk"]; ?>" width="200px" alt=""></td>
          <td width="64%" align="left">
            <h4><?= $row["nama_produk"]; ?></h4>
            <h5><?= $row["harga_produk"]; ?></h5>
            <p><?= $row["keterangan_produk"]; ?></p>
          </td>
          <td width="8%" align="left">
            <!--Edit-->
            <a href="update_jualan_otomotif.php?id_otomotif=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Ingin mengedit <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-warning" style="width: 80px;"><strong>Edit</strong></button>
              </div>
            </a>
            <p><br></p>
            <!--Hapus-->
            <a href="hapus_jualan_otomotif.php?id_otomotif=<?=$row['id_produk']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_produk']?> ?');">
              <div class="text-center">
                <button type="button" class="btn btn-danger" style="width: 80px;"><strong>Hapus</strong></button>
              </div>
            </a>
          </td>
        </tr>
      </table>
      <p><br /></p>
    </div>
    <?php endwhile; ?>
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
