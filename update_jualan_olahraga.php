<?php
  session_start();
  if(!isset($_SESSION["login"]) || $_SESSION['level2']!='penjual'){
    header("location:verifikasi-penjual.php");
  }
  include "koneksi.php";
  $id_olahraga = $_GET['id_olahraga'];
  //UPDATE
  if(isset($_POST["submit"])) {
    //$foto_produk = htmlspecialchars($_POST["foto_produk"]);
    $id_user = $_SESSION['id_user'];
    $foto_produk = $_SESSION["foto_produk"];
    $nama_produk = htmlspecialchars($_POST["nama_produk"]);
    $harga_produk = htmlspecialchars($_POST["harga_produk"]);
    $keterangan_produk = htmlspecialchars($_POST["keterangan_produk"]);
    //cek foto

    $query = "UPDATE olahraga SET
              id_user = $id_user, 
              foto_produk = '$foto_produk', 
              nama_produk = '$nama_produk', 
              harga_produk = '$harga_produk', 
              keterangan_produk = '$keterangan_produk'
              WHERE id_produk = $id_olahraga";
    mysqli_query($conn, $query);
    if(mysqli_affected_rows($conn) > 0) {
      echo "
      <script>
        alert('Anda telah berhasil memperbarui produk yang anda jual di Loakan!');
        document.location.href='edit-jualan.php';   
      </script>   
      ";
    } else {
      echo "
      <script>
        alert('Anda gagal menambahkan produk untuk dijual di Loakan :(');
        document.location.href='update_jualan_elektronik.php';   
      </script>
      ";
    }
  }

  //TAMPIL DATA
  $query1 = "SELECT * FROM olahraga WHERE id_produk = $id_olahraga";
  $result1 = mysqli_query($conn, $query1);
  if(mysqli_num_rows($result1) > 0){
    $data_jualan_olahraga = mysqli_fetch_array($result1);
    $_SESSION["id_user"] = $data_jualan_olahraga["id_user"];
    $_SESSION["foto_produk"] = $data_jualan_olahraga["foto_produk"];
    $_SESSION["nama_produk"] = $data_jualan_olahraga["nama_produk"];
    $_SESSION["harga_produk"] = $data_jualan_olahraga["harga_produk"];
    $_SESSION["keterangan_produk"] = $data_jualan_olahraga["keterangan_produk"];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Jualan | Loakan</title>
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
    <div class="container mt-5 text-center" style="background-color: rgb(113, 213, 253); border-radius: 10px">
      <h4 class="mt-5 text-center"><strong>Mengedit Jualan</strong></h4>
      <p><br /></p>
      <form method="post" action="" enctype="multipart/form-data">
        <img src="img_usr/<?= $_SESSION["foto_produk"]; ?>" width="90px" alt="">
        <input type="hidden" name="id_user" value="<?= $_SESSION["id_user"]; ?>" />
        <h6 class="text-danger text-start" style="font-weight: bold;">*Foto tidak akan bisa diubah!</h6>
        <div class="input-group mb-3">
          <label class="input-group-text" for="inputGroupFile01">Foto Produk</label>
          <input type="file" class="form-control" id="foto_produk" name="foto_produk" id="inputGroupFile01" disabled required/>
        </div>
        <div class="input-group mb-2">
          <span class="input-group-text">Nama Produk</span>
          <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama" name="nama-produk" value="<?php echo $_SESSION['nama_produk'] ?>" required />
        </div>
        <h6 class="text-success text-start" style="font-weight: bold;">*Contoh : Rp 50.000</h6>
        <div class="input-group mb-3">
          <span class="input-group-text">Harga Produk</span>
          <input type="text" class="form-control" placeholder="Masukkan Harga Produk" name="harga_produk" value="<?php echo $_SESSION['harga_produk'] ?>" required />
        </div>
        <div class="input-group mb-3">
          <label class="input-group-text" for="inputGroupSelect01">Kategori Produk</label>
          <select class="form-select" id="kategori" name="kategori" disabled>
            <option selected>Pilih Kategori Produk</option>
            <option value="elektronik" name="elektronik">Elektronik</option>
            <option value="komputer" name="komputer">Komputer & Aksesoris</option>
            <option value="handphone" name="handphone">Handphone & Aksesoris</option>
            <option value="pakaian" name="pakaian">Pakaian</option>
            <option value="sepatu" name="sepatu">Sepatu</option>
            <option value="tas" name="tas">Tas</option>
            <option value="fasion" name="fasion">Aksesoris Fasion</option>
            <option value="per_rumah" name="per_rumah">Perlengkapan Rumah</option>
            <option value="hobi" name="hobi">Hobi & Koleksi</option>
            <option value="olahraga" name="olahraga">Olahraga</option>
            <option value="otomotif" name="otomotif">Otomotif</option>
          </select>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control input-color" id="keterangan_produk" name="keterangan_produk" placeholder="Masukkan Asal Kota" name="keterangan-produk" value="<?php echo $_SESSION['keterangan_produk'] ?>" required />
          <label for="asal_kota">Keterangan Produk</label>
        </div>
        <button type="submit" class="btn btn-primary" name="submit"><strong>Perbarui</strong></button>
        <p><br /></p>
      </form>
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
