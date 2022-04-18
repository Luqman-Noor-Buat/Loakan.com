<?php

session_start();
if(isset($_SESSION["pilih"])) {
  header("Location: lupa_sandi.php");
  exit;
}
include "koneksi.php";

if(isset($_POST["pilih"])){
  $email1 = $_POST["email"];
  $pertanyaan_keamanan = $_POST["pertanyaan_keamanan"];
  $jawaban_keamanan = $_POST["jawaban_keamanan"];

  $cek_email_lupa_sandi = mysqli_query($conn, "SELECT * FROM user_loakan WHERE email = '$email1'");
  $cek_pertanyaan_lupa_sandi = mysqli_query($conn, "SELECT * FROM user_loakan WHERE pertanyaan_keamanan = '$pertanyaan_keamanan'");
  $cek_jawaban_lupa_sandi = mysqli_query($conn, "SELECT * FROM user_loakan WHERE jawaban_keamanan = '$jawaban_keamanan'");
  if (mysqli_num_rows($cek_email_lupa_sandi)==1 && mysqli_num_rows($cek_pertanyaan_lupa_sandi)>=1 && mysqli_num_rows($cek_jawaban_lupa_sandi)>=1) {
    if(mysqli_fetch_assoc($cek_email_lupa_sandi)) {
      $_SESSION["pilih"] = true;
      $_SESSION['email'] = $email1;
      header("Location: lupa_sandi.php");
      exit;
  }
}
$eror = true;

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Lupa Sandi | Loakan</title>
    <link rel="stylesheet" href="css/style for login.css" />
    <link rel="icon" href="img/logo1.png" />
  </head>
  <body style="background-color: rgba(188, 227, 243);">
  <img src="img/logo2.png" alt="" width="200px" style="display: block; margin:auto; margin-top:3%"/>
    <div class="center">
      <h3 style="font-size: 30px;"><center>Lupa Sandi</center></h3>
      <form action="" method="post">
        <div class="txt_field">
          <input type="text" name="email" required />
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
              <span class="details">Pertanyaan Keamanan</span>
              <select name="pertanyaan_keamanan" id="pertanyaan_keamanan" style="width: 320px; height:45px;" required>
                <option selected >Pilih Pertanyaan Keamanan</option>
                <option value="nama_ibu">Siapa nama ibu anda?</option>
                <option value="warna_kesukaan">Apa warna kesukaan anda?</option>
                <option value="nama_nenek">Siapa nama nenek anda?</option>
              </select>
            </div>
            <div class="txt_field">
              <input type="text" name="jawaban_keamanan" required />
              <span></span>
              <label for="">Jawaban Pertanyaan Keamanan</label>
            </div>
        <!-- Pesan eror saat sandi atau email salah -->
        <?php if(isset($eror)) : ?>
          <div class="txt_eror">
            <span style="color: red; font-style:italic">Email tidak terdaftar atau jawaban pertanyaan anda salah</span>
          </div>
        <?php endif; ?>
        <button type="submit" name="pilih">Kirim</button>
        <div class="signup_link"></div>
      </form>
    </div>
  </body>
</html>
