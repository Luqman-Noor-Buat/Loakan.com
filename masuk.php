<?php

session_start();

include "koneksi.php";

if(isset($_POST["login"])){
  $email1 = $_POST["email"];
  $sandi = $_POST["sandi"];
  

  $cek_email_login = mysqli_query($conn, "SELECT * FROM user_loakan WHERE email='$email1'");
  //cek email
  if (mysqli_num_rows($cek_email_login) == 1) {
    //cek sandi
    $row = mysqli_fetch_assoc($cek_email_login);
    if(password_verify($sandi, $row["sandi"])) {
      //set session
      if($row['level1']=='admin'){
        $_SESSION["login"] = true;
        $_SESSION['email'] = $email1;
        $_SESSION['level1'] = $row['level1'];
        echo "
          <script>
            alert('Anda telah berhasil masuk!');
            document.location.href='admin.php';   
          </script>   
          ";
        exit;
      }else if($row['level1']=='pembeli'){
        $_SESSION["login"] = true;
        $_SESSION['email'] = $email1;
        $_SESSION['level1'] = $row['level1'];
        $_SESSION['level2'] = $row['level2'];
        echo "
          <script>
            alert('Anda telah berhasil masuk!');
            document.location.href='index-after.php';   
          </script>   
          ";
        exit;
      }
    }
  }
  $eror = true;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Masuk | Loakan</title>
    <link rel="stylesheet" href="css/style for login.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/logo1.png" />
    <!--Fontawnsome-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  </head>
  <body style="background-color: rgba(188, 227, 243);">
    <img src="img/logo2.png" alt="" width="200px" style="display: block; margin:auto; margin-top:5%"/>
    <div class="center">
      <h3><center><strong>Masuk</strong></center></h3>
      <form action="" method="post">
        <div class="txt_field">
          <input type="text" name="email" required />
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="sandi" required />
          <span></span>
          <label>Sandi</label>
        </div>
        <!-- Pesan eror saat sandi atau email salah -->
        <?php if(isset($eror)) : ?>
          <div class="txt_eror">
            <span style="color: red; font-style:italic">Email atau sandi salah</span>
          </div>
        <?php endif; ?>
        <div class="pass">
          <a href="input_lupa_sandi.php" class="pass">Lupa Sandi?</a>
        </div>
        <button type="submit" name="login">Masuk</button>
        <div class="signup_link">Belum menjadi member? <a href="daftar.php">Daftar</a></div>
      </form>
    </div>
  </body>
</html>