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


$id_icon = $_POST['id_icon'];
$nama_icon = $_POST['nama_icon'];
//$gambar_icon = $_POST['gambar_icon'];

$gambar_icon = upload();
if(!$gambar_icon){
  return false;
}

$sql ="UPDATE icon SET
        nama_icon = '$nama_icon',
        gambar_icon = '$gambar_icon'
        WHERE id_icon=$id_icon";
$hasil = mysqli_query($conn, $sql);
if(!$hasil){
    echo "
    <script>
      alert('Anda gagal memperbarui data, silahkan coba kembali :(');
      document.location.href='mengubah-data.php';   
    </script>
    ";
}else{
    echo "
    <script>
      alert('Anda telah berhasil mengubah data dari tabel icon');
      document.location.href='admin.php';   
    </script>";
}

?>