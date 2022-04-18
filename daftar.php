<?php

session_start();
if(isset($_SESSION["submit"])) {
  header("Location: masuk.php");
  exit;
}

include "koneksi.php";

if(isset($_POST["submit"])) {
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

//cek email sudah ada belum atau belum
$cek_email = mysqli_query($conn, "SELECT email FROM user_loakan WHERE email = '$email'");
if(mysqli_fetch_assoc($cek_email)) {
  echo "
          <script>
            alert('Email telah terdaftar, silahkan gunakan email yang lain!')
            document.location.href='daftar.php';
          </script>";
        return false;
}
//cek nomor WA sudah ada belum atau belum
$cek_no_wa = mysqli_query($conn, "SELECT no_wa FROM user_loakan WHERE no_wa = '$no_wa'");
if(mysqli_fetch_assoc($cek_no_wa)) {
  echo "
          <script>
            alert('Nomor WhatsApp telah digunakan, gunakan nomor WhatsApp yang lain!')
            document.location.href='daftar.php';
          </script>";
        return false;
}
//cek nomor HP sudah ada belum atau belum
$cek_no_hp = mysqli_query($conn, "SELECT no_hp FROM user_loakan WHERE no_hp = '$no_hp'");
if(mysqli_fetch_assoc($cek_no_hp)) {
  echo "
          <script>
            alert('Nomor Handphone telah digunakan, gunakan nomor Handphone yang lain!')
            document.location.href='daftar.php';
          </script>";
        return false;
}
// cek sandi
  if($sandi !== $sandi2) {
    echo "
          <script>
            alert('Konfirmasi sandi anda tidak sesuai')
            document.location.href='daftar.php';
          </script>";
        return false;
  }
  // enkripsi password
  $sandi = password_hash($sandi, PASSWORD_DEFAULT);

  //cek level
  if($level1 == '200411100206'){
    $level1 = 'admin';
  }else{
    $level1 = 'pembeli';
  }

  $query = "INSERT INTO user_loakan VALUE
              ('','$nama_lengkap', '$email', '$no_wa', '$no_hp', '$pertanyaan_keamanan', '$jawaban_keamanan',
              '$sandi', '$provinsi', '$kabupaten', '$kecamatan', '$kelurahan', '$rt', '$rw', '$nama_jalan', '$level1', '')";
  mysqli_query($conn, $query);
  if(mysqli_affected_rows($conn) > 0) {
    echo "
    <script>
      alert('Anda telah berhasil melakukan pendaftaran!');
      document.location.href='masuk.php';   
    </script>   
    ";
  } else {
    echo "
    <script>
      alert('Anda gagal melakukan pendaftaran, silahkan coba kembali :(');
      document.location.href='daftar.php';   
    </script>
    ";
  }
}
?>

<!DOCTYPE html>
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/style for sign up.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/logo1.png" />
    <title>Daftar | Loakan</title>
  </head>
  <body>
  <img src="img/logo2.png" alt="" width="200px" style="display: block; margin:auto; margin-top:2%"/>
    <div class="kotak">
      <div class="title">Registrasi Member Loakan</div>
      <div class="content">
        <form action="" method="post">
          <span><br /></span>
          <span class="data_pribadi-title">Data Pribadi</span>
          <div class="user-details">
            <div class="input-box">
              <span class="details">Nama Lengkap</span>
              <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap anda" required />
              <h5>*Misal : Budi Handoko</h5>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="email" name="email" placeholder="Masukkan email anda" value=" @gmail.com" required />
              <h5>*Misal : budihandoko@gmail.com</h5>
            </div>
            <div class="input-box">
              <span class="details">Nomor WhatsApp</span>
              <input type="text" name="no_wa" placeholder="Masukkan nomor whatsapp anda" value="62" required />
              <h5>*Misal : 6282345667865. Ganti angka 0 menjadi 62</h5>
            </div>
            <div class="input-box">
              <span class="details">Nomor Handphone</span>
              <input type="text" name="no_hp" placeholder="Masukkan nomor handphone anda" required />
              <h5>*Misal : 082345667865</h5>
            </div>
            <div class="input-box">
              <span class="details">Pertanyaan Keamanan</span>
              <select name="pertanyaan_keamanan" id="pertanyaan_keamanan" style="width: 350px; height:45px;" required>
                <option selected >Pilih Pertanyaan Keamanan</option>
                <option value="nama_ibu">Siapa nama ibu anda?</option>
                <option value="warna_kesukaan">Apa warna kesukaan anda?</option>
                <option value="nama_nenek">Siapa nama nenek anda?</option>
              </select>
              <h5>*Pastikan pertanyaan sesuai dengan jawaban!</h5>
            </div>
            <div class="input-box">
              <span class="details">Jawaban Pertanyaan Keamanan</span>
              <input type="text" name="jawaban_keamanan" placeholder="Jawaban dari pertanyaan keamanan" required />
            </div>
            <div class="input-box">
              <span class="details">Sandi</span>
              <input type="password" name="sandi" placeholder="Masukkan sandi anda" title="Sandi minimal 8 karakter" required />
            </div>
            <div class="input-box">
              <span class="details">Konfirmasi Sandi</span>
              <input type="password" name="sandi2" placeholder="Konfirmasi sandi anda" title="Sandi minimal 8 karakter" required />
            </div>
          </div>
          <span class="data_pribadi-title">Data Alamat</span>
          <div class="user-details">
            <div class="input-box">
              <span class="details">Provinsi</span>
              <input type="text" name="provinsi" placeholder="Masukkan provinsi anda" required />
              <h5>*Misal : Jawa Timur</h5>
            </div>
            <div class="input-box">
              <span class="details">Kabupaten</span>
              <input type="text" name="kabupaten" placeholder="Masukkan kabupaten anda" required />
              <h5>*Misal : Bangkalan</h5>
            </div>
            <div class="input-box">
              <span class="details">Kecamatan</span>
              <input type="text" name="kecamatan" placeholder="Masukkan kecamatan anda" required />
              <h5>*Misal : Kamal</h5>
            </div>
            <div class="input-box">
              <span class="details">Kelurahan</span>
              <input type="text" name="kelurahan" placeholder="Masukkan kelurahan anda" required />
              <h5>*Misal : Telang</h5>
            </div>
            <div class="input-box">
              <span class="details">RT</span>
              <input type="text" name="rt" placeholder="Masukkan RT anda" required />
              <h5>*Misal : 01</h5>
            </div>
            <div class="input-box">
              <span class="details">RW</span>
              <input type="text" name="rw" placeholder="Masukkan RW anda" required />
              <h5>*Misal : 01</h5>
            </div>
            <div class="input-box">
              <span class="details">Nama Jalan</span>
              <input type="text" name="nama_jalan" placeholder="Masukkan nama jalan anda" required />
              <h5>*Misal : Jl. Raya Telang</h5>
            </div>
          </div>
          <span class="data_pribadi-title">Kode Khusus</span>
          <div class="user-details">
             <div class="input-box">
                <span class="details">Kode Referal</span>
                <input type="text" name="level1" placeholder="Masukkan kode referal jika memiliki" />
                <h5>*Masukkan kode jika memiliki</h5>
             </div>
          </div>
          <div class="user-details">
             <div class="button">
                <input class="form-check-input" type="checkbox" value="" style="width: 15px; height:15px;" required/>
                <label class="form-check-label" for="invalidCheck">Menyetujui <a href="syarat-ketentuan.html" class="text-dark">Syarat & Ketentuan</a> yang ada.</label>
             </div>
          </div>
          <div class="button">
            <button type="submit" class="button" name="submit">Daftar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
