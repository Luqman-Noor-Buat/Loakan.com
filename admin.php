<?php

session_start();
//cek login level admin
if(!isset($_SESSION["login"]) || $_SESSION['level1']!='admin'){
  header("location:masuk.php");
}

include "koneksi.php";

$sql = "SELECT * FROM icon";
$hasil = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/719f1245a0.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/logo1.png" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Menampilkan Data | Admin Loakan</title>
  </head>
  <body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color: rgb(73, 177, 64);">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menambahkan-data.php">Tambah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Keluar</a>
          </li>
        </ul>
      </div>
    </nav>
    <!--Tabel-->
    <div class="container mt-3" id="beranda">
      <h2>Tabel Data</h2>
      <p>Tabel data dibawah ini:</p>
      <table class="table table-striped text-center" style="width: 99%; background-color: white">
        <thead>
          <tr>
            <th scope="col" width="16.5%">Aksi</th>
            <th scope="col" width="16.5%">Urutan Icon</th>
            <th scope="col" width="16.5%">Nama Icon</th>
            <th scope="col" width="16.5%">Gambar Icon</th>
          </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($hasil)) : ?>
          <tr>
            <th scope="row">
              <a href="mengubah-data.php?id=<?=$row['id_icon']?>" style="text-decoration: none;">
                <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
              </a>
              <a href="menghapus-data.php?id=<?=$row['id_icon']?>" style="text-decoration: none;" onclick="return confirm('Yakin ingin menghapus <?=$row['nama_icon']?> ?');">
                <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
              </a>
            </th>
            <td><?= $row["id_icon"]; ?></td>
            <td><?= $row["nama_icon"]; ?></td>
            <td><img src="icon/<?= $row["gambar_icon"]; ?>" width="90px" alt=""> </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <!--Bagian Bawah-->
    <footer class="text-center text-lg-start" style="background-color: rgb(73, 177, 64);">
      <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 By :
        <a class="text-white" href="https://github.com/Luqman-Noor-Buat">Luqman Noor Buat</a>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
