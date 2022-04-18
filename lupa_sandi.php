<?php

session_start();
if(!isset($_SESSION["pilih"])) {
  header("Location: input_lupa_sandi.php");
  exit;
}
include "koneksi.php";

if(isset($_POST["submit"])) {
  $id_user = $_POST["id_user"];
  $sandi = mysqli_real_escape_string($conn, $_POST["sandi"]);
  $sandi2 = mysqli_real_escape_string($conn, $_POST["sandi2"]);
  
// cek sandi
  if($sandi !== $sandi2) {
    echo "
          <script>
            alert('Konfirmasi sandi anda tidak sesuai')
            document.location.href='lupa_sandi.php';
          </script>";
        return false;
  }
  // enkripsi password
  $sandi = password_hash($sandi, PASSWORD_DEFAULT);

  $query = "UPDATE user_loakan SET
              sandi = '$sandi'
              WHERE id_user = $id_user";
  mysqli_query($conn, $query);
  if(mysqli_affected_rows($conn) > 0) {
    echo "
    <script>
      alert('Data telah diperbarui!');
      document.location.href='masuk.php';   
    </script>   
    ";
  } else {
    echo "
    <script>
      alert('Gagal melakukan pembaruan data');
      document.location.href='lupa_sandi.php';
    </script>
    ";
  }
}
$email1 = $_SESSION['email'];
$query1 = "SELECT * FROM user_loakan WHERE email = '$email1'";
$result1 = mysqli_query($conn, $query1);
?>
<?php
if(mysqli_num_rows($result1) > 0){
  $data_user_tanisell = mysqli_fetch_array($result1);
  $_SESSION["id_user"] = $data_user_tanisell["id_user"];
  $_SESSION["nama_lengkap"] = $data_user_tanisell["nama_lengkap"];
  $_SESSION["email"] = $data_user_tanisell["email"];
  $_SESSION["no_wa"] = $data_user_tanisell["no_wa"];
  $_SESSION["no_hp"] = $data_user_tanisell["no_hp"];
  $_SESSION["pertanyaan_keamanan"] = $data_user_tanisell["pertanyaan_keamanan"];
  $_SESSION["jawaban_keamanan"] = $data_user_tanisell["jawaban_keamanan"];
  $_SESSION['sandi'] = $data_user_tanisell["sandi"];
  $_SESSION["provinsi"] = $data_user_tanisell["provinsi"];
  $_SESSION["kabupaten"] = $data_user_tanisell["kabupaten"];
  $_SESSION["kecamatan"] = $data_user_tanisell["kecamatan"];
  $_SESSION["kelurahan"] = $data_user_tanisell["kelurahan"];
  $_SESSION["rt"] = $data_user_tanisell["rt"];
  $_SESSION["rw"] = $data_user_tanisell["rw"];
  $_SESSION["nama_jalan"] = $data_user_tanisell["nama_jalan"];
  $_SESSION["level1"] = $data_user_tanisell["level1"];
  $_SESSION["level2"] = $data_user_tanisell["level2"];
}

?>

