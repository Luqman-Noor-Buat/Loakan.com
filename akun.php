<?php

session_start();
if(!isset($_SESSION["login"]) || $_SESSION['level1']!='pembeli'){
  header("location:masuk.php");
  exit;
}
include "koneksi.php";

if(isset($_POST["submit"])) {
  $id_user = $_POST["id_user"];
  $nama_lengkap = htmlspecialchars($_POST["nama_lengkap"]);
  $email = htmlspecialchars($_POST["email"]);
  $no_wa = htmlspecialchars($_POST["no_wa"]);
  $no_hp = htmlspecialchars($_POST["no_hp"]);
  $pertanyaan_keamanan = htmlspecialchars($_POST["pertanyaan_keamanan"]);
  $jawaban_keamanan = htmlspecialchars($_POST["jawaban_keamanan"]);
  $sandi = mysqli_real_escape_string($conn, $_POST["sandi"]);
  $sandi2 = mysqli_real_escape_string($conn, $_POST["sandi2"]);
  $provinsi = htmlspecialchars($_POST["provinsi"]);
  $kabupaten = htmlspecialchars($_POST["kabupaten"]);
  $kecamatan = htmlspecialchars($_POST["kecamatan"]);
  $kelurahan = htmlspecialchars($_POST["kelurahan"]);
  $rt = htmlspecialchars($_POST["rt"]);
  $rw = htmlspecialchars($_POST["rw"]);
  $nama_jalan = htmlspecialchars($_POST["nama_jalan"]);
  $level1 = htmlspecialchars($_POST["level1"]);
  $level2 = htmlspecialchars($_POST["level2"]);
  
  //cek email sudah ada belum atau belum
  $cek_email = mysqli_query($conn, "SELECT * FROM user_loakan WHERE email= '$email'");
  if (mysqli_num_rows($cek_email)>2) {
    if(mysqli_fetch_assoc($cek_email)) {
      echo "
              <script>
                alert('Anda gagal melakukan perubahan data. Email telah terdaftar, silahkan gunakan email yang lain!')
                document.location.href='index-after.php';
              </script>";
            return false;
    }
  }
  //cek nomor WA sudah ada belum atau belum
  $cek_no_wa = mysqli_query($conn, "SELECT * FROM user_loakan WHERE no_wa = '$no_wa'");
  if (mysqli_num_rows($cek_no_wa)>2) {
    if(mysqli_fetch_assoc($cek_no_wa)) {
      echo "
              <script>
                alert('Anda gagal melakukan perubahan data. Nomor WhatsApp telah digunakan, gunakan nomor WhatsApp yang lain!')
                document.location.href='index-after.php';
              </script>";
            return false;
    }
  }
  //cek nomor HP sudah ada belum atau belum
  $cek_no_hp = mysqli_query($conn, "SELECT * FROM user_loakan WHERE no_hp = '$no_hp'");
  if (mysqli_num_rows($cek_no_hp)>2){
    if(mysqli_fetch_assoc($cek_no_hp)) {
      echo "
              <script>
                alert('Anda gagal melakukan perubahan data. Nomor Handphone telah digunakan, gunakan nomor Handphone yang lain!')
                document.location.href='index-after.php';
              </script>";
            return false;
    }
  }
  // cek sandi
  if($sandi !== $sandi2) {
    echo "
          <script>
            alert('Konfirmasi sandi anda tidak sesuai')
            document.location.href='akun.php';
          </script>";
        return false;
  }
  // enkripsi password
  $sandi = password_hash($sandi, PASSWORD_DEFAULT);

  $query = "UPDATE user_loakan SET
              nama_lengkap ='$nama_lengkap',
              email = '$email', 
              no_wa = '$no_wa', 
              no_hp = '$no_hp', 
              pertanyaan_keamanan = '$pertanyaan_keamanan',
              jawaban_keamanan = '$jawaban_keamanan',
              sandi = '$sandi', 
              provinsi = '$provinsi', 
              kabupaten = '$kabupaten', 
              kecamatan = '$kecamatan', 
              kelurahan = '$kelurahan', 
              rt = '$rt', 
              rw = '$rw', 
              nama_jalan = '$nama_jalan',
              level1 = '$level1',
              level2 = '$level2'
              WHERE id_user = $id_user";
  mysqli_query($conn, $query);
  if(mysqli_affected_rows($conn) > 0) {
    echo "
    <script>
      alert('Data telah diperbarui!');
      document.location.href='index-after.php';   
    </script>   
    ";
  } else {
    echo "
    <script>
      alert('Gagal melakukan pembaruan data');
      document.location.href='akun.php';
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
    <title>Akun | Loakan</title>
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
              <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap anda" value="<?= $_SESSION["nama_lengkap"]; ?>" required />
              <h5>*Misal : Budi Handoko</h5>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" name="email" placeholder="Masukkan email anda" value="<?= $_SESSION["email"]; ?>" required />
              <h5>*Misal : budihandoko@gmail.com</h5>
            </div>
            <div class="input-box">
              <span class="details">Nomor WhatsApp</span>
              <input type="text" name="no_wa" placeholder="Masukkan nomor whatsapp anda" value="<?= $_SESSION["no_wa"]; ?>" required />
              <h5>*Misal : +6282345667865</h5>
            </div>
            <div class="input-box">
              <span class="details">Nomor Handphone</span>
              <input type="text" name="no_hp" placeholder="Masukkan nomor handphone anda" value="<?= $_SESSION["no_hp"]; ?>" required />
              <h5>*Misal : 082345667865</h5>
            </div>
            <div class="input-box">
              <span class="details">Pertanyaan Keamanan</span>
              <select name="pertanyaan_keamanan" id="pertanyaan_keamanan" value="<?= $_SESSION["pertanyaan_keamanan"]; ?>" style="width: 350px; height:45px;" required>
                <option selected>Pilih Pertanyaan Keamanan</option>
                <option value="nama_ibu">Siapa nama ibu anda?</option>
                <option value="warna_kesukaan">Apa warna kesukaan anda?</option>
                <option value="nama_nenek">Siapa nama nenek anda?</option>
              </select>
              <h5>*Pastikan pertanyaan sesuai dengan jawaban!</h5>
            </div>
            <div class="input-box">
              <span class="details">Jawaban Pertanyaan Keamanan</span>
              <input type="text" name="jawaban_keamanan" placeholder="Jawaban dari pertanyaan keamanan" value="<?= $_SESSION["jawaban_keamanan"]; ?>" required />
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
              <input type="text" name="provinsi" placeholder="Masukkan provinsi anda" value="<?= $_SESSION["provinsi"]; ?>" required />
              <h5>*Misal : Jawa Timur</h5>
            </div>
            <div class="input-box">
              <span class="details">Kabupaten</span>
              <input type="text" name="kabupaten" placeholder="Masukkan kabupaten anda" value="<?= $_SESSION["kabupaten"]; ?>" required />
              <h5>*Misal : Bangkalan</h5>
            </div>
            <div class="input-box">
              <span class="details">Kecamatan</span>
              <input type="text" name="kecamatan" placeholder="Masukkan kecamatan anda" value="<?= $_SESSION["kecamatan"]; ?>" required />
              <h5>*Misal : Kamal</h5>
            </div>
            <div class="input-box">
              <span class="details">Kelurahan</span>
              <input type="text" name="kelurahan" placeholder="Masukkan kelurahan anda" value="<?= $_SESSION["kelurahan"]; ?>" required />
              <h5>*Misal : Telang</h5>
            </div>
            <div class="input-box">
              <span class="details">RT</span>
              <input type="text" name="rt" placeholder="Masukkan RT anda" value="<?= $_SESSION["rt"]; ?>" required />
              <h5>*Misal : 01</h5>
            </div>
            <div class="input-box">
              <span class="details">RW</span>
              <input type="text" name="rw" placeholder="Masukkan RW anda" value="<?= $_SESSION["rw"]; ?>" required />
              <h5>*Misal : 01</h5>
            </div>
            <div class="input-box">
              <span class="details">Nama Jalan</span>
              <input type="text" name="nama_jalan" placeholder="Masukkan nama jalan anda" value="<?= $_SESSION["nama_jalan"]; ?>" required />
              <h5>*Misal : Jl. Raya Telang</h5>
            </div>
          </div>
          <!--Pesan-->
          <div class="user-details">
            <div class="button">
            <?php if($_SESSION["level2"]!="penjual") {
              echo "<span class='data_pribadi-title'>Anda adalah seorang ". $_SESSION['level1']." di Loakan.</span>";
              }else{
                echo "<span class='data_pribadi-title'>Anda adalah seorang ".$_SESSION['level1']." dan ".$_SESSION['level2']." di Loakan.</span>";
              }?>
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
