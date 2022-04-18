<?php

session_start();
//cek login level admin
if(!isset($_SESSION["login"]) || $_SESSION['level1']!='admin'){
  header("location:masuk.php");
}

include "koneksi.php";

//Fungsi untuk gambar
function upload(){
  $namaFoto = $_FILES['gambar_icon']['name'];
  $ukuranFoto = $_FILES['gambar_icon']['size'];
  $error = $_FILES['gambar_icon']['error'];
  $tmpName = $_FILES['gambar_icon']['tmp_name'];

  //cek user sudah uoload foto atau belum
  if($error == 4){
    echo "
    <script>
      alert('Anda harus memilih gambar terlebih dahulu :(');
      document.location.href='menambahkan-data.php';
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
      document.location.href='menambahkan-data.php';
    </script>
    ";
    return false;
  }
  //cek ukuran gambar
  if($ukuranFoto > 90000000){
    echo "
    <script>
      alert('Ukuran gambar terlalu besar !!!');
      document.location.href='menambahkan-data.php';
    </script>
    ";
    return false;
  }
  //lolos pengecekan, gambar siap diupload
  move_uploaded_file($tmpName, 'icon/' .$namaFoto);
  return $namaFoto;
}

if(isset($_POST["submit"])){
    $id_icon = $_POST['id_icon'];
    $nama_icon = $_POST['nama_icon'];
    //$gambar_icon = $_POST['gambar_icon'];

    $gambar_icon = upload();
    if(!$gambar_icon){
      return false;
    }

    //cek kesamaan id_icon
    $cek_id_icon = mysqli_query($conn, "SELECT id_icon FROM icon WHERE id_icon = '$id_icon'");
    if(mysqli_fetch_assoc($cek_id_icon)) {
      echo "
              <script>
                alert('Urutan icon telah ada, gunakan urutan yang lain!')
                document.location.href='menambahkan-data.php';
              </script>";
            return false;
    }
     //cek kesamaan nama_icon
     $cek_nama_icon = mysqli_query($conn, "SELECT nama_icon FROM icon WHERE nama_icon = '$nama_icon'");
     if(mysqli_fetch_assoc($cek_nama_icon)) {
       echo "
               <script>
                 alert('Nama icon telah ada, gunakan nama yang lain!')
                 document.location.href='menambahkan-data.php';
               </script>";
             return false;
     }
     //cek kesamaan gambar_icon
     $cek_gambar_icon = mysqli_query($conn, "SELECT gambar_icon FROM icon WHERE gambar_icon = '$gambar_icon'");
     if(mysqli_fetch_assoc($cek_gambar_icon)) {
       echo "
               <script>
                 alert('Gambar icon telah ada, gunakan gambar yang lain!')
                 document.location.href='menambahkan-data.php';
               </script>";
             return false;
     }

$sql = "INSERT INTO icon VALUE('$id_icon','$nama_icon','$gambar_icon')";
$hasil = mysqli_query($conn, $sql);
if(!$hasil){
    echo "
    <script>
      alert('Anda gagal menginputkan data, silahkan coba kembali :(');
      document.location.href='menambahkan-data.php';   
    </script>
    ";
}else{
    echo "
    <script>
      alert('Anda telah berhasil menginputkan data ke tabel icon');
      document.location.href='admin.php';   
    </script>";}
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
    <title>Menambahkan Data | Admin Loakan</title>
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
            <a class="nav-link active" href="#">Tambah</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
      <div class="container mt-3">
        <h2>Menambahkan Data</h2>
        <p>Silahkan masukkan data dibawah ini:</p>
        <form method="post" action="" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <label class="input-group-text" for="Urutan Icon">Urutan Icon</label>
            <input type="number" class="form-control" id="id_icon" placeholder="Masukkan Urutan Icon" name="id_icon" required>
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="Nama Icon">Nama Icon</label>
            <input type="text" class="form-control" id="nama_icon" placeholder="Masukkan Nama Icon" name="nama_icon" required>
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="Gambar Icon">Gambar Icon</label>
            <input type="file" class="form-control" id="gambar_icon" placeholder="Masukkan Gambar icon" name="gambar_icon" required>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
        </form>
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