<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/style for sign up.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/logo1.png" />
    <title>Lupa Sandi | Loakan</title>
  </head>
  <body>
  <img src="img/logo2.png" alt="" width="200px" style="display: block; margin:auto; margin-top:2%"/>
    <div class="kotak">
      <div class="title">Akun Member Loakan</div>
      <div class="content">
        <form action="" method="post">
          <span><br /></span>
          <span class="data_pribadi-title">Data Pribadi</span>
          <div class="user-details">
            <input type="hidden" name="id_user" value="<?= $_SESSION["id_user"]; ?>" />
            <div class="input-box">
              <span class="details">Nama Lengkap</span>
              <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap anda" disabled value="<?= $_SESSION["nama_lengkap"]; ?>" required />
              <h5>*Misal : Budi Handoko</h5>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" name="email" placeholder="Masukkan email anda" disabled value="<?= $_SESSION["email"]; ?>" required />
              <h5>*Misal : budihandoko@gmail.com</h5>
            </div>
            <div class="input-box">
              <span class="details">Nomor WhatsApp</span>
              <input type="text" name="no_wa" placeholder="Masukkan nomor whatsapp anda" disabled value="<?= $_SESSION["no_wa"]; ?>" required />
              <h5>*Misal : +6282345667865</h5>
            </div>
            <div class="input-box">
              <span class="details">Nomor Handphone</span>
              <input type="text" name="no_hp" placeholder="Masukkan nomor handphone anda" disabled value="<?= $_SESSION["no_hp"]; ?>" required />
              <h5>*Misal : 082345667865</h5>
            </div>
            <div class="input-box">
              <span class="details">Pertanyaan Keamanan</span>
              <select name="pertanyaan_keamanan" id="pertanyaan_keamanan" style="width: 350px; height:45px;" disabled value="<?= $_SESSION["pertanyaan_keamanan"]; ?>" required>
                <option selected >Pilih Pertanyaan Keamanan</option>
                <option value="nama_ibu">Siapa nama ibu anda?</option>
                <option value="warna_kesukaan">Apa warna kesukaan anda?</option>
                <option value="nama_nenek">Siapa nama nenek anda?</option>
              </select>
              <h5>*Pastikan pertanyaan sesuai dengan jawaban!</h5>
            </div>
            <div class="input-box">
              <span class="details">Jawaban Pertanyaan Keamanan</span>
              <input type="text" name="jawaban_keamanan" placeholder="Jawaban dari pertanyaan keamanan" disabled value="<?= $_SESSION["jawaban_keamanan"]; ?>" required />
            </div>
            <div class="input-box">
              <span class="details">Sandi</span>
              <input type="password" name="sandi" placeholder="Masukkan sandi anda" required />
            </div>
            <div class="input-box">
              <span class="details">Konfirmasi Sandi</span>
              <input type="password" name="sandi2" placeholder="Konfirmasi sandi anda" required />
            </div>
          </div>
          <span class="data_pribadi-title">Data Alamat</span>
          <div class="user-details">
            <div class="input-box">
              <span class="details">Provinsi</span>
              <input type="text" name="provinsi" placeholder="Masukkan provinsi anda" disabled value="<?= $_SESSION["provinsi"]; ?>" required />
              <h5>*Misal : Jawa Timur</h5>
            </div>
            <div class="input-box">
              <span class="details">Kabupaten</span>
              <input type="text" name="kabupaten" placeholder="Masukkan kabupaten anda" disabled value="<?= $_SESSION["kabupaten"]; ?>" required />
              <h5>*Misal : Bangkalan</h5>
            </div>
            <div class="input-box">
              <span class="details">Kecamatan</span>
              <input type="text" name="kecamatan" placeholder="Masukkan kecamatan anda" disabled value="<?= $_SESSION["kecamatan"]; ?>" required />
              <h5>*Misal : Kamal</h5>
            </div>
            <div class="input-box">
              <span class="details">Kelurahan</span>
              <input type="text" name="kelurahan" placeholder="Masukkan kelurahan anda" disabled value="<?= $_SESSION["kelurahan"]; ?>" required />
              <h5>*Misal : Telang</h5>
            </div>
            <div class="input-box">
              <span class="details">RT</span>
              <input type="text" name="rt" placeholder="Masukkan RT anda" disabled value="<?= $_SESSION["rt"]; ?>" required />
              <h5>*Misal : 01</h5>
            </div>
            <div class="input-box">
              <span class="details">RW</span>
              <input type="text" name="rw" placeholder="Masukkan RW anda" disabled value="<?= $_SESSION["rw"]; ?>" required />
              <h5>*Misal : 01</h5>
            </div>
            <div class="input-box">
              <span class="details">Nama Jalan</span>
              <input type="text" name="nama_jalan" placeholder="Masukkan nama jalan anda" disabled value="<?= $_SESSION["nama_jalan"]; ?>" required />
              <h5>*Misal : Jl. Raya Telang</h5>
            </div>
            <input type="hidden" name="level1" value="<?= $_SESSION["level1"]; ?>" />
            <input type="hidden" name="level2" value="<?= $_SESSION["level2"]; ?>" />
          </div>
          <div class="button">
            <button type="submit" class="button" name="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
