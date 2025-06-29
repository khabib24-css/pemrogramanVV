<?php
require './functions/functions.php';

if(isset($_POST["login"]))
{
  $nama = $_POST["user"];
  $password = $_POST["password"];
  $resault = mysqli_query($db,"SELECT * FROM karyawan WHERE nama_depan = '$nama'");

  if (mysqli_num_rows($resault) === 1) {
    $datauser = mysqli_fetch_assoc($resault);
    if($password === $datauser["password"])
    {
      echo "<script>
      alert('Login berhasil');
      window.location.href = '../karyawan/index.php';
      </script>";
      exit;
    }
  }
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form class="form" method="post">
      <h2 class="login">LOGIN</h2>
      <?php if (isset($error)):?>
        <p style="color:chocolate; font-style:italic">username / password salah</p>
        <?php endif; ?>
      <div class="kotak">
        <label for="" class="form-label">USERNAME</label>
        <input type="text" name="user" class="form-control" id="" placeholder="gunakan nama depan ketika daftar"/>
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" class="pass form-control" id="exampleInputPassword1" />
        <p>Belum punya akun ? <a href="./pendaftaran/pendaftaran.php">Daftar disini</a></p>
      </div>
      <div class="tombol">
        <button type="submit" class="button" name="login">Log in</button>
      </div>
    </form>
  </body>
</html>
