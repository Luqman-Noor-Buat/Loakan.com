<?php
  session_start();
  if(!isset($_SESSION["login"]) || $_SESSION['level2']!='penjual'){
    header("location:verifikasi-penjual.php");
  }
  include "koneksi.php";

  //Fungsi untuk gambar
  function upload(){
    $namaFoto = $_FILES['foto_produk']['name'];
    $ukuranFoto = $_FILES['foto_produk']['size'];
    $error = $_FILES['foto_produk']['error'];
    $tmpName = $_FILES['foto_produk']['tmp_name'];

    //cek user sudah uoload foto atau belum
    if($error == 4){
      echo "
      <script>
        alert('Anda harus memilih gambar terlebih dahulu :(');
        document.location.href='tambah-jualan.php';   
      </script>
      ";
      return false;
    }
    //gambar yang boleh diupload
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFoto);
    $ekstensiGambar = strtolower(end($ekstensiGambarValid));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
      echo "
      <script>
        alert('Yang anda upload bukan file gambar !!!');
        document.location.href='tambah-jualan.php';   
      </script>
      ";
      return false;
    }
    //cek ukuran gambar
    if($ukuranFoto > 90000000){
      echo "
      <script>
        alert('Ukuran gambar terlalu besar !!!');
        document.location.href='tambah-jualan.php';   
      </script>
      ";
      return false;
    }
    //lolos pengecekan, gambar siap diupload
    move_uploaded_file($tmpName, 'img_usr/' .$namaFoto);
    return $namaFoto;
  }

  if(isset($_POST["submit"])) {
    //$foto_produk = htmlspecialchars($_POST["foto_produk"]);
    $id_user = $_SESSION['id_user'];
    $nama_produk = htmlspecialchars($_POST["nama_produk"]);
    $harga_produk = htmlspecialchars($_POST["harga_produk"]);
    $kategori = htmlspecialchars($_POST["kategori"]);
    $keterangan_produk = htmlspecialchars($_POST["keterangan_produk"]);

    $foto_produk = upload();
    if(!$foto_produk){
      return false;
    }

    $query = "INSERT INTO $kategori VALUE
    ('', $id_user, '$foto_produk', '$nama_produk', '$harga_produk', '$keterangan_produk')";
    mysqli_query($conn, $query);
    if(mysqli_affected_rows($conn) > 0) {
      echo "
      <script>
        alert('Anda telah berhasil menambahkan produk untuk dijual di Loakan!');
        document.location.href='verifikasi-penjual.php';   
      </script>   
      ";
    } else {
      echo "
      <script>
        alert('Anda gagal menambahkan produk untuk dijual di Loakan :(');
        document.location.href='tambah-jualan.php';   
      </script>
      ";
    }
  }

  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Jualan | Loakan</title>
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
      <h4 class="mt-5 text-center"><strong>Menambah Jualan</strong></h4>
      <p><br /></p>
      <form method="post" action="" enctype="multipart/form-data">
      <h6 class="text-danger text-start" style="font-weight: bold;">*Foto tidak akan bisa diubah setelah ditambahkan!</h6>
        <div class="input-group mb-3">
          <label class="input-group-text" for="inputGroupFile01">Foto Produk</label>
          <input type="file" class="form-control" id="foto_produk" name="foto_produk" id="inputGroupFile01" required/>
        </div>
        <div class="input-group mb-2">
          <span class="input-group-text">Nama Produk</span>
          <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama" name="nama-produk" required />
        </div>
        <h6 class="text-success text-start" style="font-weight: bold;">*Contoh : Rp 50.000</h6>
        <div class="input-group mb-3">
          <span class="input-group-text">Harga Produk</span>
          <input type="text" class="form-control" placeholder="Masukkan Harga Produk" name="harga_produk" value="Rp " required />
        </div>
        <div class="input-group mb-2">
          <label class="input-group-text" for="inputGroupSelect01">Kategori Produk</label>
          <select class="form-select" id="kategori" name="kategori">
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
        <div class="form-outline text-start mb-5">
          <label class="form-label" for="keterangan_produk" style="font-weight: bold;">Keterangan Produk</label>
          <textarea class="form-control input-color" id="keterangan_produk" placeholder="Masukkan mengenai keterangan produk anda" name="keterangan_produk" required rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit"><strong>Tambah</strong></button>
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
