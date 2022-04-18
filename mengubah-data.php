<?php

session_start();
//cek login level admin
if(!isset($_SESSION["login"]) || $_SESSION['level1']!='admin'){
  header("location:masuk.php");
}

include "koneksi.php";
$id_icon = $_GET['id'];
$sql ="SELECT * FROM icon WHERE id_icon=$id_icon";
$hasil = mysqli_query($conn, $sql);
if (!$hasil){
    echo "Query salah";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="img/logo1.png" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Mengubah Data | Admin Loakan</title>
    <style>
      .input-color{
        background-color: whitesmoke;
      }
    </style>
  </head>
  <body>
    <!--<h1>Lagi Belajar Bootstrap!</h1>-->
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: rgb(73, 177, 64);">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menambahkan-data.php">Tambah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Ubah</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="container mt-3">
        <h2>Mengubah Data</h2>
        <p>Silahkan ubah data dibawah ini:</p>
        <?php while($row = mysqli_fetch_array($hasil)) : ?>
        <form method="post" action="ubah.php" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <label class="input-group-text" for="Urutan Icon">Urutan Icon</label>
            <input type="number" class="form-control" id="id_icon" placeholder="Masukkan Urutan Icon" name="id_icon" value="<?php echo $row['id_icon'] ?>" required>
            <span><strong class="text-danger"> Tidak boleh mengubah urutan icon !!!</strong></span>
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="Nama Icon">Nama Icon</label>
            <input type="text" class="form-control" id="nama_icon" placeholder="Masukkan Nama Icon" name="nama_icon" value="<?php echo $row['nama_icon'] ?>" required>
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="Gambar Icon">Gambar Icon</label>
            <input type="file" class="form-control" id="gambar_icon" placeholder="Masukkan Gambar Icon" name="gambar_icon" value="<?php echo $row['gambar_icon'] ?>" required>
          </div>
          <img src="icon/<?= $row["gambar_icon"]; ?>" width="90px" alt="">
          <p>Klik Pilih File jika ingin mengubah gambar.<br></p>
          <button type="submit" class="btn btn-primary" name="submit">Ubah</button>
        </form>
        <?php endwhile; ?>
      </div>
    </div>

        <!--Bagian Bawah-->
    <footer class="text-center text-lg-start fixed-bottom" style="background-color: rgb(73, 177, 64);">
      <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 By :
        <a class="text-white" href="https://github.com/Luqman-Noor-Buat">Luqman Noor Buat</a>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
